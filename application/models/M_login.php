<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class M_login extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

   public function checkLogin($username, $password){
        $sql = "SELECT * FROM user
                WHERE username = '$username' AND password = '$password'";
        return $this->db->query($sql);
   }

}