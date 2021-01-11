<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obat extends CI_Controller {

	function __construct(){
		parent::__construct();
         if ($this->session->userdata('uname')==""){
		 	redirect('login');
		 }
    }

	public function index(){
		$data['obat'] = $this->db->get("obat");
		$data['content'] = 'master/obat/obat_v';
		$this->load->view('layouts/main',$data);
	}

	public function add(){
		echo show_my_modal("master/obat/modal_add","md_add");
	}


	public function store(){
		if(isset($_POST) && !empty($_POST)){
			//cek obat
			$cek = $this->db->get_where("obat",array('kd_obat'=>$this->input->post('kode')));
			if($cek->num_rows()>0){
				$this->session->set_flashdata("msg","<div class='alert alert-danger alert-dismissible' aria-hidden='true'>
		                <h4><i class='icon fa fa-warning'></i> Failed!</h4>
		                Kode Obat Sudah Ada (Kode Sudah Dipakai)
		            </div>");
				
	            redirect('Obat');
			}else{
				$data = array(
					'kd_obat' => $this->input->post('kode'),
					'nama_obat' => $this->input->post('nama'),
					'harga_obat' => $this->input->post('harga'),
					'jenis' => $this->input->post('jenis')
				);

				$this->db->insert("obat",$data);
	            $this->session->set_flashdata("msg","<div class='alert alert-success alert-dismissible'>
		                <h4><i class='icon fa fa-check'></i> Success!</h4>
		                Berhasil Menambah Data obat Produk
		            </div>");
	            redirect('obat');
		    }

		}else $this->error();
	}

	public function update(){
		$where['kd_obat'] = $this->input->post('id');
		$data['obat'] = $this->db->get_where("obat",$where)->row();
		echo show_my_modal("master/obat/modal_update","md_updt",$data);
	}

	public function update_process(){
		if(isset($_POST) && !empty($_POST)){
			$where['kd_obat'] = $this->input->post('id');
			$data = array(
				'nama_obat' => $this->input->post('nama'),
				'harga_obat' => $this->input->post('harga'),
				'jenis' => $this->input->post('jenis')
			);
			$this->db->update("obat",$data,$where);
			$this->session->set_flashdata("msg","<div class='alert alert-success alert-dismissible'>
			                <h4><i class='icon fa fa-check'></i> Success!</h4>
			                Berhasil Merubah Data obat Produk
			            </div>");
			header('location:'.base_url().'obat');
		}else $this->error();
	}

	public function hapus(){
		if(isset($_POST) && !empty($_POST)){
			$where['kd_obat'] = $this->input->post('id');
			$this->db->delete("obat",$where);
			$this->session->set_flashdata("msg","<div class='alert alert-success alert-dismissible'>
			                <h4><i class='icon fa fa-check'></i> Success!</h4>
			                Berhasil Menghapus Data obat Produk
			            </div>");
			header('location:'.base_url().'obat');
		}else $this->error();
	}
}