				<div class="widget-header">
					<i class="icon-cog"></i>
					<h3>Administradores</h3>
				</div> <!-- /widget-header -->
				
				<div class="widget-content">	

					
					<div class="col-md-4">
					
						<h4>Agregar</h4>
						<br>
						<form action="<?php echo url_for("usuario/editar");?>" method="post" role="form" class="form-horizontal col-md-12">
                                                    
                                                        <input type="hidden" name="usu_id" value="<?php echo $usuario->getUsuId();?>" />

							<div class="form-group">
								<label class="col-md-4">Nombre</label>
								<div class="col-md-8">
                                                                    <input type="text" name="nombre" placeholder="Ingrese nombre" required="required" value="<?php echo $usuario->getUsuNombre();?>" class="form-control" />
								</div>
							</div> <!-- /.form-group -->

							<div class="form-group">
								<label class="col-md-4">Apellido</label>
								<div class="col-md-8">
                                                                    <input type="text" name="apellido" placeholder="Ingrese apellido" required="required" value="<?php echo $usuario->getUsuApellido();?>" class="form-control" />
								</div>
							</div> <!-- /.form-group -->

							<div class="form-group">
								<label class="col-md-4">Correo</label>
								<div class="col-md-8">
                                                                    <input type="email" name="email" placeholder="Ingrese email" required="required" value="<?php echo $usuario->getUsuCorreo();?>" class="form-control" />
								</div>
							</div> <!-- /.form-group -->

							<hr />


							<div class="form-group">
								<label class="col-md-4">Usuario</label>
								<div class="col-md-8">
                                                                    <input type="text" name="usuario" placeholder="Ingrese usuario" required="required" value="<?php echo $usuario->getUsuUsuario();?>" <?php if($usuario->getUsuUsuario()=="admin"){ ?>readonly="readonly"<?php } ?> class="form-control" />
								</div>
							</div> <!-- /.form-group -->


							<div class="form-group">
								<label class="col-md-4">Clave</label>
								<div class="col-md-8">
									<input type="text" name="password" placeholder="Ingrese clave" value="" class="form-control" />
								</div>
							</div> <!-- /.form-group -->

							<hr />

							
							<div class="form-group">

								<div class="col-md-offset-4 col-md-8">

									<button type="submit" class="btn btn-success">Ingresar</button>
								</div>

							</div> <!-- /.form-group -->

						</form>

					</div>

					
					
				</div> <!-- /widget-content -->