<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_User extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    // Check username
    function checkUsername($username=""){
    	// Check username
        $this->db->select('count(*) as allcount');
        $this->db->where('username',$username);
        $user_record = $this->db->get('users');
        $result = $user_record->result_array();
        $allcount = $result[0]['allcount'];
        return $allcount;
    }

    // Insert user
    function saveUserDetails($postdata){
        $name = $postdata->name;
        $username = $postdata->username;
        $email = $postdata->email;
        $password = $postdata->password;
        // Check username
        $this->db->select('count(*) as allcount');
        $this->db->where('username',$username);
        $user_record = $this->db->get('users');
        $result = $user_record->result_array();
        if($result[0]['allcount'] == 0){
            $data = array(
                    'username' => $username,
                    'name' => $name,
                    'email' => $email,
                    'password' => $password
                );
            $this->db->insert('users',$data);
            return 1;
        }
        return 0;
    }

}