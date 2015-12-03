<!DOCTYPE html>
<html dir="ltr" lang="es-CL">
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="Futamaq" />

    <!-- SEO
    ============================================= -->
    <meta name="Description" content="#" />
    <meta name="Keywords" content="#" />
    <meta name="robots" content="index, nofollow" />

    <link rel="alternate" href="#" hreflang="es-cl" />

    <!-- Stylesheets
    ============================================= -->
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700|Roboto:300,400,500,700" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo public_path("css/bootstrap.css");?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo public_path("css/style.css");?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo public_path("css/custom.css");?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo public_path("css/font-icons.css");?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo public_path("css/animate.css");?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo public_path("css/magnific-popup.css");?>" type="text/css" />

    <link rel="stylesheet" href="<?php echo public_path("css/responsive.css");?>" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <!--[if lt IE 9]>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
    
    <?php include_stylesheets(); ?>
    

    <!-- External JavaScripts
    ============================================= -->
    <script type="text/javascript" src="<?php echo public_path("js/jquery.js");?>"></script>
    <script type="text/javascript" src="<?php echo public_path("js/plugins.js");?>"></script>

    <!-- Document Title
    ============================================= -->
    <title>Futamaq - Tecnología a su alcance</title>

</head>

<body class="stretched">

    <!-- Document Wrapper
    ============================================= -->
    <div id="wrapper" class="clearfix">

        <!-- Top Bar
        ============================================= -->
        <div id="top-bar">

            <div class="container clearfix">

                <div class="col_half fright col_last clearfix nobottommargin">

                    <!-- Top Links
                    ============================================= -->
                    <div class="top-links">
                        <ul>
                            <li><a href="<?php echo url_for("trabaja/index");?>">Trabaja con nosotros</a></li>
                            <li><a href="<?php echo url_for("contacto/index");?>">Contacto</a></li>
                        </ul>
                    </div><!-- .top-links end -->

                </div>

            </div>

        </div><!-- #top-bar end -->

        <!-- Header
        ============================================= -->
        <header id="header" class="sticky-style-2">

            <div class="container clearfix">

                <!-- Logo
                ============================================= -->
                <div id="logo">
                    <a href="<?php echo url_for("home/index");?>" class="standard-logo"><!-- <img src="images/futamaq-logo.svg" alt="Canvas Logo"> --></a>
                </div><!-- #logo end -->

                <ul class="header-extras">
                    <li>
                        <i class="i-plain icon-call nomargin"></i>
                        <div class="he-text">
                            Llámanos
                            <span>+56 (65) 2 254567</span>
                        </div>
                    </li>
                    <li>
                        <i class="i-plain icon-line2-envelope nomargin"></i>
                        <div class="he-text">
                            Escríbenos
                            <span>info@futamaq.cl</span>
                        </div>
                    </li>
                </ul>

            </div>

            <?php include_component("componentes", "menu"); ?>

        </header><!-- #header end -->
        
<?php echo $sf_content; ?>

    <?php include_component("componentes", "footer"); ?>

    </div><!-- #wrapper end -->

    <!-- Go To Top
    ============================================= -->
    <div id="gotoTop" class="icon-angle-up"></div>

    <!-- Footer Scripts
    ============================================= -->
    <script type="text/javascript" src="<?php echo public_path("js/functions.js");?>"></script>
    <?php include_javascripts(); ?>
    <script type="text/javascript" src="<?php echo public_path("js/base.js");?>"></script>
</body>
</html>