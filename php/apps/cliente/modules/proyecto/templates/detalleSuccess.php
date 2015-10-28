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
									<?php echo $proyecto->getProNombre(); ?>
								</div>
							</div> <!-- /.form-group -->

							<div class="form-group">
								<label class="col-md-4">Tipo proyecto</label>
								<div class="col-md-8">
									<?php echo $proyecto->getTipoProyecto()->getTprNombre(); ?>
								</div>
							</div> <!-- /.form-group -->

							<div class="form-group">
								<label class="col-md-4">Campo</label>
								<div class="col-md-8">
									<?php echo $proyecto->getPotrero()->getCampo()->getCamNombre(); ?>
								</div>
							</div> <!-- /.form-group -->

							<div class="form-group">
								<label class="col-md-4">Potrero</label>
								<div class="col-md-8">
									<?php echo $proyecto->getPotrero()->getPotNombre(); ?>
								</div>
							</div> <!-- /.form-group -->

							<div class="form-group">
								<label class="col-md-4">Fecha</label>
								<div class="col-md-8">
									<?php echo $proyecto->getProFecha(); ?>
								</div>
							</div> <!-- /.form-group -->

							<div class="form-group">
								<label class="col-md-4">Descripción</label>
								<div class="col-md-8">
                                                                    <p><?php echo $proyecto->getProDescripcion(); ?></p>
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
						        <?php foreach($archivos as $archivo){ ?>
						          <tr>
						            <td class="col-md-7"><?php echo $archivo->getParNombre(); ?></td>
						            <td class="col-md-4">
						            	<a href="<?php echo $archivo->getParRuta(); ?>"><i class="icon-download-alt"></i> Descargar</a> 
						            </td>
						          </tr>
						          <?php } ?>
						        </tbody>
					      	</table>
					  	</div>

					</div>

					</form>
					
					
				</div> <!-- /widget-content -->