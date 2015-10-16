				<div class="widget-header">
					<i class="icon-folder-open"></i>
					<h3>Mis Proyectos</h3>
				</div> <!-- /widget-header -->
				
				<div class="widget-content">	

						<h3>Listado</h3>
						<br>
						<div class="table-responsive">
							<table class="table table-bordered table-hover table-striped">
						        <thead>
						          <tr>
						            <th>#</th>
						            <th>Proyecto</th>
						            <th>Tipo</th>
						            <th>Fecha</th>
						            <th>Acciones</th>
						          </tr>
						        </thead>
						        <tbody>
						        <?php for($a=1;$a<=4;$a++){ ?>
						          <tr>
						            <td class="col-md-1"><?php echo $a; ?></td>
						            <td class="col-md-4">Proyecto yxz</td>
						            <td class="col-md-3">Tipo</td>
						            <td class="col-md-2">24-12-2015</td>
						            <td class="col-md-2">
						            	<a href="<?php echo url_for("proyecto/detalle");?>"><i class="icon-eye-open"></i> Detalle</a> 
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

					
					
				</div> <!-- /widget-content -->