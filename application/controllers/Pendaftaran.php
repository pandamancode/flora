<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran extends CI_Controller {

    function __construct(){
		parent::__construct();
         if ($this->session->userdata('uname')==""){
		 	redirect('login');
		 }
    }
	
    public function index(){
		$now=date('Y-m-d');
		$where = "DATE(registrasi.date_created)='$now' ";
		$data['reg_pasien'] = $this->db->select("*")->from("registrasi")->join("pasien","pasien.nik=registrasi.nik")->where($where)->order_by("no_registrasi","ASC")->get();
		$data['content'] = 'pendaftaran/form_pendaftaran';
		$this->load->view('layouts/main',$data);
	}

    public function pasien_reg(){
        $data['pasien'] = $this->db->get("pasien");
        $data['content'] = 'pendaftaran/pasien';
        $this->load->view('layouts/main',$data);

    }

    public function modal_add(){
        echo show_my_modal("pendaftaran/modal_add","md_add");
    }

    public function modal_update(){
        $data['pasien'] = $this->db->get_where("pasien",array('nik'=>$this->input->post('id')))->row();
        echo show_my_modal("pendaftaran/modal_update","md_update",$data);
    }

    public function modal_register(){
        $data['nik'] = $this->input->post('id');
        echo show_my_modal("pendaftaran/modal_register","md_register",$data);
    }

    public function reg_now($nik){
        if(isset($nik) && !empty($nik)){
            $now=date('Y-m-d');
            //$nik = $this->input->post('nik');
            $cek = $this->db->query("SELECT no_registrasi FROM registrasi WHERE date(date_created)='$now' ORDER BY no_registrasi DESC LIMIT 1 ");
            if($cek->num_rows()>0){
                $no_reg = $cek->row()->no_registrasi + 1;
            }else{
                $no_reg = date('ymd').'001';
            }

            $where = "DATE(date_created)='$now' AND nik='$nik' ";
            $ceking = $this->db->select("*")->from("registrasi")->where($where)->get();
            if($ceking->num_rows()>0){
                $this->session->set_flashdata("msg","<div class='alert alert-danger alert-dismissible' aria-hidden='true'>
                        <h4><i class='icon fa fa-warning'></i> Failed!</h4>
                        Pasien Telah Melakukan Pendaftaran
                    </div>");
                redirect('pendaftaran/pasien_reg');
            }else{
                $data = array(
                    'no_registrasi' => $no_reg,
                    'nik' => $nik,
                );
                $this->db->insert("registrasi",$data);
                $this->session->set_flashdata("msg","<div class='alert alert-success alert-dismissible' aria-hidden='true'>
                        <h4><i class='icon fa fa-check'></i> Success!</h4>
                        Berhasil melakukan pendaftaran
                    </div>");
                redirect('pendaftaran/cetak_kartu/'.$no_reg);
            }
            
        }else $this->error();
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
                    'alergi' => $this->input->post('alergi_obat'),
                    'pekerjaan' => $this->input->post('pekerjaan'),
                );
                $this->db->insert("pasien",$data);
                $this->session->set_flashdata("msg","<div class='alert alert-success alert-dismissible' aria-hidden='true'>
                            <h4><i class='icon fa fa-check'></i> Success!</h4>
                            Berhasil menambah data pasien
                        </div>");
            }

            redirect('pendaftaran/pasien_reg');
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
                'alergi' => $this->input->post('alergi_obat'),
                'pekerjaan' => $this->input->post('pekerjaan'),
            );
            $this->db->update("pasien",$data,$where);
            $this->session->set_flashdata("msg","<div class='alert alert-success alert-dismissible' aria-hidden='true'>
                        <h4><i class='icon fa fa-check'></i> Success!</h4>
                        Berhasil merubah data pasien
                    </div>");
            redirect('pendaftaran/pasien_reg');
        }else $this->error();
    }

    public function cetak_kartu($no_reg){
        $data['dk'] = $this->db->select("*")->from("registrasi")->join("pasien","pasien.nik=registrasi.nik")->where("registrasi.no_registrasi",$no_reg)->get()->row();
        $this->load->view('pendaftaran/kartu',$data);
    }

    public function reg_pasien(){
    	if(isset($_POST) && !empty($_POST)){
    		$now = date('Y-m-d');
    		$nik = $this->input->post('nik');
    		$cek = $this->db->query("SELECT no_registrasi FROM registrasi WHERE date(date_created)='$now' ORDER BY no_registrasi DESC LIMIT 1 ");
    		if($cek->num_rows()>0){
    			$no_reg = $cek->row()->no_registrasi + 1;
    		}else{
    			$no_reg = date('ymd').'001';
    		}

    		$cek_pasien = $this->db->query("SELECT no_registrasi FROM registrasi WHERE date(date_created)='$now' AND nik='$nik' ");
    		if($cek_pasien->num_rows()>0){
    			$this->session->set_flashdata("msg","<div class='alert alert-danger alert-dismissible' aria-hidden='true'>
		                <h4><i class='icon fa fa-warning'></i> Failed!</h4>
		                Pasien Telah Melakukan Pendaftaran
		            </div>");
    		}else{
    		    if(empty($this->input->post('nik'))){
    		        $this->session->set_flashdata("msg","<div class='alert alert-danger alert-dismissible' aria-hidden='true'>
    		                <h4><i class='icon fa fa-warning'></i> Failed!</h4>
    		                Anda Belum Memilih Pasien!
    		            </div>");
    		    }else{
	    		$data = array(
	    			'no_registrasi' => $no_reg,
	    			'nik' => $this->input->post('nik'),
	    		);
    	    		$this->db->insert("registrasi",$data);
    	    		$this->session->set_flashdata("msg","<div class='alert alert-success alert-dismissible' aria-hidden='true'>
    		                <h4><i class='icon fa fa-check'></i> Success!</h4>
    		                Berhasil melakukan pendaftaran
    		            </div>");
    		    }
    		}
    		
    		redirect('pendaftaran');
    	}else $this->error();	
    }

}