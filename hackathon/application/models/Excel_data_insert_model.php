<?php
class Excel_data_insert_model extends CI_Model {
 
    public function  __construct() {
        parent::__construct();
        
    }
	
public function Add_Students($data_user){
$this->db->insert('students_temp', $data_user);
   }
  
	
}
 
?>