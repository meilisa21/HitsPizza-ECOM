<?php 

class M_login extends CI_Model{	

    public function get($username){
        $this->db->where('username', $username); // Untuk menambahkan Where Clause : username='$username'
        $result = $this->db->get('user')->row(); // Untuk mengeksekusi dan mengambil data hasil query

        return $result;
    }
    public function register($enc_password){
        // User data array
        $data = array(
            'nama' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'password' => $enc_password,
            'role' => operator
        );
     
        // Insert user
        return $this->db->insert('user', $data);
    }

    function cek_session(){
        return $this->session->userdata('username');
    }
}
