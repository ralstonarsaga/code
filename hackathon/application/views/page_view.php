<?php $this->load->view('partials/header_view', $header); ?>
<?php $this->load->view('partials/menu_view'); ?>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
	  <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox" style="max-height:500px">
      <div class="item active ">
        <img src="./uploads/images/waste.jpg" alt="Image"  style="width:100%">
        <div class="carousel-caption">
          <h3>Sell $</h3>
          <p>Money Money.</p>
        </div>      
      </div>

      <div class="item ">
        <img src="./uploads/images/saveplanet.jpg" alt="Image" style="width:100%">
        <div class="carousel-caption">
          <h3>More Sell $</h3>
          <p>Lorem ipsum...</p>
        </div>      
      </div>
	  
	  <div class="item ">
        <img src="./uploads/images/pollution.jpg" alt="Image" style="width:100%">
        <div class="carousel-caption">
          <h3>More Sell $</h3>
          <p>Lorem ipsum...</p>
        </div>      
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>
  
<div class="container text-center">    
  <h3>Got Trash?</h3><br>
  <div class="row">

	<div class="col-sm-4">
		<div class="well">
			<p>Projects</p>
		</div>
		 <!--  <img src="./uploads/images/logo.png" class="img-responsive" style="width:100%" alt="Image">
		  <p>TrashFund</p>  -->
		<div class="well">
			<p>News</p>
		</div>
    </div>
    <div class="col-sm-8">
		<img src="./uploads/images/trivia.jpg" class="img-responsive" style="width:100%" alt="Image">
		<a href="http://www.advanceddisposal.com/for-mother-earth/education-zone/recycling-facts-trivia.aspx"><p>Image source</p></a>
    </div>


  </div> 
</div><br>
 
<?php $this->load->view('partials/footer_view');?>