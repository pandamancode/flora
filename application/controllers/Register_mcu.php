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

		$hematologi = $this->db->get_where("hematologi",array('no_mcu'=>$no_mcu));
		if($hematologi->num_rows()>0){
			$get_hemoglobin = explode("|", $hematologi->row()->hemoglobin);
			$hemoglobin = $get_hemoglobin[0];
			$hemoglobin_ket = $get_hemoglobin[1];

			$get_eritrosit = explode("|", $hematologi->row()->eritrosit);
			$eritrosit = $get_eritrosit[0];
			$eritrosit_ket = $get_eritrosit[1];

			$get_hematokrit = explode("|", $hematologi->row()->hematokrit);
			$hematokrit = $get_hematokrit[0];
			$hematokrit_ket = $get_hematokrit[1];

			$get_lekosit = explode("|", $hematologi->row()->lekosit);
			$lekosit = $get_lekosit[0];
			$lekosit_ket = $get_lekosit[1];

			$get_trombosit = explode("|", $hematologi->row()->trombosit);
			$trombosit = $get_trombosit[0];
			$trombosit_ket = $get_trombosit[1];

			$get_mcv = explode("|", $hematologi->row()->mcv);
			$mcv = $get_mcv[0];
			$mcv_ket = $get_mcv[1];

			$get_mch = explode("|", $hematologi->row()->mch);
			$mch = $get_mch[0];
			$mch_ket = $get_mch[1];

			$get_mchc = explode("|", $hematologi->row()->mchc);
			$mchc = $get_mchc[0];
			$mchc_ket = $get_mchc[1];

			$get_basofil = explode("|", $hematologi->row()->basofil);
			$basofil = $get_basofil[0];
			$basofil_ket = $get_basofil[1];

			$get_eosinofil = explode("|", $hematologi->row()->eosinofil);
			$eosinofil = $get_eosinofil[0];
			$eosinofil_ket = $get_eosinofil[1];

			$get_netrofil_batang = explode("|", $hematologi->row()->netrofil_batang);
			$netrofil_batang = $get_netrofil_batang[0];
			$netrofil_batang_ket = $get_netrofil_batang[1];

			$get_netrofil_segmen = explode("|", $hematologi->row()->netrofil_segmen);
			$netrofil_segmen = $get_netrofil_segmen[0];
			$netrofil_segmen_ket = $get_netrofil_segmen[1];

			$get_limfosit = explode("|", $hematologi->row()->limfosit);
			$limfosit = $get_limfosit[0];
			$limfosit_ket = $get_limfosit[1];

			$get_monosit = explode("|", $hematologi->row()->monosit);
			$monosit = $get_monosit[0];
			$monosit_ket = $get_monosit[1];

			$get_led = explode("|", $hematologi->row()->led);
			$led = $get_led[0];
			$led_ket = $get_led[1];
		}else{
			$hemoglobin = false;
			$hemoglobin_ket = false;
			$eritrosit = false;
			$eritrosit_ket = false;
			$hematokrit = false;
			$hematokrit_ket = false;
			$lekosit = false;
			$lekosit_ket = false;
			$trombosit = false;
			$trombosit_ket = false;
			$mcv = false;
			$mcv_ket = false;
			$mch = false;
			$mch_ket = false;
			$mchc = false;
			$mchc_ket = false;
			$basofil = false;
			$basofil_ket = false;
			$eosinofil = false;
			$eosinofil_ket = false;
			$netrofil_batang = false;
			$netrofil_batang_ket = false;
			$netrofil_segmen = false;
			$netrofil_segmen_ket = false;
			$limfosit = false;
			$limfosit_ket = false;
			$monosit = false;
			$monosit_ket = false;
			$led = false;
			$led_ket = false;
		}

		$kimia_darah = $this->db->get_where("kimia_darah",array('no_mcu'=>$no_mcu));
		if($kimia_darah->num_rows()>0){
			$get_kolesterol = explode("|", $kimia_darah->row()->kolesterol);
			$kolesterol = $get_kolesterol[0];
			$kolesterol_ket = $get_kolesterol[1];

			$get_hdl = explode("|", $kimia_darah->row()->hdl);
			$hdl = $get_hdl[0];
			$hdl_ket = $get_hdl[1];

			$get_ldl = explode("|", $kimia_darah->row()->ldl);
			$ldl = $get_ldl[0];
			$ldl_ket = $get_ldl[1];

			$get_trigliserida = explode("|", $kimia_darah->row()->trigliserida);
			$trigliserida = $get_trigliserida[0];
			$trigliserida_ket = $get_trigliserida[1];

			$get_limfosit = explode("|", $kimia_darah->row()->limfosit);
			$limfosit = $get_limfosit[0];
			$limfosit_ket = $get_limfosit[1];

			$get_monosit = explode("|", $kimia_darah->row()->monosit);
			$monosit = $get_monosit[0];
			$monosit_ket = $get_monosit[1];

			$get_led = explode("|", $kimia_darah->row()->led);
			$led = $get_led[0];
			$led_ket = $get_led[1];

			$get_ureum = explode("|", $kimia_darah->row()->ureum);
			$ureum = $get_ureum[0];
			$ureum_ket = $get_ureum[1];

			$get_kreatinin = explode("|", $kimia_darah->row()->kreatinin);
			$kreatinin = $get_kreatinin[0];
			$kreatinin_ket = $get_kreatinin[1];

			$get_asam_urat = explode("|", $kimia_darah->row()->asam_urat);
			$asam_urat = $get_asam_urat[0];
			$asam_urat_ket = $get_asam_urat[1];
			
			$get_sgot = explode("|", $kimia_darah->row()->sgot);
			$sgot = $get_sgot[0];
			$sgot_ket = $get_sgot[1];

			$get_sgpt = explode("|", $kimia_darah->row()->sgpt);
			$sgpt = $get_sgpt[0];
			$sgpt_ket = $get_sgpt[1];
			
			$get_sewaktu = explode("|", $kimia_darah->row()->sewaktu);
			$sewaktu = $get_sewaktu[0];
			$sewaktu_ket = $get_sewaktu[1];

			$get_puasa = explode("|", $kimia_darah->row()->puasa);
			$puasa = $get_puasa[0];
			$puasa_ket = $get_puasa[1];
		}else{
			$kolesterol = false;
			$kolesterol_ket = false;
			$hdl = false;
			$hdl_ket = false;
			$ldl = false;
			$ldl_ket = false;
			$trigliserida = false;
			$trigliserida_ket = false;
			$ureum = false;
			$ureum_ket = false;
			$kreatinin = false;
			$kreatinin_ket = false;
			$asam_urat = false;
			$asam_urat_ket = false;
			$sgot = false;
			$sgot_ket = false;
			$sgpt = false;
			$sgpt_ket = false;
			$sewaktu = false;
			$sewaktu_ket = false;
			$puasa = false;
			$puasa_ket = false;
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

				//laboratorium
				'[hemoglobin]' => $hemoglobin,
				'[hemoglobin_ket]' => $hemoglobin_ket,
				'[eritrosit]' => $eritrosit,
				'[eritrosit_ket]' => $eritrosit_ket,
				'[hematokrit]' => $hematokrit,
				'[hematokrit_ket]' => $hematokrit_ket,
				'[lekosit]' => $lekosit,
				'[lekosit_ket]' => $lekosit_ket,
				'[trombosit]' => $trombosit,
				'[trombosit_ket]' => $trombosit_ket,
				'[mcv]' => $mcv,
				'[mcv_ket]' => $mcv_ket,
				'[mch]' => $mch,
				'[mch_ket]' => $mch_ket,
				'[mchc]' => $mchc,
				'[mchc_ket]' => $mchc_ket,
				'[basofil]' => $basofil,
				'[basofil_ket]' => $basofil_ket,
				'[eosinofil]' => $eosinofil,
				'[eosinofil_ket]' => $eosinofil_ket,
				'[netrofil_batang]' => $netrofil_batang,
				'[netrofil_batang_ket]' => $netrofil_batang_ket,
				'[netrofil_segmen]' => $netrofil_segmen,
				'[netrofil_segmen_ket]' => $netrofil_segmen_ket,
				'[limfosit]' => $limfosit,
				'[limfosit_ket]' => $limfosit_ket,
				'[monosit]' => $monosit,
				'[monosit_ket]' => $monosit_ket,
				'[led]' => $led,
				'[led_ket]' => $led_ket,
				'[kolesterol]' => $kolesterol,
				'[kolesterol_ket]' => $kolesterol_ket,
				'[hdl]' => $hdl,
				'[hdl_ket]' => $hdl_ket,
				'[ldl]' => $ldl,
				'[ldl_ket]' => $ldl_ket,
				'[trigliserida]' => $trigliserida,
				'[trigliserida_ket]' => $trigliserida_ket,
				'[ureum]' => $ureum,
				'[ureum_ket]' => $ureum_ket,
				'[kreatinin]' => $kreatinin,
				'[kreatinin_ket]' => $kreatinin_ket,
				'[asam_urat]' => $asam_urat,
				'[asam_urat_ket]' => $asam_urat_ket,
				'[sgot]' => $sgot,
				'[sgot_ket]' => $sgot_ket,
				'[sgpt]' => $sgpt,
				'[sgpt_ket]' => $sgpt_ket,
				'[sewaktu]' => $sewaktu,
				'[sewaktu_ket]' => $sewaktu_ket,
				'[puasa]' => $puasa,
				'[puasa_ket]' => $puasa_ket,
			);

		$document = str_replace(array_keys($replace), array_values($replace),$document);

		//$document = str_replace("%%USIA%%",$umur,$document);
		header("Content-type: application/msword");
		header("Content-disposition: inline; filename=Hasil MCU.rtf");
		header("Content-length: ".strlen($document));
		echo $document;
	}
}