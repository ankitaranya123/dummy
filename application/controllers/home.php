<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {

        $this->load->view('/common/header.php');
        $this->load->view('/dashboard.php');
        $this->load->view('/common/footer.php');
    }

}

