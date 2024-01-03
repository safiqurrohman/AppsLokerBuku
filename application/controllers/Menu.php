<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model');
        is_logged_in();

        // $this->load->library('form_validation');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get_where('user_menu')->result_array();

        $data['title'] = 'Menu Menejement';
        $data['judul'] = 'Menu Menejement';
        $this->load->view('template/user/header', $data);
        $this->load->view('template/user/sidebar', $data);
        $this->load->view('template/user/topbar', $data);
        $this->load->view('component/menu/index', $data);
        $this->load->view('template/user/footer');
        $this->load->view('component/slidesow/profile');
    }

    public function addMenu(){
        $this->form_validation->set_rules('menu', 'Menu', 'required');
        
        if($this->form_validation->run() == false ){
            redirect('menu');
        }else{ 
            $tambah_menu = $this->input->post();
            $this->Menu_model->tambahMenu($tambah_menu);
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
            Data berhasil di tambah..!!
            </div>');
            redirect('menu');
        }
    }

    public function subMenu(){
        $data['title'] = 'SubMenuMenejement';
        $data['judul'] = 'Sub Menu Menejement';


        $data['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        $data['subMenu'] = $this->Menu_model->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'icon', 'required');

        if($this->form_validation->run() == false ){
            $this->load->view('template/user/header', $data);
            $this->load->view('template/user/sidebar', $data);
            $this->load->view('template/user/topbar', $data);
            $this->load->view('component/menu/submenu', $data);
            $this->load->view('template/user/footer');
            $this->load->view('component/slidesow/profile');
        }else{ 
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];

            $this->db->insert('sub_menu', $data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
            Sub menu berhasil di tambah..!!
            </div>');
            redirect('menu/submenu');
        }
       

    }

}