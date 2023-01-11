<?php defined('BASEPATH') or exit('No direct script access allowed');

class Overview_model extends CI_Model
{
	// ! grafik admin
	public function Jum_data()
	{
		$this->db->group_by('tgl_kegiatan');
		$this->db->select('tgl_kegiatan');
		$this->db->select("count(*) as total");
		return $this->db->from('tb_laporanharian')
			->get()
			->result();
	}
	// ! grafik ketua
	public function kinerja()
	{
		$this->db->group_by('username');
		$this->db->select('username');
		$this->db->where('tb_laporanharian.id_tim',  $this->session->userdata('id_tim'));
		$this->db->select("count(*) as total");
		return $this->db->get('tb_pantauanharian')->result();
	}
}
