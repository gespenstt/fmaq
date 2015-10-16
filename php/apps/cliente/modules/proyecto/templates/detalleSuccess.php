				<div class="widget-header">
					<i class="icon-folder-open"></i>
					<h3>Mis Proyectos</h3>
				</div> <!-- /widget-header -->
				
				<div class="widget-content">


					<form action="/" role="form" class="form-horizontal col-md-12">

					<div class="col-md-8">

						<div class="col-md-10">

						<h4>Detalle proyecto</h4>
						<br>

							<div class="form-group">
								<label class="col-md-4">Nombre</label>
								<div class="col-md-8">
									Proyecto xyz
								</div>
							</div> <!-- /.form-group -->

							<div class="form-group">
								<label class="col-md-4">Tipo proyecto</label>
								<div class="col-md-8">
									Tipo xyz
								</div>
							</div> <!-- /.form-group -->

							<div class="form-group">
								<label class="col-md-4">Campo</label>
								<div class="col-md-8">
									Campo xyz
								</div>
							</div> <!-- /.form-group -->

							<div class="form-group">
								<label class="col-md-4">Potrero</label>
								<div class="col-md-8">
									Potrero xyz
								</div>
							</div> <!-- /.form-group -->

							<div class="form-group">
								<label class="col-md-4">Fecha</label>
								<div class="col-md-8">
									01-10-2015
								</div>
							</div> <!-- /.form-group -->

							<div class="form-group">
								<label class="col-md-4">Descripción</label>
								<div class="col-md-8">
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam vel sapien nec nibh rhoncus efficitur quis ac tortor. Proin iaculis lobortis nunc, non eleifend quam lobortis sed. Nullam placerat mi ex, dapibus gravida dolor venenatis sed. Maecenas tincidunt vehicula condimentum. Maecenas tristique sem erat, ut auctor arcu scelerisque posuere. Suspendisse tincidunt ac ex eu tincidunt.</p>
								</div>
							</div> <!-- /.form-group -->


							</div>

					</div>	

					<div class="col-md-4 border-left">

							<h4>Archivos adjuntos</h4>
							<br>

							<div class="table-responsive">
							<table class="table table-bordered table-hover table-striped">
						        <thead>
						          <tr>
						            <th>Nombre</th>
						            <th>Acciones</th>
						          </tr>
						        </thead>
						        <tbody>
						        <?php for($a=1;$a<=10;$a++){ ?>
						          <tr>
						            <td class="col-md-7">Imagen.pdf</td>
						            <td class="col-md-4">
						            	<a href="#"><i class="icon-download-alt"></i> Descargar</a> 
						            </td>
						          </tr>
						          <?php } ?>
						        </tbody>
					      	</table>
					  	</div>

					</div>

					</form>
					
					
				</div> <!-- /widget-content -->