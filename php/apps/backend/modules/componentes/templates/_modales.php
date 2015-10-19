

					<div id="modal-campo" class="modal fade" tabindex="-1" role="dialog">
						<div class="modal-dialog">
							<div class="modal-content">

							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								<h4 class="modal-title">Campo</h4>
							</div>
							<div class="modal-body">
								
								<h4>Agregar</h4>
								<br>
								
								<div>

									<form action="/" role="form" class="form-horizontal col-md-12">

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

											<div class="col-md-offset-4 col-md-8">

												<button type="submit" class="btn btn-success">Crear</button>

												<button class="btn btn-default">Cancelar</button>
											</div>

										</div> <!-- /.form-group -->

									</form>

								</div>

							</div>

							</div>
						</div>
					</div>


					<div id="modal-potrero" class="modal fade" tabindex="-1" role="dialog">
						<div class="modal-dialog">
							<div class="modal-content">

							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								<h4 class="modal-title">Potrero</h4>
							</div>
							<div class="modal-body">

								<p>
								
								<h4>Agregar</h4>
								<br>

									<form action="/" role="form" class="form-horizontal  col-md-12">

										<div class="form-group">
											<label class="col-md-4">Nombre</label>
											<div class="col-md-8">
												<input type="text" name="input1" placeholder="Nombre" required="required" value="" class="form-control" />
											</div>
										</div> <!-- /.form-group -->

										<div class="form-group">
											<label class="col-md-4">Ubicación</label>
											<div class="col-md-8">
												<input type="text" name="input1" placeholder="Ubicación" required="required" value="" class="form-control" />
											</div>
										</div> <!-- /.form-group -->

										<div class="form-group">
											<label class="col-md-4">Cantidad de hectareas</label>
											<div class="col-md-8">
												<input type="number" name="input1" placeholder="0" required="required" value="" class="form-control" />
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

								</p>

							</div>


							</div>
						</div>
					</div>


					<div id="modal-cv" class="modal fade" tabindex="-1" role="dialog">
						<div class="modal-dialog">
							<div class="modal-content">

							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								<h4 class="modal-title">CV</h4>
							</div>
							<div class="modal-body">

							<div class="col-md-12 form-horizontal ">

								<div class="form-group">
									<label class="col-md-4">Nombre</label>
									<div class="col-md-8">
										Felipe Joaquín Flores Delgado
									</div>
								</div> <!-- /.form-group -->

								<div class="form-group">
									<label class="col-md-4">Rut</label>
									<div class="col-md-8">
										1.111.111-1
									</div>
								</div> <!-- /.form-group -->

								<div class="form-group">
									<label class="col-md-4">Telefono</label>
									<div class="col-md-8">
										99999999
									</div>
								</div> <!-- /.form-group -->

								<div class="form-group">
									<label class="col-md-4">Carta presentación</label>
									<div class="col-md-8">
										Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
									</div>
								</div> <!-- /.form-group -->

								<hr />

								<div class="form-group">
									<label class="col-md-4">Adjunto</label>
									<div class="col-md-8">
										<a tabindex="-1" href="javascript:;"><i class="icon-download-alt"></i> Descargar</a> 
									</div>
								</div> <!-- /.form-group -->

							</div>

							</div>


							</div>
						</div>
					</div>


					<div id="modal-imagen" class="modal fade" tabindex="-1" role="dialog">
						<div class="modal-dialog">
							<div class="modal-content">

							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								<h4 class="modal-title">Imagen</h4>
							</div>
							<div class="modal-body">

							<div class="col-md-12 form-horizontal ">

								<img id="modal-imagen-img-src" width="100%" src="<?php echo public_path("img/gallery/lr1_large.png"); ?>" />

								<hr />

								<form action="<?php echo url_for("maquinaria/eliminarimagen"); ?>" method="post">
                                                                    <input type="hidden" id="modal-imagen-id" name="mfo_id" value="" />
								<input type="submit" value="Eliminar imagen" class="btn btn-danger" />
								</form>

							</div>

							</div>


							</div>
						</div>
					</div>