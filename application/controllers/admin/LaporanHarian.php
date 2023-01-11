<?php

defined('BASEPATH') or exit('No direct script access allowed');

class LaporanHarian extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata('username')) {
			redirect('auth/login');
		}
		// load model dan library
		$this->load->model('LaporanHarian_model');
		$this->load->library('form_validation');
		$this->load->model("User_model");
	}
	// ! mengambil data model dan di render
	public function index()
	{
		check_level_admin();
		$data["LaporanHarian"] = $this->LaporanHarian_model->getAll();
		$data["users"] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
		$this->load->view("admin/laporanharian/list", $data);
	}
	// ! relasi data
	public function relasi()
	{
		$data["users"] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
		$this->load->view("admin/laporanharian/new_form", $data);
	}
	// ! menambahkan data
	public function add()
	{
		$id_kegiatan = $this->input->post('id_kegiatan');
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
		$this->session->set_flashdata('berhasil', 'Berhasil DiTambahkan');
		redirect(site_url('admin/LaporanHarian/index'));
	}
	// ! mengubah data
	public function edit($id = NULL)
	{
		$data["users"] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
		$data['LaporanHarian']  = $this->LaporanHarian_model->getById($id);

		// $config['upload_path'] = './assets/imgpantauan';
		// $config['allowed_types'] = 'jpg|png|jpeg';
		// // Mengatur ukuran maksimal file
		// $config['max_size'] = '2048';
		// // mengatur ukuran lebar maksimal yang dilakukan
		// $config['max_width'] = '2000';
		// $config['max_height'] = '2000';
		// $this->load->library('upload', $config);
		// $this->upload->initialize($config);

		if ($this->form_validation->run()) {
			$this->LaporanHarian_model->update();
		}
		$this->load->view("admin/laporanharian/edit_form", $data);
		
	}
	
	public function update_data($id)
	{
		$kondisi = array('id_kegiatan' => $id);
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

			$this->db->where($kondisi);
			$this->db->update('tb_laporanharian', $data);
			$this->session->set_flashdata('success', 'Berhasil diubah');
			redirect('admin/laporanharian');
		
	}

	//Detail data

	// ! menghapus data
	public function delete($id = null)
	{
		if (!isset($id)) show_404();

		if ($this->LaporanHarian_model->delete($id)) {
			$this->session->set_flashdata('success', 'Berhasil dihapus');
			redirect(site_url('admin/LaporanHarian'));
		}
	}
}
