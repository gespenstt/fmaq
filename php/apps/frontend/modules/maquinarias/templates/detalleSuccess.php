
		<!-- Page Title
		============================================= -->
		<section id="page-title">

			<div class="container clearfix">
                            <h1><?php echo $maquinaria->getMaqModelo();?></h1>
			</div>

		</section><!-- #page-title end -->

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">

					<!-- Máquina Single Image
					============================================= -->
					<div class="col_two_third portfolio-single-image nobottommargin">
                                            
                                            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                                <!-- Indicators -->
                                                <ol class="carousel-indicators">
                                                  <?php $count = 0; foreach($maquinaria->getMaquinariaFotos() as $gar){ ?>
                                                  <li data-target="#myCarousel" data-slide-to="<?php echo $count;?>" class="<?php if($count==0){ echo "active"; }?>"></li>
                                                  <?php $count++; } ?>
                                                </ol>

                                                <!-- Wrapper for slides -->
                                                <div class="carousel-inner" role="listbox">
                                                  <?php $primera = true; foreach($maquinaria->getMaquinariaFotos() as $gar){ ?>
                                                  <div align="center" class="item <?php if($primera){ echo "active"; $primera=false; }?>">
                                                    <img src="<?php echo public_path($gar->getMfoRuta()); ?>">
                                                  </div>
                                                  <?php } ?>
                                                </div>

                                                <!-- Left and right controls -->
                                                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                                                  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                                  <span class="sr-only">Anterior</span>
                                                </a>
                                                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                                                  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                                  <span class="sr-only">Siguiente</span>
                                                </a>
                                              </div>

                                        
                                        </div><!-- .portfolio-single-image end -->

					<!-- Máquina Single Content
					============================================= -->
					<div class="col_one_third portfolio-single-content col_last nobottommargin">

						<!-- Máquina Single - Description
						============================================= -->
						<div class="fancy-title title-bottom-border">
							<h2>Detalles:</h2>
						</div>
                                                <p>
                                                    <?php echo html_entity_decode($maquinaria->getMaqDescripcion());?>
                                                </p>
						<!-- Máquina Single - Description End -->

						<div class="lineMáquina"></div>

						<!-- Máquina Single - Meta
						============================================= -->
						<table class="portfolio-meta bottommargin">
							<tr>
								<td style="min-width:140px"><strong>Tipo:</strong></td>
                                                                <td><?php echo $maquinaria->getTipoMaquinaria()->getTmaNombre();?></td>
							</tr>
							<tr>
								<td><strong>Marca:</strong></td>
                                                                <td><?php echo $maquinaria->getMarcaMaquinaria()->getMarNombre();?></td>
							</tr>
							<tr>
								<td><strong>Modelo:</strong></td>
                                                                <td><?php echo $maquinaria->getMaqModelo();?></td>
							</tr>
							<tr>
								<td><strong>Año:</strong></td>
                                                                <td><?php echo $maquinaria->getMaqAno();?></td>
							</tr>
							<tr>
								<td><strong>Horas:</strong></td>
                                                                <td><?php echo $maquinaria->getMaqHoras();?> h</td>
							</tr>
							
							<tr>
								<td><strong>Disponibilidad:</strong></td>
								<td>Disponible</td>
							</tr>
							<tr>
								<td><strong>Precio (Sin IVA):</strong></td>
                                                                <td><?php echo $maquinaria->getMaqPrecio();?>
								</td>
							</tr>
						</table>
						<!-- Máquina Single - Meta End -->

						<!-- Máquina Single - Share
						============================================= -->
						<div class="si-share clearfix">
							<span>Comparte:</span>
							<div>
                                                                <a target="_blank" href="<?php echo $util->getShareUrl("facebook");?>" class="social-icon si-borderless si-facebook">
									<i class="icon-facebook"></i>
									<i class="icon-facebook"></i>
								</a>
								<a target="_blank" href="<?php echo $util->getShareUrl("twitter");?>" class="social-icon si-borderless si-twitter">
									<i class="icon-twitter"></i>
									<i class="icon-twitter"></i>
								</a>
								<a target="_blank" href="<?php echo $util->getShareUrl("pinterest");?>" class="social-icon si-borderless si-pinterest">
									<i class="icon-pinterest"></i>
									<i class="icon-pinterest"></i>
								</a>
								<a target="_blank" href="<?php echo $util->getShareUrl("gplus");?>" class="social-icon si-borderless si-gplus">
									<i class="icon-gplus"></i>
									<i class="icon-gplus"></i>
								</a>
							</div>
						</div>
						<!-- Máquina Single - Share End -->

					</div><!-- .Máquina-single-content end -->

					<div class="clear"></div>

					<div class="divider divider-center"><i class="icon-circle"></i></div>

					<!-- Máquina Items
					============================================= -->
					<h4>Maquinaria relacionada:</h4>

					<div id="related-portfolio" class="owl-carousel portfolio-carousel">
                                            
                                            
                                           <?php foreach ($otrasmaquinas as $p){ ?>

						<div class="oc-item">
							<div class="iportfolio">
								<div class="portfolio-image">
                                                                        <a href="<?php echo url_for("nuestramaquinaria/detalle/?maqid=".$p->getMaqId());?>"><?php
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
							</div>
						</div>
                                            
                                            <?php } ?>

					</div><!-- .maquina-carousel end -->

					<script type="text/javascript">

						jQuery(document).ready(function($) {

							var relatedPortfolio = $("#related-portfolio");

							relatedPortfolio.owlCarousel({
								margin: 20,
								nav: false,
								dots:true,
								autoplay: true,
								autoplayHoverPause: true,
								responsive:{
									0:{ items:1 },
									480:{ items:2 },
									768:{ items:3 },
									992: { items:4 }
								}
							});

						});

					</script>

				</div>

			</div>

		</section><!-- #content end -->