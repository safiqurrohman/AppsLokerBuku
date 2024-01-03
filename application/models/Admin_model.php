<?php

class admin_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    public function getdatauser(){
        $query = "SELECT `user`.*, `user_role`. `role`
        FROM  `user` JOIN `user_role`
        ON `user`. `role_id` = `user_role`. `id`
        "; 
        return $this->db->query($query)->result_array();

    }

}