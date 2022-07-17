<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'userrole');
        $this->load->model('Topup_model');
        $this->load->model('Royal_model');
        $this->load->model('Transaksi_model');
		$this->load->model('Penjualan_model');
		$this->load->model('Detail_model');
		$this->load->model('transaksiRoyal_model');
		$this->load->model('Penjualan_royal_model');
		$this->load->model('Detail_royal_model');

    }

    public function index()
    {
        $data['judul'] = "Daftar Top Up";
		$data['user'] = $this->userrole->getBy();
		$data['topup'] = $this->Topup_model->get();
		$data['jlh'] = $this->Transaksi_model->jumlah();
        $this->load->view('layout/header',$data);
		$this->load->view('profil/vw_topup',$data);
        $this->load->view('layout/footer');
    }

    public function royal()
	{
		$data['judul'] = "Halaman Royal Pass";
        $data['user'] = $this->userrole->getBy();
		$data['topup'] = $this->Topup_model->get();
		$data['royal'] = $this->Royal_model->get();
		$this->load->view("layout/header", $data);
		$this->load->view("profil/vw_royal", $data);
		$this->load->view("layout/footer");
	}
    public function transaksi($id)
	{
        $data['transaksi'] = $this->Transaksi_model->get();
		$data['judul'] = "Transaksi Topup";
		$data['user'] = $this->userrole->getBy();
		$data['topup'] = $this->Topup_model->getById($id);
		$data['jlh'] = $this->Transaksi_model->jumlah();
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'required', [
			'required' => 'Jumlah Wajib di isi'
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view('layout/header', $data);
			$this->load->view('profil/vw_transaksi', $data);
			$this->load->view('layout/footer');
		} else {
			$data = [
				'id_user' => $this->session->userdata('id'),
				'id_topup' => $this->input->post('id_topup'),
				'jumlah' => $this->input->post('jumlah'),
				'harga' => $this->input->post('harga'),
				'tanggal' => $this->input->post('tanggal'),
			];
			$this->Transaksi_model->insert($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success"
			role="alert">Topup berhasil!</div>');
			redirect('Profil/detail');
		}
	}
	public function detail()
	{
		$data['transaksi'] = $this->Transaksi_model->get();
		$data['judul'] = "Detail Transaksi";
		$data['user'] = $this->userrole->getBy();
		$data['topup'] = $this->Topup_model->get();
		$data['jlh'] = $this->Transaksi_model->jumlah();
		$this->load->view('layout/header', $data);
		$this->load->view('profil/vw_detail_transaksi', $data);
		$this->load->view('layout/footer');
		
	}
	public function deltransaksi($id)
	{
		$this->Transaksi_model->delete($id);
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="icon fas fa-info-circle"></i>
		Data Berhasil dihapus!</div>');
		redirect('Profil/detail');
	}
	public function pesanan()
	{
		$jumlah_beli = count($this->input->post('topup'));
		$data_p = [
			'no_penjualan' => $this->input->post('no_penjualan'),
			'id_user' => $this->session->userdata('id'),
			'tanggal' => $this->input->post('tanggal'),
			'id_game' => $this->input->post('id_game'),
			'pembayaran' => $this->input->post('pembayaran'),
			'harga' => $this->input->post('harga'),
		];
		$upload_image = $_FILES['gambar']['name'];
		if ($upload_image) {
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '2048';
			$config['upload_path'] = './template/assets/images/pembayaran/';
			$this->load->library('upload', $config);
		if ($this->upload->do_upload('gambar')) {
			$new_image = $this->upload->data('file_name');
			$this->db->set('gambar', $new_image);
		} else {
			echo $this->upload->display_errors();
		}
		}
		$data_detail = [];
		for ($i = 0; $i < $jumlah_beli; $i++) {
			array_push($data_detail, ['id_topup' => $this->input->post('topup')[$i]]);
			$data_detail[$i]['no_penjualan'] = $this->input->post('no_penjualan');
			$data_detail[$i]['id_user'] = $this->session->userdata('id');
			$data_detail[$i]['jumlah'] = $this->input->post('jumlah_p')[$i];
			$data_detail[$i]['harga'] = $this->input->post('harga')[$i];
		}
		if ($this->Penjualan_model->insert($data_p, $upload_image) && $this->Detail_model->insert($data_detail)) {
            
            $id_us = $this->session->userdata('id');
            $this->Transaksi_model->delete_all($id_us);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pesanan Berhasil
			dibuat!</div>');
            redirect('Profil/index');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Pesanan Gagal
			dibuat!</div>');
			redirect('Profil/index');
		}
	}
	public function pembelian()
	{
		$data['judul'] = "Data Pembelian";
		$data['user'] = $this->userrole->getBy();
		$data['pembelian'] = $this->Penjualan_model->getByUser();
		$data['jlh'] = $this->Transaksi_model->jumlah();
		$this->load->view('layout/header', $data);
		$this->load->view('profil/pembelian_user', $data);
		$this->load->view('layout/footer', $data);
	}
	public function statusbeli($id)
    {
        $data['judul'] = "Ubah Data Pembelian";
        $data['user'] = $this->userrole->getBy();
        $data['pembelian'] = $this->Penjualan_model->getByUser2($id);
        $data['detailbeli'] = $this->Detail_model->getByUser($id);
        $data['jlh'] = $this->Transaksi_model->jumlah();
        $this->form_validation->set_rules('status', 'Status', 'required', [
            'required' => 'Status Wajib di isi'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("profil/detail_beli", $data);
            $this->load->view("layout/footer");
        } else {
            $status = $this->input->post('status');
            $nojual = $this->input->post('no_penjualan');
            $this->Penjualan_model->updatestatus($status, $nojual);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Status Berhasil DiUbah!</div>');
            redirect('Profil/pembelian');
        }
    }



	public function transaksi_royal($id)
	{
        $data['transaksi_royal'] = $this->transaksiRoyal_model->get();
		$data['judul'] = "Transaksi Starlight";
		$data['user'] = $this->userrole->getBy();
		$data['royal'] = $this->Royal_model->getById($id);
		$data['jlh'] = $this->transaksiRoyal_model->jumlah();
		$this->form_validation->set_rules('harga', 'Harga', 'required', [
			'required' => 'Harga Wajib di isi'
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view('layout/header', $data);
			$this->load->view('profil/vw_transaksi_royal', $data);
			$this->load->view('layout/footer');
		} else {
			$data = [
				'id_user' => $this->session->userdata('id'),
				'id_royal' => $this->input->post('id_royal'),
				'harga' => $this->input->post('harga'),
				'tanggal' => $this->input->post('tanggal'),
			];
			$this->transaksiRoyal_model->insert($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success"
			role="alert">Topup berhasil!</div>');
			redirect('Profil/detail_royal');
		}
	}
	public function detail_royal()
	{
		$data['transaksi_royal'] = $this->transaksiRoyal_model->get();
		$data['judul'] = "Detail Transaksi";
		$data['user'] = $this->userrole->getBy();
		$data['royal'] = $this->Royal_model->get();
		$data['jlh'] = $this->transaksiRoyal_model->jumlah();
		$this->load->view('layout/header', $data);
		$this->load->view('profil/vw_detail_transaksi_royal', $data);
		$this->load->view('layout/footer');
		
	}
	public function deltransaksi_royal($id)
	{
		$this->Transaksi_model->delete($id);
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="icon fas fa-info-circle"></i>
		Data Berhasil dihapus!</div>');
		redirect('Profil/detail');
	}
	public function pesanan_royal()
	{
		$jumlah_beli_royal = count($this->input->post('royal'));
		$data_p = [
			'no_penjualan' => $this->input->post('no_penjualan'),
			'id_user' => $this->session->userdata('id'),
			'tanggal' => $this->input->post('tanggal'),
			'id_game' => $this->input->post('id_game'),
			'pembayaran' => $this->input->post('pembayaran'),
			'harga' => $this->input->post('harga'),
		];
		$upload_image = $_FILES['gambar']['name'];
		if ($upload_image) {
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '2048';
			$config['upload_path'] = './template/assets/images/pembayaran_royal/';
			$this->load->library('upload', $config);
		if ($this->upload->do_upload('gambar')) {
			$new_image = $this->upload->data('file_name');
			$this->db->set('gambar', $new_image);
		} else {
			echo $this->upload->display_errors();
		}
		}
		$data_detail = [];
		for ($i = 0; $i < $jumlah_beli_royal; $i++) {
			array_push($data_detail, ['id_royal' => $this->input->post('royal')[$i]]);
			$data_detail[$i]['no_penjualan'] = $this->input->post('no_penjualan');
			$data_detail[$i]['id_user'] = $this->session->userdata('id');
			$data_detail[$i]['harga'] = $this->input->post('harga')[$i];
		}
		if ($this->Penjualan_royal_model->insert($data_p, $upload_image) && $this->Detail_royal_model->insert($data_detail)) {
            
            $id_us = $this->session->userdata('id');
            $this->transaksiRoyal_model->delete_all($id_us);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pesanan Berhasil
			dibuat!</div>');
            redirect('Profil/royal');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Pesanan Gagal
			dibuat!</div>');
			redirect('Profil/royal');
		}
	}
	public function pembelian_royal()
	{
		$data['judul'] = "Data Pembelian";
		$data['user'] = $this->userrole->getBy();
		$data['pembelian_royal'] = $this->Penjualan_royal_model->getByUser();
		$data['jlh'] = $this->transaksiRoyal_model->jumlah();
		$this->load->view('layout/header', $data);
		$this->load->view('profil/pembelian_user_royal', $data);
		$this->load->view('layout/footer', $data);
	}
	public function statusbeli_royal($id)
    {
        $data['judul'] = "Ubah Data Pembelian";
        $data['user'] = $this->userrole->getBy();
        $data['pembelian_royal'] = $this->Penjualan_royal_model->getByUser2($id);
        $data['detailbeli_royal'] = $this->Detail_royal_model->getByUser($id);
        $data['jlh'] = $this->transaksiRoyal_model->jumlah();
        $this->form_validation->set_rules('status', 'Status', 'required', [
            'required' => 'Status Wajib di isi'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("profil/detail_beli_royal", $data);
            $this->load->view("layout/footer");
        } else {
            $status = $this->input->post('status');
            $nojual = $this->input->post('no_penjualan');
            $this->Penjualan_model->updatestatus($status, $nojual);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Status Berhasil DiUbah!</div>');
            redirect('Profil/pembelian_royal');
        }
    }
}