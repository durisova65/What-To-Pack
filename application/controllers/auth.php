<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('auth_model');
    }

    function registration() {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('login', 'Login name', 'trim|required');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('surname', 'Surname', 'trim|required');
        $this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]');
        $this->form_validation->set_rules('password2', 'Password2', 'trim|required|min_length[4]|matches[password]');
        $this->form_validation->set_error_delimiters('<p class="validation_error">', '</p>');

        // ak prejde validaciou a uspesne sa zaregistruje
        if ($this->form_validation->run() ){
            if($this->auth_model->registration()) {
            // ulozime
                $data = $this->auth_model->getUserData($_POST['login']);
                $data['logged_in'] = true;

                $this->session->set_userdata($data);
                redirect('events');
//              $this->load->view('success_view'); 
            }else {
                echo 'registration denied.';
            } 
        }else

        $this->load->view('registration_view');
    }

    function login() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('login', 'Login name', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        // ak prejde validaciou
        if ($this->form_validation->run()) {
            // skontrolujeme ci sa nachadza v db
            if ($this->auth_model->check()) {
                //vytvorime session
//                echo '<pre>';
//                print_r($this->session->userdata);
//                echo '</pre>';

                $data = $this->auth_model->getUserData($_POST['login']);
                $data['logged_in'] = true;

                $this->session->set_userdata($data);

//                echo '<pre>';
//                print_r($this->session->userdata);
//                echo '</pre>';
                redirect('events');
            } else {
                echo 'Nie si zaregistrovany.';
            }
        } else {
            // hodilo chybu
        }

        $this->load->view('login_view');
    }

    function logout() {
        $this->session->unset_userdata(array('id', 'loginname', 'name', 'surname', 'email', 'logged_in'));
        redirect('main');
        //$this->load->view('main');
    }

}
