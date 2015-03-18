<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class updateInfo extends CI_Controller{
    public function __construct() {
        parent::__construct();
        session_start();
        $this->load->model('user_model');
        $this->load->model('student_model');
        $this->load->model('teacher_model');
    }
    
    function dostudentInfo(){
        $this->load->view('ProfileUpdate_Student');
    }
    function dostudentInfoUpdate(){
        $id=$_SESSION['id'];
        $email=$_SESSION['email'];
        $name=  $this->input->post('student_name');
        $age=  $this->input->post('student_age');
        $education=  $this->input->post('student_education');
        $gender=  $this->input->post('student_sex');
        $update=$this->student_model->UpdateStudentInfo($id,$name,$age,$education,$gender);
        echo "Successfully updated database";
        $profile_update=$this->user_model->profile_complete($email);
        redirect(base_url('home/home_page'));
    }
    function doteacherInfo(){
        $this->load->view('updateprofile');
    }
    function doteacherInfoUpdate() {
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
            }
            else {
            $data = new stdClass();
            $data->success =FALSE;
            $data->errorMsg= "Oops Something Went Wrong!!";
            echo json_encode($data);
            }
        }
}