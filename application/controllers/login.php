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
    
    public function index(){
         $this->form_validation->set_rules('email_address', 'Email', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check');
        if ($this->form_validation->run() == FALSE && $this->session->userdata('logged_in') == FALSE) {
            $this->load->view('/common/header.php');
            $this->load->view('/login.php');
            $this->load->view('/common/footer.php');
        } else {
//               var_dump($this->session->userdata('logged_in'));
//                $this->session->unset_userdata('logged_in');  
            redirect('mdb');
        }
    }

   public function checkLogin(){
       
      $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    $email = $request->email;
    $password = $request->password;
    $res = $this->login_model->check_login($email,$password);
      if($res){
          echo '1';
      }else{
          echo '0';
      }
    
   } 
}

?>
