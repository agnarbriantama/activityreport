<?php

function check_already_login()
{
	$ci = &get_instance();
	$user_session = $ci->session->userdata('level_id');

	if ($user_session) {
		if ($ci->session->userdata('level_id') == 1) {
			redirect('admin/pantauanharian');
		} else if ($ci->session->userdata('level_id') == 2) {
			redirect('anggota/LaporanHarian');
		}
	}
}

function check_level_admin()
{
	$ci = &get_instance();
	$hak_akses = $ci->session->userdata('level_id');
	if ($hak_akses != 1) {
		 if ($hak_akses == 2) {
			redirect('anggota/LaporanHarian');
		}
	}
}


function check_level_anggota()
{
	$ci = &get_instance();
	$hak_akses = $ci->session->userdata('level_id');
	if ($hak_akses != 2) {
		if($hak_akses == 1){
			redirect('admin/Overview');
		}
	}
}
