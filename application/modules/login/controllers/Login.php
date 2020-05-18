<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MX_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('m_login');
		$this->load->library(array('form_validation','session'));
		$this->load->helper('url');
	}

	function index(){
		if($this->m_login->cek_session())
        {
            redirect(base_url('admin/dashboard'));
        }else{
            //jika session belum terdaftar, maka redirect ke halaman login
            $this->load->view("v_login");
        }
	}

	public function login(){
		$username = $this->input->post('username'); // Ambil isi dari inputan username pada form login
		$password = md5($this->input->post('password')); // Ambil isi dari inputan password pada form login dan encrypt dengan md5

		$user = $this->UserModel->get($username); // Panggil fungsi get yang ada di UserModel.php

		if(empty($user)){ // Jika hasilnya kosong / user tidak ditemukan
			$this->session->set_flashdata('message', 'Username tidak ditemukan'); // Buat session flashdata
			redirect(base_url('login')); // Redirect ke halaman login
		}else{
			if($password == $user->password){ // Jika password yang diinput sama dengan password yang didatabase
				$session = array(
					'authenticated'=>true, // Buat session authenticated dengan value true
					'username'=>$user->username,  // Buat session username
					'nama'=>$user->nama, // Buat session nama
					'role'=>$user->role // Buat session role
				);
				
				$this->session->set_userdata($session); // Buat session sesuai $session
				switch ($auth->role) {
					case admin:
						redirect(base_url("/admin/dashboard"));
						break;
					case operator:
						redirect(base_url("page/page"));
						break;
					default:
						break;
					}
			}else{
				$this->session->set_flashdata('message', 'Password salah'); // Buat session flashdata
				redirect(base_url('login'));// Redirect ke halaman login
			}
		}
	}

	public function register(){
		$data['title'] = 'Sign Up';
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[12]|is_unique[users.username]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
		$this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');

		if($this->form_validation->run() === FALSE){
			$this->load->view('v_register', $data);
		} else {
			// Encrypt password
			$enc_password = md5($this->input->post('password'));

			$this->m_login->register($enc_password);

			// Set message
			$this->session->set_flashdata('user_registered', 'You are now registered and can log in');

			redirect(base_url('login'));
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}

	public function cekLogin(){ 
		if(isset($_SESSION['username'])) { 
		  return true; 
		} 
	}
		
}
