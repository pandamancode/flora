<?php
 
class Web extends CI_Controller{
 
    public function __construct(){
        parent::__construct();
        
        $this->load->library('form_validation');
    }
 
    function index(){
        $input = $this->input;
        $title = 'Form Login';

        $username = $input->post('username');
        $password = $input->post('password');

        if ($username&&$password != null) {
            $this->login();
        }
        $this->load->view('login', get_defined_vars());
       
    }
 
    private function login(){
        $db = $this->db;
        $input = $this->input;

        $username = $input->post('username');
        $password = $input->post('password');
        // $password = md5($input->post('password'));

        $peg = $db->get_where('tb_users', ['username' => $username])->row_array();

        if ($peg) {
            // if (password_verify($password, $peg['password'])) {
            if ($password == $peg['password']) {
                # code...
                $this->session->set_flashdata("msg","
                        <div class='alert alert-success fade in'> 
                            <a href='#' class='close' data-dismiss='alert' role='alert'>&times;</a>                           
                            <strong>... Login Berhasil !!...</strong>
                        </div> 
                        ");
                // redirect('Web');
                $data = [   
                            'id_user'=>$peg['id_user'],
                            'nama_user'=>$peg['nama_user'],
                            'username' => $peg['username'],
                            'level' => $peg['level']
                        ];
                $this->session->set_userdata($data);

                redirect('Home');
                    

            }else{
                $this->session->set_flashdata("msg","
                        <div class='alert alert-danger fade in'> 
                            <a href='#' class='close' data-dismiss='alert' role='alert'>&times;</a>                           
                            <strong> Password Tidak Sesuai !!.. </strong>
                        </div> 
                        ");
                redirect('Web');
            }
            # code...
        }else{
            $this->session->set_flashdata("msg","
                        <div class='alert alert-danger fade in'> 
                            <a href='#' class='close' data-dismiss='alert' role='alert'>&times;</a>                           
                            <strong> Username Tidak Terdaftar </strong>
                        </div> 
                        ");
            redirect('Web');
        }

        // var_dump($kar); die();
        
    }
 
    function logout(){
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('tipeuser');

        $this->session->set_flashdata("msg","
                <div class='alert alert-success fade in'> 
                    <a href='#' class='close' data-dismiss='alert' role='alert'>&times;</a>                           
                    <strong>... Terimakasih !!...</strong>
                </div> 
                ");
        redirect('Web');

    }
}
