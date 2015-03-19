<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('acc_level');
        $this->load->model('feature_list');
    }

    public function index() {

        $this->load->view('/common/header.php');
        $this->load->view('/common/sub-header.php');
        $this->load->view('/dashboard.php');
        $this->load->view('/common/footer.php');
    }

    public function access_level() {
        $this->load->view('/common/header.php');
        $this->load->view('/common/sub-header.php');
        $this->load->view('/admin/access_level.php');
        $this->load->view('/common/footer.php');
    }

    public function create_access() {
        $this->load->view('/common/header.php');
        $this->load->view('/common/sub-header.php');
        $this->load->view('/admin/access_level.php');
        $this->load->view('/common/footer.php');
    }

    public function get_access_relation($acc_id) {
        $this->db->select('feature_id');
        $res = $this->db->get_where('acc_fea_rel', array('access_id' => $acc_id));
        $out = array();
        if ($res->num_rows() > 0) {
            $data = $res->result_array();
            foreach ($data as $key => $value) {
                $out[$value['feature_id']] = true;
            }
        }
        echo json_encode($out);
        die;
    }

    public function add_access() {
        $postdata = file_get_contents("php://input");
        $data = json_decode($postdata);
        if (isset($data->access_id) && $data->access_id < 0) {
            $res = $this->db->get_where('access_level', array('access_name' => $data->access_name));
            if ($res->num_rows() == 0) {
                $this->db->insert('access_level', array('access_name' => $data->access_name));
                $acc_id = $this->db->insert_id();

                foreach ($data->feature_id as $key => $val) {
                    if ($val == 'true')
                        $this->db->insert('acc_fea_rel', array('access_id' => $acc_id, 'feature_id' => $key));
                }
                $result = array('status' => '1', 'msg' => 'Access Level created');
            } else {
                $result = array('status' => '0', 'msg' => 'Access Name is allready exist.');
            }
            echo json_encode($result);
        } else {
            $res = $this->db->get_where('access_level', array('access_name' => $data->access_name, 'access_id !=' => $data->access_id));
            if ($res->num_rows() == 0) {
                $this->db->where('access_id', $data->access_id);
                $this->db->update('access_level', array('access_name' => $data->access_name));

                $this->db->delete('acc_fea_rel', array('access_id' => $data->access_id));

                foreach ($data->feature_id as $key => $val) {
                    if ($val == 'true')
                        $this->db->insert('acc_fea_rel', array('access_id' => $data->access_id, 'feature_id' => $key));
                }
                $result = array('status' => '1', 'msg' => 'Access Level updated');
            } else {
                $result = array('status' => '0', 'msg' => 'Access Name is allready exist.');
            }
            echo json_encode($result);
        }
    }

    public function get_feature() {
        $featurelist = $this->feature_list->get_feature();
        echo json_encode($featurelist);
    }

    public function access_delete($id) {

        $this->db->delete('acc_fea_rel', array('access_id' => $id));
        $this->db->delete('access_level', array('access_id' => $id));
    }

    public function get_all_access() { //Ajax table data for Access Level
        $sLimit = "";
        $lenght = 10;
        $str_point = 0;

        $col_sort = array("access_id", "access_name", "created", "status");
        $order_by = "access_id";
        $temp = 'asc';
        if (isset($_GET['iSortCol_0'])) {
            $index = $_GET['iSortCol_0'];
            $temp = $_GET['sSortDir_0'] === 'asc' ? 'asc' : 'desc';
            $order_by = $col_sort[$index];
        }
        $this->acc_level->db->select('access_id, access_name, created,status');
        if (isset($_GET['sSearch']) && $_GET['sSearch'] != "") {
            $words = $_GET['sSearch'];
            for ($i = 0; $i < count($col_sort); $i++) {
                $this->acc_level->db->or_like($col_sort[$i], $words, "both");
            }
        }
        $this->acc_level->db->order_by($order_by, $temp);
        if (isset($_GET['iDisplayStart']) && $_GET['iDisplayLength'] != '-1') {
            $str_point = intval($_GET['iDisplayStart']);
            $lenght = intval($_GET['iDisplayLength']);

            $records = $this->acc_level->db->get("access_level", $lenght, $str_point);
        } else {

            $records = $this->acc_level->db->get("access_level");
        }
// $this->db->select('status',1);
        $this->db->select('*');
        $this->db->from('access_level');
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
            if ($val['status'] == 1) {
                $st = '<lable class="label label-info">Active</lable>';
            } else {
                $st = '<lable class="lable lable-error">Deactive</lable>';
            }
            $output['aaData'][] = array($val['access_id'], $val['access_name'], $st, $val['created'], '<a class="btn btn-primary edt" href="#" data-id="' . $val['access_id'] . '">Edit</a><a data-id="' . $val['access_id'] . '" class="btn btn-danger del">Delete</a>');
        }
        echo json_encode($output);
        die;
    }

}
