<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_products extends CI_Model
{
    private $_table = "tbl_produk";

    public $id_produk;
    public $nama_produk;
    public $harga;
    public $gambar = "default.jpg";
    public $deskripsi;

    public function rules()
    {
        return [
            ['field' => 'nama_produk',
            'label' => 'Name',
            'rules' => 'required'],

            ['field' => 'harga',
            'label' => 'Price',
            'rules' => 'numeric'],
            
            ['field' => 'deskripsi',
            'label' => 'Description',
            'rules' => 'required']
        ];
    }

    

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_produk" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_produk = uniqid();
        $this->nama_produk = $post["nama_produk"];
        $this->harga= $post["harga"];
        $this->gambar = $this->_uploadImage();
        $this->deskripsi = $post["deskripsi"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_produk = $post["id_produk"];
        $this->nama_produk = $post["nama_produk"];
        $this->harga = $post["harga"];
        if(!empty($_FILES["gambar"]["name"])){
            $this->gambar = $this->_uploadImage();
        }else{
            $this->gambar = $post["old_image"];
        }
        $this->deskripsi = $post["deskripsi"];
        return $this->db->update($this->_table, $this, array('id_produk' => $post['id']));
    }

    public function delete($id)
    {
        $this->_deleteImage($id);
        return $this->db->delete($this->_table, array("id_produk" => $id));
    }

    private function _uploadImage(){
        $config['upload_path']          = '.assets/img/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $this->id_produk;
        $config['overwrite']			= true;
        $config['max_size']             = 1024; // 1MB
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
    
        $this->load->library('upload', $config);
    
        if ($this->upload->do_upload('gambar')) {
            return $this->upload->data("file_name");
        }
        
    }

    private function _deleteImage($id){
        $product = $this->getById($id);
        if ($product->gambar != "") {
            $filename = explode(".", $product->gambar)[0];
            return array_map('unlink', glob(FCPATH."img/$filename.*"));
        }
    }
}