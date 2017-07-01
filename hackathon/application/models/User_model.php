<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user_model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }
	
	function get_user($userid, $pwd)
	{
		$this->db->where('userid', $userid);
	  //$this->db->where('password', md5($pwd));
	    $this->db->where('password', ($pwd));
        $query = $this->db->get('user');
		return $query->result();
	}
	
	// get user
	function get_user_by_id($id)
	{
		$this->db->where('id', $id);
        $query = $this->db->get('user');
		return $query->result();
	}
	
	// insert
	function insert_user($data)
    {
		return $this->db->insert('user', $data);
	}

	function update_user($userid, $old_password, $data) 
	{

	    $this->db->where('userid', $userid);
	    $this->db->where('password', $old_password);
	    return $this->db->update('user', $data);

	}

	function get_areaid_by_userid($userid)
	{
		$this->db->where('userid', $userid);
        $query = $this->db->get('vw_area_teacher_list');
		return $query->result();
	}

}?>