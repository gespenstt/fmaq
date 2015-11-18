<?php
	use_stylesheet("fileinput.min.css");
    use_javascript("fileinput.min.js");
    use_javascript("fileinput_locale_es.js");
    use_javascript("plugins/canvas-to-blob.min.js");
    use_javascript("galeria.js");
?> <?php
    use_stylesheet("redactor.css");
    use_javascript("redactor.min.js");
?>  
    <form method="post" action="<?php echo url_for("subservicio/editar");?>" enctype="multipart/form-data" role="form" class="form-horizontal col-md-12">
        <input type="hidden" name="sub_id" value="<?php echo $subservicio->getSubId();?>" />
        <div class="widget-header">
                <i class="icon-tasks"></i>
                <h3>Sub-servicio</h3>
        </div> <!-- /widget-header -->

        <div class="widget-content">	

                <div class="col-md-6">
                        <h3>Preview imágenes</h3>
                        <br>
                        <div class="table-responsive">
                            
                            <?php if(count($subservicio->getSubservicioArchivos())>0){ ?>
                            <ul class="gallery-container">
                                <?php foreach($subservicio->getSubservicioArchivos() as $foto){ ?>
                                    <li>
                                            <a href="javascript:;" class="eliminar-imagen" data-id="<?php echo $foto->getSarId();?>" >
                                            <img src="<?php echo $url_frontend.$foto->getSarRuta();?>" />
                                            <br />
                                            <input type="checkbox" name="eliminar[]" id="imagen<?php echo $foto->getSarId();?>" value="<?php echo $foto->getSarId();?>" /> Eliminar
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
                                            <input type="text" name="nombre" placeholder="Ingrese nombre" required="required" value="<?php echo $subservicio->getSubTitulo();?>" class="form-control" />
                                        </div>
                                </div> <!-- /.form-group -->
                                <div class="form-group">
                                        <label class="col-md-4">Servicio</label>
                                        <div class="col-md-8">
                                            <select name="servicio" class="form-control" required="required">
                                                <option>Seleccione</option>
                                                <?php foreach($servicios as $ser){ ?>
                                                <option value="<?php echo $ser->getSerId();?>" <?php if($ser->getSerId()==$subservicio->getSerId()){ echo "selected"; }?>><?php echo $ser->getSerTitulo();?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                </div> <!-- /.form-group -->
                                <div class="form-group">
                                        <label class="col-md-4">Descripcion</label>
                                        <div class="col-md-8">
                                            <textarea name="descripcion" required="required" class="form-control editor-redactor" ><?php echo $subservicio->getSubContenido();?></textarea>
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
                                                <a href="<?php echo url_for("subservicio/index");?>" class="btn btn-default">Volver</a>
                                        </div>

                                </div> <!-- /.form-group -->


                </div>



        </div> <!-- /widget-content -->
        
    </form>