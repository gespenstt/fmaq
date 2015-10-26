
		<!-- Page Title
		============================================= -->
		<section id="page-title">

			<div class="container clearfix">
				<h1>Tractor - John Deere - 7210R</h1>
				<div id="portfolio-navigation">
					<a href="#"><i class="icon-angle-left"></i></a>
					<a href="#"><i class="icon-line-grid"></i></a>
					<a href="#"><i class="icon-angle-right"></i></a>
				</div>
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
						<a href="#"><img src="<?php echo public_path("uploads/maquina-single.jpg");?>" alt=""></a>
					</div><!-- .portfolio-single-image end -->

					<!-- Máquina Single Content
					============================================= -->
					<div class="col_one_third portfolio-single-content col_last nobottommargin">

						<!-- Máquina Single - Description
						============================================= -->
						<div class="fancy-title title-bottom-border">
							<h2>Detalles:</h2>
						</div>
						<p>El nuevo tractor 7210R de John Deere es la solución ideal para los clientes que desean un tractor confiable, con uso eficaz del combustible que ofrezca la máxima versatilidad, comodidad y productividad, ya que cuenta con la potencia del motor PowerTech™ 6.8L de John Deere de 210 hp, así mismo con un paquete de refrigeración actualizado, características Premium en la cabina y con la ahora disponible transmisión PowerShift e23™. Los Tractores 7R también cuentan opcionalmente con un enganche delantero de 3 puntos, opciones de TDF, simplificando el enganche de los implementos delanteros.</p>
						<!-- Máquina Single - Description End -->

						<div class="lineMáquina"></div>

						<!-- Máquina Single - Meta
						============================================= -->
						<table class="portfolio-meta bottommargin">
							<tr>
								<td style="min-width:140px"><strong>Tipo:</strong></td>
								<td>Cocechadora</td>
							</tr>
							<tr>
								<td><strong>Marca:</strong></td>
								<td>John Deere</td>
							</tr>
							<tr>
								<td><strong>Modelo:</strong></td>
								<td>1177 AL</td>
							</tr>
							<tr>
								<td><strong>Año:</strong></td>
								<td>1990</td>
							</tr>
							<tr>
								<td><strong>Horas:</strong></td>
								<td>1 100 h</td>
							</tr>
							<tr>
								<td><strong>Anchura de corte:</strong></td>
								<td>4,8m</td>
							</tr>
							<tr>
								<td><strong>Nombre de sacudidores:</strong></td>
								<td>NC</td>
							</tr>
							<tr>
								<td><strong>Equipos:</strong></td>
								<td>Cabina desmenuzadora de paja, carro de la cortadora, climatización, Self leveling</td>
							</tr>
							<tr>
								<td><strong>Estado:</strong></td>
								<td>Muy bueno</td>
							</tr>
							<tr>
								<td><strong>Disponibilidad:</strong></td>
								<td>Disponible</td>
							</tr>
							<tr>
								<td><strong>Precio (Sin IVA):</strong></td>
								<td>43500
									<select>
										<option>EUR</option>
										<option>USD</option>
										<option>CLP</option>
									</select>
								</td>
							</tr>
							<tr>
								<td><strong>Localización:</strong></td>
								<td>Sevilla</td>
							</tr>
							<tr>
								<td><strong>Comentarios:</strong></td>
								<td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate, asperiores quod est tenetur in. Eligendi, deserunt, blanditiis est quisquam doloribus voluptate id aperiam ea ipsum magni aut perspiciatis rem voluptatibus officia eos rerum deleniti quae nihil facilis repellat atque vitae voluptatem libero at eveniet veritatis ab facere.</td>
							</tr>
						</table>
						<!-- Máquina Single - Meta End -->

						<!-- Máquina Single - Share
						============================================= -->
						<div class="si-share clearfix">
							<span>Comparte:</span>
							<div>
								<a href="#" class="social-icon si-borderless si-facebook">
									<i class="icon-facebook"></i>
									<i class="icon-facebook"></i>
								</a>
								<a href="#" class="social-icon si-borderless si-twitter">
									<i class="icon-twitter"></i>
									<i class="icon-twitter"></i>
								</a>
								<a href="#" class="social-icon si-borderless si-pinterest">
									<i class="icon-pinterest"></i>
									<i class="icon-pinterest"></i>
								</a>
								<a href="#" class="social-icon si-borderless si-gplus">
									<i class="icon-gplus"></i>
									<i class="icon-gplus"></i>
								</a>
								<a href="#" class="social-icon si-borderless si-rss">
									<i class="icon-rss"></i>
									<i class="icon-rss"></i>
								</a>
								<a href="#" class="social-icon si-borderless si-email3">
									<i class="icon-email3"></i>
									<i class="icon-email3"></i>
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
                                            
                                            <?php for($a=1;$a<=10;$a++){ ?>

						<div class="oc-item">
							<div class="iportfolio">
								<div class="portfolio-image">
									<a href="<?php echo url_for("maquinarias/detalle");?>">
										<img src="<?php echo public_path("uploads/400x300-1.jpg");?>" alt="">
									</a>
									<div class="portfolio-overlay">
										<a href="<?php echo url_for("maquinarias/detalle");?>" class="center-icon"><i class="icon-line-ellipsis"></i></a>
									</div>
								</div>
								<div class="portfolio-desc">
									<h3><a href="<?php echo url_for("maquinarias/index");?>">Tipo de máquina</a></h3>
									<span><a href="<?php echo url_for("maquinarias/detalle");?>">Modelo de máquina</a></span>
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