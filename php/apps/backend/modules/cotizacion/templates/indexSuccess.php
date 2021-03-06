        <div class="widget-header">
                <i class="icon-star"></i>
                <h3>Cotización</h3>
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
                            <th>Nombre</th>
                            <th>Asunto</th>
                            <th>Acciones</th>
                          </tr>
                        </thead>
                        <tbody>
                                <?php $count = 1; 
                                foreach ($pager->getResults() as $p){ ?>
                          <tr>
                            <td class="col-md-1"><?php echo $count; ?></td>
                            <td class="col-md-5"><?php echo $p->getCotNombre(); ?></td>
                            <td class="col-md-4"><?php echo $p->getCotAsunto(); ?></td>
                            <td class="col-md-2">                                
                            <form action="<?php echo url_for("cotizacion/eliminar");?>" method="post">
                                <input type="hidden" name="cot_id" value="<?php echo $p->getCotId(); ?>" />
                                <a href="<?php echo url_for("cotizacion/detalle/?cot_id=".$p->getCotId());?>"><i class="icon-edit"></i> Detalle</a> 
                                <a href="javascript:;" class="msgbox-eliminar" data-msg="¿Está seguro de eliminar la cotización?"><i class="icon-remove"></i> Eliminar</a>
                            </form>
                            </td>
                          </tr>
                                <?php $count++;                                                           
                                } ?>
                        </tbody>
                    </table>
                    <?php }else{ ?>
                    <p>No hay registros.</p>
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
                            echo '<li><a href="'.url_for("cotizacion/index/?p=1").'">«</a></li>';
                        endif;

                        foreach ($links as $e): 
                            $current = '';
                            if($actualPagina == $e):
                                $current = ' active';
                            endif;
                            if(($e < $minimo && $minimo > 1) || ($e <= $maximo)):
                            echo '<li class="'.$current.'"><a href="'.url_for("cotizacion/index/?p=$e").'">'.$e.'</a></li>';
                            endif;
                        endforeach; 

                        if($linkSaltoUltimo <= $ultimaPagina):                                            
                            echo '<li><a href="'.url_for("cotizacion/index/?p=$ultimaPagina").'">»</a></li>';
                        endif;

                        ?>                                         
                    </ul>
                    <?php } ?> 
                </div> 