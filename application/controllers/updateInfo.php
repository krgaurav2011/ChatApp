<?php

class updateInfo extends CI_Controller {

    public function __construct() {
        parent::__construct();
        session_start();
        $this->load->model('user_model');
        $this->load->model('student_model');
        $this->load->model('teacher_model');
    }

    function dostudentInfo() {
        $this->load->view('ProfileUpdate_Student');
    }

    function dostudentInfoUpdate() {
        $id = $_SESSION['id'];
        $email = $_SESSION['email'];
        $name = $this->input->post('student_name');
        $age = $this->input->post('student_age');
        $education = $this->input->post('student_education');
        $gender = $this->input->post('student_sex');
        $ifexist = $this->student_model->name($id);
        if ($ifexist == NULL) {
            $update = $this->student_model->UpdateStudentInfo($id, $name, $age, $education, $gender);
            echo "Successfully updated database";
            $profile_update = $this->user_model->profile_complete($email);
            redirect(base_url('home/studenthome_page'));
        } else {
            $update = $this->student_model->UpdateExistingStudentInfo($id, $name, $age, $education, $gender);
            redirect(base_url('home/studenthome_page'));
        }
    }

    function doteacherInfo() {
        $this->load->view('newTeacherProfile');
    }

    function existingTeacherInfo() {
        $this->load->view('updateTeacherProfile');
    }

    function updateExistingTeacher() {
        $id = $_SESSION['id'];
        $name = $this->input->post('update_name');
        $sex = $this->input->post('update_sex');
        $photo = $this->input->post('update_photo');
        $designation = $this->input->post('update_designation');
        $age = $this->input->post('update_age');
        $success = $this->teacher_model->update_Existing($id, $name, $sex, $designation, $age);
        if ($success == 1) {
            $updateprofile = $this->user_model->profile_complete($email);
            redirect(base_url('/teacher_home/teacherHome'));
        }
    }

    function doteacherInfoUpdate() {
        $id = $_SESSION['id'];
        $email = $_SESSION['email'];
        $name = $this->input->post('update_name');
        $sex = $this->input->post('update_sex');
        $photo = $this->input->post('update_photo');
        $designation = $this->input->post('update_designation');
        $age = $this->input->post('update_age');
        $success = $this->teacher_model->insert_update($id, $name, $sex, $photo, $designation, $age);
        if ($success == 1) {
            $updateprofile = $this->user_model->profile_complete($email);
            redirect(base_url('/home/teacherhome_page'));
        }
    }

}
