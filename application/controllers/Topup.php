<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Topup extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Topup_model');
    }

    public function index()
	{
        $data['judul'] = "Halaman Topup";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['topup'] = $this->Topup_model->get();
        $this->load->view('layout/header',$data);
		$this->load->view('topup/vw_topup',$data);
        $this->load->view('layout/footer',$data);
	}
    function tambah()
    {
        $data['judul'] = "Halaman Tambah Game";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['topup'] = $this->Topup_model->get();
        $this->form_validation->set_rules('game', 'Nama Game', 'required', 
            ['required' => 'Nama Game Wajib di isi']);
		$this->form_validation->set_rules('jumlah', 'Jumlah Nominal', 'required', 
            ['required' => 'Jumlah Wajib di isi']);
        $this->form_validation->set_rules('harga', 'Harga', 'required|integer', 
            ['required' => 'Harga Wajib di isi', 'integer' => 'Harga harus Angka']);
        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("topup/vw_tambah_topup", $data);
            $this->load->view("layout/footer");
        } else {
            $data = [
                'game' => $this->input->post('game'),
                'jumlah' => $this->input->post('jumlah'),
                'harga' => $this->input->post('harga'),
            ];
            $upload_image = $_FILES['gambar']['name'];
            if ($upload_image){
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './template/assets/images/topup/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')){
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->Topup_model->insert($data, $upload_image);
            $this->session->set_flashdata('message', '<div class="alert alert-success"
                role="alert">Data Topup Berhasil Ditambah!</div>');
                redirect('Topup');
        }
    }
    public function edit($id)
    {
        $data['judul'] = "Halaman Edit Topup";
		
		$data['topup'] = $this->Topup_model->getById($id);
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		
		$this->form_validation->set_rules('game', 'Nama Game', 'required', 
            ['required' => 'Nama Game Wajib di isi']);
        $this->form_validation->set_rules('jumlah', 'Jumlah Nominal', 'required', 
            ['required' => 'Jumlah Wajib di isi']);
        $this->form_validation->set_rules('harga', 'Harga', 'required|integer', 
            ['required' => 'Harga Wajib di isi', 'integer' => 'Harga harus Angka']);
		if ($this->form_validation->run() == false) {
			$this->load->view("layout/header", $data);
			$this->load->view("topup/vw_ubah_topup", $data);
			$this->load->view("layout/footer");
		} else {
			$data = [
				'game' => $this->input->post('game'),
                'jumlah' => $this->input->post('jumlah'),
                'harga' => $this->input->post('harga'),
			];
            $upload_image = $_FILES['gambar']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './template/assets/images/topup/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    $old_image = $data['topup']['gambar'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . './template/assets/images/topup/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
			$id = $this->input->post('id');
			$this->Topup_model->update(['id' => $id], $data, $upload_image);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Topup Berhasil Diubah!</div>');
			redirect('Topup');
		}
    }
    public function hapus($id)
    {
        $this->Topup_model->delete($id);
        $error = $this->db->error();
        if ($error['code'] != 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="icon 
            fas fa-info-circle"></i>Data Topup tidak dapat dihapus (sudah berelasi)!</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i
            class="icon fas fa-check-circle"></i>Data Topup Berhasil Dihapus!</div>');
        }
        redirect('Topup');
    }
}
