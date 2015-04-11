<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login
 *
 * @author gaurav
 */
class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        session_start();
        $this->load->model('user_model'); 
        $this->load->model('student_model');
    }
     function dologin() {
        if (isset($_SESSION['email'])) {
            redirect(base_url('home/home_page'));
        } else {
            $this->load->view('login');
        }
    }
    function dologin_submit() {
        $this->form_validation->set_rules('login_email', 'Email', 'trim|required|xss_clean|valid_email');
        $this->form_validation->set_rules('login_password', 'Password', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $data = new stdClass();
            $data->success =FALSE;
            $data->errorMsg= "Recheck your Entries!!";
            echo validation_errors();
        } else {
            $email = $this->input->post('login_email');
            $password = md5($this->input->post("login_password"));
            $out = $this->user_model->check_user($email, $password);
            if ($out->num_rows == 1) {
                $row = $out->result();
                $_SESSION['email'] = $email;
                $_SESSION['id'] = $row[0]->id;
                $data = new stdClass();
                $data->success =TRUE;
                $data->errorMsg= "Login Successful!!";
                
                    $profile = $row[0]->profile_complete;
                    if($row[0]->check_user_type=='Teacher'){
                        $_SESSION['type'] = 1;
                	if(($profile)==1){
                            $data->loc = base_url('home/teacherhome_page');
                	}
                	else{
                            $data->loc = base_url('updateInfo/doteacherInfo');
                	}
                    }
                    else if($row[0]->check_user_type=="Student"){
                        $_SESSION['type'] = 2;
			if($profile==1){
			 $data->loc = base_url('home/studenthome_page');
			}
			else{
			 $data->loc = base_url('updateInfo/dostudentInfo');     	
                	}
                    }
                 echo json_encode($data);
                }
                else {
                $data = new stdClass();
                $data->success =FALSE;
                $data->errorMsg= "Incorrect Email-Password Combination!!";
                echo json_encode($data);
                }
            }
        }
    }
