<?php class Generate extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Buku_model');
    }
    function index()
    {
        $this->load->library('pdfgenerator');
        $data['daftarBuku'] = $this->Buku_model->getBuku();
        $data['kategoriBuku'] = $this->Buku_model->kategoriBuku();
        $paper = 'A4';
        $orientation = "landscape";
        $html = $this->load->view('component/buku/extractBuku', $data, true);
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }
}