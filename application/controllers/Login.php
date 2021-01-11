<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('login');
	}

	public function auth(){
	    if(isset($_POST) && !empty($_POST)){
	        $where = array(
	                'uname' => addslashes($this->input->post('username_txt')),
	                'password' => md5($this->input->post('password_txt')),
	            );
	        $cek_login = $this->db->get_where("users",$where);
	        if($cek_login->num_rows()>0){
	            $now = date('Y-m-d H:i:s');
	            $uname = $this->input->post('username_txt');
	            $this->db->query("UPDATE users SET last_login='$now' WHERE uname='$uname' ");
	            foreach($cek_login->result() as $sess){    				    
				    $sess_data = array(
        				'id_user' => $sess->id_user,
        				'nama' => $sess->nama,
        				'uname' => $sess->uname,
        				'last_login' => $sess->last_login,
        				'level' => $sess->level,
        			);
    				$this->session->set_userdata($sess_data);
    				
    				redirect('home');
			    }
	        }else{
	            redirect('login');
	        }
	        
	    }else redirect('login');
	}

}