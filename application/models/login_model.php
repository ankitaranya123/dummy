<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Login_model extends CI_Model{
    
    public function __construct() {
        parent::__construct();
    }
    
   public function check_login($email,$password){
       
       $this->db->where(array("email"=>$email,"password"=>$password));
       $res=$this->db->get('login');
       if($res->num_rows() > 0){
           return TRUE;
       }else{
           return FALSE;
       }
   }
    
}

?>
