				<div class="widget-header">
					<i class="icon-cog"></i>
					<h3>Administradores</h3>
				</div> <!-- /widget-header -->
				
				<div class="widget-content">	

					<div class="col-md-8 border-right">
						<h3>Listado</h3>
						<br>
						<div class="table-responsive">
                                                    <?php if($pager->count()>0){ ?>
							<table class="table table-bordered table-hover table-striped">
						        <thead>
						          <tr>
						            <th>#</th>
						            <th>Nombre</th>
						            <th>Acciones</th>
						          </tr>
						        </thead>
						        <tbody>
						        <?php $count = 1; 
                                                        foreach ($pager->getResults() as $p){ ?>
						          <tr>
						            <td class="col-md-1"><?php echo $count; ?></td>
						            <td class="col-md-7"><?php echo $p->getUsuNombre()." ".$p->getUsuApellido(); ?></td>
						            <td class="col-md-4">
                                                                <form action="<?php echo url_for("usuario/eliminar");?>" method="post">
                                                                    <input type="hidden" name="usu_id" value="<?php echo $p->getUsuId(); ?>" />
                                                                    <a href="<?php echo url_for("usuario/editar/?usu_id=".$p->getUsuId()) ?>"><i class="icon-edit"></i> Editar</a>
                                                                    <a href="javascript:;" class="msgbox-eliminar" data-msg="¿Está seguro de eliminar el usuario?"><i class="icon-remove"></i> Eliminar</a>
                                                                </form>
						            </td>
						          </tr>
						          <?php $count++;                                                           
                                                        } ?>
						        </tbody>
                                                        </table>
                                                    <?php }else{ ?>
                                                    <p>No existen registros de usuarios.</p>
                                                    <?php } ?>
					  	</div>

					  	<div align="right">	
                                                    
                                    <?php if ($pager->haveToPaginate()){ ?>
                                    <ul class="pagination">
                                        <?php                                         
                                        $actualPagina = $pager->getPage();
                                        $ultimaPagina = $pager->getLastPage();
                                        $minimo = $actualPagina - 1;
                                        $maximo = $actualPagina + 2;
                                        $linkSaltoPrimero = $actualPagina - 3;
                                        $linkSaltoUltimo = $actualPagina + 3;
                                        $links = $pager->getLinks();
                                        
                                        if($linkSaltoPrimero >= 1):
                                            echo '<li><a href="'.url_for("usuario/index/?p=1").'">«</a></li>';
                                        endif;
                                        
                                        foreach ($links as $e): 
                                            $current = '';
                                            if($actualPagina == $e):
                                                $current = ' active';
                                            endif;
                                            if(($e < $minimo && $minimo > 1) || ($e <= $maximo)):
                                            echo '<li class="'.$current.'"><a href="'.url_for("usuario/index/?p=$e").'">'.$e.'</a></li>';
                                            endif;
                                        endforeach; 
                                        
                                        if($linkSaltoUltimo <= $ultimaPagina):                                            
                                            echo '<li><a href="'.url_for("usuario/index/?p=$ultimaPagina").'">»</a></li>';
                                        endif;
                                        
                                        ?>                                         
                                    </ul>
                                    <?php } ?>                                                    

						</div> 

					</div>
					<div class="col-md-4">
					
						<h4>Agregar</h4>
						<br>
						<form action="<?php echo url_for("usuario/crear");?>" method="post" role="form" class="form-horizontal col-md-12">

							<div class="form-group">
								<label class="col-md-4">Nombre</label>
								<div class="col-md-8">
									<input type="text" name="nombre" minlength="3" placeholder="Ingrese nombre" required="required" value="" class="form-control" />
								</div>
							</div> <!-- /.form-group -->

							<div class="form-group">
								<label class="col-md-4">Apellido</label>
								<div class="col-md-8">
									<input type="text" name="apellido" minlength="3" placeholder="Ingrese apellido" required="required" value="" class="form-control" />
								</div>
							</div> <!-- /.form-group -->

							<div class="form-group">
								<label class="col-md-4">Correo</label>
								<div class="col-md-8">
									<input type="email" name="email" placeholder="Ingrese email" required="required" value="" class="form-control" />
								</div>
							</div> <!-- /.form-group -->

							<hr />


							<div class="form-group">
								<label class="col-md-4">Usuario</label>
								<div class="col-md-8">
									<input type="text" name="usuario" minlength="3" placeholder="Ingrese usuario" required="required" value="" class="form-control" />
								</div>
							</div> <!-- /.form-group -->


							<div class="form-group">
								<label class="col-md-4">Clave</label>
								<div class="col-md-8">
									<input type="text" name="password" minlength="3" placeholder="Ingrese clave" required="required" value="" class="form-control" />
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