<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Index extends CI_Controller {

    public function __construct() {
        parent::__construct();
        session_start();
    }

    public function index() {
        //echo "hrllo";
        if (isset($_SESSION['email'])) {
            redirect(base_url('/home/home_page'));
        } else {
           
            redirect(base_url('login/dologin'));
        }
    }
    function logout() {
        if (isset($_SESSION))
            session_destroy();
        redirect(base_url('index'));
    }

   

}
