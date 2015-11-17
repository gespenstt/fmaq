<?php
	use_stylesheet("fileinput.min.css");
    use_javascript("fileinput.min.js");
    use_javascript("fileinput_locale_es.js");
    use_javascript("plugins/canvas-to-blob.min.js");
    use_javascript("maquinaria.js");
?>
				<div class="widget-header">
					<i class="icon-magnet"></i>
					<h3>Nuestra Maquinaria</h3>
				</div> <!-- /widget-header -->
				
				<div class="widget-content">	

					<form method="post" enctype="multipart/form-data" action="<?php echo url_for("nuestramaquinaria/editar");?>" role="form" class="form-horizontal col-md-12">

                                        <input type="hidden" name="maq_id" value="<?php echo $maquinaria->getMaqId();?>" />
                                            
					<div class="col-md-6">

						<div class="col-md-12">

						<h3>Agregar</h3>
						<br>

							<div class="form-group">
								<label class="col-md-4">Título</label>
								<div class="col-md-8">
                                                                    <input type="text" name="modelo" placeholder="Título" required="required" value="<?php echo $maquinaria->getMaqModelo();?>" class="form-control" />
								</div>
							</div> <!-- /.form-group -->

							<?php /*<div class="form-group">
								<label class="col-md-4">Marca</label>
								<div class="col-md-8">
									<select name="marca" class="form-control" required="required">
                                                                            <option>Seleccione...</option>
                                                                            <?php foreach($marcas as $m){ ?>
                                                                            <option value="<?php echo $m->getMarId();?>" <?php if($m->getMarId() == $maquinaria->getMarId()){ echo "selected"; } ?>><?php echo $m->getMarNombre();?></option>
                                                                            <?php } ?>
									</select>
								</div>
							</div> <!-- /.form-group -->*/?>

							<div class="form-group">
								<label class="col-md-4">Descripción</label>
								<div class="col-md-8">
                                                                    <textarea name="descripcion" required="required" class="form-control"><?php echo $maquinaria->getMaqDescripcion(); ?></textarea>
								</div>
							</div> <!-- /.form-group -->

							<hr />

							
							<div class="form-group">

								<div class="col-md-offset-4 col-md-8">

									<button type="submit" class="btn btn-success">Actualizar</button>

									<a href="<?php echo url_for("nuestramaquinaria/index"); ?>" class="btn btn-default">Cancelar</a>

								</div>

							</div> <!-- /.form-group -->


							</div>

					</div>	

					<div class="col-md-6 border-left">

						<h4>Imágenes</h4>
						<br>
                                                <?php if(count($maquinaria->getMaquinariaFotos())>0){ ?>
						<ul class="gallery-container">
                                                    <?php foreach($maquinaria->getMaquinariaFotos() as $foto){ ?>
 							<li>
								<a href="javascript:;" class="modal-imagen" data-urlform="<?php echo url_for("nuestramaquinaria/eliminarimagen");?>" data-img="<?php echo $url_frontend.$foto->getMfoRuta();?>" data-id="<?php echo $foto->getMfoId();?>">
								<img src="<?php echo $url_frontend.$foto->getMfoRuta();?>" />
								</a>
							</li>	
                                                    <?php } ?>
						</ul>
                                                <?php }else{ ?>
                                                <p>No se han encontrado imágenes.</p>
                                                <?php } ?>
						<hr />
						<h4>Cargar imágenes</h4>
						<input type="file" id="input-upload" name="imagenes[]" multiple=true class="file-loading" data-show-upload="false" />

					</div>

					</form>
					
					
				</div> <!-- /widget-content -->					
