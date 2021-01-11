<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ekg extends CI_Controller {

    function __construct(){
		parent::__construct();
         if ($this->session->userdata('uname')==""){
		 	redirect('login');
		 }
    }

	public function index(){
		$data['mcu'] = $this->db->get("mcu");
		$data['content'] = 'mcu/ekg/data';
		$this->load->view('layouts/main',$data);

	}

    public function error(){
        $this->load->view('index.html');
    }

    public function hasil($no_mcu){
        $data['no_mcu'] = $no_mcu;
    	$data['periksa'] = $this->db->get_where("ekg",array('no_mcu'=>$no_mcu));
    	$data['pasien'] = $this->db->select("*")->from("mcu")->join("pasien","pasien.nik=mcu.nik")->where("mcu.no_mcu",$no_mcu)->get();
    	$data['content'] = 'mcu/ekg/form_ekg';
		$this->load->view('layouts/main',$data);
    }

    public function entry_data(){
        if(isset($_POST) && !empty($_POST)){
            $where['no_mcu'] = $this->input->post('no_mcu');
            $cek = $this->db->get_where("ekg",$where);
            if($cek->num_rows()>0){
                $data = array(
                        'heart_rate' => $this->input->post('heart_rate'),
                        'axis' => $this->input->post('axis'),
                        'rhythm' => $this->input->post('rhythm'),
                        'pr_interval' => $this->input->post('pr_interval'),
                        'resting_ecg' => $this->input->post('resting_ecg'),
                        'suggestion' => $this->input->post('suggestion'),
                        'saran' => $this->input->post('saran'),
                    );
                $this->db->update("ekg",$data,$where);
            }else{
                $data = array(
                        'no_mcu' => $this->input->post('no_mcu'),
                        'heart_rate' => $this->input->post('heart_rate'),
                        'axis' => $this->input->post('axis'),
                        'rhythm' => $this->input->post('rhythm'),
                        'pr_interval' => $this->input->post('pr_interval'),
                        'resting_ecg' => $this->input->post('resting_ecg'),
                        'suggestion' => $this->input->post('suggestion'),
                        'saran' => $this->input->post('saran'),
                    );
                $this->db->insert("ekg",$data);
            }
            $this->session->set_flashdata("msg","<div class='alert alert-success alert-dismissible' aria-hidden='true'>
                    <h4><i class='icon fa fa-check'></i> Success!</h4>
                    Hasil EKG Berhasil disimpan
                </div>");
            redirect('ekg/hasil/'.$this->input->post('no_mcu'));
        }else $this->error();
    }

}