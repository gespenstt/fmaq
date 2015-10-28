				<div class="widget-header">
					<i class="icon-cog"></i>
					<h3>Mi cuenta</h3>
				</div> <!-- /widget-header -->
				
				<div class="widget-content">	

					
					<div class="col-md-12">
					
						<h4>Mis datos</h4>
						<br>
						<form method="post" action="<?php echo url_for("cuenta/index");?>" role="form" class="form-horizontal col-md-12">

							<div class="form-group">
								<label class="col-md-4">Nombre</label>
								<div class="col-md-8">
									<?php echo $cliente->getCliNombre()." ".$cliente->getCliApellido(); ?>
								</div>
							</div> <!-- /.form-group -->

							<div class="form-group">
								<label class="col-md-4">Empresa</label>
								<div class="col-md-8">
									<?php echo $cliente->getCliEmpresa()?>
								</div>
							</div> <!-- /.form-group -->

							<div class="form-group">
								<label class="col-md-4">Contacto</label>
								<div class="col-md-8">
									<?php echo $cliente->getCliCorreo(); ?>
								</div>
							</div> <!-- /.form-group -->

							<hr />
							<h4>Cambiar contraseña</h4>
							<br>

							<div class="form-group">
								<label class="col-md-4">Actual clave</label>
								<div class="col-md-8">
									<input type="password" name="pass1" placeholder="Ingrese clave actual" required="required" value="" class="form-control" />
								</div>
							</div> <!-- /.form-group -->

							<div class="form-group">
								<label class="col-md-4">Nueva clave</label>
								<div class="col-md-8">
									<input type="password" name="pass2" placeholder="Ingrese clave nueva" required="required" value="" class="form-control" />
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