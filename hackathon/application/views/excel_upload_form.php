<?php $this->load->view('partials/header_view'); ?>
<?php $this->load->view('partials/menu_view'); ?>

<div class="container-fluid">									
<?php echo form_open_multipart('excel_upload/ExcelDataAdd');?>                      
<label>Excel File:</label>                        
<input type="file" name="userfile" />				                   
<input type="submit" value="upload" name="upload" />
</form>	
</div>

<br>
<?php if($this->session->flashdata('msg')): ?>
    <p><?php echo $this->session->flashdata('msg'); ?></p>
<?php endif; ?>

<?php $this->load->view('partials/footer_view');?>