<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Royal extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Royal_model');
    }

    public function index()
	{
        $data['judul'] = "Halaman Royal Pass";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['royal'] = $this->Royal_model->get();
        $this->load->view('layout/header',$data);
		$this->load->view('royal/vw_royal',$data);
        $this->load->view('layout/footer',$data);
	}
    function tambah()
    {
        $data['judul'] = "Halaman Tambah Royal Pass";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['royal'] = $this->Royal_model->get();
        $this->form_validation->set_rules('nama', 'Starlight', 'required', 
            ['required' => 'Nama Starlight Wajib di isi']);
        $this->form_validation->set_rules('harga', 'Harga', 'required|integer', 
            ['required' => 'Harga Wajib di isi', 'integer' => 'Harga harus Angka']);
        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("royal/vw_tambah_royal", $data);
            $this->load->view("layout/footer");
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'harga' => $this->input->post('harga'),
            ];
            $this->Royal_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success"
                role="alert">Data Royal Pass Berhasil Ditambah!</div>');
                redirect('Royal');
        }
    }
    public function edit($id)
    {
        $data['judul'] = "Halaman Edit Royal Pass";
		
		$data['royal'] = $this->Royal_model->getById($id);
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		
		$this->form_validation->set_rules('nama', 'Starlight', 'required', 
            ['required' => 'Nama Starlight Wajib di isi']);
        $this->form_validation->set_rules('harga', 'Harga', 'required|integer', 
            ['required' => 'Harga Wajib di isi', 'integer' => 'Harga harus Angka']);
		if ($this->form_validation->run() == false) {
			$this->load->view("layout/header", $data);
			$this->load->view("royal/vw_ubah_royal", $data);
			$this->load->view("layout/footer");
		} else {
			$data = [
				'nama' => $this->input->post('nama'),
                'harga' => $this->input->post('harga'),
			];
			$id = $this->input->post('id');
			$this->Royal_model->update(['id' => $id], $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Royal Pass Berhasil Diubah!</div>');
			redirect('Royal');
		}
    }
    public function hapus($id)
    {
        $this->Royal_model->delete($id);
        $error = $this->db->error();
        if ($error['code'] != 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="icon 
            fas fa-info-circle"></i>Data Royal Pass tidak dapat dihapus (sudah berelasi)!</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i
            class="icon fas fa-check-circle"></i>Data Royal Pass Berhasil Dihapus!</div>');
        }
        redirect('Royal');
    }
}
