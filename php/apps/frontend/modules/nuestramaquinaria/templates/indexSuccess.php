

        <!-- Page Title
        ============================================= -->
        <section id="page-title" class="page-title-parallax page-title-dark" style="background-image: url('<?php echo public_path("uploads/maquinas-header-bg.jpg");?>'); padding: 120px 0;" data-stellar-background-ratio="0.3">

            <div class="container clearfix">
                <h1>Máquinas</h1>
                <span>La última tecnología en maquinaria agrícola</span>
                <ol class="breadcrumb">
                    <li><a href="<?php echo url_for("home/index");?>">Home</a></li>
                    <li class="active">Máquinas</li>
                </ol>
            </div>

        </section><!-- #page-title end -->

        <!-- Content
        ============================================= -->
        <section id="content">

            <div class="content-wrap notoppadding nobottompadding">

                <div class="section notopmargin nobottommargin">

                    <div class="container clearfix">

                        <!-- Portfolio Filter
                        ============================================= -->
                        <ul id="portfolio-filter" class="clearfix">

                        </ul><!-- #portfolio-filter end -->

                        <div id="portfolio-shuffle">
                            <i class="icon-random"></i>
                        </div>

                        <div class="clear"></div>

                        <!-- Portfolio Items
                        ============================================= -->
                        <div id="portfolio" class="portfolio-nomargin clearfix">
                            
                            <?php foreach ($pager->getResults() as $p){ ?>

                            <article class="portfolio-item pf-cocecha">
                                <div class="portfolio-image">
                                    <a href="<?php echo url_for("nuestramaquinaria/detalle/?maqid=".$p->getMaqId());?>">
                                        <?php
                                            $imagen = null;
                                            foreach($p->getMaquinariaFotos() as $mf){
                                                $imagen = $mf->getMfoRuta();
                                                break;
                                            }
                                            if(is_null($imagen)){
                                                $imagen = "images/sin-imagen.gif";
                                            }
                                        ?>
                                        
                                        <div class="div-galeria" style="background-image: url(<?php echo public_path($imagen); ?>)">

                                        </div>
                                    </a>
                                    <div class="portfolio-overlay">
                                        <a href="<?php echo url_for("nuestramaquinaria/detalle/?maqid=".$p->getMaqId());?>" class="center-icon"><i class="icon-line-ellipsis"></i></a>
                                    </div>
                                </div>
                                <div class="portfolio-desc">
                                    <h3><a href="<?php echo url_for("nuestramaquinaria/detalle/?maqid=".$p->getMaqId());?>"><?php echo $p->getMaqModelo();?></a></h3>
                                </div>
                            </article>
                            
                            <?php } ?>
                            
                        </div><!-- #portfolio end -->

                        <!-- Portfolio Script
                        ============================================= -->
                        <script type="text/javascript">

                            jQuery(window).load(function(){

                                var $container = $('#portfolio');

                                $container.isotope({ transitionDuration: '0.65s' });

                                $('#portfolio-filter a').click(function(){
                                    $('#portfolio-filter li').removeClass('activeFilter');
                                    $(this).parent('li').addClass('activeFilter');
                                    var selector = $(this).attr('data-filter');
                                    $container.isotope({ filter: selector });
                                    return false;
                                });

                                $('#portfolio-shuffle').click(function(){
                                $container.isotope('updateSortData').isotope({
                                    sortBy: 'random'
                                });
                            });

                                $(window).resize(function() {
                                    $container.isotope('layout');
                                });

                            });

                        </script><!-- Portfolio Script End -->

                    </div>

                </div>

                <script type="text/javascript">

                    jQuery(document).ready(function($) {

                        var ocClients = $("#oc-clients-full");

                        ocClients.owlCarousel({
                            margin: 30,
                            loop: true,
                            nav: false,
                            autoplay: true,
                            dots: false,
                            autoplayHoverPause: true,
                            responsive:{
                                0:{ items:3 },
                                600:{ items:4 },
                                1000:{ items:5 },
                                1200:{ items:6 },
                                1400:{ items:7 }
                            }
                        });

                    });

                </script>

            </div>

        </section><!-- #content end -->