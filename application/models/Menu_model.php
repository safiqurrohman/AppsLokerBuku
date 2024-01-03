<?php

class Menu_model extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    public function tambahMenu(){
        $add_menu = [
            'menu' => htmlspecialchars($this->input->post('menu', true))
            
        ];

        $this->db->insert('user_menu', $add_menu);
    }

    public function getSubMenu(){
        $query = "SELECT `sub_menu`.*, `user_menu`. `menu`
        FROM  `sub_menu` JOIN `user_menu`
        ON `sub_menu`. `menu_id` = `user_menu`. `id`
         "; 

         return $this->db->query($query)->result_array();
    }

    // public function insertSubmenu(){
    //     return $this->db->get('sub_menu')->result();
    // }
}