<?php

class Buku_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    public function getBuku(){
    //    return  $this->db->get('daftar_buku')->result();
        $query = "SELECT `daftar_buku`.*, `kategori_buku`. `kategori`
        FROM  `daftar_buku` JOIN `kategori_buku`
        ON `daftar_buku`. `id_kategori` = `kategori_buku`. `id`
        "; 
     return $this->db->query($query)->result_array();
    }

    public function insertBuku($data){
        $this->db->insert('daftar_buku', $data);
    }

    public function kategoriBuku(){
        return $this->db->get('kategori_buku')->result_array();
    }

    public function getBukuByKategori(){

       return $this->db->get('kategori_buku')->result_array();

    }

    public function getKategoriBukuById($id) {
        return $this->db->get_where('kategori_buku', ['id' => $id])->row_array();
    }
    public function getBukuById($id) {
        return $this->db->get_where('daftar_buku', ['id' => $id])->row_array();
    }

    public function updateBuku($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('kategori_buku', $data);
    }

    function deleteBuku($id){
        $this->db->where('id', $id);
        $this->db->delete('daftar_buku');
    }

    function deleteKategori($id){
        $this->db->where('id', $id);
        $this->db->delete('kategori_buku');
    }

}