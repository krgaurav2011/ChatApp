<?php



class Index extends CI_Controller {

    public function __construct() {
        parent::__construct();
        session_start();
    }

    public function index() {
        if (isset($_SESSION['email'])) {
            if($_SESSION['type'] == 1)
                redirect(base_url('/home/teacherhome_page'));
            else 
                redirect(base_url('/home/studenthome_page'));
        } else {           
            redirect(base_url('login/dologin'));
        }
    }
        public function logout() {
        if (isset($_SESSION))
            session_destroy();
        redirect(base_url('index'));
    }

}
