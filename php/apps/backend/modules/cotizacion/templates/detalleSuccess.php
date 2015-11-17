        <div class="widget-header">
                <i class="icon-star"></i>
                <h3>Curriculum</h3>
        </div> <!-- /widget-header -->

        <div class="widget-content">	

                <h3>Detalle cotización</h3>
                <br>
                    
                <div class="form-horizontal col-md-12">
                    
                    <div class="form-group">
                            <label class="col-md-2">Asunto:</label>
                            <div class="col-md-10">
                                    <?php echo $cotizacion->getCotAsunto(); ?>
                            </div>
                    </div> <!-- /.form-group -->
                    
                    <div class="form-group">
                            <label class="col-md-2">Mensaje:</label>
                            <div class="col-md-10">
                                    <?php echo $cotizacion->getCotMensaje(); ?>
                            </div>
                    </div> <!-- /.form-group -->
                    
                    <div class="form-group">
                            <label class="col-md-2">Hectáreas:</label>
                            <div class="col-md-10">
                                    <?php echo $cotizacion->getCotHectareas(); ?>
                            </div>
                    </div> <!-- /.form-group -->
                    
                    <div class="form-group">
                            <label class="col-md-2">Fecha:</label>
                            <div class="col-md-10">
                                    <?php echo $cotizacion->getCreatedAt("d-m-Y H:i:s"); ?>
                            </div>
                    </div> <!-- /.form-group -->
                
                    <hr />
                    
                    <div class="form-group">
                            <label class="col-md-2">Nombre:</label>
                            <div class="col-md-10">
                                    <?php echo $cotizacion->getCotNombre(); ?>
                            </div>
                    </div> <!-- /.form-group -->
                    <div class="form-group">
                            <label class="col-md-2">Email:</label>
                            <div class="col-md-10">
                                    <?php echo $cotizacion->getCotEmail(); ?>
                            </div>
                    </div> <!-- /.form-group -->
                    <div class="form-group">
                            <label class="col-md-2">Fono:</label>
                            <div class="col-md-10">
                                    <?php echo $cotizacion->getCotFono(); ?>
                            </div>
                    </div> <!-- /.form-group -->
                    <div class="form-group">
                            <label class="col-md-2">Dirección:</label>
                            <div class="col-md-10">
                                    <?php echo $cotizacion->getCotDireccion(); ?>
                            </div>
                    </div> <!-- /.form-group -->
                    
                    <hr />
                    
                    <div class="form-group">
                            <label class="col-md-2"> </label>
                            <div class="col-md-10">
                                <a href="<?php echo url_for("cotizacion/index");?>" class="btn btn-default">Volver</a>
                            </div>
                    </div> <!-- /.form-group -->
                </div>