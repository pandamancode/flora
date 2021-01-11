<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function show_my_modal($content='', $id='', $data='', $size='md') {
	$_ci = &get_instance();

	if ($content != '') {
		$view_content = $_ci->load->view($content, $data, TRUE);

		return '<div class="modal fade" id="' .$id .'" role="dialog" data-backdrop="static">
				  <div class="modal-dialog modal-' .$size .'" role="document">
				    <div class="modal-content">
				        ' .$view_content .'
				    </div>
				  </div>
				</div>';
	}
}

function format_rp($angka)
{
	$rupiah=number_format($angka,0,',','.').",-";
	return $rupiah;
}

function gender($gender){
	if($gender=='L'){
    	return 'Laki-Laki';
    }else{
    	return 'Perempuan';
    }
}

function pasien($noreg){
	$_ci = &get_instance();
	$cek = $_ci->db->query("SELECT tb_pasien.nama_pasien FROM tb_registrasi, tb_pasien WHERE tb_registrasi.nik=tb_pasien.nik AND tb_registrasi.no_registrasi='$noreg' ");
	if($cek->num_rows()>0){
		return $cek->row()->nama_pasien;
	}else{
		return "-";
	}
}

function klinik_info(){
	$_ci = &get_instance();
	$info = $_ci->db->query("SELECT * FROM tb_info");
	return $info->row();
}

function tindakan($id){
	$_ci = &get_instance();
	$query = $_ci->db->query("SELECT * FROM tb_itemgaji WHERE id_ig='$id' ");
	if($query->num_rows()>0){
		return $query->row()->nama_item_gaji;
	}else{
		return "-";
	}
}


function cek_input($param){
	if($param=='' || $param==' ' || $param==null){
		return "-";
	}else{
		return $param;
	}	
}