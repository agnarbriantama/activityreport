<?php

defined('BASEPATH') or exit('No direct script access allowed');

class LaporanHarian extends CI_Controller
{
	// membuat class construct
	public function __construct()
	{
		// untuk menjalankan program pertama kali dieksekusi
		parent::__construct();

		if (!$this->session->userdata('username')) {
			redirect('auth/login');
		}
		// load model dan library
		$this->load->model('LaporanHarian_model');
		// 
		$this->load->model("user_model");$this->load->library('form_validation');
	}

	// ! mengambil data model dan di render
	public function index()
	{
		check_level_anggota();
		$data["LaporanHarian"] = $this->LaporanHarian_model->getAll();
		$data["users"] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
		$data["pantauan_user"] = $this->LaporanHarian_model->pantauan_user();
		$this->load->view("karyawan/LaporanHarian/list", $data);
	}

	public function tambah_data()
	{
		$data["users"] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
		$this->load->view("karyawan/LaporanHarian/new_form", $data);
	}
	// ! tambah data
	public function add()
	{
		$nama_kegiatan = $this->input->post('nama_kegiatan');
		$tgl_kegiatan = $this->input->post('tgl_kegiatan');
		$jam_mulai = $this->input->post('jam_mulai');
		$jam_selesai = $this->input->post('jam_selesai');
		$tempat = $this->input->post('tempat');
		$penyelenggara = $this->input->post('penyelenggara');
		$keterangan = $this->input->post('keterangan');
		
			$data = array(
				'nama_kegiatan' => $nama_kegiatan,
				'tgl_kegiatan' => $tgl_kegiatan,
				'jam_mulai' => $jam_mulai,
				'jam_selesai' => $jam_selesai,
				'tempat' => $tempat,
				'penyelenggara' => $penyelenggara,
				'keterangan' => $keterangan,
				'username' => $this->session->userdata('username')
			);

		$this->db->insert('tb_laporanharian', $data);
		$this->session->set_flashdata('berhasil', 'Berhasil ditambahkan');
		redirect(site_url('karyawan/LaporanHarian/index'));
	}
	// ! list data
	public function list()
	{
		$data["Gardu"] = $this->Gardu_model->getAll();
		$data["LaporanHarian"] = $this->LaporanHarian_model->getAll();
		$data["users"] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
		$this->load->view("karyawan/LaporanHarian/list", $data);
	}
}
