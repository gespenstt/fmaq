				<div class="widget-header">
					<i class="icon-folder-open"></i>
					<h3>Proyectos</h3>
				</div> <!-- /widget-header -->
				
				<div class="widget-content">


					<form action="/" role="form" class="form-horizontal col-md-12">

					<div class="col-md-8">

						<div class="col-md-10">

						<h3>Agregar</h3>
						<br>

							<div class="form-group">
								<label class="col-md-4">Nombre</label>
								<div class="col-md-8">
									<input type="text" name="input1" placeholder="Nombre" required="required" value="" class="form-control" />
								</div>
							</div> <!-- /.form-group -->

							<div class="form-group">
								<label class="col-md-4">Tipo proyecto</label>
								<div class="col-md-8">
									<select class="form-control" required="required">
										<option>Seleccione...</option>
									</select>
								</div>
							</div> <!-- /.form-group -->

							<div class="form-group">
								<label class="col-md-4">Fecha</label>
								<div class="col-md-8">
									<input type="text" name="input1" placeholder="" required="required" value="" class="form-control fecha" />
								</div>
							</div> <!-- /.form-group -->

							<div class="form-group">
								<label class="col-md-4">Descripción</label>
								<div class="col-md-8">
									<textarea class="form-control" rows="6"></textarea>
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

					<div class="col-md-4 border-left">

						<h4>Seleccione Potrero</h4>
						<br>

							<div class="form-group">
								<label class="col-md-4">Cliente</label>
								<div class="col-md-8">
									<select class="form-control" required="required">
										<option>Seleccione cliente</option>
									</select>
								</div>
							</div> <!-- /.form-group -->

							<div class="form-group">
								<label class="col-md-4">Campo</label>
								<div class="col-md-8">
									<select class="form-control" required="required">
										<option>Seleccione campo</option>
									</select>
								</div>
							</div> <!-- /.form-group -->

							<div class="form-group">
								<label class="col-md-4">Potrero</label>
								<div class="col-md-8">
									<select class="form-control" required="required">
										<option>Seleccione potrero</option>
									</select>
								</div>
							</div> <!-- /.form-group -->

							<hr />

							<h4>Archivos</h4>

							<div class="col-md-12">
								<div class="float-right">
								<a class="btn btn-md" href="<?php echo url_for("proyecto/archivo");?>"><i class="icon-file"></i> Administrar archivos del proyecto</a>
								</div>
							</div>

					</div>

					</form>
					
					
				</div> <!-- /widget-content -->