<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('users_model');
        if (!$this->session->userdata('logged_in')) {

            redirect('login');
        }
    }

    function index() {
        $this->load->view('users_view');
    }
    
    
    function deleteUser($id){
        if($this->events_model->deleteUser($id)){
            redirect('users');
        }else {
            echo 'delete event denied.';
        }
        $this->load->view('users_view');
    }

}
