<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_mcu extends CI_Controller {

    function __construct(){
		parent::__construct();
         if ($this->session->userdata('uname')==""){
		 	redirect('login');
		 }
    }

	public function index(){
		$data['mcu'] = $this->db->query("SELECT * FROM mcu ORDER BY id_mcu DESC");
		$data['content'] = 'mcu/register';
		$this->load->view('layouts/main',$data);

	}

    public function error(){
        $this->load->view('index.html');
    }

    public function entry_data(){
    	if(isset($_POST) && !empty($_POST)){
    		$nik = $this->input->post('nik');
    		$cek = $this->db->get_where("mcu",array('no_mcu'=>$this->input->post('no_mcu')));
    		if($cek->num_rows()>0){
    			$this->session->set_flashdata("msg","<div class='alert alert-danger alert-dismissible' aria-hidden='true'>
	                        <h4><i class='icon fa fa-warning'></i> Failed!</h4>
	                        Nomor MCU Sudah Terdaftar
	                    </div>");
    		}else{
    			if($nik=="" || $nik==null){
    				$this->session->set_flashdata("msg","<div class='alert alert-danger alert-dismissible' aria-hidden='true'>
	                        <h4><i class='icon fa fa-warning'></i> Failed!</h4>
	                        Pasien tidak boleh kosong !
	                    </div>");
    			}else{
		    		$data = array(
		    			'no_mcu' => $this->input->post('no_mcu'),
		    			'nik' => $this->input->post('nik'),
		    			'tgl_mcu' => date('Y-m-d'),
		    		);
		    		$this->db->insert("mcu",$data);
		    		$this->session->set_flashdata("msg","<div class='alert alert-success alert-dismissible' aria-hidden='true'>
		                        <h4><i class='icon fa fa-check'></i> Success!</h4>
		                        Registrasi MCU Berhasil
		                    </div>");
	    		}
    		}
    		redirect('register_mcu');
    	}else $this->error();
    }

    public function mod_pasien(){
        echo show_my_modal("mcu/modal_pasien","md_pasien");
    }

    public function load_data(){
		$s_keyword="";
        if (isset($_POST['keyword'])) {
            $s_keyword = $_POST['keyword'];
        }

        $search_keyword = '%'. $s_keyword .'%';
        $query = $this->db->query("SELECT * FROM pasien WHERE nik LIKE '%$s_keyword%' OR nama_pasien LIKE '%$s_keyword%' LIMIT 10 ");
        $no =0;
        if($query->num_rows()>0){
	        foreach($query->result() as $r){
	        	$no++;
	        	if($r->gender=='L'){
	        		$gender = 'Laki-Laki';
	        	}else{
	        		$gender = 'Perempuan';
	        	}

	        	$tgl = tgl_indo($r->tgl_lahir);

	        	$link = 'get_pasien("'.$r->nik.'","'.$r->nama_pasien.'","'.$r->alamat.'","'.$tgl.'","'.$r->no_telp.'")';

	        	echo 
	        		"<tr>
	        			<td>".$no."</td>
	        			<td>".$r->nik."</td>
	        			<td>".$r->nama_pasien."</td>
	        			<td>".$gender."</td>
	        			<td>".$tgl."</td>
	        			<td>".$r->no_telp."</td>
	        			<td>
	        				<a href='javascript:;' onclick='".$link."' class='btn btn-primary btn-xs btn-flat btn-detail'><i class='fa fa-check'></i> Pilih Pasien</a>
	        			</td>
	        		</tr>";
	        }
	    }else{
	    	echo "<tr><td class='text-center' colspan='7'><span><strong><em>Tidak ada data ditemukan</em></strong><br><a href='".base_url('pasien')."'><i class='fa fa-user-plus'></i> Tambah Data Pasien</a><span></td></tr>";
	    }
	}

	public function cetak_hasil($no_mcu){
		$pasien = $this->db->select("*")->from("mcu")->join("pasien","pasien.nik=mcu.nik")->where("mcu.no_mcu",$no_mcu)->get()->row();

		$rontgen = $this->db->get_where("rontgen",array('no_mcu'=>$no_mcu));
		if($rontgen->num_rows()>0){
			$jenis_periksa = $rontgen->row()->jenis_periksa;
			$cor = $rontgen->row()->cor;
			$pilmo = $rontgen->row()->pulmo;
			$kesan = $rontgen->row()->kesan;
			$saran_rontgen = $rontgen->row()->saran;
		}else{
			$jenis_periksa = '-';
			$cor = '-';
			$pilmo = '-';
			$kesan = '-';
			$saran_rontgen = '......';
		}

		$ekg = $this->db->get_where("ekg",array('no_mcu'=>$no_mcu));
		if($ekg->num_rows()>0){
			$hr = $ekg->row()->heart_rate;
			$axis = $ekg->row()->axis;
			$rhythm = $ekg->row()->rhythm;
			$pr_interval = $ekg->row()->pr_interval;
			$resting = $ekg->row()->resting_ecg;
			$suggestion = $ekg->row()->suggestion;
			$saran_ekg = $ekg->row()->saran;
		}else{
			$hr = '-';
			$axis = '-';
			$rhythm = '-';
			$pr_interval = '-';
			$resting = '-';
			$suggestion = '-';
			$saran_ekg = '......';
		}



		$now = intval(date('Y'));
		$tgl_lahir = intval(date('Y',strtotime($pasien->tgl_lahir)));

		$umur = $now - $tgl_lahir;
		//var_dump($umur);die();
		$document = file_get_contents("assets/report/template.rtf");

		$replace = array(
				'%%NAMA%%' => $pasien->nama_pasien,
				'%%TGL_LAHIR%%' => date('d-m-Y',strtotime($pasien->tgl_lahir)),
				'%%GENDER%%' => gender($pasien->gender).'  /  '.$umur.' Tahun',
				'%%GENDER_SINGLE%%' => gender($pasien->gender),
				'%%USIA%%' => $umur.' Tahun',
				'%%TELP%%' => $pasien->no_telp,
				'%%ALAMAT%%' => $pasien->alamat,
				'%%NO_MCU%%' => $pasien->no_mcu,
				'%%TGL_MCU%%' => date('d-m-Y',strtotime($pasien->tgl_mcu)),
				'%%JENIS_PERIKSA%%' => $jenis_periksa,
				'%%COR%%' => $cor,
				'%%PILMO%%' => $pilmo,
				'%%KESAN%%' => $kesan,
				'%%HR%%' => $hr,
				'%%AXIS%%' => $axis,
				'%%RHYTHM%%' => $rhythm,
				'%%PRINTERVAL%%' => $pr_interval,
				'%%RESTING%%' => $resting,
				'%%SUGGESTION%%' => $suggestion,
				'%%SARAN_RONTGEN%%' => $saran_rontgen,
				'%%SARAN_EKG%%' => $saran_ekg,
			);


		$document = str_replace(array_keys($replace), array_values($replace),$document);
		//$document = str_replace("%%USIA%%",$umur,$document);
		header("Content-type: application/msword");
		header("Content-disposition: inline; filename=Hasil MCU.rtf");
		header("Content-length: ".strlen($document));
		echo $document;
	}
}