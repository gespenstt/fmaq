<?php
	use_stylesheet("fileinput.min.css");
    use_javascript("fileinput.min.js");
    use_javascript("fileinput_locale_es.js");
    use_javascript("plugins/canvas-to-blob.min.js");
    use_javascript("galeria.js");
?>    
        <div class="widget-header">
                <i class="icon-tasks"></i>
                <h3>Sub-servicio</h3>
        </div> <!-- /widget-header -->

        <div class="widget-content">	

                <div class="col-md-6">
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
                                    <td class="col-md-7"><?php echo $p->getSubTitulo();?></td>
                                    <td class="col-md-4">                            
                                    <form action="<?php echo url_for("subservicio/eliminar");?>" method="post">
                                        <input type="hidden" name="sub_id" value="<?php echo $p->getSubId(); ?>" />
                                        <a href="<?php echo url_for("subservicio/editar/?sub_id=".$p->getSubId());?>" ><i class="icon-edit"></i> Editar</a> 
                                        <a href="javascript:;" class="msgbox-eliminar" data-msg="¿Está seguro de eliminar el sub-servicio?"><i class="icon-remove"></i> Eliminar</a>
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
                                    echo '<li><a href="'.url_for("subservicio/index/?p=1").'">«</a></li>';
                                endif;

                                foreach ($links as $e): 
                                    $current = '';
                                    if($actualPagina == $e):
                                        $current = ' active';
                                    endif;
                                    if(($e < $minimo && $minimo > 1) || ($e <= $maximo)):
                                    echo '<li class="'.$current.'"><a href="'.url_for("subservicio/index/?p=$e").'">'.$e.'</a></li>';
                                    endif;
                                endforeach; 

                                if($linkSaltoUltimo <= $ultimaPagina):                                            
                                    echo '<li><a href="'.url_for("subservicio/index/?p=$ultimaPagina").'">»</a></li>';
                                endif;

                                ?>                                         
                            </ul>
                            <?php } ?> 

                        </div> 

                </div>
                <div class="col-md-6 border-left">

                        <h4>Agregar</h4>
                        <br>
                        <form method="post" action="<?php echo url_for("subservicio/index");?>" enctype="multipart/form-data" role="form" class="form-horizontal col-md-12">

                                <div class="form-group">
                                        <label class="col-md-4">Nombre</label>
                                        <div class="col-md-8">
                                                <input type="text" name="nombre" placeholder="Ingrese nombre" required="required" value="" class="form-control" />
                                        </div>
                                </div> <!-- /.form-group -->
                                <div class="form-group">
                                        <label class="col-md-4">Servicio</label>
                                        <div class="col-md-8">
                                            <select name="servicio" class="form-control" required="required">
                                                <option>Seleccione</option>
                                                <?php foreach($servicios as $ser){ ?>
                                                <option value="<?php echo $ser->getSerId();?>"><?php echo $ser->getSerTitulo();?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                </div> <!-- /.form-group -->
                                <div class="form-group">
                                        <label class="col-md-4">Descripcion</label>
                                        <div class="col-md-8">
                                            <textarea name="descripcion" required="required" class="form-control" ></textarea>
                                        </div>
                                </div> <!-- /.form-group -->
                                
                                <hr /> 

                                <div class="form-group">

                                    <h4>Imágenes</h4>
                                    <input type="file" id="input-upload" name="imagenes[]" multiple=true class="file-loading" data-show-upload="false" />


                                </div>
                                
                                <hr />

                                <div class="form-group">

                                        <div class="col-md-offset-4 col-md-8">

                                                <button type="submit" class="btn btn-success">Crear</button>
                                        </div>

                                </div> <!-- /.form-group -->

                        </form>

                </div>



        </div> <!-- /widget-content -->