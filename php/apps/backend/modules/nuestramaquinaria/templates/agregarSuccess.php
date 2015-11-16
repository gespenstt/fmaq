<?php
	use_stylesheet("fileinput.min.css");
    use_javascript("fileinput.min.js");
    use_javascript("fileinput_locale_es.js");
    use_javascript("plugins/canvas-to-blob.min.js");
    use_javascript("maquinaria.js");
?>
				<div class="widget-header">
					<i class="icon-wrench"></i>
					<h3>Nuestra Maquinaria</h3>
				</div> <!-- /widget-header -->
				
				<div class="widget-content">	

					<form method="post" enctype="multipart/form-data" action="<?php echo url_for("nuestramaquinaria/agregar");?>" role="form" class="form-horizontal col-md-12">

					<div class="col-md-6">

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
								<label class="col-md-4">Descripción</label>
								<div class="col-md-8">
									<textarea name="descripcion" required="required" class="form-control"></textarea>
								</div>
							</div> <!-- /.form-group -->

							<hr />

							
							<div class="form-group">

								<div class="col-md-offset-4 col-md-8">

									<button type="submit" class="btn btn-success">Crear</button>

									<a href="<?php echo url_for("nuestramaquinaria/index");?>" class="btn btn-default">Cancelar</a>

								</div>

							</div> <!-- /.form-group -->


							</div>

					</div>	

					<div class="col-md-6 border-left">

						<h4>Cargar imágenes</h4>
						<input type="file" id="input-upload" name="imagenes[]" multiple=true class="file-loading" data-show-upload="false" />

					</div>

					</form>
					
					
				</div> <!-- /widget-content -->					
