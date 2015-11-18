
<?php
    use_stylesheet("redactor.css");
    use_javascript("redactor.min.js");
?>        <div class="widget-header">
                <i class="icon-globe"></i>
                <h3>Noticias</h3>
        </div> <!-- /widget-header -->

        <div class="widget-content">	

                <div class="col-md-8 border-right">
                        <h3>Editar</h3>
                        <br>
                        <form method="post" action="<?php echo url_for("noticia/editar");?>" role="form" class="form-horizontal col-md-12">
                            <input type="hidden" name="not_id" value="<?php echo $noticia->getNotId();?>" />
                                <div class="form-group">
                                        <label class="col-md-4">Titulo</label>
                                        <div class="col-md-8">
                                            <input type="text" name="titulo" placeholder="Ingrese titulo" required="required" value="<?php echo $noticia->getNotTitulo();?>" class="form-control" />
                                        </div>
                                </div> <!-- /.form-group -->
                                
                                <div class="form-group">
                                        <label class="col-md-4">Imagen</label>
                                        <div class="col-md-8">
                                            <input type="url" name="imagen" placeholder="Ingrese url imagen" required="required" value="<?php echo $noticia->getNotImagen(); ?>" class="form-control" />
                                        </div>
                                </div> <!-- /.form-group -->
                                
                                <div class="form-group">
                                        <label class="col-md-4">URL</label>
                                        <div class="col-md-8">
                                            <input type="url" name="url" placeholder="Ingrese url" required="required" value="<?php echo $noticia->getNotUrl(); ?>" class="form-control" />
                                        </div>
                                </div> <!-- /.form-group -->
                                
                                <div class="form-group">
                                        <label class="col-md-4">Descripción</label>
                                        <div class="col-md-8">
                                            <textarea name="descripcion" required="required" class="editor-redactor form-control"><?php echo $noticia->getNotDescripcion();?></textarea>
                                        </div>
                                </div> <!-- /.form-group -->


                                <div class="form-group">

                                        <div class="col-md-offset-4 col-md-8">

                                                <button type="submit" class="btn btn-success">Actualizar</button>
                                        </div>

                                </div> <!-- /.form-group -->

                        </form>
                        

                </div>
                <div class="col-md-4">

                        <h4>Preview imagen actual</h4>
                        <br>
                        <ul class="gallery-container">
                            <li style="width: 200px;">
                                <img style="cursor: default;" src="<?php echo $noticia->getNotImagen();?>" />
                            </li>
                        </ul>

                </div>



        </div> <!-- /widget-content -->