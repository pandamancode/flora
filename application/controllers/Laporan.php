<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
    
	function __construct(){
		parent::__construct();
        if ($this->session->userdata('uname')==""){
			redirect('login');
		}
    }
    
    public function error(){
        $this->load->view('index.html');
    }

	public function index(){
		$data['content'] = 'laporan/layanan/filter';
		$this->load->view('layouts/main',$data);
	}
	
	public function filter_kunjungan(){
	    $tgl1 = $this->input->post('tanggal');
	    $tgl2 = $this->input->post('sampai_tanggal');
	    
        $where = "poli_umum.status_pelayanan='selesai' AND DATE(poli_umum.tgl_pelayanan) BETWEEN '$tgl1' AND '$tgl2' ";
        $data['pelayanan']= $this->db->select("*")->from("poli_umum")->where($where)->get(); 
	    $this->load->view('laporan/layanan/data',$data);
	}
	
    public function mcu()
    {        
       	$data['content'] = 'laporan/mcu/filter';
		$this->load->view('layouts/main',$data);
    }
    
    public function filter_mcu()
    {
        $tgl1 = $this->input->post('tanggal');
	    $tgl2 = $this->input->post('sampai_tanggal');
	    
        $where = "DATE(tgl_mcu) BETWEEN '$tgl1' AND '$tgl2' ";
        $data['mcu']= $this->db->select("*")->from("mcu")->where($where)->get();  
        $this->load->view('laporan/mcu/data',$data);                   
    }
    
}