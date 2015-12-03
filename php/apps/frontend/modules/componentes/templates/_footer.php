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
                                                        <td>Fundo Futahuete km 54<br>Río Bueno<br>Osorno</td>
                                                </tr>
                                                <tr>
                                                        <td><abbr title="Teléfono"><strong>Teléfono:</strong></abbr></td>
                                                        <td>+56 (9) 66558216</td>
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
                                <li><a href="<?php echo url_for("home/index");?>">Home</a></li>
                                <li><a href="<?php echo url_for("quienessomos/index");?>">Cómo trabajamos</a></li>
                                <li><a href="<?php echo url_for("nuestramaquinaria/index");?>">Nuestra Maquinaria</a></li>
                                <li><a href="<?php echo url_for("noticia/index");?>">Noticias</a></li>
                                <li><a href="<?php echo url_for("galeria/index");?>">Galería</a></li>
                                <li><a href="<?php echo url_for("contacto/index");?>">Contacto</a></li>
                            </ul>

                        </div>

                    </div>

                    <div class="col_half col_last">

                        <div class="widget clearfix" style="margin-bottom: -20px;">

                            <h4>Noticias Recientes</h4>

                            <div id="post-list-footer">
                                <?php foreach($noticias as $not){ ?>
                                <div class="spost clearfix">
                                    <div class="entry-c">
                                        <div class="entry-title">
                                            <h4><a target="_blank" href="<?php echo $not->getNotUrl();?>"><?php echo $not->getNotTitulo();?></a></h4>
                                        </div>
                                        <ul class="entry-meta">
                                                <li><?php echo $util->setFecha($not->getCreatedAt("U"),"d F Y","U"); ?></li>
                                        </ul>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>

                        </div>

                    </div>

                </div>

                <div class="col_one_third col_last">

                    <div class="">

                        <div class="widget widget_links clearfix">

                            <h4>Nuestros servicios</h4>

                            <ul>
                                <?php foreach($servicios as $se){ ?>
                                <li><a href="<?php echo url_for("servicios/index/?servicio=".$se->getSerId());?>"><?php echo $se->getSerTitulo();?></a></li>
                                <?php } ?>
                            </ul>
                        </div>
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

                    <i class="icon-envelope2"></i> info@futamaq.cl <span class="middot">&middot;</span> <i class="icon-phone"></i> +569 66558216
                </div>

                <div class="col_half col_last tright">
                    &copy; <?php echo date("Y");?> todos los derechos reservados Futamaq.<br>
                </div>

            </div>

        </div><!-- #copyrights end -->

    </footer><!-- #footer end -->