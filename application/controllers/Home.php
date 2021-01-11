<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
    parent::__construct();
      if ($this->session->userdata('uname')==""){
      redirect('login');
     }
  }

	public function index()
	{

    $tgl_bayar="2021-07-03";
              $tgl_bayar=date('Y-m-d', strtotime('-1 days', strtotime($tgl_bayar)));

    echo var_dump($tgl_bayar);

    $bln = date('m');
    $thn = date('Y');
    $data['bulan'] = bulan($bln).' '.$thn;
    $data['pelayanan'] = $this->db->query("SELECT count(*) as jml, tgl_pelayanan FROM poli_umum WHERE MONTH(tgl_pelayanan)='$bln' AND YEAR(tgl_pelayanan)='$thn' GROUP BY DATE(tgl_pelayanan) ");
    $data['content'] = 'home';   
    $this->load->view('layouts/main',$data);
	}

  public function barcode(){
    $data['content'] = 'form_barcode';
    $this->load->view('layouts/main',$data);
  }

  public function cetak_barcode(){
    $data['jumlah'] = $this->input->post('jumlah');
    $data['kode'] = time();
    $this->load->view('print_barcode',$data);
  }
}
