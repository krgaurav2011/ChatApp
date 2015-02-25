<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class ontest extends CI_Controller{
    public function __construct() {
        parent::__construct();
        session_start();
    }    
    public function index()
	{
        echo "hrllo";
        if (isset($_SESSION['email'])) {
            redirect(base_url('/ontest/home_page'));
        } else {
            redirect(base_url('/ontest/login'));
        }
		//$this->load->view('welcome_message');
	}
    public function home_page() {
        $this->load->view('home_page');
    
    }
    public function login(){
        //echo "hrllo";
        $this->load->view('login');
    }
}
