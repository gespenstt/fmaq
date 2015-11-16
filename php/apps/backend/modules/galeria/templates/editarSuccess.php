<?php
	use_stylesheet("fileinput.min.css");
    use_javascript("fileinput.min.js");
    use_javascript("fileinput_locale_es.js");
    use_javascript("plugins/canvas-to-blob.min.js");
    use_javascript("galeria.js");
?>   
    <form method="post" action="<?php echo url_for("galeria/editar");?>" enctype="multipart/form-data" role="form" class="form-horizontal col-md-12">
        <input type="hidden" name="gal_id" value="<?php echo $galeria->getGalId();?>" />
        <div class="widget-header">
                <i class="icon-picture"></i>
                <h3>Galería</h3>
        </div> <!-- /widget-header -->

        <div class="widget-content">	

                <div class="col-md-6">
                        <h3>Preview imágenes</h3>
                        <br>
                        <div class="table-responsive">
                            
                            <?php if(count($galeria->getGaleriaArchivos())>0){ ?>
                            <ul class="gallery-container">
                                <?php foreach($galeria->getGaleriaArchivos() as $foto){ ?>
                                    <li>
                                            <a href="javascript:;" class="eliminar-imagen" data-id="<?php echo $foto->getGarId();?>" >
                                            <img src="http://localhost/git/fmaq/php/web/<?php echo $foto->getGarRuta();?>" />
                                            
                                            <input type="checkbox" name="eliminar[]" id="imagen<?php echo $foto->getGarId();?>" value="<?php echo $foto->getGarId();?>" /> Eliminar
                                            </a>
                                    </li>	
                                <?php } ?>
                            </ul>
                            <?php }else{ ?>
                            <p>No se han encontrado imágenes.</p>
                            <?php } ?>
                            
                        </div>

                </div>
                <div class="col-md-6 border-left">

                        <h4>Editar</h4>
                        <br>

                                <div class="form-group">
                                        <label class="col-md-4">Nombre</label>
                                        <div class="col-md-8">
                                            <input type="text" name="nombre" placeholder="Ingrese nombre" required="required" value="<?php echo $galeria->getGalNombre();?>" class="form-control" />
                                        </div>
                                </div> <!-- /.form-group -->
                                
                                <hr /> 

                                <div class="form-group">
                                    <div class="col-md-1"> 
                                    </div>
                                    <div class="col-md-10">
                                    <h4>Imágenes</h4>
                                    <input type="file" id="input-upload" name="imagenes[]" multiple=true class="file-loading" data-show-upload="false" />
                                    </div>
                                    <div class="col-md-1"> 
                                    </div>

                                </div>
                                
                                <hr />

                                <div class="form-group">

                                        <div class="col-md-offset-4 col-md-8">

                                                <button type="submit" class="btn btn-success">Actualizar</button> 
                                                <a href="<?php echo url_for("galeria/index");?>" class="btn btn-default">Volver</a>
                                        </div>

                                </div> <!-- /.form-group -->


                </div>



        </div> <!-- /widget-content -->
        
    </form>