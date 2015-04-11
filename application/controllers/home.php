<?php

/*
 *
 * @author gaurav
 */

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        session_start();
        $this->load->model('user_model');
        $this->load->model('student_model');
        $this->load->model('teacher_model');
    }

    function about() {
        $this->load->view('about');
    }

    function contactus() {
        $this->load->view('contactus');
    }

    function studenthome_page() {
        $id = $_SESSION['id'];
        $data['out'] = $this->student_model->maximumstudentdata($id);
        $data['dis'] = $this->student_model->displaysubjects();
        $data['name'] = $this->student_model->name($id);
        $this->load->view('stu_home', $data);
    }

    function teacherhome_page() {
        $id = $_SESSION['id'];
        $name = $this->teacher_model->name($id);
        $data['name'] = $name;
        $data['list'] = $this->teacher_model->loadTestData($id);
        $this->load->view('teacherHome', $data);
    }

    function studentmarks($test_id) {
        $id = $_SESSION['id'];
        $data['out'] = $this->student_model->studentdata($id, $test_id);
        $data['tid'] = $id;
        $this->load->view('allmarks', $data);
    }

    function display_subjects() {
        //$data['dis'] = $this->student_model->displaysubjects();
    }

    function graph($subject) {
        $id = $_SESSION['id'];
        //$subject=$_SESSION['option_chosen'];
        $data['dis1'] = $this->student_model->displaygraph($subject, $id);
        $this->load->view('graph', $data);
    }

}
