<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Events_model extends CI_Model {

    function addNewEvent() {
        $n = $_POST['name'];
        $data = array(
            'name' => $n,
            'description' => $_POST['description'],
            'create_by' => $this->session->userdata['loginname'],
            'event_date' => $_POST['date'],
            'state' => 'NEW',
        );
        if ($this->db->insert('events', $data)) {
            $select = $this->db->select('id')
                    ->where('name', $n)
                    ->get('events');
            $id = $select->row_array();
        }
        $data2 = array(
            'user_id' => $this->session->userdata['id'],
            'event_id' => $id['id'],
        );
        return $this->db->insert('user_has_event', $data2);
    }

    function saveContent($cb, $id, $name) {
        if ($cb == 0) {
            $data = array(
                'equipped' => 0,
                'equipped_by' => '',
            );
        } else {
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

    function getUserEvents() {
        $this->db->select('*');
        $this->db->from('user_has_event');
        $this->db->join('events', 'events.id = user_has_event.event_id');
        $this->db->where('user_has_event.user_id', $this->session->userdata['id']);

        $query = $this->db->get();

        $result = array();
        if ($query->num_rows() > 0){
            
            $result = $query->result_array();
            //print_r($result);
            return $result;
        }else
            return false;

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
    
    function addEventContent($id) {
        $data = array(
            'name' => $_POST['add'],
            'equipped' => 0,
            'event_id' => $id,
        );
        return $this->db->insert('content', $data);
    }
}
