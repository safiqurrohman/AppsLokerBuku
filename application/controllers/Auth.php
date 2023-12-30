<?php
class Auth extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
        $this->load->library('form_validation');
    }

	public function index()
	{
        $data['title'] = 'Login';
        $data['tagline'] = 'SELAMAT DATANG DI LOKER BUKU';
        $data['judul'] = 'Halaman Login';
        $this->load->view('template/header', $data);
        $this->load->view('auth/login', $data);
        $this->load->view('template/footer');
	}
    
    public function register()
    {

        $this->form_validation->set_rules('nama', 'nama lengkap', 'required|trim', [
            'required' => 'Nama lengkap belum diisi!',
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'Alamat belum diisi!!',
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]',[
            'valid_email' => 'Masukkan email yang valid!!',
            'is_unique' => 'email sudah pernah digunakan!',
        ]); 
        
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[5]|matches[ulangipassword]', [
            'matches' => 'password tidak cocok, coba ulangi!',
            'min_length' => 'password terlalu pendek!'
        ]);
        $this->form_validation->set_rules('ulangipassword', 'Password2', 'required|trim|matches[password]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Registrasi';
            $data['tagline'] = 'SELAMAT DATANG DI LOKER BUKU';
            $data['judul'] = 'Halaman Registrasi';
            $this->load->view('template/header', $data);
            $this->load->view('auth/register', $data);
            $this->load->view('template/footer');           
        } else {
            $data_register = $this->input->post();
            $this->Auth_model->register($data_register);
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
            Selamat!! anda berhasil register. silahkan login..
            </div>');
            redirect('auth');
        }
    }
}
