<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Poli_umum extends CI_Controller {

    function __construct(){
		parent::__construct();
         if ($this->session->userdata('uname')==""){
		 	redirect('login');
		 }
    }
	public function index(){
		$data['registrasi'] = $this->db->get_where("registrasi",array('status'=>'dalam antrian'));
		$data['content'] = 'poli_umum/data_registrasi';
		$this->load->view('layouts/main',$data);

	}

    public function error(){
        $this->load->view('index.html');
    }

	public function periksa($no_reg){
        if(isset($no_reg) && !empty($no_reg)){
            $sess['sess_no_reg'] = $no_reg;
            $this->session->set_userdata($sess);
            $invoice = 'INV'.$no_reg;
            $cek = $this->db->get_where("poli_umum",array('no_invoice'=>$invoice));
            if($cek->num_rows()>0){
                //no action
            }else{
                $this->db->query("INSERT INTO poli_umum (no_invoice,no_registrasi) VALUES ('$invoice','$no_reg') ");
            }
            $data['no_invoice'] = $invoice;
            $data['pasien'] = $this->db->select("pasien.nik,pasien.nama_pasien,registrasi.no_registrasi")->from("registrasi")->join("pasien","pasien.nik=registrasi.nik")->where("registrasi.no_registrasi",$no_reg)->get()->row();

            /*$data['petugas'] = $this->db->query("select petugas.*,job_petugas.* 
                                                from petugas,job_petugas
                                                where petugas.nik_petugas=job_petugas.nik_petugas
                                                and job_petugas.no_invoice='$invoice'");*/
           
            //$data['plant'] = $this->db->select("*")->from("tb_plant")->join("tb_obat","tb_obat.kd_obat=tb_plant.kd_obat")->where("tb_plant.no_invoice",$invoice)->get();

            //$data['tindakan'] = $this->db->select("*")->from("tb_itemgaji")->get();

            $data['pelayanan'] = $this->db->get_where("poli_umum",array('no_invoice'=>$invoice))->row();

            $data['content'] = 'poli_umum/periksa';
            $this->load->view('layouts/main',$data);
        }else $this->error();
    }

    public function mod_petugas(){
        $data['petugas'] = $this->db->get("petugas");
        $data['no_invoice'] = $this->input->post('id');
        echo show_my_modal("poli_umum/modal_petugas","md_petugas",$data);
    }

    public function pilih_petugas($nik,$invoice){
        $data = array(
            'nik_petugas' => $nik,
            'no_invoice' => $invoice,
            //'nominal_tindakan' => $nominal,                    
            );
        $this->db->insert("job_petugas",$data);
    }

    public function hapus_petugas($id){
        if(!empty($id) ){
            $this->db->query("DELETE FROM job_petugas WHERE id_petugas_pelayanan='$id' ");
            redirect('poli_umum/periksa/'.$this->session->userdata('sess_no_reg'));
        }else $this->error();
    }


    public function mod_diagnosa(){
        $data['penyakit'] = $this->db->get("tb_penyakit");
        $data['no_invoice'] = $this->input->post('id');
        echo show_my_modal("poli_umum/modal_diagnosa","md_diagnosa",$data);
    }

    public function pilih_penyakit($kd_penyakit,$invoice){
        if(!empty($kd_penyakit) && !empty($invoice)){
            $cek = $this->db->query("SELECT * FROM tb_diagnosa WHERE no_invoice='$invoice' AND kd_penyakit='$kd_penyakit' ");
            if($cek->num_rows()>0){
                $this->session->set_flashdata("msg","<div class='alert alert-danger alert-dismissible' aria-hidden='true'>
                        <h4><i class='icon fa fa-warning'></i> Failed!</h4>
                        Penyakit sudah dipilih
                    </div>");
            }else{
                $this->db->query("INSERT INTO tb_diagnosa VALUES (NULL,'$invoice','$kd_penyakit') ");
            }
            redirect('poli_umum/periksa/'.$this->session->userdata('sess_no_reg'));
        }else $this->error();
    }

    public function hapus_penyakit($id){
        if(!empty($id)){
            $this->db->query("DELETE FROM tb_diagnosa WHERE id_diagnosa='$id' ");
            redirect('poli_umum/periksa/'.$this->session->userdata('sess_no_reg'));
        }else $this->error();
    }


    public function mod_plant(){
        $data['no_invoice'] = $this->input->post('id');
        echo show_my_modal("poli_umum/modal_plant","md_plant",$data);
    }

    public function load_data_obat(){
        $s_keyword="";
        if (isset($_POST['keyword'])) {
            $s_keyword = $_POST['keyword'];
        }

        $query = $this->db->query("SELECT * FROM tb_obat WHERE nama_obat LIKE '%$s_keyword%' OR kd_obat LIKE '%$s_keyword%' LIMIT 10 ");
        $no =0;
        if($query->num_rows()>0){
            foreach($query->result() as $r){
                
                $no++;

                //$link = base_url('pendaftaran/pilih_pasien/'.$r->kd_obat);
                $link = 'pilih_obat("'.$r->kd_obat.'","'.$r->nama_obat.'","'.$r->harga_obat.'","'.$r->jenis.'")';
                echo 
                    "<tr>
                        <td>".$no."</td>
                        <td>".$r->kd_obat."</td>
                        <td>".$r->nama_obat."</td>
                        <td>".$r->jenis."</td>
                        <td>
                            <a href='javascript:;' onclick='".$link."' title='Detail' class='btn btn-primary btn-xs btn-flat'><i class='fa fa-check-square-o'></i> Pilih</a>
                        </td>
                    </tr>";
            }
        }else{
            echo "<tr><td colspan='5'>Tidak ada data ditemukan</td></tr>";
        }
    }

    public function save_plant(){
        if(isset($_POST) && !empty($_POST)){
            $data = array(
                    'no_invoice' => $this->input->post('no_invoice'),
                    'kd_obat' => $this->input->post('kd_obat'),
                    'qty' => $this->input->post('qty'),
                    'harga_jual' => $this->input->post('harga'),
                );
            $this->db->insert("tb_plant",$data);
            redirect('poli_umum/periksa/'.$this->session->userdata('sess_no_reg'));
        }else $this->error();
    }

    public function hapus_plant($id){
        if(!empty($id)){
            $this->db->query("DELETE FROM tb_plant WHERE id_plant='$id' ");
            redirect('pelayanan/periksa/'.$this->session->userdata('sess_no_reg'));
        }else $this->error();
    }


    public function konfirmasi(){
        if(isset($_POST) && !empty($_POST)){
            $where['no_invoice'] = $this->input->post('id');
            $data['status_pelayanan'] = 'selesai';
            $this->db->update("poli_umum",$data,$where);
            $this->db->update("registrasi",array('status'=>'selesai'),array('no_registrasi'=>$this->session->userdata('sess_no_reg')));
            $this->session->set_flashdata("msg","<div class='alert alert-success alert-dismissible' aria-hidden='true'>
                        <h4><i class='icon fa fa-check'></i> Success!</h4>
                        Konfirmasi Pelayanan Selesai
                    </div>");
            redirect('poli_umum');
        }else $this->error();
    }

    public function entry_data(){
        if(isset($_POST) && !empty($_POST)){
            $where['no_invoice'] = $this->input->post('no_invoice');
            $data = array(
                    'tb' => $this->input->post('tb'),
                    'bb' => $this->input->post('bb'),
                    'lp' => $this->input->post('lp'),
                    'imt' => $this->input->post('imt'),
                    'sistole' => $this->input->post('sistole'),
                    'diastole' => $this->input->post('diastole'),
                    'respiratory_rate' => $this->input->post('rr'),
                    'heart_rate' => $this->input->post('hr'),
                    'keluhan' => $this->input->post('keluhan'),
                    'saran' => $this->input->post('saran'),
                    'tgl_pelayanan' => date('Y-m-d',strtotime($this->input->post('tgl_pelayanan'))),
                    'status_pelayanan' => 'selesai',
                );
            $this->db->update("poli_umum",$data,$where);
            $this->session->set_flashdata("msg","<div class='alert alert-success alert-dismissible' aria-hidden='true'>
                        <h4><i class='icon fa fa-check'></i> Success!</h4>
                        Data pemeriksaan berhasil di simpan
                    </div>");
            redirect('poli_umum/periksa/'.$this->session->userdata('sess_no_reg'));
        }else $this->error();
    }
}


