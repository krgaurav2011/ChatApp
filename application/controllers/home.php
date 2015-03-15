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
        //$this->load->model('cvmaker_model_fetch');
    }
    function home_page() {
        $this->load->view('home');
    }
        
    
}