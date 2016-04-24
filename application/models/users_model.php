<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {

    function getEventData($id) {
        $select = $this->db->select('*')
                ->where('id', $id)
                ->limit(1)
                ->get('events');

        if ($select->num_rows() > 0) {
            return $select->row_array();
        } else {
            return false;
        }
    }

    function getAllUsers() {
        $select = $this->db->select('*')->get('users');

        if ($select->num_rows() > 0) {
            return $select->result_array();
        } else {
            return false;
        }
    }
    
    function getUserEventsUsers($name) {
        $select = $this->db->select('*')
                ->where('create_by', $name)
                ->get('events');

        if ($select->num_rows() > 0) {
            return $select->result_array();
        } else {
            return false;
        }
    }
    
    function deleteUser($id){
        $select = $this->db->select('*')
                ->where('id', $id)
                ->get('events');
        if ($select->num_rows() > 0) {
            $this->db->delete('events', array('id' => $id)); 
            return true;
        } else {
            echo 'event nie je v db';
            return false;
        }
    }

}

