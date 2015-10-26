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
    <link rel="stylesheet" href="<?php echo public_path("css/font-icons.css");?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo public_path("css/animate.css");?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo public_path("css/magnific-popup.css");?>" type="text/css" />

    <link rel="stylesheet" href="<?php echo public_path("css/responsive.css");?>" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <!--[if lt IE 9]>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->

    

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

            <div id="header-wrap">

                <!-- Primary Navigation
                ============================================= -->
                <nav id="primary-menu" class="style-2 center">

                    <div class="container clearfix">

                        <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

                        <ul>
                            <li class="current"><a href="<?php echo url_for("home/index");?>"><div>Inicio</div></a></li>
                            <li><a href="<?php echo url_for("quienessomos/index");?>"><div>Quienes Somos</div></a></li>
                            <li><a href="#"><div>Servicios</div></a>
                                <ul>
                                    <?php for($a=1;$a<=3;$a++){ ?>
                                    <li><a href="<?php echo url_for("servicios/index");?>"><div>Tipo de Servicio 1</div></a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <li><a href="#"><div>Maquinarias</div></a>
                                <ul>
                                    <?php for($a=1;$a<=3;$a++){ ?>
                                    <li><a href="<?php echo url_for("maquinarias/index");?>"><div>Tipo de máquina 1</div></a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <li><a href="<?php echo url_for("noticias/index");?>"><div>Noticias</div></a></li>
                            <li><a href="<?php echo url_for("contacto/index");?>"><div>Contacto</div></a></li>
                        </ul>

                        <!-- Top Search
                        ============================================= -->
                        <div id="top-search">
                            <a href="#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>
                            <form action="search.html" method="get">
                                <input type="text" name="q" class="form-control" value="" placeholder="Buscar...">
                            </form>
                        </div><!-- #top-search end -->

                    </div>

                </nav><!-- #primary-menu end -->

            </div>

        </header><!-- #header end -->
        
<?php echo $sf_content; ?>

        <!-- Footer
        ============================================= -->
        <footer id="footer" class="dark">

                <div class="container">

                        <!-- Footer Widgets
                        ============================================= -->
                        <div class="footer-widgets-wrap clearfix">

                                <div class="col_one_third">

                                        <div class="widget clearfix">

                                                <img src="<?php echo public_path("images/futamaq-footer-logo-b.svg");?>" alt="" class="footer-logo">

                                        </div>

                                        <div class="widget widget_links clearfix notopmargin">

                                                <div class="table-responsive">
                                                        <address>

                                                        <table>
                                                                <tr>
                                                                        <td style="min-width:100px;"><strong>Oficinas:</strong></td>
                                                                        <td>Osorno<br>Los Lagos</td>
                                                                </tr>
                                                                <tr>
                                                                        <td><abbr title="Teléfono"><strong>Teléfono:</strong></abbr></td>
                                                                        <td>+56 (65) 2 2123456</td>
                                                                </tr>
                                                                <tr>
                                                                        <td><abbr title="Fax"><strong>Fax:</strong></abbr></td>
                                                                        <td>+56 (65) 2 2123456</td>
                                                                </tr>
                                                                <tr>
                                                                        <td><abbr title="Email"><strong>Email:</strong></abbr></td>
                                                                        <td>info@futamaq.com</td>
                                                                </tr>
                                                        </table>
                                                        </address>
                                                </div>

                                        </div>

                                </div>

                                <div class="col_one_third">

                                        <div class="col_half">

                                                <div class="widget widget_links clearfix">

                                                        <h4>Páginas</h4>

                                                        <ul>
                                                                <li><a href="#">Home</a></li>
                                                                <li><a href="#">Quiénes somos</a></li>
                                                                <li><a href="#">Servicios</a></li>
                                                                <li><a href="#">Maquinarias</a></li>
                                                                <li><a href="#">Noticias</a></li>
                                                                <li><a href="#">Contacto</a></li>
                                                        </ul>

                                                </div>

                                        </div>

                                        <div class="col_half col_last">

                                                <div class="widget clearfix" style="margin-bottom: -20px;">

                                                        <h4>Noticias Recientes</h4>

                                                        <div id="post-list-footer">
                                                                <div class="spost clearfix">
                                                                        <div class="entry-c">
                                                                                <div class="entry-title">
                                                                                        <h4><a href="#">Lorem ipsum dolor sit amet, consectetur</a></h4>
                                                                                </div>
                                                                                <ul class="entry-meta">
                                                                                        <li>10 julio 2015</li>
                                                                                </ul>
                                                                        </div>
                                                                </div>

                                                                <div class="spost clearfix">
                                                                        <div class="entry-c">
                                                                                <div class="entry-title">
                                                                                        <h4><a href="#">Elit Assumenda vel amet dolorum quasi</a></h4>
                                                                                </div>
                                                                                <ul class="entry-meta">
                                                                                        <li>10 julio 2015</li>
                                                                                </ul>
                                                                        </div>
                                                                </div>

                                                                <div class="spost clearfix">
                                                                        <div class="entry-c">
                                                                                <div class="entry-title">
                                                                                        <h4><a href="#">Debitis nihil placeat, illum est nisi</a></h4>
                                                                                </div>
                                                                                <ul class="entry-meta">
                                                                                        <li>10 julio 2015</li>
                                                                                </ul>
                                                                        </div>
                                                                </div>
                                                        </div>

                                                </div>

                                        </div>

                                </div>

                                <div class="col_one_third col_last">

                                        <div class="widget quick-contact-widget clearfix">
                                                <h4>Escríbenos</h4>
                                                <div id="quick-contact-form-result" data-notify-type="success" data-notify-msg="<i class=icon-ok-sign></i> Mensaje enviado!"></div>
                                                <form id="quick-contact-form" name="quick-contact-form" action="<?php echo url_for("contacto/index");?>" method="post" class="quick-contact-form nobottommargin">
                                                        <div class="form-process"></div>
                                                        <input type="text" class="required sm-form-control input-block-level" id="quick-contact-form-name" name="quick-contact-form-name" value="" placeholder="Nombre completo" />
                                                        <input type="text" class="required sm-form-control email input-block-level" id="quick-contact-form-email" name="quick-contact-form-email" value="" placeholder="Email" />
                                                        <textarea class="required sm-form-control input-block-level short-textarea" id="quick-contact-form-message" name="quick-contact-form-message" rows="4" cols="30" placeholder="Mensaje"></textarea>
                                                        <input type="text" class="hidden" id="quick-contact-form-botcheck" name="quick-contact-form-botcheck" value="" />
                                                        <button type="submit" id="quick-contact-form-submit" name="quick-contact-form-submit" class="button button-small button-3d nomargin" value="submit">Enviar Email</button>
                                                </form>
                                        </div>

                                </div>

                        </div><!-- .footer-widgets-wrap end -->

                </div>

                <!-- Copyrights
                ============================================= -->
                <div id="copyrights">

                        <div class="container clearfix">

                                <div class="col_half">

                                        <div class="clear"></div>

                                        <i class="icon-envelope2"></i> info@futamaq.cl <span class="middot">&middot;</span> <i class="icon-phone"></i> +91-11-6541-6369
                                </div>

                                <div class="col_half col_last tright">
                                        &copy; <?php echo date("Y");?> todos los derechos reservados Futamaq.<br>
                                </div>

                        </div>

                </div><!-- #copyrights end -->

        </footer><!-- #footer end -->

    </div><!-- #wrapper end -->

    <!-- Go To Top
    ============================================= -->
    <div id="gotoTop" class="icon-angle-up"></div>

    <!-- Footer Scripts
    ============================================= -->
    <script type="text/javascript" src="<?php echo public_path("js/functions.js");?>"></script>
    <script type="text/javascript" src="<?php echo public_path("js/base.js");?>"></script>

</body>
</html>