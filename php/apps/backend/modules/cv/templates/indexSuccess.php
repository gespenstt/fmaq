        <div class="widget-header">
                <i class="icon-briefcase"></i>
                <h3>Curriculum</h3>
        </div> <!-- /widget-header -->

        <div class="widget-content">	

                <h3>Listado</h3>
                <div>
                    <a href="<?php echo url_for("cv/index");?>">Todos</a> | 
                    <a href="<?php echo url_for("cv/index/?destacado=ok");?>">Destacados</a>
                </div>
                <br>

                <div class="table-responsive">
                    
                <?php if($pager->count()>0){ ?>
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Carta presentación</th>
                            <th>Telefono</th>
                            <th>Acciones</th>
                          </tr>
                        </thead>
                        <tbody>
                                <?php $count = 1; 
                                foreach ($pager->getResults() as $p){ ?>
                          <tr>
                            <td class="col-md-1"><?php echo $count; ?></td>
                            <td class="col-md-3"><?php echo $p->getCurNombre(); ?></td>
                            <td class="col-md-4"><?php echo $util->setLimitString($p->getCurCartaPresentacion(),200); ?></td>
                            <td class="col-md-2"><?php echo $p->getCurTelefono(); ?></td>
                            <td class="col-md-2">                                
                            <form action="<?php echo url_for("cv/eliminar");?>" method="post">
                                <input type="hidden" name="cur_id" value="<?php echo $p->getCurId(); ?>" />
                                <?php if($p->getCurDestacado()==false){?>
                                    <a href="<?php echo url_for("cv/destacar/?cur_id=".$p->getCurId()."&p=$pagina");?>"><i class="icon-ok"></i> Destacar</a> 
                                <?php }else{ ?>
                                    <a href="<?php echo url_for("cv/destacar/?cur_id=".$p->getCurId()."&p=$pagina");?>"><i class="icon-remove"></i> Destacar</a>                                 
                                <?php } ?>
                                    <br />
                                <a href="javascript:;" data-url="<?php echo url_for("api/index");?>" data-id="<?php echo $p->getCurId(); ?>" class="modal-cv"><i class="icon-edit"></i> Detalle</a> 
                                <a href="javascript:;" class="msgbox-eliminar" data-msg="¿Está seguro de eliminar el curriculum?"><i class="icon-remove"></i> Eliminar</a>
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
                            echo '<li><a href="'.url_for("cv/index/?p=1&destacado=$destacado").'">«</a></li>';
                        endif;

                        foreach ($links as $e): 
                            $current = '';
                            if($actualPagina == $e):
                                $current = ' active';
                            endif;
                            if(($e < $minimo && $minimo > 1) || ($e <= $maximo)):
                            echo '<li class="'.$current.'"><a href="'.url_for("cv/index/?p=$e&destacado=$destacado").'">'.$e.'</a></li>';
                            endif;
                        endforeach; 

                        if($linkSaltoUltimo <= $ultimaPagina):                                            
                            echo '<li><a href="'.url_for("cv/index/?p=$ultimaPagina&destacado=$destacado").'">»</a></li>';
                        endif;

                        ?>                                         
                    </ul>
                    <?php } ?> 
                </div> 