<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penyakit extends CI_Controller {

	function __construct(){
		parent::__construct();
         if ($this->session->userdata('uname')==""){
		 	redirect('login');
		 }
    }
	public function index(){
		$data['penyakit'] = $this->db->get("penyakit");
		$data['content'] = 'master/penyakit/data';
		$this->load->view('layouts/main',$data);
	}

	public function add(){
		echo show_my_modal("master/penyakit/modal_add","md_add");
	}
	

	public function store(){
		if(isset($_POST) && !empty($_POST)){
			$cek = $this->db->get_where("penyakit",array('kd_penyakit'=>$this->input->post('kode')));
			if($cek->num_rows()>0){
				$this->session->set_flashdata("msg","<div class='alert alert-danger alert-dismissible'>
		                <h4><i class='icon fa fa-warning'></i> Failed!</h4>
		                penyakit Produk Sudah Ada
		            </div>");
	            redirect('penyakit');
			}else{
				$data = array(
					'kd_penyakit' => $this->input->post('kode'),
					'nama_penyakit' => $this->input->post('nama')
				);

				$this->db->insert("penyakit",$data);
	            $this->session->set_flashdata("msg","<div class='alert alert-success alert-dismissible'>
		                <h4><i class='icon fa fa-check'></i> Success!</h4>
		                Berhasil Menambah Data penyakit Produk
		            </div>");
	            redirect('penyakit');
		    }

		}else $this->error();
	}

	public function update(){
		$where['kd_penyakit'] = $this->input->post('id');
		$data['penyakit'] = $this->db->get_where("penyakit",$where)->row();
		echo show_my_modal("master/penyakit/modal_update","md_updt",$data);
	}

	public function update_process(){
		if(isset($_POST) && !empty($_POST)){
			$where['kd_penyakit'] = $this->input->post('id');
			$data['nama_penyakit'] = $this->input->post('nama');
			$this->db->update("penyakit",$data,$where);
			$this->session->set_flashdata("msg","<div class='alert alert-success alert-dismissible'>
			                <h4><i class='icon fa fa-check'></i> Success!</h4>
			                Berhasil Merubah Data penyakit Produk
			            </div>");
			header('location:'.base_url().'penyakit');
		}else $this->error();
	}

	public function hapus(){
		if(isset($_POST) && !empty($_POST)){
			$where['kd_penyakit'] = $this->input->post('id');
			$this->db->delete("penyakit",$where);
			$this->session->set_flashdata("msg","<div class='alert alert-success alert-dismissible'>
			                <h4><i class='icon fa fa-check'></i> Success!</h4>
			                Berhasil Menghapus Data penyakit Produk
			            </div>");
			header('location:'.base_url().'penyakit');
		}else $this->error();
	}
}