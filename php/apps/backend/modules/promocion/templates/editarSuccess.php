<?php
    use_stylesheet("redactor.css");
    use_javascript("redactor.min.js");
?>
        <div class="widget-header">
                <i class="icon-shopping-cart"></i>
                <h3>Promoción</h3>
        </div> <!-- /widget-header -->

        <div class="widget-content">	

                <div class="col-md-7">

                        <h4>Editar</h4>
                        <br>
                        <form action="<?php echo url_for("promocion/editar"); ?>" enctype="multipart/form-data"  method="post" role="form" class="form-horizontal col-md-12">
                            <input type="hidden" name="prom_id" value="<?php echo $promocion->getPromId(); ?>" />
                                <div class="form-group">
                                        <label class="col-md-4">Título</label>
                                        <div class="col-md-8">
                                            <input type="text" name="titulo" placeholder="Ingrese título" required="required" value="<?php echo $promocion->getPromTitulo();?>" class="form-control" />
                                        </div>
                                </div> <!-- /.form-group -->
                                <div class="form-group">
                                    
                                        <label class="col-md-4">Tipo promoción</label>
                                        <div class="col-md-8">
                                            <select id="tipo-promocion" name="esvideo" required="required" class="form-control">
                                                <option value="">Seleccione</option>
                                                <option value="si" <?php if($promocion->getPromEsvideo()){ echo "selected"; }?>>Video</option>
                                                <option value="no" <?php if(!$promocion->getPromEsvideo()){ echo "selected"; }?>>Imagen</option>
                                            </select>
                                        </div>
                                </div> <!-- /.form-group -->
                                
                                <div class="form-group opcion-imagen <?php if($promocion->getPromEsvideo()){ echo "hide"; }?>">
                                        <label class="col-md-4">Imágen</label>
                                        <div class="col-md-8">
                                                <input type="file" name="imagen" class="form-control" />
                                        </div>
                                </div> <!-- /.form-group -->
                                
                                

                                <div class="form-group opcion-video <?php if(!$promocion->getPromEsvideo()){ echo "hide"; }?>">
                                        <label class="col-md-4">Link vídeo youtube</label>
                                        <div class="col-md-8">
                                            <input type="text" name="link" placeholder="Ingrese url" value="<?php echo $promocion->getPromUrlvideo();?>" class="form-control" />
                                        </div>
                                </div> <!-- /.form-group -->

                                <div class="form-group">
                                        <label class="col-md-4">Descripción</label>
                                        <div class="col-md-8">
                                            <textarea name="descripcion" required="required" class="form-control editor-redactor" ><?php echo $promocion->getPromDescripcion();?></textarea>
                                        </div>
                                </div> <!-- /.form-group -->


                                <div class="form-group">

                                        <div class="col-md-offset-4 col-md-8">

                                                <button type="submit" class="btn btn-success">Actualizar</button> 
                                                <a href="<?php echo url_for("promocion/index");?>" class="btn btn-default">Cancelar</a>
                                        </div>

                                </div> <!-- /.form-group -->

                        </form>

                </div>
            
            <div class="col-md-5 border-left">
                <?php if($promocion->getPromRutaimagen()){ ?>
                <div class="form-group opcion-imagen <?php if($promocion->getPromEsvideo()){ echo "hide"; }?>">
                        <label class="col-md-4">Preview imágen</label>
                        <div class="col-md-8">
                            
                            <ul class="gallery-container">
                                <li style="width: 200px;">
                                    <img style="cursor: default;" src="<?php echo $url_frontend.$promocion->getPromRutaimagen();?>" />
                                </li>
                            </ul>
                        </div>
                </div> <!-- /.form-group -->
                <?php } ?>
                
            </div>



        </div> <!-- /widget-content -->