<?php

/**
 * Description of register
 *
 * @author gaurav
 */
class registerClass extends CI_Controller {

    public function __construct() {
        parent::__construct();
        session_start();
        $this->load->model('user_model');
        //$this->load->model('cvmaker_model_fetch');
        
    }
    function register() {
       
        //echo "helleo";
        $this->load->view('register');
        
    }
    function register_submit() {
        $this->form_validation->set_rules('register_email', 'Email', 'trim|required|xss_clean|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('register_password', 'Password', 'min_length[8]|max_length[20]|matches[register_passconf]|required');
        $this->form_validation->set_rules('register_passconf', 'Password Confirmation', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data = new stdClass();
            $data->success =FALSE;
            $data->errorMsg= "Recheck your Entries!!";
            echo validation_errors();
           // $this->load->view('login');
        } else {
            $email = $this->input->post('register_email');
            $password = md5($this->input->post('register_password'));
            $type= $this->input->post('type');
            $success = $this->user_model->insert_user($email, $password,$type);
            if ($success == 1) {
               //$this->load->view('register_success');
                $data = new stdClass();
                $data->success =TRUE;
                $data->errorMsg= "Successfully Added";
                echo json_encode($data);
                echo "<a href=  ". base_url('ontest/login') . "> Login</a>" ;
                //echo json_encode($data);
            } else {
              //  $this->load->view('login');
                $data = new stdClass();
                $data->success =FALSE;
                $data->errorMsg= "Oops Something Went Wrong!!";
                echo json_encode($data);
            }
            
        }
    }
    function register_success()
    {
        $this->load->view('register_success');
    }
}
