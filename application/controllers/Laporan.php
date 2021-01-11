<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
    
    //global
    public $sql="";
    public $judul="";
    
     //petugas
    public $divisi="";
    
    //obat
    public $jenis="";
    
    //pelayanan
    public $tgl1="";
    public $tgl2="";
    
	function __construct(){
		parent::__construct();
        if ($this->session->userdata('uname')==""){
			redirect('login');
		//}else if ($this->session->userdata('level')<>"PIMPINAN"){
		//	redirect('login');
		}
    }
    
    public function error(){
        $this->load->view('index.html');
    }

	public function index(){
		//$data['outlet'] = $this->db->get("tb_outlet");
		$data['content'] = 'laporan/layanan/filter';
		$this->load->view('layouts/main_kasir_v',$data);
	}
	
	public function filter_lap_layanan(){
	    $tgl1 = $this->input->post('tanggal');
	    $tgl2 = $this->input->post('sampai_tanggal');
	    
        $where = "tb_pelayanan.pembayaran='sudah' AND DATE(tb_pelayanan.tgl_pelayanan) BETWEEN '$tgl1' AND '$tgl2' ";
        $data['pelayanan']= $this->db->select("*")->from("tb_pelayanan")->join("tb_registrasi","tb_registrasi.no_registrasi=tb_pelayanan.no_registrasi")->where($where)->get(); 
	    $this->load->view('laporan/layanan/data',$data);
	}
	
	public function cetak(){
	    $id = $this->input->post('kasir');
	    $tgl1 = $this->input->post('tanggal');
	    $tgl2 = $this->input->post('sampai_tanggal');
	    
	    $where = "id_user='$id' AND tanggal BETWEEN '$tgl1' AND '$tgl2' ";
	    
	    $data['kasir'] = $this->db->get_where("tb_users",array("id_user"=>$this->input->post('kasir')))->row();
	    $data['perusahaan'] = $this->db->get("tb_perusahaan")->row();
	    $data['result'] = $this->db->get_where("view_pembayaran",$where);
	    $data['total'] = $this->db->select("SUM(view_pembayaran.jumlah_bayar) as total")->from("view_pembayaran")->where($where)->get();
	    $this->load->view('laporan/layanan/data_pdf',$data);
	}
    
    public function lap_rekap_petugas()
    {        
        $this->sql="SELECT DISTINCT status FROM tb_petugas ORDER BY status ASC";
        $data['petugas']= $this->db->query($this->sql);
       	$data['content'] = 'laporan/rekap_layanan_petugas/filter';
		$this->load->view('layouts/main_kasir_v',$data);
    }
    
    
    public function filter_rekap_petugas()
    {
        $tgl1 = $this->input->post('tanggal');
        $tgl2 = $this->input->post('sampai_tanggal');
        $divisi = $this->input->post('divisi');

        $where = "tb_pelayanan.pembayaran='sudah' AND tb_petugas.status='$divisi' AND DATE(tb_pelayanan.tgl_pelayanan) BETWEEN '$tgl1' AND '$tgl2' ";
        $data['pelayanan']= $this->db->select("tb_petugas.nik_petugas,tb_petugas.nama_petugas, tb_petugas.status, SUM(tb_petugas_pelayanan.nominal_tindakan) AS nominal_tindak, COUNT(tb_petugas_pelayanan.nominal_tindakan) as jumlah_tindak")->from("tb_pelayanan")->join("tb_petugas_pelayanan","tb_petugas_pelayanan.no_invoice=tb_pelayanan.no_invoice")->join("tb_petugas","tb_petugas.nik_petugas=tb_petugas_pelayanan.nik_petugas")->where($where)->group_by("tb_petugas.nik_petugas")->get(); 

        $this->load->view('laporan/rekap_layanan_petugas/data',$data);                   
    }
    
}