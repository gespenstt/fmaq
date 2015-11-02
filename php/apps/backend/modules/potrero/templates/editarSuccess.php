        <div class="widget-header">
                <i class="icon-leaf"></i>
                <h3>Potrero</h3>
        </div> <!-- /widget-header -->

        <div class="widget-content">	

                <div class="col-md-8 border-right">
                        <h3>Editar</h3>
                        <br>
                        <form method="post" action="<?php echo url_for("potrero/editar");?>" role="form" class="form-horizontal col-md-12">
                            <input type="hidden" name="pot_id" value="<?php echo $potrero->getPotId();?>" />
                                <div class="form-group">
                                        <label class="col-md-4">Nombre</label>
                                        <div class="col-md-8">
                                            <input type="text" name="nombre" placeholder="Nombre" required="required" value="<?php echo $potrero->getPotNombre();?>" class="form-control" />
                                        </div>
                                </div> <!-- /.form-group -->
                                
                                <div class="form-group">
                                        <label class="col-md-4">Ubicación</label>
                                        <div class="col-md-8">
                                            <input type="text" name="ubicacion" placeholder="Ubicación" required="required" value="<?php echo $potrero->getPotUbicacion(); ?>" class="form-control" />
                                        </div>
                                </div> <!-- /.form-group -->
                                
                                <div class="form-group">
                                        <label class="col-md-4">Cantidad hectáreas</label>
                                        <div class="col-md-8">
                                            <input type="text" name="hectareas" placeholder="Hectáreas" required="required" value="<?php echo $potrero->getPotCantidadHectareas(); ?>" class="form-control" />
                                        </div>
                                </div> <!-- /.form-group -->


                                <div class="form-group">

                                        <div class="col-md-offset-4 col-md-8">

                                                <button type="submit" class="btn btn-success">Actualizar</button>
                                                <a href="<?php echo url_for("potrero/index/?cam_id=".$potrero->getCamId()) ?>" class="btn btn-default">Volver</a>
                                        </div>

                                </div> <!-- /.form-group -->

                        </form>
                        

                </div>



        </div> <!-- /widget-content -->