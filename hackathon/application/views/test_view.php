<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html >
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <title>Welcome to CodeIgniter</title>
    <base href="<?php echo base_url();?>" />
    <link type="text/css" href="<?php echo base_url();?>/assets/menu/menu.css" rel="stylesheet" />
    <!-- set javascript base_url -->
    <Script type="text/javascript">
        <![CDATA[
        var base_url = '<?php echo base_url();?>';
        ]]>
    </Script>
    <Script type="text/javascript" src="<?php echo base_url();?>/assets/menu/jquery.js"></Script>
    <Script type="text/javascript" src="<?php echo base_url();?>/assets/menu/menu.js"></Script>

</head>
<body>
<?php
 
    echo $this->dynamic_menu->build_menu();
?>
</body>
</html>  