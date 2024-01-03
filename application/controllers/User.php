<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

  public function __construct(){
    parent::__construct();
    is_logged_in();
  }

	public function index()
	{
        $data['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        $data['title'] = 'Myprofile';
        $data['judul'] = 'Myprofile';
        $this->load->view('template/user/header', $data);
        $this->load->view('template/user/sidebar', $data);
        $this->load->view('template/user/topbar', $data);
        $this->load->view('component/user/index', $data);
        $this->load->view('template/user/footer');
        $this->load->view('component/slidesow/profile'); 
        // $this->load->view('component/slidesow/logout'); 

		// echo 'selamat datang ' . $data['user']['nama'];
  }	


}
