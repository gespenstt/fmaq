				<div class="widget-header">
					<i class="icon-wrench"></i>
					<h3>Maquinaria</h3>
				</div> <!-- /widget-header -->
				
				<div class="widget-content">	

					<div class="col-md-8 border-right">
						<h3>Marcas</h3>
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
						            <td class="col-md-7"><?php echo $p->getMarNombre(); ?></td>
						            <td class="col-md-4">
                                                                <form action="<?php echo url_for("maquinaria/marcasAcciones");?>" method="post">
                                                                    <input type="hidden" name="accion" value="eliminar" />
                                                                    <input type="hidden" name="mar_id" value="<?php echo $p->getMarId(); ?>" />
                                                                    <a href="<?php echo url_for("maquinaria/marcasEditar/?mar_id=".$p->getMarId()); ?>"><i class="icon-edit"></i> Editar</a>
                                                                    <a href="javascript:;" class="msgbox-eliminar" data-msg="¿Está seguro de eliminar la marca?"><i class="icon-remove"></i> Eliminar</a>
                                                                </form>
						            </td>
						          </tr>
						          <?php $count++;                                                           
                                                        } ?>
						        </tbody>
					      	</table>
                                                    <?php }else{ ?>
                                                    <p>No existen registros de marcas.</p>
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
                                            echo '<li><a href="'.url_for("maquinaria/marcas/?p=1").'">«</a></li>';
                                        endif;
                                        
                                        foreach ($links as $e): 
                                            $current = '';
                                            if($actualPagina == $e):
                                                $current = ' active';
                                            endif;
                                            if(($e < $minimo && $minimo > 1) || ($e <= $maximo)):
                                            echo '<li class="'.$current.'"><a href="'.url_for("maquinaria/marcas/?p=$e").'">'.$e.'</a></li>';
                                            endif;
                                        endforeach; 
                                        
                                        if($linkSaltoUltimo <= $ultimaPagina):                                            
                                            echo '<li><a href="'.url_for("maquinaria/marcas/?p=$ultimaPagina").'">»</a></li>';
                                        endif;
                                        
                                        ?>                                         
                                    </ul>
                                    <?php } ?>    

						</div> 

					</div>
					<div class="col-md-4">
					
						<h4>Agregar</h4>
						<br>
                                                <form method="post" action="<?php echo url_for("maquinaria/marcasAcciones"); ?>" role="form" class="form-horizontal col-md-12">
                                                    <input type="hidden" name="accion" value="agregar" />
							<div class="form-group">
								<label class="col-md-4">Marca</label>
								<div class="col-md-8">
									<input type="text" name="marca" placeholder="Ingrese marca" required="required" value="" class="form-control" />
								</div>
							</div> <!-- /.form-group -->

							
							<div class="form-group">

								<div class="col-md-offset-4 col-md-8">

									<button type="submit" class="btn btn-success">Ingresar</button>
								</div>

							</div> <!-- /.form-group -->

						</form>

					</div>

					
					
				</div> <!-- /widget-content -->