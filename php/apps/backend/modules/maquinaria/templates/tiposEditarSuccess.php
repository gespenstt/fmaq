				<div class="widget-header">
					<i class="icon-wrench"></i>
					<h3>Maquinaria</h3>
				</div> <!-- /widget-header -->
				
				<div class="widget-content">	

					<div class="col-md-4">
					
						<h4>Editar tipo</h4>
						<br>
                                                <form method="post" action="<?php echo url_for("maquinaria/tiposAcciones"); ?>" role="form" class="form-horizontal col-md-12">
                                                    <input type="hidden" name="accion" value="modificar" />
                                                    <input type="hidden" name="tma_id" value="<?php echo $tipo->getTmaId();?>" />
 							<div class="form-group">
								<label class="col-md-4">Tipo</label>
								<div class="col-md-8">
                                                                    <input type="text" name="nombre" placeholder="Ingrese tipo" required="required" value="<?php echo $tipo->getTmaNombre();?>" class="form-control" />
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