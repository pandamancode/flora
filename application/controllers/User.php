<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    public function __construct(){
        parent::__construct();
        
        if($this->session->userdata('username')==''){
            redirect('Web');
        }
        
    }

	public function index()
	{  
        $db = $this->db;
        $title = 'Rubah Password';
        // $pegawai = $db->get('tpegawai')->result_array();
        
        $this->load->view('master/editpass',get_defined_vars());
	}

    function ubah_password(){
        $db = $this->db;
        $input = $this->input;
        $id = $this->session->userdata('id_user');
        $pl = $input->post('passwordlama');

        $peg = $db->get_where('tb_users', ['password' => $pl])->row_array();

        if ($peg) {
            if ($pl == $peg['password']){
                $data = array(
                'password' => $this->input->post('passwordbaru')
                );

                $where = array('id_user' => $id);
            // $this->load->model('Mymodel');
                $this->db->Update('tb_users', $data, $where);

                $this->session->set_flashdata("msg","
                <div class='alert alert-info fade in'>
                    <a href='#' class='close' data-dismiss='alert'>&times;</a>
                    <strong>Ubah password suksess...</strong>
                </div>");
                header('location:'.base_url().'Web');
            }
        }else{
            $this->session->set_flashdata("msg","
                <div class='alert alert-danger fade in'>
                    <a href='#' class='close' data-dismiss='alert'>&times;</a>
                    <strong>password lama salah...</strong>
                </div>");
            header('location:'.base_url().'User');
        }

            
        
    }
}