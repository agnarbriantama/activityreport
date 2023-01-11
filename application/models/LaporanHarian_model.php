<?php defined('BASEPATH') or exit('No direct script access allowed');

class LaporanHarian_model extends CI_Model
{
	// nama tabel
	private $tb_laporanharian = "tb_laporanharian";

	public function getAll()
	{
		$this->db->select('*');
		$this->db->from('tb_laporanharian');
		$this->db->order_by('id_kegiatan', 'desc');
		return $this->db->get()->result();
	}

	public function getById($id)
	{
		return $this->db->get_where($this->tb_laporanharian, ["id_kegiatan" => $id])->result();
	}
	// ! pantauan user
	public function pantauan_user()
	{
		$this->db->select('*');
		$this->db->where('tb_laporanharian.username',  $this->session->userdata('username'));
		return $this->db->get('tb_laporanharian')->result();
	}
	// ! simpan
	public function save()
	{
		$tegangan = implode(" , ", $this->input->post('tegangan'));

		$data = array(
			'id_pantauan' => $this->input->post('id_pantauan'),
			'id_gardu' => $this->input->post('id_gardu'),
			'id_tim' => $this->input->post('id_tim'),
			'suhu' => $this->input->post('suhu'),
			'arus' => $this->input->post('arus'),
			'cosphi' => $this->input->post('cosphi'),
			'tgl_pantauan' => $this->input->post('tgl_pantauan'),
			'tegangan' => $tegangan,
			'gambar' => $this->input->post('gambar'),
			'kondisi' => $this->input->post('kondisi'),
		);

		$this->db->insert($this->tb_laporanharian, $data);
		$this->session->set_flashdata('berhasil', 'Berhasil ditambahkan');
		redirect(site_url('admin/PantauanHarian/index'));
	}
	// ! update
	public function update($id = NULL)
	{
		$gambar = $this->upload->do_upload('gambar');
		if ($gambar) {
			$data = $this->upload->data();
			$gambar = $data['file_name'];
		} else {
			$gambar = $this->input->post('fotolama');
		}

		$id = $this->input->post('id_pantauan');

		$data = array(
			'id_pantauan' => $id,
			'id_gardu' => $this->input->post('id_gardu'),
			'id_tim' => $this->input->post('id_tim'),
			'suhu' => $this->input->post('suhu'),
			'arus' => $this->input->post('arus'),
			'cosphi' => $this->input->post('cosphi'),
			'tgl_pantauan' => $this->input->post('tgl_pantauan'),
			'tegangan' => $this->input->post('tegangan'),
			'gambar' => $gambar,
			'status' => $this->input->post('kondisi'),
			'username' => $this->session->userdata('username')
		);

		$this->db->update($this->tb_laporanharian, $data, array('id_pantauan' => $id));
		redirect(site_url('admin/PantauanHarian/index'));
	}
	// ! hapus
	public function delete($id)
	{
		return $this->db->delete($this->tb_laporanharian, array("id_kegiatan" => $id));
	}
	// ! relasi
	// public function pantauan_tim()
	// {
	// 	$this->db->select('*');
	// 	$this->db->join('tim', 'tim.id_tim = tb_pantauanharian.id_tim', 'left');
	// 	$this->db->join('tb_gardu', 'tb_gardu.id_gardu = tb_pantauanharian.id_gardu', 'left');
	// 	$this->db->where('tb_pantauanharian.id_tim',  $this->session->userdata('id_tim'));
	// 	return $this->db->get('tb_pantauanharian')->result();
	// }
}
