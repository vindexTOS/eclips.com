<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
   <link rel="stylesheet"  href="<?= ASSETS ?>styles/index.css"/>
    <title>Document</title>
</head>
<body class="body" style="background-color:#AA0000;">
     <?php $this->view('header'); ?>
<section class="main-section">
     <?php $this->view('sidenavigation'); ?>
     <?php $this->view('content'); ?>

     <?php $this->view('usernavigation'); ?> </section>
  
</body>
</html>