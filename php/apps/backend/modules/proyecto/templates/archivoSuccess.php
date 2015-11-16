    <div class="widget-header">
            <i class="icon-folder-open"></i>
            <h3>Proyectos</h3>
    </div> <!-- /widget-header -->

    <div class="widget-content">	

            <div class="col-md-8 border-right">
                    <h3>Archivos</h3>
                    <h4><a href="<?php echo url_for("proyecto/editar/?pro_id=".$proyecto->getProId());?>"><?php echo $proyecto->getProNombre();?></a></h4>
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
                                <td class="col-md-7"><?php echo $p->getParNombre();?></td>
                                <td class="col-md-4">
                                <form action="<?php echo url_for("proyecto/archivoeliminar");?>" method="post">
                                    <input type="hidden" name="par_id" value="<?php echo $p->getParId(); ?>" />
                                    <input type="hidden" name="pro_id" value="<?php echo $proyecto->getProId(); ?>" />
                                    <a href="<?php echo $url_frontend.$p->getParRuta();?>" target="_blank"><i class="icon-download"></i> Descargar</a>
                                    <a href="javascript:;" class="msgbox-eliminar" data-msg="¿Está seguro de eliminar el archivo?"><i class="icon-remove"></i> Eliminar</a>
                                </form>
                                </td>
                              </tr>
                                <?php $count++;                                                           
                              } ?>
                            </tbody>
                    </table>
                    <?php }else{ ?>
                    <p>No hay archivos.</p>
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
                                $pro_id = $proyecto->getProId();

                                if($linkSaltoPrimero >= 1):
                                    echo '<li><a href="'.url_for("proyecto/archivo/?p=1&pro_id=$pro_id").'">«</a></li>';
                                endif;

                                foreach ($links as $e): 
                                    $current = '';
                                    if($actualPagina == $e):
                                        $current = ' active';
                                    endif;
                                    if(($e < $minimo && $minimo > 1) || ($e <= $maximo)):
                                    echo '<li class="'.$current.'"><a href="'.url_for("proyecto/archivo/?p=$e&pro_id=$pro_id").'">'.$e.'</a></li>';
                                    endif;
                                endforeach; 

                                if($linkSaltoUltimo <= $ultimaPagina):                                            
                                    echo '<li><a href="'.url_for("proyecto/archivo/?p=$ultimaPagina&pro_id=$pro_id").'">»</a></li>';
                                endif;

                                ?>                                         
                            </ul>
                            <?php } ?> 	

                    </div> 

            </div>
            <div class="col-md-4">

                    <h4>Agregar</h4>
                    <br>
                    <form action="<?php echo url_for("proyecto/archivo");?>" method="post" role="form" class="form-horizontal col-md-12" enctype="multipart/form-data" >
                        <input type="hidden" name="pro_id" value="<?php echo $proyecto->getProId();?>" />
                            <div class="form-group">
                                    <label class="col-md-4">Nombre</label>
                                    <div class="col-md-8">
                                            <input type="text" name="nombre" placeholder="Nombre" required="required" value="" class="form-control" />
                                    </div>
                            </div> <!-- /.form-group -->

                            <div class="form-group">
                                    <label class="col-md-4">Archivo</label>
                                    <div class="col-md-8">
                                            <input type="file" name="archivo" placeholder="Archivo" required="required" value="" class="form-control" />
                                    </div>
                            </div> <!-- /.form-group -->


                            <div class="form-group">

                                    <div class="col-md-offset-4 col-md-8">

                                            <button type="submit" class="btn btn-success">Subir</button>
                                    </div>

                            </div> <!-- /.form-group -->

                    </form>

            </div>



    </div> <!-- /widget-content -->