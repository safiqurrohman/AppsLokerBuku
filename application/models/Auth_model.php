<?php

class Auth_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    public function register(){
        $data = [
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'email' => $this->input->post('email'),
            'image' => 'default.jpg',
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'role_id' => 2,
            'is_active' => 1,
            'date_create' => time()
            
        ];

        $this->db->insert('user', $data);
    }
}