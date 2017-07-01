<?php $this->load->view('partials/header_view'); ?>
<?php $this->load->view('partials/menu_view'); ?>

<div class="container-fluid">
 <div class="col-md-12">  
 	<div class="jumbotron">
    <center><h1>Product Information</h1></center>
 </div>
  </div>

</div>


	<div class="container mTop15">
		<div class='row'>
			<?php foreach ($infos as $detail) : ?>
				<div class="col-md-6">
					<img src="<?=$detail['image_url']?>" class="img-responsive"/>
				</div>
				<div class="col-md-6">
					<h4>Classification: </h4>
					<h5><?=implode(', ',$detail['classifier'])?></h5>

					<?php $datas = array(array('val'  => "paper"),  
										 array('val'  => "glass"),
										 array('val'  => "metal"),
										 array('val'  => "plastic"),
										 array('val'  => "batteries"),
										 array('val'  => "textile"),
										 array('val'  => "bottles"),
										 array('val'  => "bottled water"),
										 array('val'  => "aluminum cans"),
										 array('val'  => "tin cans"),
										 array('val'  => "magazines"),
										 array('val'  => "newspaper"),
										 array('val'  => "cardboard"),
										 array('val'  => "boxes"),
										 array('val'  => "carton")
										 ); ?>
					<?php foreach($datas as $data) : ?>
					<?php $is_recycable=false; ?>
            		<?php if(in_array($data['val'], $detail['classifier'])) { ?>

                    <div class="alert alert-success">
    				<strong><?php print "Recycable. Congratulations. This material is eco-friendly"; $is_recycable=true; return; ?>.</strong>
  					</div>
            		       
            	   <?php } ?>
    
         			<?php endforeach; ?>


         			<?php if($is_recycable==false) {  ?>
            	    <div class="alert alert-danger">
    				<strong><?php print "Non-Recycable. ";  ?>Unfortunately. This material is not eco-friendly.</strong>
  					</div>

  					 <?php } ?>

				</div>
			<?php endforeach; ?>

			
    
		</div>
	</div>

<?php $this->load->view('partials/footer_view');?>

