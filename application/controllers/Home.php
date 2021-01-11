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
