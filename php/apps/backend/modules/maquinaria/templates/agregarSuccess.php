<?php
	use_stylesheet("fileinput.min.css");
    use_javascript("fileinput.min.js");
    use_javascript("fileinput_locale_es.js");
    use_javascript("plugins/canvas-to-blob.min.js");
    use_javascript("maquinaria.js");
?><?php
    use_stylesheet("redactor.css");
    use_javascript("redactor.min.js");
?>
				<div class="widget-header">
					<i class="icon-wrench"></i>
					<h3>Maquinaria</h3>
				</div> <!-- /widget-header -->
				
				<div class="widget-content">	

					<form method="post" enctype="multipart/form-data" action="<?php echo url_for("maquinaria/agregar");?>" role="form" class="form-horizontal col-md-12">

					<div class="col-md-7">

						<div class="col-md-12">

						<h3>Agregar</h3>
						<br>

							<div class="form-group">
								<label class="col-md-4">Modelo</label>
								<div class="col-md-8">
									<input type="text" name="modelo" placeholder="Modelo" required="required" value="" class="form-control" />
								</div>
							</div> <!-- /.form-group -->

							<div class="form-group">
								<label class="col-md-4">Marca</label>
								<div class="col-md-8">
									<select name="marca" class="form-control" required="required">
                                                                            <option>Seleccione...</option>
                                                                            <?php foreach($marcas as $m){ ?>
                                                                            <option value="<?php echo $m->getMarId();?>"><?php echo $m->getMarNombre();?></option>
                                                                            <?php } ?>
									</select>
								</div>
							</div> <!-- /.form-group -->

							<div class="form-group">
								<label class="col-md-4">Tipo</label>
								<div class="col-md-8">
									<select name="tipo" class="form-control" required="required">
                                                                            <option>Seleccione...</option>
                                                                            <?php foreach($tipos as $m){ ?>
                                                                            <option value="<?php echo $m->getTmaId();?>"><?php echo $m->getTmaNombre();?></option>
                                                                            <?php } ?>
									</select>
								</div>
							</div> <!-- /.form-group -->

							<div class="form-group">
								<label class="col-md-4">Descripción</label>
								<div class="col-md-8">
									<textarea name="descripcion" required="required" class="form-control editor-redactor"></textarea>
								</div>
							</div> <!-- /.form-group -->

							<div class="form-group">
								<label class="col-md-4">Precio</label>
								<div class="col-md-8">
									<input type="number" name="precio" placeholder="Ingrese solo numeros" required="required" value="" class="form-control" />
								</div>
							</div> <!-- /.form-group -->

							<div class="form-group">
								<label class="col-md-4">Fono</label>
								<div class="col-md-8">
									<input type="text" name="fono" placeholder="Ingrese teléfono" required="required" value="" class="form-control" />
								</div>
							</div> <!-- /.form-group -->

							<div class="form-group">
								<label class="col-md-4">Contacto</label>
								<div class="col-md-8">
									<input type="text" name="contacto" placeholder="Ingrese contacto" required="required" value="" class="form-control" />
								</div>
							</div> <!-- /.form-group -->

							<div class="form-group">
								<label class="col-md-4">Correo</label>
								<div class="col-md-8">
									<input type="email" name="email" placeholder="usuario@dominio.tld" required="required" value="" class="form-control" />
								</div>
							</div> <!-- /.form-group -->

							<div class="form-group">
								<label class="col-md-4">Año</label>
								<div class="col-md-8">
									<input type="number" name="ano" placeholder="" required="required" value="" class="form-control" />
								</div>
							</div> <!-- /.form-group -->

							<div class="form-group">
								<label class="col-md-4">Horas</label>
								<div class="col-md-8">
									<input type="number" name="hora" placeholder="" required="required" value="" class="form-control" />
								</div>
							</div> <!-- /.form-group -->

							<hr />

							
							<div class="form-group">

								<div class="col-md-offset-4 col-md-8">

									<button type="submit" class="btn btn-success">Crear</button>

									<a href="<?php echo url_for("maquinaria/index");?>" class="btn btn-default">Cancelar</a>

								</div>

							</div> <!-- /.form-group -->


							</div>

					</div>	

					<div class="col-md-5 border-left">

						<h4>Cargar imágenes</h4>
						<input type="file" id="input-upload" name="imagenes[]" multiple=true class="file-loading" data-show-upload="false" />

					</div>

					</form>
					
					
				</div> <!-- /widget-content -->					
