<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Feature_list extends CI_Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function get_feature() {
       $query = $this->db->select('*')->from('feature_list')
                ->get();
       return $query->result_array();
    }
    
}
