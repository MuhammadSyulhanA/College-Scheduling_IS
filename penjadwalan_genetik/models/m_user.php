<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_User extends CI_Model {
    public $variable;
    public function __construct(){
        parent::__construct();

    }
	
	function GetUser($data) {
        $query = $this->db->get_where('user', $data);
        return $query;
	}
	
	function get(){
		$rs = $this->db->query("SELECT * FROM user");
		return $rs;
	}
	
	function ambUser($where = ""){
		$query = $this->db->query("SELECT * FROM user", $where);
		return $query;
	}
	
	public function Update($table,$data,$where){
        return $this->db->update($table,$data,$where);
    }


	
}
?>