<?php
    use_stylesheet("redactor.css");
    use_javascript("redactor.min.js");
?>
        <div class="widget-header">
                <i class="icon-tasks"></i>
                <h3>Servicio</h3>
        </div> <!-- /widget-header -->

        <div class="widget-content">	

                <div class="col-md-8 border-right">
                        <h3>Editar</h3>
                        <br>
                        <form method="post"  enctype="multipart/form-data" action="<?php echo url_for("servicio/editar");?>" role="form" class="form-horizontal col-md-12">
                            <input type="hidden" name="ser_id" value="<?php echo $servicio->getSerId();?>" />
                                <div class="form-group">
                                        <label class="col-md-4">Titulo</label>
                                        <div class="col-md-8">
                                            <input type="text" name="titulo" placeholder="Ingrese titulo" required="required" value="<?php echo $servicio->getSerTitulo();?>" class="form-control" />
                                        </div>
                                </div> <!-- /.form-group -->
                                
                                <div class="form-group">
                                        <label class="col-md-4">Imagen</label>
                                        <div class="col-md-8">
                                            <input type="file" name="imagen" class="form-control" />
                                        </div>
                                </div> <!-- /.form-group -->
                                
                                <div class="form-group">
                                        <label class="col-md-4">Descripción</label>
                                        <div class="col-md-8">
                                            <textarea name="contenido" required="required" class="form-control editor-redactor"><?php echo $servicio->getSerContenido();?></textarea>
                                        </div>
                                </div> <!-- /.form-group -->


                                <div class="form-group">

                                        <div class="col-md-offset-4 col-md-8">

                                                <button type="submit" class="btn btn-success">Actualizar</button> 
                                                <a href="<?php echo url_for("servicio/index");?>" class="btn btn-default">Volver</a>
                                        </div>

                                </div> <!-- /.form-group -->

                        </form>
                        

                </div>
                <div class="col-md-4">

                        <h4>Preview imagen actual</h4>
                        <br>
                        <ul class="gallery-container">
                            <li style="width: 200px;">
                                <img style="cursor: default;" src="<?php echo $url_frontend.$servicio->getSerImagen(); ?>" />
                            </li>
                        </ul>

                </div>



        </div> <!-- /widget-content -->