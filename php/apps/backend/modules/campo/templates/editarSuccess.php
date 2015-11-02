        <div class="widget-header">
                <i class="icon-leaf"></i>
                <h3>Campo</h3>
        </div> <!-- /widget-header -->

        <div class="widget-content">	

                <div class="col-md-8 border-right">
                        <h3>Editar</h3>
                        <br>
                        <form method="post" action="<?php echo url_for("campo/editar");?>" role="form" class="form-horizontal col-md-12">
                            <input type="hidden" name="cam_id" value="<?php echo $campo->getCamId();?>" />
                                
                            
                                <div class="form-group">
                                        <label class="col-md-4">Cliente</label>
                                        <div class="col-md-8">
                                            <select class="form-control" name="cliente" required="required">
                                                <option value="">Seleccione...</option>
                                                <?php foreach($clientes as $cli){ ?>
                                                <option value="<?php echo $cli->getCliId();?>" <?php if($cli->getCliId()==$campo->getCliId()){ echo "selected";}?>>
                                                <?php echo $cli->getCliNombre()." ".$cli->getCliApellido();?>
                                                </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                </div> <!-- /.form-group -->

                                <div class="form-group">
                                        <label class="col-md-4">Nombre</label>
                                        <div class="col-md-8">
                                            <input type="text" name="nombre" placeholder="Nombre" required="required" value="<?php echo $campo->getCamNombre();?>" class="form-control" />
                                        </div>
                                </div> <!-- /.form-group -->

                                <div class="form-group">
                                        <label class="col-md-4">Dirección</label>
                                        <div class="col-md-8">
                                            <input type="text" name="direccion" placeholder="Dirección" required="required" value="<?php echo $campo->getCamDireccion();?>" class="form-control" />
                                        </div>
                                </div> <!-- /.form-group -->

                                <div class="form-group">
                                        <label class="col-md-4">Contacto</label>
                                        <div class="col-md-8">
                                            <input type="email" name="contacto" placeholder="contacto@dominio.tld" required="required" value="<?php echo $campo->getCamContacto();?>" class="form-control" />
                                        </div>
                                </div> <!-- /.form-group -->


                                <div class="form-group">

                                        <div class="col-md-offset-4 col-md-8">

                                                <button type="submit" class="btn btn-success">Actualizar</button>
                                                <a href="<?php echo url_for("campo/index"); ?>" class="btn btn-default">Volver</a>
                                        </div>

                                </div> <!-- /.form-group -->

                        </form>
                        

                </div>



        </div> <!-- /widget-content -->