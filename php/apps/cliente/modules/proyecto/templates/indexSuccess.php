				<div class="widget-header">
					<i class="icon-folder-open"></i>
					<h3>Mis Proyectos</h3>
				</div> <!-- /widget-header -->
				
				<div class="widget-content">	

						<h3>Listado de proyectos realizados</h3>
						<br>
						<div class="table-responsive">
                                                    <?php if($pager->count()>0){ ?>
							<table class="table table-bordered table-hover table-striped">
						        <thead>
						          <tr>
						            <th>#</th>
						            <th>Proyecto</th>
                                                            <th>Campo</th>
                                                            <th>Potrero</th>
						            <th>Tipo</th>
						            <th>Fecha</th>
						            <th>Acciones</th>
						          </tr>
						        </thead>
						        <tbody>
						        <?php $count = 1; 
                                                            foreach ($pager->getResults() as $p){  ?>
						          <tr>
						            <td ><?php echo $count; ?></td>
						            <td class="col-md-3"><?php echo $p->getProNombre(); ?></td>
                                                            <td ><?php echo $p->getPotrero()->getCampo()->getCamNombre(); ?></td>
                                                            <td ><?php echo $p->getPotrero()->getPotNombre(); ?></td>
						            <td ><?php echo $p->getTipoProyecto()->getTprNombre(); ?></td>
						            <td ><?php echo date_format($p->getProFecha(), 'd-m-Y'); ?></td>
						            <td >
						            	<a href="<?php echo url_for("proyecto/detalle");?>"><i class="icon-eye-open"></i> Detalle</a> 
						            </td>
						          </tr>
						             <?php $count++;    } ?>
						        </tbody>
					      	</table>
                                                     <?php }else{ ?>
                    <p>No hay proyectos asignados</p>
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
                            echo '<li><a href="'.url_for("cliente/index/?p=1").'">«</a></li>';
                        endif;

                        foreach ($links as $e): 
                            $current = '';
                            if($actualPagina == $e):
                                $current = ' active';
                            endif;
                            if(($e < $minimo && $minimo > 1) || ($e <= $maximo)):
                            echo '<li class="'.$current.'"><a href="'.url_for("cliente/index/?p=$e").'">'.$e.'</a></li>';
                            endif;
                        endforeach; 

                        if($linkSaltoUltimo <= $ultimaPagina):                                            
                            echo '<li><a href="'.url_for("cliente/index/?p=$ultimaPagina").'">»</a></li>';
                        endif;

                        ?>                                         
                    </ul>
                    <?php } ?> 

						</div> 

					
					
				</div> <!-- /widget-content -->