<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rontgen extends CI_Controller {

    function __construct(){
		parent::__construct();
         if ($this->session->userdata('uname')==""){
		 	redirect('login');
		 }
    }

	public function index(){
		$data['mcu'] = $this->db->get("mcu");
		$data['content'] = 'mcu/rontgen/data';
		$this->load->view('layouts/main',$data);

	}

    public function error(){
        $this->load->view('index.html');
    }

    public function hasil($no_mcu){
        $data['no_mcu'] = $no_mcu;
    	$data['periksa'] = $this->db->get_where("rontgen",array('no_mcu'=>$no_mcu));
    	$data['pasien'] = $this->db->select("*")->from("mcu")->join("pasien","pasien.nik=mcu.nik")->where("mcu.no_mcu",$no_mcu)->get();
    	$data['content'] = 'mcu/rontgen/form_rontgen';
		$this->load->view('layouts/main',$data);
    }

    public function entry_data(){
        if(isset($_POST) && !empty($_POST)){
            $where['no_mcu'] = $this->input->post('no_mcu');
            $cek = $this->db->get_where("rontgen",$where);
            if($cek->num_rows()>0){
                $data = array(
                        'cor' => $this->input->post('cor'),
                        'pulmo' => $this->input->post('pulmo'),
                        'kesan' => $this->input->post('kesan'),
                        'jenis_periksa' => $this->input->post('jenis_periksa'),
                        'tgl_periksa' => $this->input->post('tgl_periksa'),
                        'saran' => $this->input->post('saran'),
                    );
                $this->db->update("rontgen",$data,$where);
            }else{
                $data = array(
                        'no_mcu' => $this->input->post('no_mcu'),
                        'cor' => $this->input->post('cor'),
                        'pulmo' => $this->input->post('pulmo'),
                        'kesan' => $this->input->post('kesan'),
                        'jenis_periksa' => $this->input->post('jenis_periksa'),
                        'tgl_periksa' => $this->input->post('tgl_periksa'),
                        'saran' => $this->input->post('saran'),
                    );
                $this->db->insert("rontgen",$data);
            }
            $this->session->set_flashdata("msg","<div class='alert alert-success alert-dismissible' aria-hidden='true'>
                    <h4><i class='icon fa fa-check'></i> Success!</h4>
                    Hasil Rontgen Berhasil disimpan
                </div>");
            redirect('rontgen/hasil/'.$this->input->post('no_mcu'));
        }else $this->error();
    }

}