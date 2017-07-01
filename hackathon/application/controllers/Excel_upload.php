<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class excel_upload extends CI_Controller
{
 
public function __construct() {
        parent::__construct();
                $this->load->library('excel');//load PHPExcel library 
                $this->load->helper('form');
                $this->load->model('excel_data_insert_model');
}	

  public function index()
  {
    $this->load->view('excel_upload_form');
  }
	
public	function ExcelDataAdd()	{  
      //Path of files were you want to upload on localhost (C:/xampp/htdocs/ProjectName/uploads/excel/)	 
         $configUpload['upload_path'] = FCPATH.'uploads/excel/';
         $configUpload['allowed_types'] = 'xls|xlsx|csv';
         $configUpload['max_size'] = '5000';
         $this->load->library('upload', $configUpload);
         $this->upload->do_upload('userfile');	
         $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
         $file_name = $upload_data['file_name']; //uploded file name
		     $extension=$upload_data['file_ext'];    // uploded file extension
		
       //$objReader =PHPExcel_IOFactory::createReader('Excel5');     //For excel 2003 
         $objReader= PHPExcel_IOFactory::createReader('Excel2007');	// For excel 2007 	  
       //Set to read only
         $objReader->setReadDataOnly(true); 		  
       //Load excel file
		     $objPHPExcel=$objReader->load(FCPATH.'uploads/excel/'.$file_name);		 
         $totalrows=$objPHPExcel->setActiveSheetIndex(0)->getHighestRow();   //Count Numbe of rows avalable in excel      	 
         $objWorksheet=$objPHPExcel->setActiveSheetIndex(0);                
          //loop from first data untill last data
          for($i=2;$i<=$totalrows;$i++)
          {
              $FirstName= $objWorksheet->getCellByColumnAndRow(0,$i)->getValue();			
              $MiddleName= $objWorksheet->getCellByColumnAndRow(1,$i)->getValue(); //Excel Column 1
			        $LastName= $objWorksheet->getCellByColumnAndRow(2,$i)->getValue();    //Excel Column 2
			        $Birthday=$objWorksheet->getCellByColumnAndRow(3,$i)->getValue();    //Excel Column 3
			        $Educational_Level=$objWorksheet->getCellByColumnAndRow(4,$i)->getValue();   //Excel Column 4
              $Age_Group=$objWorksheet->getCellByColumnAndRow(5,$i)->getValue();   //Excel Column 5
              $Address=$objWorksheet->getCellByColumnAndRow(6,$i)->getValue();   //Excel Column 6
              $Gender=$objWorksheet->getCellByColumnAndRow(7,$i)->getValue();   //Excel Column 7
              $Contact_Number=$objWorksheet->getCellByColumnAndRow(8,$i)->getValue();   //Excel Column 8
              $Area=$objWorksheet->getCellByColumnAndRow(9,$i)->getValue();   //Excel Column 9



			        $data_user=array('s_firstname'=>$FirstName, 's_middlename'=>$MiddleName, 's_lastname'=>$LastName ,'s_birthday'=>$Birthday ,'s_grade_year_level'=>$Educational_Level, 
                               's_age_group'=>$Age_Group, 's_address'=>$Address, 's_gender'=>$Gender, 's_contact_no'=>$Contact_Number, 's_area_id'=>$Area);
			        $this->excel_data_insert_model->Add_Students($data_user);
          }
             unlink('././uploads/excel/'.$file_name); //File Deleted After uploading in database .			 
 
              // set flash data
            $this->session->set_flashdata('msg', 'Excel Uploaded Successfully');
            redirect(base_url() . 'excel_upload');


     }
	
}
?>