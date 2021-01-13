<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fisioterapi extends CI_Controller {

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
    	$data['periksa'] = $this->db->get_where("fisioterapi",array('no_mcu'=>$no_mcu));
    	$data['pasien'] = $this->db->select("*")->from("mcu")->join("pasien","pasien.nik=mcu.nik")->where("mcu.no_mcu",$no_mcu)->get();
    	$data['content'] = 'mcu/fisioterapi/form_fisioterapi';
		$this->load->view('layouts/main',$data);
    }

    public function entry_data(){
        if(isset($_POST) && !empty($_POST)){
            $where['no_mcu'] = $this->input->post('no_mcu');
            $cek = $this->db->get_where("fisioterapi",$where);
            if($cek->num_rows()>0){
                $data = array(
                        'keterangan' => $this->input->post('keterangan'),
                        'diagnosa' => $this->input->post('diagnosa'),
                        'tindakan' => $this->input->post('tindakan'),
                        'evaluasi' => $this->input->post('evaluasi'),
                    );
                $this->db->update("fisioterapi",$data,$where);
            }else{
                $data = array(
                        'no_mcu' => $this->input->post('no_mcu'),
                        'keterangan' => $this->input->post('keterangan'),
                        'diagnosa' => $this->input->post('diagnosa'),
                        'tindakan' => $this->input->post('tindakan'),
                        'evaluasi' => $this->input->post('evaluasi'),
                    );
                $this->db->insert("fisioterapi",$data);
            }
            $this->session->set_flashdata("msg","<div class='alert alert-success alert-dismissible' aria-hidden='true'>
                    <h4><i class='icon fa fa-check'></i> Success!</h4>
                    Hasil Fisioterapi Berhasil disimpan
                </div>");
            redirect('fisioterapi/hasil/'.$this->input->post('no_mcu'));
        }else $this->error();
    }

    public function kartu_fisioterapi($mcu){
        if(isset($mcu) && !empty($mcu)){
            $cek = $this->db->get_where("mcu",array('no_mcu'=>$mcu))->row();
            $data['pasien'] = $this->db->get_where("pasien",array('nik'=>$cek->nik))->row();
            $data['fisioterapi'] = $this->db->select("*")->from("mcu")->join("fisioterapi","fisioterapi.no_mcu=mcu.no_mcu")->where("mcu.nik",$cek->nik)->get();
            $this->load->view('mcu/fisioterapi/fisioterapi_pdf',$data);
        }else $this->error();
    }
}