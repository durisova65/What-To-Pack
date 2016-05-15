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

    function getUserEvents($id) {
        $select = $this->db->select('event_id')
                ->where('user_id', $id)
                ->get('user_has_event');
        if ($select->num_rows() > 0) {
            return $select->result_array();
        } else {
            return false;
        }
    }
    
    function getUserData($id) {
        $select = $this->db->select('*')
                ->where('id', $id)
                ->limit(1)
                ->get('users');

        if ($select->num_rows() > 0) {
            return $select->row_array();
        } else {
            return false;
        }
    }

    function getUserEventsUsers() {
//        $this->db->select('*');
//        $this->db->from('user_has_event');
//        $this->db->join('users', 'users.id = user_has_event.user_id');
//        $this->db->join('users', 'users.id = user_has_event.user_id');
//        $this->db->where('user_has_event.user_id', $this->session->userdata['id']);
//
//        $query = $this->db->get();

        $sql = "select user_id from "
                . "(SELECT user_has_event.event_id FROM `user_has_event` JOIN users ON users.id = user_has_event.user_id WHERE users.id = 6) AS user_event "
                . "JOIN user_has_event ON user_has_event.event_id = user_event.event_id "
                . "GROUP BY user_id";
        $query = $this->db->query($sql);

        $result = array();
        if ($query->num_rows() > 0) {

            $result = $query->result_array();
            //print_r($result);
            return $result;
        } else
            return false;
    }

    function deleteUser($id) {
        $select = $this->db->select('*')
                ->where('id', $id)
                ->get('users');
        if ($select->num_rows() > 0) {
            $this->db->delete('users', array('id' => $id));
            return true;
        } else {
            echo 'event nie je v db';
            return false;
        }
    }

}
