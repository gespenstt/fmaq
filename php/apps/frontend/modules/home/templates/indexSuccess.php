

		<section id="slider" class="slider-parallax swiper_wrapper clearfix" style="height: 550px;">

			<div class="swiper-container swiper-parent">
				<div class="swiper-wrapper">
					<div class="swiper-slide" style="background-image: url('<?php echo public_path("uploads/slide-1.jpg");?>'); background-position: center top;">
						<div class="container clearfix">
							<div class="slider-caption">
								<h2>Maquinarias Futamaq</h2>
								<p>Ofrecemos tecnología de última generación.</p>
							</div>
						</div>
					</div>

					<div class="swiper-slide" style="background-image: url('<?php echo public_path("uploads/slide-2.jpg");?>'); background-position: center top;">
						<div class="container clearfix">
							<div  class="slider-caption">
								<h2>Control Georeferenciado</h2>
								<p></p>
							</div>
						</div>
					</div>

					<div class="swiper-slide" style="background-image: url('<?php echo public_path("uploads/slide-3.jpg");?>'); background-position: center bottom;">
						<div class="container clearfix">
							<div  class="slider-caption">
								<h2>Agricultura de precisión</h2>
								<p></p>
							</div>
						</div>
					</div>
				</div>
				<div id="slider-arrow-left"><i class="icon-angle-left"></i></div>
				<div id="slider-arrow-right"><i class="icon-angle-right"></i></div>
			</div>

		</section>

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">

				
                         
                            

				<div class="container bottommargin-lg clearfix">
                                    
                                    <?php
                                    $count = 1; 
                                     
                                    foreach($promos as $promo){ 
                                       
                                        ?>

                                        <div class="col_one_third nobottommargin <?php if($count==3){ echo "col_last"; }?>">
						<div class="feature-box media-box">
							<div class="fbox-media">
                                                            <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo substr($promo->getPromUrlvideo(),strpos($promo->getPromUrlvideo(), 'v=')+2,15);   ?>" frameborder="0" allowfullscreen></iframe>
							</div>
							<div class="fbox-desc">
								<h3><?php echo $promo->getPromTitulo(); ?><span class="subtitle"><?php echo $promo->getPromDescripcion(); ?></span></h3>
								
							</div>
						</div>
					</div>
                                    <?php $count++; } ?>

				</div>
 
				<div class="container bottommargin-lg clearfix">

					<div class="heading-block center">
						<h2 class="center nobottommargin ls1">Qué hacemos</h2>
					</div>

					<div class="clear-bottommargin">
						<div class="row common-height clearfix">
                                                    
                                                    <?php foreach($servicios as $servicio){ ?>
							<div class="col-md-4 col-sm-6 bottommargin">
								<div class="feature-box fbox-plain">
									<h3><?php echo $servicio->getSerTitulo() ?></h3>
									<p><?php echo html_entity_decode($servicio->getSerContenido()) ?></p>
								</div>
							</div>
                                                    <?php } ?>
                                                    
						</div>
					</div>

				</div>
                                <a href="<?php echo url_for("contacto/index");?>" class="button button-3d nobottomborder button-full center tright bottommargin-lg t300 font-primary" style="font-size: 26px;">
					<div class="container clearfix">
						¿Estás interesado en alguno de nuestros servicios? <strong>Consulta aquí</strong> <i class="icon-angle-right" style="top:3px;"></i>
					</div>
				</a>
				<div class="heading-block center">
					<h2 class="">Nuestra maquinaria</h2>
				</div>

				<div id="portfolio" class="portfolio-full clearfix">
                                    
                                    <?php foreach($nuestras as $nuestra){ ?>

					<article class="portfolio-item pf-media pf-icons">
						<div class="portfolio-image">
                                                    <?php  
                                                    $imagen = null;
                                                    foreach($nuestra->getMaquinariaFotos() as $mf){
                                                        $imagen = $mf->getMfoRuta();
                                                        break;
                                                    }
                                                    if(is_null($imagen)){
                                                        $imagen = "images/sin-imagen.gif";
                                                    } ?>
                                                    <img src="<?php echo public_path($imagen);?>" alt="">
							<div class="portfolio-overlay">
								<a href="<?php echo url_for("nuestramaquinaria/detalle?maqid=".$nuestra->getMaqId()); ?>" class="center-icon"><i class="icon-line-ellipsis"></i></a>
							</div>
						</div>
						<div class="portfolio-desc">
							<h3><a href="<?php echo url_for("nuestramaquinaria/detalle?maqid=".$nuestra->getMaqId()); ?>"><?php echo $nuestra->getMaqModelo();  ?></a></h3>
							
						</div>
					</article>
                                    
                                    <?php } ?>

				</div>
                                <div class="promo promo-light promo-full uppercase bottommargin-lg header-stick">
					<div class="container clearfix">
						<h3 style="letter-spacing: 2px;">¿Estás interesado en trabajar con nosotros?</h3>
						<span>Contáctanos completando el siguiente formulario y se parte de nuestro equipo</span>
						<a href="<?php echo url_for("trabaja/index");?>" class="button button-large button-border button-rounded">Contactar aquí</a>
					</div>
				</div>
				

				<div class="container topmargin-lg cleafix">

					<div class="col_two_fifth">
						<h4>Nuestras Marcas</h4>

						<p>Nos esforzamos para entregarle a nuestros clientes lo mejor. Es por esto que en Futamaq trabajamos con las mejores marcas en el rubro agrícola.</p>

						<ul class="clients-grid grid-2 nobottommargin clearfix">
                                                  
							<li style="padding: 20px;"><img src="<?php echo public_path("uploads/LEMKEN_Logo.gif");?>" alt="LEMKEN" height="23"s></li>
                                                       
                                                        <li style="padding: 20px;"><img src="<?php echo public_path("uploads/logoclaas.png");?>" alt="CLAAS" height="23"></li>
                                                         <li style="padding: 20px;"><img src="<?php echo public_path("uploads/logo_joskin.png");?>" alt="JOSKIN" height="23"></li>
                                                        <li style="padding: 20px;"><img src="<?php echo public_path("uploads/logokrone.png");?>" alt="KRONE" height="23"></li>
                                                  
						</ul>
					</div>

					<div class="col_three_fifth col_last">
						<h4>Noticias</h4>

						<div id="oc-posts" class="owl-carousel posts-carousel">
                                                    
                                                    <?php foreach($notis as $noti){ ?>

							<div class="oc-item">
								<div class="ipost clearfix">
									<div class="entry-image">
										<a href="<?php echo $noti->getNotUrl(); ?>" data-lightbox="image"><img class="image_fade" src="<?php echo $noti->getNotImagen(); ?>" alt=""></a>
									</div>
									<div class="entry-title">
										<h3><a href="<?php echo $noti->getNotUrl(); ?>"><?php echo $noti->getNotTitulo(); ?></a></h3>
									</div>
									
									<div class="entry-content">
                                                                            <p><?php
                                                                            echo html_entity_decode($noti->getNotDescripcion());
                                                                         ?></p>
									</div>
								</div>
							</div>
                                                    
                                                    <?php } ?>

						</div>

						<script type="text/javascript">

							jQuery(document).ready(function($) {

								var ocPosts = $("#oc-posts");

								ocPosts.owlCarousel({
									margin: 20,
									nav: true,
									navText: ['<i class="icon-angle-left"></i>','<i class="icon-angle-right"></i>'],
									autoplay: false,
									autoplayHoverPause: true,
									dots: false,
									responsive:{
										0:{ items:1 },
										600:{ items:2 },
										1000:{ items:2 },
										1200:{ items:2 }
									}
								});

							});

						</script>
					</div>

				</div>

				<div class="line topmargin-sm"></div>

				<!--<div class="section nobg notopmargin nopadding footer-stick">
					<div class="container clearfix">

						<div class="row">
							<div class="col-md-7">
								<img src="<?php echo public_path("uploads/800x500-home.jpg");?>" alt="Bottom Trust">
							</div>
							<div class="col-md-5 topmargin-sm">
								<div class="heading-block nobottomborder">
									<h2>Confía en nosotros.</h2>
									<span class="ls1">Futamaq se compromete contigo.</span>
								</div>

								<ul class="iconlist iconlist-large iconlist-color">
									<li><i class="icon-ok"></i> Al servicio del agricultor desde 2005</li>
									<li><i class="icon-ok"></i> Servicio georeferenciado de control</li>
									<li><i class="icon-ok"></i> Última tecnología en maquinaria</li>
								</ul>
							</div>
						</div>

					</div>
				</div> -->

			</div>

		</section><!-- #content end -->