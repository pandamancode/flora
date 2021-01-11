<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

	function __construct(){
		parent::__construct();

		if ($this->session->userdata('uname')==""){
			redirect('login');
		}
	}

	public function index()
	{
        $this->session->unset_userdata('uname');
        $this->session->unset_userdata('level');
        session_destroy();
        redirect('login');
	}
}