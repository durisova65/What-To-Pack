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

    function addNewEvent() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Event name', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');
        $this->form_validation->set_rules('date', 'Date', 'trim|required');

        // ak prejde validaciou a uspesne sa zaregistruje
        if ($this->form_validation->run()) {
            if ($this->events_model->addNewEvent()) {
                redirect('events');
            } else {
                echo 'add event denied.';
            }
        }

        $this->load->view('addNewEvent_view');
    }
    
    function displayEvent($id){
        $data = $this->events_model->getEventData($id);
        $this->load->view('event_view', $data);
        
    }
    
    function deleteEvent($id){
        if($this->events_model->deleteEvent($id)){
            redirect('events');
        }else {
            echo 'delete event denied.';
        }
        
        $this->load->view('event_view', $this->events_model->getEventData($id));
    }

}
