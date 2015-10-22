        <div class="widget-header">
                <i class="icon-user"></i>
                <h3>Clientes</h3>
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
                            <th>Email</th>
                            <th>Empresa</th>
                            <th>Acciones</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php $count = 1; 
                                foreach ($pager->getResults() as $p){ ?>
                          <tr>
                            <td class="col-md-1"><?php echo $count; ?></td>
                            <td class="col-md-4"><?php echo $p->getCliNombre()." ".$p->getCliApellido();?></td>
                            <td class="col-md-3"><?php echo $p->getCliCorreo(); ?></td>
                            <td class="col-md-2"><?php echo $p->getCliEmpresa();?></td>
                            <td class="col-md-2">                         
                            <form action="<?php echo url_for("cliente/eliminar");?>" method="post">
                                <input type="hidden" name="cli_id" value="<?php echo $p->getCliId(); ?>" />
                                <a href="<?php echo url_for("cliente/editar/?cli_id=".$p->getCliId());?>"><i class="icon-edit"></i> Editar</a> 
                                <a href="javascript:;" class="msgbox-eliminar" data-msg="¿Está seguro de eliminar el cliente?"><i class="icon-remove"></i> Eliminar</a>
                            </form>
                            </td>
                          </tr>
                          <?php $count++;                                                           
                                } ?>
                        </tbody>
                      </table>
                    <?php }else{ ?>
                    <p>No hay clientes registrados.</p>
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