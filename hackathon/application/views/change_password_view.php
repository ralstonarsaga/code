<?php $this->load->view('partials/header_view', $header); ?>
<?php $this->load->view('partials/menu_view'); ?>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 well">
		<?php $attributes = array("name" => "changepasswordform");
			echo form_open("change_password/index", $attributes);?>
			<legend>Change Password</legend>

			<div class="form-group">
				<label for="user_id">User ID</label>
				<input class="form-control" name="userid" placeholder="Enter User ID" type="text" value="<?php echo set_value('userid'); ?>" />
				<span class="text-danger"><?php echo form_error('userid'); ?></span>
			</div>

			<div class="form-group">
				<label for="old_password">Old Password</label>
				<input class="form-control" name="old_password" placeholder="Old Password" type="password" value="<?php echo set_value('old_password'); ?>" />
				<span class="text-danger"><?php echo form_error('old_password'); ?></span>
			</div>

			<div class="form-group">
				<label for="new_password">New Password</label>
				<input class="form-control" name="new_password" placeholder="New Password" type="password" value="<?php echo set_value('new_password'); ?>" />
				<span class="text-danger"><?php echo form_error('new_password'); ?></span>
			</div>

			<div class="form-group">
				<button name="submit" type="submit" class="btn btn-primary">Proceed</button>
				<button name="cancel" type="reset" class="btn btn-primary">Cancel</button>
			</div>
		<?php echo form_close(); ?>
		<?php echo $this->session->flashdata('msg'); ?>
		</div>
	</div>
</div>
<?php $this->load->view('partials/footer_view');?>


