<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		
		//print_r($this->session->userdata);
		
	}
	
	function index(){
		
		$this->load->view('main_view'); 
		
	}
}

?>