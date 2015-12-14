<?php if(count($maquinaria)>0){ ?>

                                <h4>Nuestras Máquinas</h4>
                                <div id="oc-portfolio-sidebar" class="owl-carousel portfolio-5">                                    
                                    
                                    <?php foreach($maquinaria as $p){ ?>
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

                                    <div class="oc-item">
                                        <div class="iportfolio">
                                            <div class="portfolio-image">
                                                <a href="<?php echo url_for("nuestramaquinaria/detalle/?maqid=".$p->getMaqId());?>">
                                                    <img src="<?php echo public_path($imagen);?>" alt="">
                                                </a>
                                            </div>
                                            <div class="portfolio-desc center nobottompadding">
                                                <h3><a href="<?php echo url_for("nuestramaquinaria/detalle/?maqid=".$p->getMaqId());?>"><?php echo $p->getMaqModelo();?></a></h3>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <?php } ?>

                                </div>

                                <script type="text/javascript">

                                    jQuery(document).ready(function($) {

                                        var ocClients = $("#oc-portfolio-sidebar");

                                        ocClients.owlCarousel({
                                            items: 1,
                                            margin: 10,
                                            loop: true,
                                            nav: false,
                                            autoplay: true,
                                            dots: true,
                                            autoplayHoverPause: true
                                        });

                                    });

                                </script>
<?php } ?>                                