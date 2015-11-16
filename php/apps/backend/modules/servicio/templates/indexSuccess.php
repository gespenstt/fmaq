        <div class="widget-header">
                <i class="icon-tasks"></i>
                <h3>Servicios</h3>
        </div> <!-- /widget-header -->

        <div class="widget-content">	

                <div class="col-md-7 border-right">
                        <h3>Listado</h3>
                        <br>
                        <div class="table-responsive">
                        <?php if($pager->count()>0){ ?>
                        <table class="table table-bordered table-hover table-striped">
                                <thead>
                                  <tr>
                                    <th>#</th>
                                    <th>Titulo</th>
                                    <th>Acciones</th>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php $count = 1; 
                                foreach ($pager->getResults() as $p){ ?>
                                  <tr>
                                    <td class="col-md-1"><?php echo $count; ?></td>
                                    <td class="col-md-7"><?php echo $p->getSerTitulo();?></td>
                                    <td class="col-md-4">                            
                                    <form action="<?php echo url_for("servicio/eliminar");?>" method="post">
                                        <input type="hidden" name="ser_id" value="<?php echo $p->getSerId(); ?>" />
                                        <a href="<?php echo url_for("servicio/editar/?ser_id=".$p->getSerId());?>" ><i class="icon-edit"></i> Editar</a> 
                                        <a href="javascript:;" class="msgbox-eliminar" data-msg="¿Está seguro de eliminar el servicio?"><i class="icon-remove"></i> Eliminar</a>
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
                                    echo '<li><a href="'.url_for("servicio/index/?p=1").'">«</a></li>';
                                endif;

                                foreach ($links as $e): 
                                    $current = '';
                                    if($actualPagina == $e):
                                        $current = ' active';
                                    endif;
                                    if(($e < $minimo && $minimo > 1) || ($e <= $maximo)):
                                    echo '<li class="'.$current.'"><a href="'.url_for("servicio/index/?p=$e").'">'.$e.'</a></li>';
                                    endif;
                                endforeach; 

                                if($linkSaltoUltimo <= $ultimaPagina):                                            
                                    echo '<li><a href="'.url_for("servicio/index/?p=$ultimaPagina").'">»</a></li>';
                                endif;

                                ?>                                         
                            </ul>
                            <?php } ?> 

                        </div> 

                </div>
                <div class="col-md-5">

                        <h4>Agregar</h4>
                        <br>
                        <form method="post" action="<?php echo url_for("servicio/index");?>" role="form" class="form-horizontal col-md-12" enctype="multipart/form-data" >

                                <div class="form-group">
                                        <label class="col-md-3">Titulo</label>
                                        <div class="col-md-9">
                                                <input type="text" name="titulo" placeholder="Ingrese titulo" required="required" value="" class="form-control" />
                                        </div>
                                </div> <!-- /.form-group -->
                                
                                <?php if($servicios->count()>0){ ?>
                                <div class="form-group">
                                        <label class="col-md-3">Servicio padre</label>
                                        <div class="col-md-9">
                                            <select name="servicio" class="form-control">
                                                <option value="">Seleccione</option>
                                                <?php foreach($servicios as $ser){ ?>
                                                <option value="<?php echo $ser->getSerId();?>">
                                                    <?php echo $ser->getSerTitulo();?>
                                                </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                </div> <!-- /.form-group -->
                                <?php } ?>
                                
                                <div class="form-group">
                                        <label class="col-md-3">Contenido</label>
                                        <div class="col-md-9">
                                            <textarea name="contenido" required="required" class="form-control" rows="7"></textarea>
                                        </div>
                                </div> <!-- /.form-group -->
                                
                                <div class="form-group">
                                        <label class="col-md-3">Imagen</label>
                                        <div class="col-md-9">
                                                <input type="file" name="imagen" required="required" class="form-control" />
                                        </div>
                                </div> <!-- /.form-group -->


                                <div class="form-group">

                                        <div class="col-md-offset-4 col-md-8">

                                                <button type="submit" class="btn btn-success">Crear</button>
                                        </div>

                                </div> <!-- /.form-group -->

                        </form>

                </div>



        </div> <!-- /widget-content -->