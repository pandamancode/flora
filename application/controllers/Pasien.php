<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends CI_Controller {

	function __construct(){
		parent::__construct();
         if ($this->session->userdata('uname')==""){
		 	redirect('login');
		 }
    }

	public function index(){
		$data['pasien'] = $this->db->get("pasien");
        $data['content'] = 'master/pasien/pasien';
        $this->load->view('layouts/main',$data);
	}

	public function modal_add(){
        echo show_my_modal("master/pasien/modal_add","md_add");
    }

    public function modal_update(){
        $data['pasien'] = $this->db->get_where("pasien",array('nik'=>$this->input->post('id')))->row();
        echo show_my_modal("master/pasien/modal_update","md_update",$data);
    }

	public function save_pasien(){
        if(isset($_POST) && !empty($_POST)){
            $nik = $this->input->post('nik');
            $cek = $this->db->get_where("pasien",array('nik'=>$nik));
            if($cek->num_rows()>0){
                $this->session->set_flashdata("msg","<div class='alert alert-danger alert-dismissible' aria-hidden='true'>
                        <h4><i class='icon fa fa-warning'></i> Failed!</h4>
                        Data pasien Sudah Ada
                    </div>");
            }else{
                $data = array(
                    'nik' => $this->input->post('nik'),
                    'nama_pasien' => $this->input->post('nama'),
					'tgl_lahir' => date('Y-m-d', strtotime($this->input->post('tgl'))),
					'gender' => $this->input->post('gender'),
					'alamat' => $this->input->post('alamat'),
					'no_telp' => $this->input->post('no_telp'),
                    'instansi' => $this->input->post('instansi'),
                    'satuan_kerja' => $this->input->post('satuan_kerja'),
                    'bagian' => $this->input->post('bagian'),
                    'pangkat' => $this->input->post('pangkat'),
                    //'status_pasien' => $this->input->post('status_pasien'),
                );
                $this->db->insert("pasien",$data);
                $this->session->set_flashdata("msg","<div class='alert alert-success alert-dismissible' aria-hidden='true'>
                            <h4><i class='icon fa fa-check'></i> Success!</h4>
                            Berhasil menambah data pasien
                        </div>");
            }

            redirect('pasien');
        }else $this->error();
    }

    public function update_pasien(){
        if(isset($_POST) && !empty($_POST)){
            $where['nik'] = $this->input->post('nik');
            $data = array(
                'nama_pasien' => $this->input->post('nama'),
                'tgl_lahir' => date('Y-m-d', strtotime($this->input->post('tgl'))),
                'gender' => $this->input->post('gender'),
                'alamat' => $this->input->post('alamat'),
                'no_telp' => $this->input->post('no_telp'),
                'instansi' => $this->input->post('instansi'),
                'satuan_kerja' => $this->input->post('satuan_kerja'),
                'bagian' => $this->input->post('bagian'),
                'pangkat' => $this->input->post('pangkat'),
                //'status_pasien' => $this->input->post('status_pasien'),
            );
            $this->db->update("pasien",$data,$where);
            $this->session->set_flashdata("msg","<div class='alert alert-success alert-dismissible' aria-hidden='true'>
                        <h4><i class='icon fa fa-check'></i> Success!</h4>
                        Berhasil merubah data pasien
                    </div>");
            redirect('pasien');
        }else $this->error();
    }

	public function hapus(){
		if(isset($_POST) && !empty($_POST)){
			$where['nik'] = $this->input->post('id');
			$this->db->delete("pasien",$where);
			$this->session->set_flashdata("msg","<div class='alert alert-success alert-dismissible'>
			                <h4><i class='icon fa fa-check'></i> Success!</h4>
			                Berhasil Menghapus Data pasien Produk
			            </div>");
			header('location:'.base_url().'pasien');
		}else $this->error();
	}
}