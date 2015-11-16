				<div class="widget-header">
					<i class="icon-wrench"></i>
					<h3>Nuestra Maquinaria</h3>
				</div> <!-- /widget-header -->
				
				<div class="widget-content">	

					<div class="col-md-4">
					
						<h4>Editar</h4>
						<br>
                                                <form method="post" action="<?php echo url_for("nuestramaquinaria/marcasAcciones"); ?>" role="form" class="form-horizontal col-md-12">
                                                    <input type="hidden" name="accion" value="modificar" />
                                                    <input type="hidden" name="mar_id" value="<?php echo $marca->getMarId();?>" />
 							<div class="form-group">
								<label class="col-md-4">Marca</label>
								<div class="col-md-8">
                                                                    <input type="text" name="marca" placeholder="Ingrese marca" required="required" value="<?php echo $marca->getMarNombre();?>" class="form-control" />
								</div>
							</div> <!-- /.form-group -->

							
							<div class="form-group">

								<div class="col-md-offset-4 col-md-8">

									<button type="submit" class="btn btn-success">Actualizar</button>
								</div>

							</div> <!-- /.form-group -->

						</form>

					</div>

					
					
				</div> <!-- /widget-content -->