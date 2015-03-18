<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->view('/common/header.php');
        $this->load->view('/common/sub-header.php');
        $this->load->view('/admin/user_list.php');
        $this->load->view('/common/footer.php');
    }

    public function get_all_users() { //Ajax table data for Access Level
        $sLimit = "";
        $lenght = 10;
        $str_point = 0;

        $col_sort = array("id", "fname", "lname", "pin", "email", "dob");
        $order_by = "id";
        $temp = 'asc';
        if (isset($_GET['iSortCol_0'])) {
            $index = $_GET['iSortCol_0'];
            $temp = $_GET['sSortDir_0'] === 'asc' ? 'asc' : 'desc';
            $order_by = $col_sort[$index];
        }
        $this->db->select('id, fname,lname,pin,email,dob');
        if (isset($_GET['sSearch']) && $_GET['sSearch'] != "") {
            $words = $_GET['sSearch'];
            for ($i = 0; $i < count($col_sort); $i++) {
                $this->db->or_like($col_sort[$i], $words, "both");
            }
        }
        $this->db->order_by($order_by, $temp);
        if (isset($_GET['iDisplayStart']) && $_GET['iDisplayLength'] != '-1') {
            $str_point = intval($_GET['iDisplayStart']);
            $lenght = intval($_GET['iDisplayLength']);

            $records = $this->db->get("user", $lenght, $str_point);
        } else {

            $records = $this->db->get("user");
        }
// $this->db->select('status',1);
        $this->db->select('*');
        $this->db->from('user');
        $total_record = $this->db->count_all_results();
// $total_record = $this->db->count_all('access_level');
        $output = array(
            "sEcho" => intval($_GET['sEcho']),
            "iTotalRecords" => $total_record,
            "iTotalDisplayRecords" => $total_record,
            "aaData" => array()
        );
        $result = $records->result_array();
        $i = 0;
        $final = array();
        foreach ($result as $val) {
            $output['aaData'][] = array($val['id'], $val['fname'] . ' ' . $val['lname'], $val['pin'], $val['email'], $val['dob'],'<a class="btn btn-primary" href="#">Edit</a><a class="btn btn-danger">Delete</a>');
        }
        echo json_encode($output);
        die;
    }

}

?>
