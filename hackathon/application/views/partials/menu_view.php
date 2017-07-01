  <div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
    <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url(); ?>home">Home</a>
    </div>    
    <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    
                    <?php if ($this->session->userdata('login')){ ?>
                            <li><a href='<?php echo base_url('data/user_management')?>'>User</a></li>     
                            <li><a href='<?php echo base_url('data/raw_mat_management')?>'>Raw Mat</a></li> 
                            <li><a href='<?php echo base_url('data/reward_management')?>'>Reward</a></li> 
                            <li><a href='<?php echo base_url('data/raw_mat_cat_management')?>'>Raw Mat Cat</a></li> 
                            <li><a href='<?php echo base_url('data/raw_mat_uom_management')?>'>Raw Mat UOM</a></li> 
                            <li><a href='<?php echo base_url('data/transaction_management')?>'>Transaction</a></li> 
                            <li><a href='<?php echo base_url('data/disposal_management')?>'>Disposal</a></li> 
                            <li><a href='<?php echo base_url('data/junkshop_management')?>'>JunkShop</a></li>
                            <li><a href='<?php echo base_url('twilio_demo')?>'>Twilio</a></li>
                            <li><a href='<?php echo base_url('classifier')?>'>Classify</a></li>
                    <?php } ?>
                
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    
                    <?php if ($this->session->userdata('login')){ ?>
                    <li><p class="navbar-text">***Welcome <?php echo $this->session->userdata('uname'); ?></p></li>

    
                                    <li><a href='<?php echo base_url('signup')?>'><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                  

                      


                    <li><a href="<?php echo base_url(); ?>home/logout"><span class="glyphicon glyphicon-log-out"></span>Log Out</a></li>

                          

                    <?php } 

                    else { ?>
        <!--             <li><a href='<?php echo site_url('signup')?>'><span class="glyphicon glyphicon-user"></span> Sign Up</a></li> -->
                    <li><a href='<?php echo site_url('login')?>'><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    <?php } ?>

                </ul>
    </div>

   </div>
   </div>