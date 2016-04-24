<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Events_model extends CI_Model {

    function addNewEvent() {
        $data = array(
            'name' => $_POST['name'],
            'description' => $_POST['description'],
            'create_by' => $this->session->userdata['loginname'],
            'event_date' => $_POST['date'],
            'state' => 'NEW',
        );

        return $this->db->insert('events', $data);
    }

    function saveContent($cb, $id,$name) {
        if ($cb == 0) {
            $data = array(
                'equipped' => 0,
                'equipped_by' => '',
            );
        }else{
            $data = array(
            'equipped' => 1,
            'equipped_by' => $this->session->userdata['loginname'],
        );
        }
        
        $this->db->where('event_id', $id);
        $this->db->where('name', $name);
         $this->db->update('content', $data);
    }

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

    function getAllEvents() {
        $select = $this->db->select('*')->get('events');

        if ($select->num_rows() > 0) {
            return $select->result_array();
        } else {
            return false;
        }
    }

    function getUserEvents($name) {
        $select = $this->db->select('*')
                ->where('create_by', $name)
                ->get('events');

        if ($select->num_rows() > 0) {
            return $select->result_array();
        } else {
            return false;
        }
    }

    function deleteEvent($id) {
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

    function getEventContent($id) {
        $select = $this->db->select('*')
                ->where('event_id', $id)
                ->get('content');

        if ($select->num_rows() > 0) {
            return $select->result_array();
        } else {
            return false;
        }
    }

}
