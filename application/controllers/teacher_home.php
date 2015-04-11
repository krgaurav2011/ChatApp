<?php

class Teacher_home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        session_start();
        $this->load->model('teacher_model');
    }

    public function teacherHome() {
        $id = $_SESSION['id'];
        $name = $this->teacher_model->name($id);
        $data['name'] = $name;
        $data['list'] = $this->teacher_model->loadTestData($id);
        $this->load->view('teacherHome', $data);
    }

}
