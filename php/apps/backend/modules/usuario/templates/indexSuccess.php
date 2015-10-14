				<div class="widget-header">
					<i class="icon-cog"></i>
					<h3>Administradores</h3>
				</div> <!-- /widget-header -->
				
				<div class="widget-content">	

					<div class="col-md-8 border-right">
						<h3>Listado</h3>
						<br>
						<div class="table-responsive">
							<table class="table table-bordered table-hover table-striped">
						        <thead>
						          <tr>
						            <th>#</th>
						            <th>Nombre</th>
						            <th>Acciones</th>
						          </tr>
						        </thead>
						        <tbody>
						        <?php for($a=1;$a<=10;$a++){ ?>
						          <tr>
						            <td class="col-md-1"><?php echo $a; ?></td>
						            <td class="col-md-7">User yxz</td>
						            <td class="col-md-4">
						            	<a tabindex="-1" href="javascript:;"><i class="icon-edit"></i> Editar</a> 
						            	<a tabindex="-1" href="javascript:;"><i class="icon-remove"></i> Eliminar</a>
						            </td>
						          </tr>
						          <?php } ?>
						        </tbody>
					      	</table>
					  	</div>

					  	<div align="right">
          
				          <ul class="pagination">
				            <li><a href="javascript:;">&laquo;</a></li>
				            <li class="active"><a href="#">1</a></li>
				            <li><a href="javascript:;">2</a></li>
				            <li><a href="javascript:;">3</a></li>
				            <li><a href="javascript:;">4</a></li>
				            <li><a href="javascript:;">5</a></li>
				            <li><a href="javascript:;">&raquo;</a></li>
				          </ul>	

						</div> 

					</div>
					<div class="col-md-4">
					
						<h4>Agregar</h4>
						<br>
						<form action="/" role="form" class="form-horizontal col-md-12">

							<div class="form-group">
								<label class="col-md-4">Nombre</label>
								<div class="col-md-8">
									<input type="text" name="input1" placeholder="Ingrese nombre" required="required" value="" class="form-control" />
								</div>
							</div> <!-- /.form-group -->

							<div class="form-group">
								<label class="col-md-4">Apellido</label>
								<div class="col-md-8">
									<input type="text" name="input1" placeholder="Ingrese apellido" required="required" value="" class="form-control" />
								</div>
							</div> <!-- /.form-group -->

							<div class="form-group">
								<label class="col-md-4">Correo</label>
								<div class="col-md-8">
									<input type="email" name="input1" placeholder="Ingrese email" required="required" value="" class="form-control" />
								</div>
							</div> <!-- /.form-group -->

							<hr />


							<div class="form-group">
								<label class="col-md-4">Usuario</label>
								<div class="col-md-8">
									<input type="text" name="input1" placeholder="Ingrese usuario" required="required" value="" class="form-control" />
								</div>
							</div> <!-- /.form-group -->


							<div class="form-group">
								<label class="col-md-4">Clave</label>
								<div class="col-md-8">
									<input type="text" name="input1" placeholder="Ingrese clave" required="required" value="" class="form-control" />
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