<?php $this->load->view('partials/header_view'); ?>
<?php $this->load->view('partials/menu_view'); ?>

	<div class="container form">
		<div class="col-md-6 col-md-offset-3">
			<form method="POST" action="<?=base_url('classifier/recognition')?>">
				<div class="radio">
						 <input type="radio" name="type" value="1" id="classify" required checked="checked"/>
				</div>

				<div class="form-group">
					<label for="image_url">Image URL</label>
					<input type="text" id="image_url" name="url" class="form-control" required/>
				</div>

				<div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                    	<label for="upload_url">Upload Image</label>
                    	<?php echo form_open_multipart('upload_controller/do_upload');?>
                        <input type="file" name="urls" size="20" id="classifys" />
                        <span class="text-danger"><?php if (isset($error)) { echo $error; } ?></span>
                    </div>
                </div>
            	</div>

				<input type="submit" value="Scan Trash" class="btn btn-success"/>
			</form>
		</div>
	</div>

<?php $this->load->view('partials/footer_view');?>
