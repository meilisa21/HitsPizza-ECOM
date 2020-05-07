<?php

class pagination_m extends CI_Model
{
    private $_table = "user";

    public $id;
    public $nama;
    public $alamat;
    public $pekerjaan;

    public function rules()
    {
        return [
            [
                'field' => 'id',
                'label' => 'Id',
                'rules' => 'numeric'
            ],

            [
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'required'
            ],

            [
                'field' => 'alamat',
                'label' => 'Alamat',
                'rules' => 'required'
            ],

            [
                'field' => 'pekerjaan',
                'label' => 'Pekerjaan',
                'rules' => 'required'
            ]
        ];
    }

    function data($number, $offset)
    {
        return $query = $this->db->get('user', $number, $offset)->result();
    }

    function jumlah_data()
    {
        return $this->db->get('user')->num_rows();
    }
    public function save()
    {
        $post = $this->input->post();
        $this->id = $post["id"];
        $this->nama = $post["nama"];
        $this->alamat = $post["alamat"];
        $this->pekerjaan = $post["pekerjaan"];
        return $this->db->insert($this->_table, $this);
    }
}
