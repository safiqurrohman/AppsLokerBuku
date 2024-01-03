<?php
class Auth extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
        // $this->load->library('form_validation');
    }

	public function index()
	{
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
            'valid_email'  => 'email yang anda masukkan tidak valid!',
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required', [
            'required' => 'password harus diisi!!',
        ]);
        
        if ($this->form_validation->run() == false){
            $data['title'] = 'Login';
            $data['tagline'] = 'SELAMAT DATANG DI LOKER BUKU';
            $data['judul'] = 'Halaman Login';
            $this->load->view('template/register/header', $data);
            $this->load->view('auth/login', $data);
            $this->load->view('template/register/footer');

        }else{
            //validasi sukses
            $this->_login();
        }
	}
    
    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        // $admin = $this->db->get_where('user', ['email' => $email])->row_array();

        //cek apakah user ada
        if($user){
            //jika usernya katif
            if($user['is_active'] == 1){
                //cek password
                if(password_verify($password, $user['password'])){
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);

                    if($user['role_id'] == 1){
                        redirect('admin');
                    }else{
                        redirect('user');
                    }
                }else{
                    //jika password salah
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
                    Password yang anda masukkan salah!!
                    </div>');
                    redirect('auth');
                }
            }else{
                $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
                Email anda tidak aktif..!!
                </div>');
                redirect('auth');
            }
        }else{
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
            Email belum terdaftar..!!
            </div>');
            redirect('auth');
        }
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
            $this->load->view('template/register/header', $data);
            $this->load->view('auth/register', $data);
            $this->load->view('template/register/footer');           
        } else {
            $data_register = $this->input->post();
            $this->Auth_model->register($data_register);
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
            Selamat!! anda berhasil register. silahkan login..
            </div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
        Anda berhasil logout!!
        </div>');
        redirect('auth');
    }

    public function blocked(){
        $this->load->view('auth/blocked');
    }
}
