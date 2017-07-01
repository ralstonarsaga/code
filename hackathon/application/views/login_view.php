<?php $this->load->view('partials/header_view', $header); ?>
<?php $this->load->view('partials/menu_view'); ?>

<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 well">
		<?php $attributes = array("name" => "loginform");
			echo form_open("login/index", $attributes);?>
			<legend>Login</legend>

			<div class="form-group">
				<label for="name">User ID</label>
				<input class="form-control" name="userid" placeholder="Enter User ID" type="text" value="<?php echo set_value('userid'); ?>" />
				<span class="text-danger"><?php echo form_error('userid'); ?></span>
			</div>

			<div class="form-group">
				<label for="name">Password</label>
				<input class="form-control" name="password" placeholder="Password" type="password" value="<?php echo set_value('password'); ?>" />
				<span class="text-danger"><?php echo form_error('password'); ?></span>
			</div>

			<div class="form-group">
				<button name="submit" type="submit" class="btn btn-primary">Login</button>
				<button name="cancel" type="reset" class="btn btn-primary">Cancel</button>
			</div>
		<?php echo form_close(); ?>
		<?php echo $this->session->flashdata('msg'); ?>
		</div>
	</div>

	<div class="row">
		<div class="col-md-4 col-md-offset-4 text-center">	
		Want to Update Password? <a href="<?php echo base_url(); ?>change_password">Change Password</a>
		</div>
	</div>
</div>

<?php $this->load->view('partials/footer_view');?>


