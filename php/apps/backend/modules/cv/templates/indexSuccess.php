				<div class="widget-header">
					<i class="icon-briefcase"></i>
					<h3>Curriculum</h3>
				</div> <!-- /widget-header -->
				
				<div class="widget-content">	

					<h3>Listado</h3>
					<br>
					
					<div class="table-responsive">
					<table class="table table-bordered table-hover table-striped">
					        <thead>
					          <tr>
					            <th>#</th>
					            <th>Nombre</th>
					            <th>Telefono</th>
					            <th>Acciones</th>
					          </tr>
					        </thead>
					        <tbody>
					        <?php for($a=1; $a<=4; $a++){ ?>
					          <tr>
					            <td class="col-md-1"><?php echo $a; ?></td>
					            <td class="col-md-5">Joaquin Lara</td>
					            <td class="col-md-4">9999999</td>
					            <td class="col-md-2">
					            	<a data-toggle="modal" href="#modal-cv"><i class="icon-edit"></i> Detalle</a> 
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