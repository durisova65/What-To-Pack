<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

    function registration() {
        $data = array(
            'loginname' => $_POST['login'],
            'name' => $_POST['name'],
            'surname' => $_POST['surname'],
            'email' => $_POST['email'],
            'password' => sha1($_POST['password']),
            'role_id' => 2,
        );

        return $this->db->insert('users', $data);
    }

    function check() {
        $select = $this->db->where('loginname', $_POST['login'])
                ->where('password', sha1($_POST['password']))
                ->get('users');

        return $select->num_rows();
    }

    function getUserData($login) {
        $select = $this->db->select('*')
                ->where('loginname', $login)
                ->limit(1)
                ->get('users');

        if ($select->num_rows() > 0) {
            return $select->row_array();
        } else {
            return false;
        }
    }

}
