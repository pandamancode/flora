<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller {

    function __construct(){
		parent::__construct();
         	if ($this->session->userdata('uname')==""){
		 		redirect('login');
		 	}
    }
    
	public function index(){
		$data['petugas'] = $this->db->query("SELECT * FROM tb_petugas WHERE password IS NOT NULL AND level_user IS NOT NULL");
		$data['content'] = 'akun/akun';
		$this->load->view('layouts/main_kasir_v',$data);
	}

	public function add(){
		$data['pegawai'] = $this->db->query("SELECT * FROM tb_petugas order by nama_petugas");
		echo show_my_modal("akun/modal_add","md_add",$data);
	}

	public function store(){
		if(isset($_POST) && !empty($_POST)){
			$where['nik_petugas'] = $this->input->post('pegawai');
			$data = array(
				'level_user' => $this->input->post('level'),
				'password' => md5($this->input->post('password')),
			);

			$this->db->update("tb_petugas",$data,$where);
            $this->session->set_flashdata("msg","<div class='alert alert-success alert-dismissible'>
	                <h4><i class='icon fa fa-check'></i> Success!</h4>
	                Berhasil Menambah Data Akun Pengguna
	            </div>");
            redirect('akun');
		}else $this->error();
	}

	public function reset($nik){
		if(isset($nik) && !empty($nik)){
			$where['nik_petugas'] = $nik;
			$data['password'] = md5($nik);
			$this->db->update("tb_petugas",$data,$where);
            $this->session->set_flashdata("msg","<div class='alert alert-success alert-dismissible'>
	                <h4><i class='icon fa fa-check'></i> Success!</h4>
	                Berhasil Mereset Password sesuai dengan NIK
	            </div>");
            redirect('akun');
        }else $this->error();
	}

	public function hapus_akun($nik){
		if(isset($nik) && !empty($nik)){
			$where['nik_petugas'] = $nik;
			$data['password'] = NULL;
			$data['level_user'] = NULL;
			$this->db->update("tb_petugas",$data,$where);
            $this->session->set_flashdata("msg","<div class='alert alert-success alert-dismissible'>
	                <h4><i class='icon fa fa-check'></i> Success!</h4>
	                Berhasil Menghapus Akun
	            </div>");
            redirect('akun');
        }else $this->error();
	}

}