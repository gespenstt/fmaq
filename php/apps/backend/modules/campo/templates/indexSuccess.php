        <div class="widget-header">
                <i class="icon-leaf"></i>
                <h3>Campos</h3>
        </div> <!-- /widget-header -->

        <div class="widget-content">
                <div class="col-md-8 border-right">
                            
                        <h3>Listado</h3>
                        
                        <div class="padding-bt clearfix">
                            <form action="<?php echo url_for("campo/index");?>" method="get">
                                <div align="left" class="float-left">
                                        <input class="form-control input-sm" name="buscar" value="<?php echo $buscar;?>" type="text" placeholder="Buscar">
                                </div>
                            </form>
                        </div>
                        <br>
                        <div class="table-responsive">
                            <?php if($pager->count()>0){ ?>
                                <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                          <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>Cliente</th>
                                            <th>Acciones</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                        <?php $count = 1; 
                                        foreach ($pager->getResults() as $p){ ?>
                                          <tr>
                                            <td class="col-md-1"><?php echo $count; ?></td>
                                            <td class="col-md-3"><?php echo $p->getCamNombre(); ?></td>
                                            <td class="col-md-4"><?php echo $p->getCliente()->getCliNombre()." ".$p->getCliente()->getCliApellido();?></td>
                                            <td class="col-md-4">
                                            <form action="<?php echo url_for("campo/eliminar");?>" method="post">
                                                <input type="hidden" name="cam_id" value="<?php echo $p->getCamId(); ?>" />
                                                <a href="<?php echo url_for("potrero/index/?cam_id=".$p->getCamId()) ?>"><i class="icon-list"></i> Potretos</a>
                                                <a href="<?php echo url_for("campo/editar/?cam_id=".$p->getCamId()) ?>"><i class="icon-edit"></i> Editar</a>
                                                <a href="javascript:;" class="msgbox-eliminar" data-msg="¿Está seguro de eliminar el campo?"><i class="icon-remove"></i> Eliminar</a>
                                            </form>
                                            </td>
                                          </tr>
                                        <?php $count++;                                                           
                                      } ?>
                                      </tbody>
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
                                    echo '<li><a href="'.url_for("campo/index/?p=1&buscar=$buscar").'">«</a></li>';
                                endif;

                                foreach ($links as $e): 
                                    $current = '';
                                    if($actualPagina == $e):
                                        $current = ' active';
                                    endif;
                                    if(($e < $minimo && $minimo > 1) || ($e <= $maximo)):
                                    echo '<li class="'.$current.'"><a href="'.url_for("campo/index/?p=$e&buscar=$buscar").'">'.$e.'</a></li>';
                                    endif;
                                endforeach; 

                                if($linkSaltoUltimo <= $ultimaPagina):                                            
                                    echo '<li><a href="'.url_for("campo/index/?p=$ultimaPagina&buscar=$buscar").'">»</a></li>';
                                endif;

                                ?>                                         
                            </ul>
                            <?php } ?> 

                        </div> 

                </div>	

                <div class="col-md-4">

                        <h4>Agregar</h4>
                        <br>
                        <form method="post" action="<?php echo url_for("campo/index");?>" role="form" class="form-horizontal col-md-11">
                            
                            <div class="form-group">
                                    <label class="col-md-4">Cliente</label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="cliente" required="required">
                                            <option value="">Seleccione...</option>
                                            <?php foreach($clientes as $cli){ ?>
                                            <option value="<?php echo $cli->getCliId();?>">
                                            <?php echo $cli->getCliNombre()." ".$cli->getCliApellido();?>
                                            </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                            </div> <!-- /.form-group -->

                            <div class="form-group">
                                    <label class="col-md-4">Nombre</label>
                                    <div class="col-md-8">
                                            <input type="text" name="nombre" placeholder="Nombre" required="required" value="" class="form-control" />
                                    </div>
                            </div> <!-- /.form-group -->

                            <div class="form-group">
                                    <label class="col-md-4">Dirección</label>
                                    <div class="col-md-8">
                                            <input type="text" name="direccion" placeholder="Dirección" required="required" value="" class="form-control" />
                                    </div>
                            </div> <!-- /.form-group -->

                            <div class="form-group">
                                    <label class="col-md-4">Contacto</label>
                                    <div class="col-md-8">
                                            <input type="email" name="contacto" placeholder="contacto@dominio.tld" required="required" value="" class="form-control" />
                                    </div>
                            </div> <!-- /.form-group -->

                            <hr />


                            <div class="form-group">

                                    <div class="col-md-offset-4 col-md-8">

                                            <button type="submit" class="btn btn-success">Crear</button>
                                            
                                    </div>

                            </div> <!-- /.form-group -->

                        </form>

                </div>


        </div>