<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pagination extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library(array('form_validation', 'session'));
		$this->load->helper(array('url'));
		$this->load->model('pagination_m');
	}

	public function index()
	{
		$this->load->database();
		$jumlah_data = $this->pagination_m->jumlah_data();
		$this->load->library('pagination');
		$config['base_url'] = base_url() . 'index.php/pagination/index';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 10;
		$from = $this->uri->segment(3);
		$this->pagination->initialize($config);
		$data['user'] = $this->pagination_m->data($config['per_page'], $from);
		$this->load->view('pagination_v', $data);
	}

	public function tambah()
	{
		$data = $this->pagination_m;
		$validation = $this->form_validation;
		$validation->set_rules($data->rules());

		if ($validation->run()) {
			$data->save();
			$this->session->set_flashdata('Succes', 'Berhasil disimpan');
		}

		$this->load->view('tambah_v');
	}
}
