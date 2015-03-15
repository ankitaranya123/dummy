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

    public function get_feature(){
        $featurelist = $this->feature_list->get_feature();
        echo json_encode($featurelist);
    }
    
    public function get_all_access() { //Ajax table data for Access Level
        
        $sLimit = "";
        $lenght = 10;
        $str_point = 0;
       
        $col_sort = array("access_id", "access_name", "created", "action");
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
            if($val['status'] == 1){
                $st = 'Active';
            }
            else{
                $st = 'Deactive';
            }
            $output['aaData'][] = array($val['access_id'], $val['access_name'], $st,$val['created'],'');
        }
        echo json_encode($output);
        die;
    }

}
