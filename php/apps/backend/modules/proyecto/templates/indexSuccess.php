				<div class="widget-header">
					<i class="icon-folder-open"></i>
					<h3>Proyectos</h3>
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
						            <th>Fecha</th>
						            <th>Acciones</th>
						          </tr>
						        </thead>
						        <tbody>
						        <?php for($a=1;$a<=4;$a++){ ?>
						          <tr>
						            <td class="col-md-1"><?php echo $a; ?></td>
						            <td class="col-md-5">Proyecto yxz</td>
						            <td class="col-md-2">24-12-2015</td>
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

					
					
				</div> <!-- /widget-content -->