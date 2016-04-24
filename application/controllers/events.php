<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('events_model');
        if (!$this->session->userdata('logged_in')) {

            redirect('login');
        }
    }

    function index() {

        $this->load->view('events_view');
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
    
    function saveContent($id){
        $edata = $this->events_model->getEventContent($id); 
        foreach ($edata as $row){
            
            if(isset($_POST[$row['name']])){
               
                $this->events_model->saveContent(1, $id, $row['name']);
            }else{
                $this->events_model->saveContent(0, $id, $row['name']);
            }
            
        }
        $data = $this->events_model->getEventData($id);
        $this->load->view('event_view', $data);
          
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
    
    function addUserForEvent($id){
        $this->load->view('event_view', $this->events_model->getEventData($id));
    }
    
    function addContentForEvent($id){
        if($this->events_model->addEventContent($id)){
            $this->load->view('event_view', $this->events_model->getEventData($id));
        }else {
            echo 'delete event denied.';
        }
        $this->load->view('event_view', $this->events_model->getEventData($id));
    }

    
    
}

?>
