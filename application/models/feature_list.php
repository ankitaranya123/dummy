<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Feature_list extends CI_Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function get_feature($acc_id = FALSE) {
        if($acc_id != FALSE)
        {
            $this->db->where('access_id',$acc_id);
        }
       $query = $this->db->select('*')->from('feature_list')
                ->get();
       return $query->result_array();
    }
    
}
