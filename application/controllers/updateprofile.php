<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Updateprofile extends CI_Controller {

    public function __construct() {
        parent::__construct();
        session_start();
        $this->load->model('user_model');
        $this->load->model('teacher_model');
        //echo "hello";
        //$this->load->model('cvmaker_model_fetch');
        
    }
    function doprofile_submit() {
            $id=$_SESSION['id'];
            $email=$_SESSION['email'];
            $name = $this->input->post('update_name');
            $sex = $this->input->post('update_sex');
            $photo = $this->input->post('update_photo');
            $designation = $this->input->post('update_designation');
            $age = $this->input->post('update_age');
            $success = $this->teacher_model->insert_update($id,$name, $sex,$photo,$designation,$age);
            if ($success== 1) {
                $data = new stdClass();
                $data->success =TRUE;
                $data->errorMsg= "Successfully Added";
                echo json_encode($data);
                $updateprofile=$this->user_model->profile_complete($email);
                redirect(base_url('/home/home_page'));
            } else {
                $data = new stdClass();
                $data->success =FALSE;
                $data->errorMsg= "Oops Something Went Wrong!!";
                echo json_encode($data);
            }
        }
}
