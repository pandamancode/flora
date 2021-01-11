<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller {

    function __construct(){
		parent::__construct();
         if ($this->session->userdata('uname')==""){
		 	redirect('login');
		 }
    }
	public function index(){
		
		$data['petugas'] = $this->db->get("petugas");
		$data['content'] = 'master/petugas/data';
		$this->load->view('layouts/main',$data);
	}

	public function add(){
		echo show_my_modal("master/petugas/modal_add","md_add");
	}

	public function store(){
		if(isset($_POST) && !empty($_POST)){
			//cek petugas
			$cek = $this->db->get_where("petugas",array('nik_petugas'=>$this->input->post('kode')));
			if($cek->num_rows()>0){
				$this->session->set_flashdata("msg","<div class='alert alert-danger alert-dismissible'>
		                <h4><i class='icon fa fa-warning'></i> Failed!</h4>
		                petugas Produk Sudah Ada
		            </div>");
	            redirect('petugas');
			}else{
				$data = array(
					'nik_petugas' => $this->input->post('kode'),
					'nama_petugas' => $this->input->post('nama'),
					'gender' => $this->input->post('jenis'),
					'alamat' => $this->input->post('alamat'),
					'no_telp' => $this->input->post('telp'),
					'status' => $this->input->post('status')
				);

				$this->db->insert("petugas",$data);
	            $this->session->set_flashdata("msg","<div class='alert alert-success alert-dismissible'>
		                <h4><i class='icon fa fa-check'></i> Success!</h4>
		                Berhasil Menambah Data petugas
		            </div>");
	            redirect('Petugas');
		    }

		}else $this->error();
	}

	public function update(){
		$where['nik_petugas'] = $this->input->post('id');
		$data['petugas'] = $this->db->get_where("petugas",$where)->row();
		echo show_my_modal("master/petugas/modal_update","md_updt",$data);
	}

	public function update_process(){
		if(isset($_POST) && !empty($_POST)){
			$where['nik_petugas'] = $this->input->post('id');
			$data = array(
					'nama_petugas' => $this->input->post('nama'),
					'gender' => $this->input->post('jenis'),
					'alamat' => $this->input->post('alamat'),
					'no_telp' => $this->input->post('telp'),
					'password' => $this->input->post('status'),
					'status' => $this->input->post('status')
			);

			$this->db->update("petugas",$data,$where);
			$this->session->set_flashdata("msg","<div class='alert alert-success alert-dismissible'>
			                <h4><i class='icon fa fa-check'></i> Success!</h4>
			                Berhasil Merubah Data petugas Produk
			            </div>");
			header('location:'.base_url().'Petugas');
		}else $this->error();
	}

	public function hapus(){
		if(isset($_POST) && !empty($_POST)){
			$where['nik_petugas'] = $this->input->post('id');
			$this->db->delete("petugas",$where);
			$this->session->set_flashdata("msg","<div class='alert alert-success alert-dismissible'>
			                <h4><i class='icon fa fa-check'></i> Success!</h4>
			                Berhasil Menghapus Data petugas Produk
			            </div>");
			header('location:'.base_url().'Petugas');
		}else $this->error();
	}
}