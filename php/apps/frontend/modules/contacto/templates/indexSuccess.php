<?php
    use_javascript("https://www.google.com/recaptcha/api.js");
?>
                <!-- Page Title
		============================================= -->
		<section id="page-title">

			<div class="container clearfix">
				<h1>Contacto</h1>
				<span>Escríbenos tu consulta</span>
				<ol class="breadcrumb">
					<li><a href="<?php echo url_for("home/index");?>">Home</a></li>
					<li class="active">Contacto</li>
				</ol>
			</div>

		</section><!-- #page-title end -->

		<!-- Google Map
		============================================= -->
		<section id="google-map" class="gmap slider-parallax"></section>

		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
		<script type="text/javascript" src="<?php echo public_path("js/jquery.gmap.js");?>"></script>

		<script type="text/javascript">

			$('#google-map').gMap({

				address: 'T-941, Río Bueno, Región de los Ríos, Chile',
				maptype: 'ROADMAP',
				zoom: 10,
				markers: [
					{
						address: "T-941, Río Bueno, Región de los Ríos, Chile",
						html: '<div style="width: 300px;"><h4 style="margin-bottom: 8px;">Futamaq</h4><p class="nobottommargin"></p></div>',
						icon: {
							image: "<?php echo public_path("images/icons/map-icon-red.png");?>",
							iconsize: [32, 39],
							iconanchor: [13,39]
						}
					}
				],
				doubleclickzoom: false,
				controls: {
					panControl: true,
					zoomControl: true,
					mapTypeControl: true,
					scaleControl: false,
					streetViewControl: false,
					overviewMapControl: false
				}

			});

		</script><!-- Google Map End -->

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">

					<!-- Postcontent
					============================================= -->
					<div class="postcontent nobottommargin">

						<h3>Escríbenos un mail</h3>
 <?php if($msg){ ?>
                                                <div class="alert alert-<?php echo $tipo_msg;?>">
                                                    <?php echo $msg; ?>
                                                </div>
                                                <?php } ?>
						<div id="contact-form-result" data-notify-type="success" data-notify-msg="<i class=icon-ok-sign></i> Message Sent Successfully!"></div>

						<form onsubmit="return validarForm();" class="nobottommargin" id="template-contactform" name="template-contactform" action="" method="post">

							<div class="form-process"></div>

							<div class="col_one_third">
								<label for="template-contactform-name">Nombre <small>*</small></label>
								<input type="text" id="template-contactform-name" name="template-contactform-name" value="" class="sm-form-control required" />
							</div>

							<div class="col_one_third">
								<label for="template-contactform-email">Email <small>*</small></label>
								<input type="email" id="template-contactform-email" name="template-contactform-email" value="" class="required email sm-form-control" />
							</div>

							<div class="col_one_third col_last">
								<label for="template-contactform-phone">Teléfono </label>
								<input type="text" id="template-contactform-phone" name="template-contactform-phone" value="" class="sm-form-control" />
							</div>

							<div class="clear"></div>

							<div class="col_two_third">
								<label for="template-contactform-subject">Asunto <small>*</small></label>
								<input type="text" id="template-contactform-subject" name="template-contactform-subject" value="" class="required sm-form-control" />
							</div>

							<div class="col_one_third col_last cambiaOpcion">
								<label for="template-contactform-service">Tipo Contacto</label>
								<select id="template-contactform-service" name="template-contactform-service" class="sm-form-control">
									<option value="consulta">Consulta</option>
									<option value="cotización">Cotización</option>
								</select>
							</div>
                                                        <div id="camposCotizacion" style="display: none;">
                                                        <div class="col_two_third">
								<label for="template-contactform-subject">Dirección</label>
								<input type="text" id="template-contactform-subject" name="template-contactform-address" value="" class="sm-form-control" />
							</div>
                                                        
                                                        <div class="col_one_third col_last">
								<label for="template-contactform-phone">Cantidad </label>
								<input type="text" id="template-contactform-phone" name="template-contactform-mount" value="" class="sm-form-control" />
							</div>
                                                            </div>
							<div class="clear"></div>

							<div class="col_full">
								<label for="template-contactform-message">Mensaje <small>*</small></label>
								<textarea class="required sm-form-control" id="template-contactform-message" name="template-contactform-message" rows="6" cols="30"></textarea>
							</div>

							<div class="col_full hidden">
								<input type="text" id="template-contactform-botcheck" name="template-contactform-botcheck" value="" class="sm-form-control" />
							</div>
                                                        
                                                        <div class="col_full">
                                                            <div class="g-recaptcha" data-sitekey="6Lft3hETAAAAAGMeo0kPjdS_M8TP1MP15v0Q-pn2"></div>
                                                        </div>

							<div class="col_full">
								<button class="button button-3d nomargin" type="submit" id="template-contactform-submit" name="template-contactform-submit" value="submit">Enviar mensaje</button>
							</div>

						</form>

						<script type="text/javascript">
                                                       
                                                        $( ".cambiaOpcion" ).change(function() {
                                                            
                                                             $( "select option:selected" ).each(function() {
                                                                  
                                                                    var valor = $( this ).val();
                                                                    if(valor=="consulta"){
                                                                        $("#camposCotizacion").hide();
                                                                    }else{
                                                                        $("#camposCotizacion").show();
                                                                    }       
                                                                  });
                                                            
                                                            
                                                          });

						</script>

					</div><!-- .postcontent end -->

					<!-- Sidebar
					============================================= -->
					<div class="sidebar col_last nobottommargin">

						<address>
							<strong>Oficinas:</strong><br>
							Osorno<br>
							Los Lagos<br>
						</address>
						<abbr title="Teléfono"><strong>Teléfono:</strong></abbr> +56 (65) 2 2123456<br>
						<abbr title="Fax"><strong>Fax:</strong></abbr> +56 (65) 2 2123456<br>
						<abbr title="Email"><strong>Email:</strong></abbr> info@futamaq.com<br>

					</div><!-- .sidebar end -->

				</div>

			</div>

		</section><!-- #content end -->