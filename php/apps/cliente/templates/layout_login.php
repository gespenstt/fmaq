<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Login :: Futumaq</title>

  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes"> 
    
    
    <link href="<?php echo public_path("css/bootstrap.min.css");?>" rel="stylesheet">
    <link href="<?php echo public_path("css/bootstrap-responsive.min.css");?>" rel="stylesheet">
    
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    <link href="<?php echo public_path("css/font-awesome.min.css");?>" rel="stylesheet">        
    
    <link href="<?php echo public_path("css/ui-lightness/jquery-ui-1.10.0.custom.min.css");?>" rel="stylesheet">
    
    <link href="<?php echo public_path("css/base-admin-3.css");?>" rel="stylesheet">
    <link href="<?php echo public_path("css/base-admin-3-responsive.css");?>" rel="stylesheet">
  
    <link href="<?php echo public_path("css/pages/signin.css");?>" rel="stylesheet" type="text/css">


</head>

<body>
  
<nav class="navbar navbar-inverse" role="navigation">

  <div class="container">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="<?php echo url_for("home/index");?>">Futumaq</a>
  </div>

</div> <!-- /.container -->
</nav>



<div class="account-container stacked">
  
  <div class="content clearfix">
    
  <?php echo $sf_content; ?>
    
  </div> <!-- /content -->
  
</div> <!-- /account-container -->



<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo public_path("js/libs/jquery-1.9.1.min.js"); ?>"></script>
<script src="<?php echo public_path("js/libs/jquery-ui-1.10.0.custom.min.js"); ?>"></script>
<script src="<?php echo public_path("js/libs/bootstrap.min.js"); ?>"></script>

</body>
</html>
