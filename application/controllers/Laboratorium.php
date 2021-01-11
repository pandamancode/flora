<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laboratorium extends CI_Controller {

    function __construct(){
		parent::__construct();
         if ($this->session->userdata('uname')==""){
		 	redirect('login');
		 }
    }

	public function index(){
		$data['lab'] = $this->db->get("laboratorium");
		$data['content'] = 'mcu/laboratorium/data';
		$this->load->view('layouts/main',$data);

	}

    public function error(){
        $this->load->view('index.html');
    }

    public function hasil($no_mcu){
        $data['no_mcu'] = $no_mcu;
    	$data['periksa'] = $this->db->get_where("laboratorium",array('no_mcu'=>$no_mcu));
    	$data['pasien'] = $this->db->select("*")->from("mcu")->join("pasien","pasien.nik=mcu.nik")->where("mcu.no_mcu",$no_mcu)->get();
    	$data['content'] = 'mcu/laboratorium/form_lab';
		$this->load->view('layouts/main',$data);
    }

    public function entry_darah_lengkap(){
        if(isset($_POST) && !empty($_POST)){
            $where['no_mcu'] = $this->input->post('no_mcu');
            $cek = $this->db->get_where("laboratorium",$where);

            $hemoglobin = cek_input($this->input->post('hemoglobin'));
            $hemoglobin_ket =  cek_input($this->input->post('hemoglobin_ket'));

            $eritrosit = cek_input($this->input->post('eritrosit'));
            $eritrosit_ket =  cek_input($this->input->post('eritrosit_ket'));

            $hematokrit = cek_input($this->input->post('hematokrit'));
            $hematokrit_ket =  cek_input($this->input->post('hematokrit_ket'));

            $lekosit = cek_input($this->input->post('lekosit'));
            $lekosit_ket =  cek_input($this->input->post('lekosit_ket'));

            $trombosit = cek_input($this->input->post('trombosit'));
            $trombosit_ket =  cek_input($this->input->post('trombosit_ket'));

            $mcv = cek_input($this->input->post('mcv'));
            $mcv_ket =  cek_input($this->input->post('mcv_ket'));

            $mch = cek_input($this->input->post('mch'));
            $mch_ket =  cek_input($this->input->post('mch_ket'));

            $mchc = cek_input($this->input->post('mchc'));
            $mchc_ket =  cek_input($this->input->post('mchc_ket'));

            if($cek->num_rows()>0){
                $data = array(
                    'hemoglobin' => $hemoglobin.'|'.$hemoglobin_ket,
                    'eritrosit' => $eritrosit.'|'.$eritrosit_ket,
                    'hematokrit' => $hematokrit.'|'.$hematokrit_ket,
                    'lekosit' => $lekosit.'|'.$lekosit_ket,
                    'trombosit' => $trombosit.'|'.$trombosit_ket,
                    'mcv' => $mcv.'|'.$mcv_ket,
                    'mch' => $mch.'|'.$mch_ket,
                    'mchc' => $mchc.'|'.$mchc_ket,
                );
                $this->db->update("laboratorium",$data,$where);
            }else{
                $data = array(
                    'no_mcu' => $this->input->post('no_mcu'),
                    'hemoglobin' => $hemoglobin.'|'.$hemoglobin_ket,
                    'eritrosit' => $eritrosit.'|'.$eritrosit_ket,
                    'hematokrit' => $hematokrit.'|'.$hematokrit_ket,
                    'lekosit' => $lekosit.'|'.$lekosit_ket,
                    'trombosit' => $trombosit.'|'.$trombosit_ket,
                    'mcv' => $mcv.'|'.$mcv_ket,
                    'mch' => $mch.'|'.$mch_ket,
                    'mchc' => $mchc.'|'.$mchc_ket,
                );
                $this->db->insert("laboratorium",$data);
            }

            $this->session->set_flashdata("msg","<div class='alert alert-success alert-dismissible' aria-hidden='true'>
                    <h4><i class='icon fa fa-check'></i> Success!</h4>
                    Hasil Pemeriksaan Darah Lengkap Berhasil disimpan
                </div>");
            redirect('laboratorium/hasil/'.$this->input->post('no_mcu'));
        }else $this->error();
        
    }


    public function leokosit($no_mcu){
        $data['no_mcu'] = $no_mcu;
        $data['periksa'] = $this->db->get_where("laboratorium",array('no_mcu'=>$no_mcu));
        $data['pasien'] = $this->db->select("*")->from("mcu")->join("pasien","pasien.nik=mcu.nik")->where("mcu.no_mcu",$no_mcu)->get();
        $data['content'] = 'mcu/laboratorium/form_leokosit';
        $this->load->view('layouts/main',$data);
    }

    public function entry_leokosit(){
        if(isset($_POST) && !empty($_POST)){
            $where['no_mcu'] = $this->input->post('no_mcu');
            $cek = $this->db->get_where("laboratorium",$where);

            $basofil = cek_input($this->input->post('basofil'));
            $basofil_ket =  cek_input($this->input->post('basofil_ket'));

            $eosinofil = cek_input($this->input->post('eosinofil'));
            $eosinofil_ket =  cek_input($this->input->post('eosinofil_ket'));

            $netrofil_batang = cek_input($this->input->post('netrofil_batang'));
            $netrofil_batang_ket =  cek_input($this->input->post('netrofil_batang_ket'));

            $netrofil_segmen = cek_input($this->input->post('netrofil_segmen'));
            $netrofil_segmen_ket =  cek_input($this->input->post('netrofil_segmen_ket'));

            $limfosit = cek_input($this->input->post('limfosit'));
            $limfosit_ket =  cek_input($this->input->post('limfosit_ket'));

            $monosit = cek_input($this->input->post('monosit'));
            $monosit_ket =  cek_input($this->input->post('monosit_ket'));

            $led = cek_input($this->input->post('led'));
            $led_ket =  cek_input($this->input->post('led_ket'));

            if($cek->num_rows()>0){
                $data = array(
                    'basofil' => $basofil.'|'.$basofil_ket,
                    'eosinofil' => $eosinofil.'|'.$eosinofil_ket,
                    'netrofil_batang' => $netrofil_batang.'|'.$netrofil_batang_ket,
                    'netrofil_segmen' => $netrofil_segmen.'|'.$netrofil_segmen_ket,
                    'limfosit' => $limfosit.'|'.$limfosit_ket,
                    'monosit' => $monosit.'|'.$monosit_ket,
                    'led' => $led.'|'.$led_ket,
                );
                $this->db->update("laboratorium",$data,$where);
            }else{
                $data = array(
                    'no_mcu' => $this->input->post('no_mcu'),
                    'basofil' => $basofil.'|'.$basofil_ket,
                    'eosinofil' => $eosinofil.'|'.$eosinofil_ket,
                    'netrofil_batang' => $netrofil_batang.'|'.$netrofil_batang_ket,
                    'netrofil_segmen' => $netrofil_segmen.'|'.$netrofil_segmen_ket,
                    'limfosit' => $limfosit.'|'.$limfosit_ket,
                    'monosit' => $monosit.'|'.$monosit_ket,
                    'led' => $led.'|'.$led_ket,
                );
                $this->db->insert("laboratorium",$data);
            }

            $this->session->set_flashdata("msg","<div class='alert alert-success alert-dismissible' aria-hidden='true'>
                    <h4><i class='icon fa fa-check'></i> Success!</h4>
                    Hasil Pemeriksaan Leokosit Berhasil disimpan
                </div>");
            redirect('laboratorium/leokosit/'.$this->input->post('no_mcu'));
        }else $this->error();
        
    }

    public function lemak($no_mcu){
        $data['no_mcu'] = $no_mcu;
        $data['periksa'] = $this->db->get_where("laboratorium",array('no_mcu'=>$no_mcu));
        $data['pasien'] = $this->db->select("*")->from("mcu")->join("pasien","pasien.nik=mcu.nik")->where("mcu.no_mcu",$no_mcu)->get();
        $data['content'] = 'mcu/laboratorium/form_lemak_darah';
        $this->load->view('layouts/main',$data);
    }

    public function entry_lemak_darah(){
        if(isset($_POST) && !empty($_POST)){
            $where['no_mcu'] = $this->input->post('no_mcu');
            $cek = $this->db->get_where("laboratorium",$where);

            $kolesterol = cek_input($this->input->post('kolesterol'));
            $kolesterol_ket =  cek_input($this->input->post('kolesterol_ket'));

            $hdl = cek_input($this->input->post('hdl'));
            $hdl_ket =  cek_input($this->input->post('hdl_ket'));

            $ldl = cek_input($this->input->post('ldl'));
            $ldl_ket =  cek_input($this->input->post('ldl_ket'));

            $trigliserida = cek_input($this->input->post('trigliserida'));
            $trigliserida_ket =  cek_input($this->input->post('trigliserida_ket'));

            if($cek->num_rows()>0){
                $data = array(
                    'kolesterol' => $kolesterol.'|'.$kolesterol_ket,
                    'hdl' => $hdl.'|'.$hdl_ket,
                    'ldl' => $ldl.'|'.$ldl_ket,
                    'trigliserida' => $trigliserida.'|'.$trigliserida_ket,
                );
                $this->db->update("laboratorium",$data,$where);
            }else{
                $data = array(
                    'no_mcu' => $this->input->post('no_mcu'),
                    'kolesterol' => $kolesterol.'|'.$kolesterol_ket,
                    'hdl' => $hdl.'|'.$hdl_ket,
                    'ldl' => $ldl.'|'.$ldl_ket,
                    'trigliserida' => $trigliserida.'|'.$trigliserida_ket,
                );
                $this->db->insert("laboratorium",$data);
            }

            $this->session->set_flashdata("msg","<div class='alert alert-success alert-dismissible' aria-hidden='true'>
                    <h4><i class='icon fa fa-check'></i> Success!</h4>
                    Hasil Pemeriksaan Lemak Darah Berhasil disimpan
                </div>");
            redirect('laboratorium/lemak/'.$this->input->post('no_mcu'));
        }else $this->error();
        
    }

    public function ginjal($no_mcu){
        $data['no_mcu'] = $no_mcu;
        $data['periksa'] = $this->db->get_where("laboratorium",array('no_mcu'=>$no_mcu));
        $data['pasien'] = $this->db->select("*")->from("mcu")->join("pasien","pasien.nik=mcu.nik")->where("mcu.no_mcu",$no_mcu)->get();
        $data['content'] = 'mcu/laboratorium/form_ginjal';
        $this->load->view('layouts/main',$data);
    }

    public function entry_ginjal(){
        if(isset($_POST) && !empty($_POST)){
            $where['no_mcu'] = $this->input->post('no_mcu');
            $cek = $this->db->get_where("laboratorium",$where);

            $ureum = cek_input($this->input->post('ureum'));
            $ureum_ket =  cek_input($this->input->post('ureum_ket'));

            $kreatinin = cek_input($this->input->post('kreatinin'));
            $kreatinin_ket =  cek_input($this->input->post('kreatinin_ket'));

            $asam_urat = cek_input($this->input->post('asam_urat'));
            $asam_urat_ket =  cek_input($this->input->post('asam_urat_ket'));

            if($cek->num_rows()>0){
                $data = array(
                    'ureum' => $ureum.'|'.$ureum_ket,
                    'kreatinin' => $kreatinin.'|'.$kreatinin_ket,
                    'asam_urat' => $asam_urat.'|'.$asam_urat_ket,
                );
                $this->db->update("laboratorium",$data,$where);
            }else{
                $data = array(
                    'no_mcu' => $this->input->post('no_mcu'),
                    'ureum' => $ureum.'|'.$ureum_ket,
                    'kreatinin' => $kreatinin.'|'.$kreatinin_ket,
                    'asam_urat' => $asam_urat.'|'.$asam_urat_ket,
                );
                $this->db->insert("laboratorium",$data);
            }

            $this->session->set_flashdata("msg","<div class='alert alert-success alert-dismissible' aria-hidden='true'>
                    <h4><i class='icon fa fa-check'></i> Success!</h4>
                    Hasil Pemeriksaan Fungsi Ginjal Berhasil disimpan
                </div>");
            redirect('laboratorium/ginjal/'.$this->input->post('no_mcu'));
        }else $this->error();
        
    }

    public function hati($no_mcu){
        $data['no_mcu'] = $no_mcu;
        $data['periksa'] = $this->db->get_where("laboratorium",array('no_mcu'=>$no_mcu));
        $data['pasien'] = $this->db->select("*")->from("mcu")->join("pasien","pasien.nik=mcu.nik")->where("mcu.no_mcu",$no_mcu)->get();
        $data['content'] = 'mcu/laboratorium/form_hati';
        $this->load->view('layouts/main',$data);
    }

    public function entry_hati(){
        if(isset($_POST) && !empty($_POST)){
            $where['no_mcu'] = $this->input->post('no_mcu');
            $cek = $this->db->get_where("laboratorium",$where);

            $sgot = cek_input($this->input->post('sgot'));
            $sgot_ket =  cek_input($this->input->post('sgot_ket'));

            $sgpt = cek_input($this->input->post('sgpt'));
            $sgpt_ket =  cek_input($this->input->post('sgpt_ket'));

            if($cek->num_rows()>0){
                $data = array(
                    'sgot' => $sgot.'|'.$sgot_ket,
                    'sgpt' => $sgpt.'|'.$sgpt_ket,
                );
                $this->db->update("laboratorium",$data,$where);
            }else{
                $data = array(
                    'no_mcu' => $this->input->post('no_mcu'),
                    'sgot' => $sgot.'|'.$sgot_ket,
                    'sgpt' => $sgpt.'|'.$sgpt_ket,
                );
                $this->db->insert("laboratorium",$data);
            }

            $this->session->set_flashdata("msg","<div class='alert alert-success alert-dismissible' aria-hidden='true'>
                    <h4><i class='icon fa fa-check'></i> Success!</h4>
                    Hasil Pemeriksaan Fungsi Hati Berhasil disimpan
                </div>");
            redirect('laboratorium/hati/'.$this->input->post('no_mcu'));
        }else $this->error();
        
    }

    public function glukosa($no_mcu){
        $data['no_mcu'] = $no_mcu;
        $data['periksa'] = $this->db->get_where("laboratorium",array('no_mcu'=>$no_mcu));
        $data['pasien'] = $this->db->select("*")->from("mcu")->join("pasien","pasien.nik=mcu.nik")->where("mcu.no_mcu",$no_mcu)->get();
        $data['content'] = 'mcu/laboratorium/form_glukosa';
        $this->load->view('layouts/main',$data);
    }

    public function entry_glukosa(){
        if(isset($_POST) && !empty($_POST)){
            $where['no_mcu'] = $this->input->post('no_mcu');
            $cek = $this->db->get_where("laboratorium",$where);

            $sewaktu = cek_input($this->input->post('sewaktu'));
            $sewaktu_ket =  cek_input($this->input->post('sewaktu_ket'));

            $puasa = cek_input($this->input->post('puasa'));
            $puasa_ket =  cek_input($this->input->post('puasa_ket'));

            if($cek->num_rows()>0){
                $data = array(
                    'sewaktu' => $sewaktu.'|'.$sewaktu_ket,
                    'puasa' => $puasa.'|'.$puasa_ket,
                );
                $this->db->update("laboratorium",$data,$where);
            }else{
                $data = array(
                    'no_mcu' => $this->input->post('no_mcu'),
                    'sewaktu' => $sewaktu.'|'.$sewaktu_ket,
                    'puasa' => $puasa.'|'.$puasa_ket,
                );
                $this->db->insert("laboratorium",$data);
            }

            $this->session->set_flashdata("msg","<div class='alert alert-success alert-dismissible' aria-hidden='true'>
                    <h4><i class='icon fa fa-check'></i> Success!</h4>
                    Hasil Pemeriksaan Glukosa Darah Berhasil disimpan
                </div>");
            redirect('laboratorium/glukosa/'.$this->input->post('no_mcu'));
        }else $this->error();
        
    }

}