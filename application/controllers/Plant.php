<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class plant extends CI_Controller {

	function __construct(){
		parent::__construct();
      if ($this->session->userdata('uname')==""){
			redirect('login');
    }
		// }else if ($this->session->userdata('level')<>"PIMPINAN"){
		// 	redirect('login');
		// }
  }

	public function index(){
		$data['title'] = "plant";
		$data['penjualan'] = $this->db->select(['a.*','b.kd_obat','b.nama_obat','b.harga_obat','(a.qty*b.harga_obat) as tot'])->from('tb_penjualan a')
			->join('tb_obat as b','a.kd_obat=b.kd_obat')->get();
		
		$data['coba'] = $this->db->query("SELECT SUM(harga_obat*qty) AS tot FROM tb_penjualan JOIN tb_obat WHERE tb_penjualan.kd_obat = tb_obat.kd_obat ");

			$jumlah_data = $this->db->query("SELECT qty FROM tb_penjualan");

			if($jumlah_data->num_rows()>0){
		     	foreach ($data['coba']->result() as $r) {
                 	$data['tot']=$r->tot;
             	}
		    }else{
		    	$data['tot'] ='0';
		    }


		$data['obat'] = $this->db->get("tb_obat");
		$data['plant'] = $this->db->select("*")->from("tb_plant")->join("tb_obat","tb_obat.kd_obat=tb_plant.kd_obat")->join("tb_pelayanan","tb_pelayanan.no_invoice=tb_plant.no_invoice")->order_by("tb_plant.id_plant DESC")->get();

		$data['pelayanan'] = $this->db->select("*")->from("tb_pelayanan")->join("tb_pasien","tb_pasien.nik=tb_pelayanan.nik")->join("tb_penyakit","tb_pelayanan.kd_penyakit=tb_penyakit.kd_penyakit")->join("tb_petugas","tb_pelayanan.nik_petugas=tb_petugas.nik_petugas")->order_by("tb_pelayanan.no_invoice DESC")->get();

		$data['content'] = 'plant/data';
		$this->load->view('layouts/main_kasir_v',$data);
	}

	function get_total(){
		$coba = $this->db->query("SELECT SUM(harga_obat*qty) AS tot FROM tb_penjualan JOIN tb_obat WHERE tb_penjualan.kd_obat = tb_obat.kd_obat ");

		
			foreach ($coba->result() as $r) {
                 $tot=$r->tot;                 
             }
        echo json_encode($coba);
	}

	function get_pelayanan(){
        $db = $this->db;
        $id = $this->input->post('id');
        $pelayanan=$db->SELECT(['a.*','b.nik','b.nama_pasien','c.kd_penyakit','c.nama_penyakit','(biaya_pelayanan + biaya_lain) AS ttl'])
              ->from('tb_pelayanan a')
              ->join('tb_pasien as b','a.nik=b.nik')
              ->join('tb_penyakit as c','a.kd_penyakit=c.kd_penyakit')
              ->where('a.no_invoice',$id)
              ->get()->row();
              // ->row_array();

        echo json_encode($pelayanan);
	}

	function simpan_penjualan(){
		$kd_obat = $this->input->post('kd_obat');

		$jual = $this->db->get_where('tb_penjualan', ['kd_obat' => $kd_obat])->row_array();

		if ($jual) {
			$isi = '1';
          	$data = array(          
                      'qty' => $jual['qty']+$isi
                       );

	        $where = array('kd_obat' => $kd_obat);
	        $this->db->update('tb_penjualan', $data, $where);
		}else{
			$data = array(
	          'kd_obat' => $this->input->post('kd_obat'),
	          'harga_jual' => $this->input->post('harga_jual'),
	          'qty' => '1'
        	);

        $this->db->insert('tb_penjualan', $data);

        $data2 = array(          
            'stts' => '1'
             );
        $where = array('stts' => '0');

        $this->db->update('tb_plant', $data2, $where);
		}

        echo json_encode($data);
	}

	function ubah(){
		$id = $this->input->post('id');
		$data = array(          
            // 'qty' => $isi
            'qty' =>$this->input->post('qty')
             );
        $where = array('id_penjualan' => $id);
        $this->db->update('tb_penjualan', $data, $where);

        echo json_encode($data);

	}


	
	
	public function update(){
		
		$where['tb_plant.id_plant'] = $this->input->post('id');
		// $data['obat'] = $this->db->get("tb_obat");
		// $data['plant'] = $this->db->get_where("tb_plant",$where)->row();
		$data['plant'] = $this->db->select("*")->from("tb_plant")->join("tb_obat","tb_obat.kd_obat=tb_plant.kd_obat")->where($where)->get()->row();
		echo show_my_modal("plant/modal_update","md_updt",$data);
	}


	function get_obat(){
		$db = $this->db;
        $id = $this->input->post('id');
        $obat = $db->get_where('tb_obat', ['kd_obat' => $id])->row_array();
        echo json_encode($obat);


	}

	
	public function hapus(){
		// if(isset($_POST) && !empty($_POST)){
		// 	$where['id_plant'] = $this->input->post('id');
		// 	$this->db->delete("tb_plant",$where);
		// 	$this->session->set_flashdata("msg","<div class='alert alert-success alert-dismissible'>
		// 	                <h4><i class='icon fa fa-check'></i> Success!</h4>
		// 	                Berhasil Menghapus Data plant obat
		// 	            </div>");
		// 	header('location:'.base_url().'Plant');
		// }else $this->error();

		$kd_hapus = $this->input->post('id');
        $kd = array('id_penjualan' => $kd_hapus);
        $this->db->Delete('tb_penjualan', $kd);
        echo json_encode($kd_hapus);
	}

	function obat_get_data(){
	    $db = $this->db;
	    $data['obat'] = $this->db->get("tb_obat");
	    $this->load->view('Plant/data_obat',$data);

	  }

	function simpan_obat(){
		$this->form_validation->set_rules('kd_obat', 'KODE OBAT', 'required|is_unique[tb_obat.kd_obat]');
        // $this->form_validation->set_rules('nama_pasien', 'Harga Beli', 'required');

        if ($this->form_validation->run()) { 
            $kd_obat = $this->input->post('kd_obat');
            // simpan barcode;

            $data = array(
                'kd_obat' => $kd_obat,
                'nama_obat' =>$this->input->post('nama_obat'),
	            'harga_obat'=>$this->input->post('harga_obat'),
	            'jenis'=>$this->input->post('jenis')
	                );
            $this->db->insert('tb_obat', $data); 

            if ($data) {
                $array = array('success' => '<div class="alert alert-success">
                                <a href="#" class="close" data-dismiss="alert">&times;</a>
                    Data Sudah Disimpan</div>');
            }

        }else{
            $array = array(
                'error'   => true,
                'kd_obat_error' => form_error('kd_obat')
                // 'nama_pasien_error' => form_error('nama_pasien')
           ); 
            
        }

         echo json_encode($array);
	    
  }

  function simpan_data_plant(){
  	$db = $this->db;
  	$penjualan = $db->SELECT(['a.*','b.kd_obat','b.nama_obat','b.harga_obat','(a.harga_jual * a.qty) AS total_bayar'])
            ->from('tb_penjualan a')
            ->join('tb_obat as b','a.kd_obat=b.kd_obat')
            ->get();

    $data = array();

    foreach ($penjualan->result() as $r) {    	
    	$kd_obat = $r->kd_obat;
    	$qty = $r->qty;
    	$harga_jual = $r->harga_jual;

    	$data = array(
    		'no_invoice'=>$this->input->post('no_invoice'),
    		'kd_obat'=>$kd_obat,
    		'qty' => $qty,
    		'harga_jual' => $harga_jual,
    		'nik_petugas' => $this->session->userdata('id_user')
    	);
    	$this->db->insert('tb_plant', $data);
    	$data=$db->query('delete from tb_penjualan');    	
    }
    echo json_encode($data);
  }




  function cetak_nota(){

      $db = $this->db;
      $title = "nota";

      $plant=$db->SELECT(['a.*','b.no_invoice','c.nik','c.nama_pasien','d.kd_obat','d.nama_obat','e.nik_petugas','nama_petugas','(b.biaya_pelayanan + b.biaya_lain) AS ttl','(a.qty * a.harga_jual) as ttl_harga'])
              ->from('tb_plant a')              
              ->join('tb_pelayanan as b','a.no_invoice=b.no_invoice')
              ->join('tb_pasien as c','b.nik=c.nik')
              ->join('tb_obat as d','a.kd_obat=d.kd_obat')
              ->join('tb_petugas as e','a.nik_petugas=e.nik_petugas')
              ->where('a.stts','0')
              ->get()->result_array();

      
      $nota=$db->SELECT(['a.*','b.no_invoice','b.tgl_pelayanan','c.nik_petugas','c.nama_petugas','(b.biaya_pelayanan + b.biaya_lain) AS biaya_admin','(a.qty * a.harga_jual) as ttl_harga','sum(a.qty * a.harga_jual) as biaya_obat','d.nik','d.nama_pasien'])
              ->from('tb_plant a')              
              ->join('tb_pelayanan as b','a.no_invoice=b.no_invoice')
              ->join('tb_petugas as c','a.nik_petugas=c.nik_petugas')
              ->join('tb_pasien as d','b.nik=d.nik')
              ->where('a.stts','0')
              ->get();

         foreach ($nota->result_array() as $r) {         		 
                 $biaya_admin=$r['biaya_admin'];
                 $biaya_obat=$r['biaya_obat'];
                 $no=$r['no_invoice'];
                 $tgl = $r['tgl_pelayanan'];
                 $np = $r['nama_petugas'];
                 $nama_pasien = $r['nama_pasien'];
             }

      

      $this->load->view('Plant/nota2',get_defined_vars());

    }
}