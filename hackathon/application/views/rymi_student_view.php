<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />

    <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">

 
<?php 
    foreach($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>

<?php foreach($js_files as $file): ?>
    <script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
 
</head>


<body data-spy="scroll" data-target=".navbar" data-offset="50">

    <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
    <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Welcome</a>
    </div>    
    <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li><a href='<?php echo site_url('data/area_management')?>'>Area List</a></li>
                        <li><a href='<?php echo site_url('data/teacher_management')?>'>Teacher List</a></li>
                        <li><a href='<?php echo site_url('data/student_management')?>'>Student List</a></li>
                        <li><a href='<?php echo site_url('data/date_management')?>'>Date List(Sunday)</a></li>
                        <li><a href='<?php echo site_url('data/multigrids')?>'>View All Master List</a></li>

                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Attendance<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href='<?php echo site_url('data/attendance_management')?>'>Manage Attendance</a></li>
                                <li><a href='<?php echo site_url('data/attendance_list')?>'>View Attendance</a></li>
                            </ul>
                        </li>
                    </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li><a href='<?php echo site_url('signup')?>'><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                    <li><a href='<?php echo site_url('login')?>'><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                </ul>
    </div>
   </div>
   </nav>

    <br>
    <br>
    <div style='height:20px;'></div>  
    <div>
        <?php echo $output; ?>
    </div>

</body>
</html>
 