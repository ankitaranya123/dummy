<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('login_model');
    }

    public function index() {
        $this->form_validation->set_rules('email_address', 'Email', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check');
        if ($this->form_validation->run() == FALSE && $this->session->userdata('logged_in') == FALSE) {
            $this->load->view('/common/header.php');
            $this->load->view('/login.php');
            $this->load->view('/common/footer.php');
        } else {
//               var_dump($this->session->userdata('logged_in'));
//                $this->session->unset_userdata('logged_in');  
            redirect('home');
        }
    }

    public function checkLogin() {

        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $email = $request->email;
        $password = md5($request->password);
        $res = $this->login_model->check_login($email, $password);
        $this->session->set_userdata('logged_in', $res);
        if ($res) {
            echo '1';
        } else {
            echo '0';
        }
    }

    public function register() {

        $this->load->view('/common/header.php');
        $this->load->view('/register.php');
        $this->load->view('/common/footer.php');
    }

    public function doRegister() {

        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $arrData = array("fname" => $request->fname,
            "lname" => $request->lname,
            "city" => $request->city,
            "state" => $request->state,
            "country" => $request->country,
            "pin" => $request->pincode,
            "contact" => $request->contact,
            "access_level" => $request->access_level->access_id,
            "email" => $request->email,
            "password" => md5($request->password),
            "dob" => date("Y-m-d", strtotime($request->dob)),
        );
        $res = $this->login_model->registerUser($arrData, $request->email);
        if ($res) {
            echo '1';
        } else {
            echo '0';
        }
    }
    
    public function get_acceslevel(){
        
        $res=$this->login_model->getAcessLevel();
        echo json_encode($res);
        die;
        
    }

    public function logout() {
        $this->session->unset_userdata('logged_in');
        redirect('login');
    }

}

?>
