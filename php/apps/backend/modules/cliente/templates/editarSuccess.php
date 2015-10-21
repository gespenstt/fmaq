				<div class="widget-header">
					<i class="icon-user"></i>
					<h3>Cliente</h3>
				</div> <!-- /widget-header -->
				
				<div class="widget-content">	

					<div class="col-md-7">
					
						<h3>Agregar</h3>
						<br>
						<form action="/" role="form" class="form-horizontal col-md-11">

							<div class="form-group">
								<label class="col-md-4">Nombre</label>
								<div class="col-md-8">
									<input type="text" name="input1" placeholder="Nombre" required="required" value="" class="form-control" />
								</div>
							</div> <!-- /.form-group -->

							<div class="form-group">
								<label class="col-md-4">Direccion</label>
								<div class="col-md-8">
									<input type="text" name="input1" placeholder="Apellido" required="required" value="" class="form-control" />
								</div>
							</div> <!-- /.form-group -->

							<div class="form-group">
								<label class="col-md-4">Contacto</label>
								<div class="col-md-8">
									<input type="email" name="input1" placeholder="contacto@dominio.tld" required="required" value="" class="form-control" />
								</div>
							</div> <!-- /.form-group -->

							<hr />

							<div class="form-group">
								<label class="col-md-4">Usuario</label>
								<div class="col-md-8">
									<input type="text" name="input1" placeholder="Usuario" required="required" value="" class="form-control" />
								</div>
							</div> <!-- /.form-group -->

							<div class="form-group">
								<label class="col-md-4">Contraseña</label>
								<div class="col-md-8">
									<input type="password" name="input1" placeholder="Contraseña" required="required" value="" class="form-control" />
								</div>
							</div> <!-- /.form-group -->

							<hr />

							
							<div class="form-group">

								<div class="col-md-offset-4 col-md-8">

									<button type="submit" class="btn btn-success">Crear</button>

									<button class="btn btn-default">Cancelar</button>
								</div>

							</div> <!-- /.form-group -->

						</form>

					</div>
					<div class="col-md-5 border-left">

						<div>
					
							<h4>Campo</h4>
							<div class="padding-bt clearfix">
								<div align="left" class="float-left">
									<input class="form-control input-sm" type="text" placeholder="Buscar">
								</div>
								<div align="right" class="float-right padding-rg">
									<a data-toggle="modal" href="#modal-campo"><i class="icon-plus"></i> Agregar</a>
								</div>
							</div>
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
								        <?php for($a=1; $a<=4; $a++){ ?>
								          <tr>
								            <td class="col-md-1"><?php echo $a; ?></td>
								            <td class="col-md-6">Campo 1234</td>
								            <td class="col-md-5">
								            	<a tabindex="-1" href="javascript:;"><i class="icon-edit"></i> Editar</a>
								            	<a tabindex="-1" href="javascript:;"><i class="icon-times"></i> Eliminar</a>
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

						<hr />

						<div>
					
							<h4>Potrero</h4>
							<div class="padding-bt clearfix">
								<div align="left" class="float-left">
									<input class="form-control input-sm" type="text" placeholder="Buscar">
								</div>
								<div align="right" class="float-right padding-rg">
									<a data-toggle="modal" href="#modal-potrero"><i class="icon-plus"></i> Agregar</a>
								</div>
							</div>
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
								        <?php for($a=1; $a<=4; $a++){ ?>
								          <tr>
								            <td class="col-md-1">1</td>
								            <td class="col-md-6">Potrero xyz</td>
								            <td class="col-md-5">
								            	<a tabindex="-1" href="javascript:;"><i class="icon-edit"></i> Editar</a>
								            	<a tabindex="-1" href="javascript:;"><i class="icon-times"></i> Eliminar</a>
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

					</div>


				</div>