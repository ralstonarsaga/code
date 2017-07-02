<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class data extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');
		$this->load->library('grocery_CRUD');
		$this->load->library('ajax_grocery_CRUD');
		$this->load->model('user_model');
		$this->load->library('session');
		$this->load->library('twilio');
		 
		if (!$this->session->userdata('uid')) 
		{
        	 return redirect('login');
    	}
	}

	public function index()
	{
		$this->_data_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}


	public function _data_output($output = null)
	{
		$this->load->view('main_view.php',(array)$output);
	}


     public function raw_mat_management()
	{
			$crud = new grocery_CRUD();

			//$crud->set_theme('datatables');

			$crud->set_table('raw_material');
			$crud->set_subject('Raw Material');
			$crud->required_fields('raw_mat_name','raw_mat_desc','raw_mat_min_ord_qty','raw_mat_price_id','raw_mat_uom_id');
			$crud->columns('raw_mat_name','raw_mat_desc','raw_mat_price_id','raw_mat_cat_id','raw_mat_min_ord_qty','raw_mat_uom_id');
			//$crud->where('a_status','Active');
			
			$crud->display_as('raw_mat_name','Raw Material')
			     ->display_as('raw_mat_desc','Raw Mat Desc')
			     ->display_as('raw_mat_cat_id','Category')
			     ->display_as('raw_mat_price_id','Price')
			     ->display_as('raw_mat_uom_id','UOM')
			     ->display_as('raw_mat_min_ord_qty','Min Ord Qty');

		    $crud->set_relation('raw_mat_cat_id','raw_mat_cat','{raw_mat_cat_name}');
		    $crud->set_relation('raw_mat_uom_id','raw_mat_uom','{raw_mat_uom_name}');


        	$output = $crud->render();

			$this->_data_output($output);
	}

	 public function reward_management()
	{
			$crud = new grocery_CRUD();

			//$crud->set_theme('datatables');

			$crud->set_table('reward');
			$crud->set_subject('Rewards');
			$crud->required_fields('reward_name','reward_desc');
			$crud->columns('reward_name','reward_desc');
			//$crud->where('a_status','Active');
			
			$crud->display_as('reward_name','Reward Name')->display_as('reward_desc','Reward Desc');


        	$output = $crud->render();

			$this->_data_output($output);
	}



	public function user_management()
	{
			$crud = new grocery_CRUD();
			$crud->set_table('user');
			$crud->set_subject('User');

			$crud->columns('userid','email','fname','lname','password','access_key');
		
			$crud->display_as('userid','UserID')->display_as('email','Email-Address')->display_as('fname','FirstName')
			     ->display_as('lname','LastName')->display_as('password','Password')->display_as('access_key','Access-Key');

			$crud->change_field_type('password', 'password');

			$crud->field_type('access_key','dropdown',
        	array('Developer' => 'Developer', 'Administrator' => 'Administrator', 'User' => 'User'));

			$output = $crud->render();

			$this->_data_output($output);
	}


    public function raw_mat_cat_management()
	{
			$crud = new grocery_CRUD();

			//$crud->set_theme('datatables');

			$crud->set_table('raw_mat_cat');
			$crud->set_subject('Raw Mat Cat');
			$crud->required_fields('raw_mat_cat_name','raw_mat_cat_desc');
			$crud->columns('raw_mat_cat_name','raw_mat_cat_desc');
			//$crud->where('a_status','Active');
			
			$crud->display_as('raw_mat_cat_name','Raw Mat Cat')->display_as('raw_mat_cat_desc','Raw Mat Cat Desc');


        	$output = $crud->render();

			$this->_data_output($output);
	}
	

	public function raw_mat_uom_management()
	{
			$crud = new grocery_CRUD();

			//$crud->set_theme('datatables');

			$crud->set_table('raw_mat_uom');
			$crud->set_subject('Raw Mat UOM');
			$crud->required_fields('raw_mat_uom_name','raw_mat_uom_desc');
			$crud->columns('raw_mat_uom_name','raw_mat_uom_desc');
			//$crud->where('a_status','Active');
			
			$crud->display_as('raw_mat_uom_name','Raw Mat Uom')->display_as('raw_mat_uom_desc','Raw Mat Uom Desc');


        	$output = $crud->render();

			$this->_data_output($output);
	}

	public function disposal_management()
	{
			$crud = new grocery_CRUD();

			//$crud->set_theme('datatables');

			$crud->set_table('disposal');
			$crud->set_subject('Disposal');
			$crud->required_fields('disposal_name','disposal_desc','disposal_place');
			$crud->columns('disposal_name','disposal_desc','disposal_place','disposal_remarks');
			//$crud->where('a_status','Active');
			
			$crud->display_as('disposal_name','Disposal Name')
			     ->display_as('disposal_desc','Disposal Desc')
			     ->display_as('disposal_place','Disposal Place')
			     ->display_as('disposal_remarks','Disposal Remarks');


        	$output = $crud->render();

			$this->_data_output($output);
	}

	public function junkshop_management()
	{
			$crud = new grocery_CRUD();

			//$crud->set_theme('datatables');

			$crud->set_table('junkshop');
			$crud->set_subject('Junkshop');
			$crud->required_fields('junk_name','junk_desc','junk_place','junk_remarks');
			$crud->columns('junk_name','junk_desc','junk_place');
			
			$crud->display_as('junk_name','Junk Name')
			     ->display_as('junk_desc','Junk Desc')
			     ->display_as('junk_place','Junk Place')
			     ->display_as('junk_remarks','Junk Remarks');


        	$output = $crud->render();

			$this->_data_output($output);
	}

	public function pickup_trash()
	{
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');

			$crud->set_table('transaction');
			$crud->set_subject('Pick Up Trash');
			$crud->where('trans_status',"Pending");

			$crud->columns('trans_raw_mat_cat_id','trans_pick_time', 'trans_remarks','trans_qty','trans_status','trans_total_amount','trans_eco_points');

			$crud->display_as('trans_raw_mat_cat_id','Raw Mat Cat')
			     ->display_as('trans_qty','Qty')
			     ->display_as('trans_pick_time','Pick Up Time')
			     ->display_as('raw_mats_name','Raw Mat/s')
			     ->display_as('trans_remarks','Remarks')
			     ->display_as('trans_status','Status')
			     ->display_as('trans_user_id','User ID')
			     ->display_as('trans_total_amount','Total Amount')
			     ->display_as('trans_eco_points','Earned Eco Points');

			$crud->unset_add();
			$crud->unset_delete();
			$crud->unset_edit();

			//$crud->add_action('More', '', 'demo/action_more', array($this,'notify'));

			$crud->add_action('Notify', '', '','data/notify',array($this,'notify'));

        	$output = $crud->render();

			$this->_data_output($output);
	}

		function notify($primary_key , $row)
		{
			$total_update = array(
			"trans_status" => 'Pick Up'
			);	

		   $this->db->update('transaction',$total_update,array('trans_id' => $primary_key));

			$from = '+14157921956';
			$to = '+639260868781';
			$message = 'Your trash is now available for pick up from our Eco Rangers. ' . 'Transaction#: ' . $primary_key;
    
			$response = $this->twilio->sms($from, $to, $message);
		}

	public function transaction_management()
	{
			$crud = new grocery_CRUD();
			$crud = new ajax_grocery_CRUD();
			//$crud->set_theme('datatables');


			$crud->set_table('transaction');
			$crud->set_subject('Transaction');
			$crud->where('trans_status',"Pending");

			$crud->display_as('trans_raw_mat_cat_id','Raw Mat Cat')
			     ->display_as('trans_qty','Qty')
			     ->display_as('trans_pick_time','Scheduled Pick Up')
			     ->display_as('raw_mats_name','Raw Mat/s')
			     ->display_as('trans_remarks','Remarks')
			     ->display_as('trans_user_id','User ID')
			     ->display_as('trans_total_amount','Total Amount')
			     ->display_as('trans_eco_points','Earned Eco Points')
			     ->display_as('secret1','');

			$crud->unset_columns(array('secret1'));

			$crud->columns('trans_raw_mat_cat_id','trans_pick_time', 'trans_remarks','trans_qty','trans_total_amount','trans_eco_points');

		    $crud->set_relation_n_n('raw_mats_name', 'transaction_raw_mats', 'raw_material','tr_trans_id','tr_raw_mat_id','{raw_mat_name} {raw_mat_desc}','tr_priority');
			
			$crud->required_fields('trans_pick_time','raw_mats_name','trans_qty');
			$crud->set_relation('trans_raw_mat_cat_id','raw_mat_cat','raw_mat_cat_name');

			// This is the set of code for using the callback -*begin ppp
			$f=array('secret1','trans_raw_mat_cat_id','trans_pick_time', 'raw_mats_name','trans_remarks','trans_qty','trans_user_id');

			$crud->add_fields($f); $crud->edit_fields($f); 
			$crud->callback_add_field('secret1',array($this,'cat_raw_mat_selFunc')); 
			$crud->callback_edit_field('secret1',array($this,'cat_raw_mat_selFunc')); // -*end     

			//$crud->callback_column('t',array($this,'checkqty'));

			$crud->callback_after_insert(array($this, 'send_order_confirmation'));

			$crud->field_type('trans_user_id', 'hidden',null);
            $state = $crud->getState(); 
       	    if($state == 'edit')
	        {
				$crud->field_type('trans_user_id', 'hidden', $this->session->userdata('userid'));
	        }

       	    if($state == 'add')
	        {
		        $crud->field_type('trans_user_id', 'hidden', $this->session->userdata('userid'));
	        }
 
			$crud->set_rules('raw_mats_name', 'raw_mats_name', 'callback_check_multiselect_raw_mat_field');

	        $output = $crud->render();  

	        $state = $crud->getState(); 
       	    if($state == 'add')
	        {
				$js='<script>$(\'select[name="trans_status"] option[value="New"]\').attr("selected", "selected");</script>';
				$output->output .= $js;	


	        }     

			$this->_data_output($output);
	}



		function send_order_confirmation($post_array, $primary_key)
		{

			$mysqli = new mysqli("localhost", "root", "", "hackathon");
			$result = $mysqli->query("SELECT distinct (c.raw_mat_price_id * a.trans_qty) as total_qty, (c.raw_mat_price_id * a.trans_qty)*10 as eco_points FROM transaction a join transaction_raw_mats b  on a.trans_id=b.tr_trans_id join raw_material c on b.tr_raw_mat_id=c.raw_mat_id WHERE a.trans_id ='".$primary_key."'");	
            $total_qty=0;
            $eco_points=0;

		    while($row_funct = mysqli_fetch_array($result))
			{
		          $total_qty= $total_qty + $row_funct['total_qty'];
		          $eco_points= $eco_points + $row_funct['eco_points'];
			}

			$userid=$this->session->userdata('userid');
			$total_update = array(
			"trans_total_amount" => $total_qty,
			"trans_user_id" => $user_id,
			"trans_eco_points" => $eco_points,
			"trans_status" => 'Pending'
			);	

		    $this->db->update('transaction',$total_update,array('trans_id' => $primary_key));

			$from = '+14157921956';
			$to = '+639260868781';
			$message = 'You help save our planet! You just earned '. $eco_points . ' Eco-Points. Transaction#: ' . $primary_key;
    
			$response = $this->twilio->sms($from, $to, $message);
		}


	function check_multiselect_raw_mat_field($value)
	{
			//value outputs nothing
	        $values = $this->input->post('raw_mats_name');
	        if (!is_array($values)){
	            $this->form_validation->set_message('check_multiselect_raw_mat_field', 'Raw Mat Field is mandatory');            
	            return false;
	        }
	        return true;
	}   

	public function get_funct_by_cat_raw_mat($raw_mat_cat)
	{
		$mysqli = new mysqli("localhost", "root", "", "hackathon");

		if($raw_mat_cat === NULL || is_null($raw_mat_cat))	
		{
		 $result = $mysqli->query("SELECT distinct raw_mat_id, raw_mat_name, raw_mat_cat_name FROM vw_raw_mat_per_cat");		
		}
		else
		{
		$result = $mysqli->query("SELECT distinct raw_mat_id, raw_mat_name, raw_mat_cat_name FROM vw_raw_mat_per_cat WHERE raw_mat_cat_id ='".$raw_mat_cat."'");	
		}	

		while($row_funct = mysqli_fetch_array($result))
		{
	             echo "<option value='".$row_funct['raw_mat_id']."'>".$row_funct['raw_mat_name']." ".$row_funct['raw_mat_cat_name']."</option>";
		}
	}


	function cat_raw_mat_selFunc()
	{         		
		return '
			<script type="text/javascript">
				$(document).ready(function(){
					$("#secret1_field_box").hide();
					$("#field-trans_raw_mat_cat_id").change(function() {
						var raw_mat_cat = $("#field-trans_raw_mat_cat_id").val();  
								$(".remove-all").trigger("click");
							     $.ajax({
							         "url" :  "http://localhost:8080/hackathon/data/get_funct_by_cat_raw_mat/"+ raw_mat_cat,      
							         "cache" : true,
							         "beforeSend" : function (){
							              //Show a message
							         },
							         "complete" : function($response, $status){
							             if ($status != "error" && $status != "timeout") { 
							             	$("#field-raw_mats_name").find("option").remove();
							                $("#field-raw_mats_name").html($response.responseText);
							                $("#field-raw_mats_name").trigger("liszt:updated");	
							                $(".remove-all").trigger("click");						                 
							             }
							         },
							         "error" : function ($responseObj){
							             alert("Something went wrong while processing your request.\n\nError => "
							                 + $responseObj.responseText);
							         }
							     }); 
					})	
				})									
			</script>			
			' ;				
	}

}

	
