<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct(){
        parent::__construct();
        // load base_url
        $this->load->helper('url');
        $this->load->model(array('M_User'  => 'user'));
    }

    public function index(){
        $this->load->view('v_user');
    }

    // Check username availability
    public function checkUsername(){
        $data = json_decode(file_get_contents("php://input"));
        // Username
        $username = $data->username;
        // Check
        $response = $this->user->checkUsername($username);
        echo $response;
    }

    // Insert user
    public function saveUserDetails(){
        $data = json_decode(file_get_contents("php://input"));
        $response = $this->user->saveUserDetails($data);
        echo $response;
    }
}
