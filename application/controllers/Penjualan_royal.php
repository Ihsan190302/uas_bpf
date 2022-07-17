<?php
defined('BASEPATH') or exit('NO DIRECT ACCESS SCRIPT ALLOWED');

use Dompdf\Dompdf;

class Penjualan_royal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Royal_model');
        $this->load->model('Penjualan_royal_model');
        $this->load->model('User_model');
        $this->load->model('Detail_royal_model');
    }

    public function index()
    {
        $data['judul'] = "Halaman Starlight";
        $data['penjualan_royal'] = $this->Penjualan_royal_model->get();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('layout/header', $data);
        $this->load->view('penjualan_royal/vw_penjualan_royal', $data);
        $this->load->view('layout/footer');
    }
    public function detail_royal($id)
    {
        $data['judul'] = "Halaman Detail penjualan";
        $data['detail_royal'] = $this->Detail_royal_model->getById($id);
        $data['penjualan_royal'] = $this->Penjualan_royal_model->getByIdP($id);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('status', 'Status', 'required', [
            'required' => 'Status Wajib di isi'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("penjualan_royal/vw_detail_penjualan_royal", $data);
            $this->load->view("layout/footer");
        } else {
            $status = $this->input->post('status');
            $nojual = $this->input->post('no_penjualan');
            $this->Penjualan_royal_model->updatestatus($status, $nojual);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Status Berhasil DiUbah!</div>');
            redirect('Penjualan_royal');
        }
    }
    public function export()
    {
        $dompdf = new Dompdf();
        $this->data['all_jual'] = $this->Penjualan_model->get();
        $this->data['title'] = 'Laporan Data Penjualan';
        $this->data['no'] = 1;
        $dompdf->setPaper('A4', 'Landscape');
        $html = $this->load->view('penjualan/report', $this->data, true);
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream('Laporan Data Penjualan Tanggal ' . date('d F Y'), array("Attachment" => false));
    }
}