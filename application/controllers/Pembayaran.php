<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

    function __construct(){
		parent::__construct();
         if ($this->session->userdata('uname')==""){
		 	redirect('login');
		// }else if ($this->session->userdata('level')<>"PIMPINAN"){
//		 	redirect('login');
		 }
    }
	public function index(){
		$data['pelayanan'] = $this->db->get_where("tb_pelayanan",array('pembayaran'=>'belum'));
		$data['content'] = 'pembayaran/data_pelayanan';
		$this->load->view('layouts/main_kasir_v',$data);

	}

    public function error(){
        $this->load->view('index.html');
    }

    public function detail($invoice){
    	if(!empty($invoice)){
    		$data['pelayanan'] = $this->db->get_where("tb_pelayanan",array('no_invoice'=>$invoice))->row();
    		$data['plant'] = $this->db->get_where("tb_plant",array('no_invoice'=>$invoice));
    		$data['content'] = 'pembayaran/detail_transaksi';
			$this->load->view('layouts/main_kasir_v',$data);
    	}else $this->error();
    }

    public function bayar(){
    	if(isset($_POST) && !empty($_POST)){
            $where['no_invoice'] = $this->input->post('no_invoice');
            $data['pembayaran'] = 'sudah';
            $this->db->update("tb_pelayanan",$data,$where);
    		echo "Pembayaran Berhasil";
    	}else $this->error();
    }

    public function cetak_nota(){
        if(isset($_POST) && !empty($_POST)){
            $where['no_invoice'] = $this->input->post('no_invoice');
            $data['pelayanan'] = $this->db->get_where("tb_pelayanan",$where)->row();
            $data['plant'] = $this->db->get_where("tb_plant",$where);

            $data['invoice'] = $this->input->post('no_invoice');
            $data['total'] = $this->input->post('total');
            $data['bayar'] = $this->input->post('bayar');
            $data['kembalian'] = $this->input->post('kembalian');
            $this->load->view('pembayaran/nota',$data);
        }else $this->error();
    }

}