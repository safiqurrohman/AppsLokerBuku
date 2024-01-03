<?php

class Auth_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }


    public function register(){
        $data = [
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'alamat' =>htmlspecialchars($this->input->post('alamat', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'image' => 'default.jpg',
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'role_id' => 2,
            'is_active' => 1,
            'date_create' => time()
            
        ];

        $this->db->insert('user', $data);
    }

}