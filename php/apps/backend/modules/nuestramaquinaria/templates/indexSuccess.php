				<div class="widget-header">
					<i class="icon-magnet"></i>
					<h3>Nuestra Maquinaria</h3>
				</div> <!-- /widget-header -->
				
				<div class="widget-content">	

					<h3>Listado</h3>
					<br>
					
					<div class="table-responsive">
                                                    <?php if($pager->count()>0){ ?>
					<table class="table table-bordered table-hover table-striped">
					        <thead>
					          <tr>
					            <th>#</th>
					            <th>Título</th>
					            <th>Descripción</th>
					            <th>Acciones</th>
					          </tr>
					        </thead>
					        <tbody><?php $count = 1; 
                                                        foreach ($pager->getResults() as $p){ ?>
					          <tr>
					            <td class="col-md-1"><?php echo $count; ?></td>
					            <td class="col-md-3"><?php echo $p->getMaqModelo();?></td>
					            <td class="col-md-6"><?php echo $p->getMaqDescripcion(); ?></td>
					            <td class="col-md-2">
                                                        <form action="<?php echo url_for("nuestramaquinaria/eliminar");?>" method="post">
                                                            <input type="hidden" name="maq_id" value="<?php echo $p->getMaqId(); ?>" />
                                                            <a href="<?php echo url_for("nuestramaquinaria/editar/?maq_id=".$p->getMaqId()) ?>"><i class="icon-edit"></i> Editar</a>
                                                            <a href="javascript:;" class="msgbox-eliminar" data-msg="¿Está seguro de eliminar esta maquinaria?"><i class="icon-remove"></i> Eliminar</a>
                                                        </form>
					            </td>
					          </tr>
						          <?php $count++;                                                           
                                                        } ?>
					        </tbody>
					      </table>
                                                    <?php }else{ ?>
                                                    <p>No existen registros de maquinarias.</p>
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
                                            echo '<li><a href="'.url_for("nuestramaquinaria/index/?p=1").'">«</a></li>';
                                        endif;
                                        
                                        foreach ($links as $e): 
                                            $current = '';
                                            if($actualPagina == $e):
                                                $current = ' active';
                                            endif;
                                            if(($e < $minimo && $minimo > 1) || ($e <= $maximo)):
                                            echo '<li class="'.$current.'"><a href="'.url_for("nuestramaquinaria/index/?p=$e").'">'.$e.'</a></li>';
                                            endif;
                                        endforeach; 
                                        
                                        if($linkSaltoUltimo <= $ultimaPagina):                                            
                                            echo '<li><a href="'.url_for("nuestramaquinaria/index/?p=$ultimaPagina").'">»</a></li>';
                                        endif;
                                        
                                        ?>                                         
                                    </ul>
                                    <?php } ?>  	

					</div> 