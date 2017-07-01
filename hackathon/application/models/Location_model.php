<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class location_model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }
	
	function getAllGroups()
        {

            $query = $this->db->query('SELECT location_name FROM locations');

            foreach ($query->result() as $row)
            {
                echo $row->location_name;
            }
        }
}?>