<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php if(isset($header) && isset($header['title'])): ?>
      <title><?php echo $header['title']; ?></title>
    <?php else: ?>
      <title>Data</title>
    <?php endif; ?>

    <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/background_layout.css') ?>" rel="stylesheet">

    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
  </head>

  <body>