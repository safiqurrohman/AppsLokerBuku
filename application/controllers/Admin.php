<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

  
  public function __construct(){
    parent::__construct();
    is_logged_in();
    $this->load->model('Admin_model');
  }
	public function index()
	{
        $data['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        $data['datauser'] = $this->Admin_model->getdatauser();

        $data['title'] = 'Dashboard';
        $data['judul'] = 'Dashboard';
        $this->load->view('template/user/header', $data);
        $this->load->view('template/user/sidebar', $data);
        $this->load->view('template/user/topbar', $data);
        $this->load->view('component/admin/index', $data);
        $this->load->view('template/user/footer');
        $this->load->view('component/slidesow/profile');

		// echo 'selamat datang ' . $data['user']['nama'];
  }	

  public function role(){
    $data['user'] = $this->db->get_where('user', ['email' => 
    $this->session->userdata('email')])->row_array();

    $data['role'] = $this->db->get('user_role')->result_array();
    $data['title'] = 'Role';
    $data['judul'] = 'Role';
    $this->load->view('template/user/header', $data);
    $this->load->view('template/user/sidebar', $data);
    $this->load->view('template/user/topbar', $data);
    $this->load->view('component/admin/role', $data);
    $this->load->view('template/user/footer');
    $this->load->view('component/slidesow/profile');
  }

  
}
