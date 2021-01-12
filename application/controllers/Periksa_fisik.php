<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Periksa_fisik extends CI_Controller {

    function __construct(){
		parent::__construct();
         if ($this->session->userdata('uname')==""){
		 	redirect('login');
		 }
    }

	public function index(){
		$data['mcu'] = $this->db->query("SELECT * FROM mcu WHERE print='0' ORDER BY id_mcu DESC");
		$data['content'] = 'mcu/periksa_fisik/data';
		$this->load->view('layouts/main',$data);

	}

    public function error(){
        $this->load->view('index.html');
    }

    public function hasil($no_mcu){
        $data['no_mcu'] = $no_mcu;
    	$data['periksa'] = $this->db->get_where("pemeriksaan_fisik",array('no_mcu'=>$no_mcu));
    	$data['pasien'] = $this->db->select("*")->from("mcu")->join("pasien","pasien.nik=mcu.nik")->where("mcu.no_mcu",$no_mcu)->get();
    	$data['content'] = 'mcu/periksa_fisik/form_periksa';
		$this->load->view('layouts/main',$data);
    }

    public function entry_data(){
        if(isset($_POST) && !empty($_POST)){
            $where['no_mcu'] = $this->input->post('no_mcu');
            $cek = $this->db->get_where("rontgen",$where);
            if($cek->num_rows()>0){
                $data = array(
                        'keluhan' => $this->input->post('keluhan'),
                        'operasi' => $this->input->post('operasi'),
                        'pengobatan' => $this->input->post('pengobatan'),
                        'konsumsi_obat' => $this->input->post('konsumsi_obat'),
                        'tb' => $this->input->post('tb'),
                        'bb' => $this->input->post('bb'),
                        'bb_ideal' => $this->input->post('bb_ideal'),
                        'lp' => $this->input->post('lp'),
                        'imt' => $this->input->post('imt'),
                        'persen_lemak' => $this->input->post('persen_lemak'),
                        'tekanan_darah' => $this->input->post('tekanan_darah'),
                        'suhu' => $this->input->post('suhu'),
                        'nadi' => $this->input->post('nadi'),
                        'penglihatan' => $this->input->post('penglihatan'),
                        'saran' => $this->input->post('saran'),
                    );
                $this->db->update("pemeriksaan_fisik",$data,$where);
            }else{
                $data = array(
                        'no_mcu' => $this->input->post('no_mcu'),
                        'keluhan' => $this->input->post('keluhan'),
                        'operasi' => $this->input->post('operasi'),
                        'pengobatan' => $this->input->post('pengobatan'),
                        'konsumsi_obat' => $this->input->post('konsumsi_obat'),
                        'tb' => $this->input->post('tb'),
                        'bb' => $this->input->post('bb'),
                        'bb_ideal' => $this->input->post('bb_ideal'),
                        'lp' => $this->input->post('lp'),
                        'imt' => $this->input->post('imt'),
                        'persen_lemak' => $this->input->post('persen_lemak'),
                        'tekanan_darah' => $this->input->post('tekanan_darah'),
                        'suhu' => $this->input->post('suhu'),
                        'nadi' => $this->input->post('nadi'),
                        'penglihatan' => $this->input->post('penglihatan'),
                        'saran' => $this->input->post('saran'),
                    );
                $this->db->insert("pemeriksaan_fisik",$data);
            }
            $this->session->set_flashdata("msg","<div class='alert alert-success alert-dismissible' aria-hidden='true'>
                    <h4><i class='icon fa fa-check'></i> Success!</h4>
                    Hasil Pemeriksaan Fisik Berhasil disimpan
                </div>");
            redirect('periksa_fisik/hasil/'.$this->input->post('no_mcu'));
        }else $this->error();
    }

}