        <div class="widget-header">
                <i class="icon-shopping-cart"></i>
                <h3>Promoción</h3>
        </div> <!-- /widget-header -->

        <div class="widget-content">	

                <div class="col-md-4">

                        <h4>Editar</h4>
                        <br>
                        <form action="<?php echo url_for("promocion/editar"); ?>" method="post" role="form" class="form-horizontal col-md-12">
                            <input type="hidden" name="prom_id" value="<?php echo $promocion->getPromId(); ?>" />
                                <div class="form-group">
                                        <label class="col-md-4">Título</label>
                                        <div class="col-md-8">
                                            <input type="text" name="titulo" placeholder="Ingrese título" required="required" value="<?php echo $promocion->getPromTitulo();?>" class="form-control" />
                                        </div>
                                </div> <!-- /.form-group -->

                                <div class="form-group">
                                        <label class="col-md-4">Link vídeo youtube</label>
                                        <div class="col-md-8">
                                            <input type="text" name="link" placeholder="Ingrese url" required="required" value="<?php echo $promocion->getPromUrlvideo();?>" class="form-control" />
                                        </div>
                                </div> <!-- /.form-group -->

                                <div class="form-group">
                                        <label class="col-md-4">Descripción</label>
                                        <div class="col-md-8">
                                            <textarea name="descripcion" required="required" class="form-control" ><?php echo $promocion->getPromDescripcion();?></textarea>
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



        </div> <!-- /widget-content -->