<?php
	use_stylesheet("fileinput.min.css");
    use_javascript("fileinput.min.js");
    use_javascript("fileinput_locale_es.js");
    use_javascript("plugins/canvas-to-blob.min.js");
    use_javascript("maquinaria.js");
?>
				<div class="widget-header">
					<i class="icon-wrench"></i>
					<h3>Maquinaria</h3>
				</div> <!-- /widget-header -->
				
				<div class="widget-content">	

					<form method="post" enctype="multipart/form-data" action="<?php echo url_for("maquinaria/agregar");?>" role="form" class="form-horizontal col-md-12">

					<div class="col-md-6">

						<div class="col-md-12">

						<h3>Agregar</h3>
						<br>

							<div class="form-group">
								<label class="col-md-4">Modelo</label>
								<div class="col-md-8">
									<input type="text" name="input1" placeholder="Modelo" required="required" value="" class="form-control" />
								</div>
							</div> <!-- /.form-group -->

							<div class="form-group">
								<label class="col-md-4">Marca</label>
								<div class="col-md-8">
									<select class="form-control" required="required">
										<option>Seleccione...</option>
									</select>
								</div>
							</div> <!-- /.form-group -->

							<div class="form-group">
								<label class="col-md-4">Descripción</label>
								<div class="col-md-8">
									<textarea required="required" class="form-control fecha"></textarea>
								</div>
							</div> <!-- /.form-group -->

							<div class="form-group">
								<label class="col-md-4">Precio</label>
								<div class="col-md-8">
									<input type="text" name="input1" placeholder="" required="required" value="" class="form-control" />
								</div>
							</div> <!-- /.form-group -->

							<div class="form-group">
								<label class="col-md-4">Fono</label>
								<div class="col-md-8">
									<input type="text" name="input1" placeholder="" required="required" value="" class="form-control" />
								</div>
							</div> <!-- /.form-group -->

							<div class="form-group">
								<label class="col-md-4">Contacto</label>
								<div class="col-md-8">
									<input type="text" name="input1" placeholder="" required="required" value="" class="form-control" />
								</div>
							</div> <!-- /.form-group -->

							<div class="form-group">
								<label class="col-md-4">Correo</label>
								<div class="col-md-8">
									<input type="email" name="input1" placeholder="" required="required" value="" class="form-control" />
								</div>
							</div> <!-- /.form-group -->

							<div class="form-group">
								<label class="col-md-4">Año</label>
								<div class="col-md-8">
									<input type="number" name="input1" placeholder="" required="required" value="" class="form-control" />
								</div>
							</div> <!-- /.form-group -->

							<div class="form-group">
								<label class="col-md-4">Horas</label>
								<div class="col-md-8">
									<input type="number" name="input1" placeholder="" required="required" value="" class="form-control" />
								</div>
							</div> <!-- /.form-group -->

							<hr />

							
							<div class="form-group">

								<div class="col-md-offset-4 col-md-8">

									<button type="submit" class="btn btn-success">Crear</button>

									<button class="btn btn-default">Cancelar</button>

								</div>

							</div> <!-- /.form-group -->


							</div>

					</div>	

					<div class="col-md-6 border-left">

						<h4>Imágenes</h4>
						<br>
						<ul class="gallery-container">
							<li>
								<a data-toggle="modal" href="#modal-imagen">
								<img src="<?php echo public_path("img/gallery/lr1_large.png"); ?>" />
								</a>
							</li>	
							<li>
								<a data-toggle="modal" href="#modal-imagen">
								<img src="<?php echo public_path("img/gallery/lr1_large.png"); ?>" />
								</a>
							</li>	
							<li>
								<a data-toggle="modal" href="#modal-imagen">
								<img src="<?php echo public_path("img/gallery/lr1_large.png"); ?>" />
								</a>
							</li>	
							<li>
								<a data-toggle="modal" href="#modal-imagen">
								<img src="<?php echo public_path("img/gallery/lr1_large.png"); ?>" />
								</a>
							</li>	
							<li>
								<a data-toggle="modal" href="#modal-imagen">
								<img src="<?php echo public_path("img/gallery/lr1_large.png"); ?>" />
								</a>
							</li>	
							<li>
								<a data-toggle="modal" href="#modal-imagen">
								<img src="<?php echo public_path("img/gallery/lr1_large.png"); ?>" />
								</a>
							</li>							
						</ul>
						<hr />
						<h4>Cargar imágenes</h4>
						<input type="file" id="input-upload" name="imagenes[]" multiple=true class="file-loading" />

					</div>

					</form>
					
					
				</div> <!-- /widget-content -->					
