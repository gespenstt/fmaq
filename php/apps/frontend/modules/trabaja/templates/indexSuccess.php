<?php
    use_javascript("https://www.google.com/recaptcha/api.js");
    use_javascript("jquery.Rut.min.js");
?>
<?php
    use_stylesheet("fileinput.min.css");
    use_javascript("fileinput.min.js");
    use_javascript("fileinput_locale_es.js");
    use_javascript("plugins/canvas-to-blob.min.js");
?> 
		<!-- Page Title
		============================================= -->
		<section id="page-title" class="page-title-parallax page-title-dark" style="background-image: url('<?php echo public_path("uploads/trabajos-header-bg.jpg");?>'); padding: 120px 0;" data-stellar-background-ratio="0.3">

			<div class="container clearfix">
				<h1>Trabaja con nosotros</h1>
				<span>Postula a un puesto en nuestra empresa</span>
				<ol class="breadcrumb">
					<li><a href="<?php echo url_for("home/index");?>">Home</a></li>
					<li class="active">Trabajos</li>
				</ol>
			</div>

		</section><!-- #page-title end -->

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">

					<div class="col_three_fifth nobottommargin">

						<div class="fancy-title title-bottom-border">
							<h3>¿Qué buscamos en Futamaq?</h3>
						</div>

						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo, natus voluptatibus adipisci porro magni dolore eos eius ducimus corporis quos perspiciatis quis iste, vitae autem libero ullam omnis cupiditate quam.</p>

						<div class="accordion accordion-bg clearfix">

							<div class="acctitle"><i class="acc-closed icon-ok-circle"></i><i class="acc-open icon-remove-circle"></i>Requerimientos</div>
							<div class="acc_content clearfix">
								<ul class="iconlist iconlist-color nobottommargin">
									<li><i class="icon-ok"></i>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
									<li><i class="icon-ok"></i>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
									<li><i class="icon-ok"></i>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
								</ul>
							</div>

							<div class="acctitle"><i class="acc-closed icon-ok-circle"></i><i class="acc-open icon-remove-circle"></i>¿Qué se espera de ti?</div>
							<div class="acc_content clearfix">
								<ul class="iconlist iconlist-color nobottommargin">
									<li><i class="icon-plus-sign"></i>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
									<li><i class="icon-plus-sign"></i>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
									<li><i class="icon-plus-sign"></i>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
								</ul>
							</div>

							<div class="acctitle"><i class="acc-closed icon-ok-circle"></i><i class="acc-open icon-remove-circle"></i>¿Qué ofrecemos?</div>
							<div class="acc_content clearfix">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo, natus voluptatibus adipisci porro magni dolore eos eius ducimus corporis quos perspiciatis quis iste, vitae autem libero ullam omnis cupiditate quam.</div>

						</div>

					</div>

					<div class="col_two_fifth nobottommargin col_last">

						<div id="job-apply" class="heading-block">
							<h2>Postula ahora</h2>
							<span>Nos pondremos en contacto contigo.</span>
						</div>
                                            
                                                <?php if($msg){ ?>
                                                <div class="alert alert-<?php echo $tipo_msg;?>">
                                                    <?php echo $msg; ?>
                                                </div>
                                                <?php } ?>

						<div id="job-form-result" data-notify-type="success" data-notify-msg="<i class=icon-ok-sign></i> Message Sent Successfully!"></div>

                                                <form onsubmit="return validarForm();" action="<?php echo url_for("trabaja/index");?>" enctype="multipart/form-data" id="template-jobform" name="template-jobform" method="post" role="form">

							<div class="form-process"></div>

							<div class="col_full">
								<label for="template-jobform-fname">Nombre completo <small>*</small></label>
								<input type="text" id="template-jobform-fname" name="cv_nombre" value="" class=" sm-form-control" required="required" />
							</div>

							<div class="col_full">
								<label for="template-jobform-email">Email <small>*</small></label>
								<input type="email" id="template-jobform-email" name="cv_email" value="" class="sm-form-control" required="required" />
							</div>

							<div class="col_half">
								<label for="template-jobform-rut">Rut <small>*</small></label>
								<input type="text" name="cv_rut" id="template-jobform-age" value="" size="22" tabindex="4" class="sm-form-control rut" required="required" />
							</div>

							<div class="col_half col_last">
								<label for="template-jobform-phone">Telefono <small>*</small></label>
								<input type="text" name="cv_telefono" id="template-jobform-phone" value="" size="22" tabindex="5" class="sm-form-control " required="required" />
							</div>

							<div class="clear"></div>

							<div class="col_full">
								<label for="template-jobform-application">Solicitud <small>*</small></label>
								<textarea name="cv_solicitud" id="template-jobform-application" rows="6" tabindex="11" class="sm-form-control " required="required"></textarea>
							</div>

							<div class="col_full">
								<label for="template-jobform-cvfile">Cargar CV <small>*</small></label>
                                                                <input class="file-loading" data-show-upload="false" type="file" id="cv_archivo" name="cv_archivo" required="required" />
							</div>
                                                        
                                                        <div class="col_full">
                                                            <div class="g-recaptcha" data-sitekey="6Lft3hETAAAAAGMeo0kPjdS_M8TP1MP15v0Q-pn2"></div>
                                                        </div>

							<div class="col_full">
								<button class="button button-3d button-large btn-block nomargin" name="template-jobform-apply" type="submit" value="apply">Enviar postulación</button>
							</div>

						</form>

						<script type="text/javascript">
                                                    
                                                    function validarForm(){
                                                        var cr = grecaptcha.getResponse();
                                                        if(cr.length>1){
                                                            return true
                                                        }else{
                                                            return false;
                                                        }
                                                    }
                                                    
                                                    $(document).ready(function(){
                                                        $(".rut").Rut({
                                                            format_on: 'keyup',
                                                            on_error: function(){ $(".rut").val(""); }
                                                        });
                                                        $("#cv_archivo").fileinput({
                                                            language: "es",
                                                            allowedFileExtensions: ["doc", "docx", "pdf"]
                                                        });
                                                    })
                                                        
						</script>

					</div>

				</div>

			</div>

		</section><!-- #content end -->