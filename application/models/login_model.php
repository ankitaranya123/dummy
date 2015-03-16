<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Login_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function check_login($email, $password) {

        $this->db->where(array("email" => $email, "password" => $password));
        $this->db->select('fname,lname,email,access_level');
        $this->db->from('user');
        $res = $this->db->get();
        if ($res->num_rows() > 0) {
            return $res->result_array();
        } else {
            return FALSE;
        }
    }

    public function registerUser($arrData = array(), $email) {

        $res = $this->db->get_where('user', array("email" => $email));
        if ($res->num_rows() > 0) {
            return FALSE;
        } else {
            $res1 = $this->db->insert('user', $arrData);
            return $res1;
        }
    }

}

?>
