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

    <link href="<?php echo public_path("css/custom.css");?>" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

  </head>

<body>

<nav class="navbar navbar-inverse" role="navigation">

	<div class="container">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <i class="icon-cog"></i>
    </button>
    <a class="navbar-brand" href="<?php echo url_for("home/index");?>">Futumaq</a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown">
						
			<a href="javscript:;" class="dropdown-toggle" data-toggle="dropdown">
				<i class="icon-cog"></i>
				Opciones
				<b class="caret"></b>
			</a>
			
			<ul class="dropdown-menu">
				<li><a href="<?php echo url_for("cuenta/index");?>">Mi cuenta</a></li>
				<li class="divider"></li>
				<li><a href="<?php echo url_for("login/salir");?>">Salir</a></li>
			</ul>
			
		</li>
	</ul>
   </div>


</div> <!-- /.container -->
</nav>
    



    
<div class="subnavbar">

	<div class="subnavbar-inner">
	
		<div class="container">
			
			<a href="javascript:;" class="subnav-toggle" data-toggle="collapse" data-target=".subnav-collapse">
		      <span class="sr-only">Toggle navigation</span>
		      <i class="icon-reorder"></i>
		      
		    </a>

			<div class="collapse subnav-collapse">
				<ul class="mainnav">
				
					<li class="active">
						<a href="<?php echo url_for("home/index");?>">
							<i class="icon-home"></i>
							<span>Home</span>
						</a>	    				
					</li>
					
					<li class="dropdown">					
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-user"></i>
							<span>Clientes</span>
							<b class="caret"></b>
						</a>	    
					
						<ul class="dropdown-menu">
							<li><a href="<?php echo url_for("cliente/index");?>">Todos</a></li>
							<li><a href="<?php echo url_for("cliente/agregar");?>">Agregar</a></li>
						</ul> 				
					</li>
									
					<li>
						<a href="<?php echo url_for("noticia/index");?>">
							<i class="icon-globe"></i>
							<span>Noticias</span>
						</a>	    				
					</li>
				
				</ul>
			</div> <!-- /.subnav-collapse -->

		</div> <!-- /container -->
	
	</div> <!-- /subnavbar-inner -->

</div> <!-- /subnavbar -->
    
    
<div class="main">

    <div class="container">

      <div class="row">
      	
      	<div class="col-md-12 col-xs-12">
      		
      		<div class="widget stacked">
					
      		<?php echo $sf_content; ?>
					
			</div> <!-- /widget -->			
     		
	    </div> <!-- /span6 -->      	
  	
      </div> <!-- /row -->

    </div> <!-- /container -->
    
</div> <!-- /main -->
    


    
    
<div class="footer">
		
	<div class="container">
		
		<div class="row">
			
			<div id="footer-copyright" class="col-md-6">
				&copy; <?php echo date("Y"); ?> - Futumaq
			</div> <!-- /span6 -->
			
		</div> <!-- /row -->
		
	</div> <!-- /container -->
	
</div> <!-- /footer -->

<?php include_component("componentes", "modales"); ?>

    

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo public_path("js/libs/jquery-1.9.1.min.js"); ?>"></script>
<script src="<?php echo public_path("js/libs/jquery-ui-1.10.0.custom.min.js"); ?>"></script>
<script src="<?php echo public_path("js/libs/bootstrap.min.js"); ?>"></script>

  </body>
</html>
