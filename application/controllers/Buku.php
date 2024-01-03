<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('Buku_model');
        is_logged_in();

        // $this->load->library('form_validation');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        $data['buku'] = $this->db->get_where('daftar_buku')->result_array();

        $data['kategoriBuku'] = $this->Buku_model->kategoriBuku();

        $data['title'] = 'Buku';
        $data['judul'] = 'Buku';
        $this->load->view('template/user/header', $data);
        $this->load->view('template/user/sidebar', $data);
        $this->load->view('template/user/topbar', $data);
        $this->load->view('component/buku/buku', $data);
        $this->load->view('template/user/footer');
        $this->load->view('component/slidesow/profile');
    }

    public function daftarBuku(){

        $data['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        // $data['kategori'] = $this->Buku_model->kategoriBuku();
        $data['title'] = 'Daftar Buku';
        $data['judul'] = 'Daftar Buku';

        $data['daftarBuku'] = $this->Buku_model->getBuku();
        $data['kategoriBuku'] = $this->Buku_model->kategoriBuku();

        if($this->form_validation->run() == false ){
            $this->load->view('template/user/header', $data);
            $this->load->view('template/user/sidebar', $data);
            $this->load->view('template/user/topbar', $data);
            $this->load->view('component/buku/daftarBuku', $data);
            $this->load->view('template/user/footer');
            $this->load->view('component/slidesow/profile');
            
        }else{ 
            $this->form_validation->set_rules('judul', 'Judul', 'required');
            $this->form_validation->set_rules('id_kategori', 'Kategori', 'required');
            $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
            $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
            $this->form_validation->set_rules('file', 'file', 'required');
            $this->form_validation->set_rules('cover', 'cover', 'required');
            
            // $uploadConfig['upload_path'] = './uploads/';
            // $uploadConfig['allowed_types'] = 'pdf|jpg|jpeg|png';
            // $uploadConfig['max_size'] = 2048; // 2MB
            // $uploadConfig['file_name'] = 'file_' . time();

            // $this->load->library('upload', $uploadConfig);

            // if (!$this->upload->do_upload('file')) {
            //     $data['upload_error'] = $this->upload->display_errors();
            //     $this->load->view('form_upload', $data);
            // } else {
                // $uploadData = $this->upload->data();
                $data = [
                    'judul' => $this->input->post('judul'),
                    'id_kategori' => $this->input->post('id_kategori'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'jumlah' => $this->input->post('jumlah'),
                    'file' => $this->input->post('file_name'),
                    'cover' => $this->input->post('cover'),

                ];

                $this->db->insert('daftar_buku', $data);
                var_dump($data);
                die;
                // $this->load->model('Buku_model');
                // $this->Buku_model->insertBuku($data);

                // redirect('buku/daftarBuku');
            // }
        }
       

    }


    public function kategoriBuku(){
        $data['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        $data['kategori'] = $this->Buku_model->kategoriBuku();
        // $data['id_kategori'] = $this->Buku_model->getBukuById($id);
        $data['title'] = 'Daftar Kategori Buku';
        $data['judul'] = 'Kategori Buku';
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');

        if ($this->form_validation->run() == false){
            $this->load->view('template/user/header', $data);
            $this->load->view('template/user/sidebar', $data);
            $this->load->view('template/user/topbar', $data);
            $this->load->view('component/buku/kategoriBuku', $data);
            $this->load->view('template/user/footer');
            $this->load->view('component/slidesow/profile');

        }else{
            $data = [
                'kategori' => $this->input->post('kategori')
            ];

            $this->db->insert('kategori_buku', $data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
            Sub menu berhasil di tambah..!!
            </div>');
            redirect('buku/kategoriBuku');
        }

    }

    public function edit_kategori($id) {
        // $this->load->model('Buku_model');
        $data['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        // $data['kategori'] = $this->Buku_model->kategoriBuku();
        $data['title'] = 'Ubah Kategori Buku';
        $data['judul'] = 'Ubah Kategori Buku';

        $data['kategori'] = $this->Buku_model->getBukuById($id);

        if (empty($data['kategori'])) {
            show_404(); // Jika buku tidak ditemukan, tampilkan error 404
        }

        
        $this->form_validation->set_rules('kategori', 'kategori', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/user/header', $data);
            $this->load->view('template/user/sidebar', $data);
            $this->load->view('template/user/topbar', $data);
            $this->load->view('component/buku/ubahKategoriBuku', $data);
            $this->load->view('template/user/footer');
            $this->load->view('component/slidesow/profile');
        } else {
            // Form validation passed, update data buku
            $updateData = [
                'kategori' => $this->input->post('kategori'),
                
            ];

            $this->Buku_model->updateBuku($id, $updateData);
            redirect('buku/kategoriBuku'); // Redirect ke halaman daftar buku setelah update
        }
    }

    public function hapus($id){
        $this->Buku_model->deleteBuku($id);
        redirect('buku/daftarBuku');
    }
    public function delete($id){
        $this->Buku_model->deleteKategori($id);
        redirect('buku/kategoriBuku');
    }

   

}