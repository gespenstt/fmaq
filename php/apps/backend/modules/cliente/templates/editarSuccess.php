<?php
    $flag_potreros = false;
?>
        <div class="widget-header">
                <i class="icon-user"></i>
                <h3>Cliente</h3>
        </div> <!-- /widget-header -->

        <div class="widget-content">	

                <div class="col-md-7">

                        <h3>Editar</h3>
                        <br>
                        <form method="post" action="<?php echo url_for("cliente/editar");?>" role="form" class="form-horizontal col-md-11">
                            <input type="hidden" name="cli_id" value="<?php echo $cliente->getCliId();?>" />
                                <div class="form-group">
                                <label class="col-md-4">Nombre</label>
                                <div class="col-md-8">
                                    <input type="text" name="nombre" placeholder="Nombre" required="required" value="<?php echo $cliente->getCliNombre();?>" class="form-control" />
                                </div>
                                </div> <!-- /.form-group -->

                                <div class="form-group">
                                        <label class="col-md-4">Apellido</label>
                                        <div class="col-md-8">
                                            <input type="text" name="apellido" placeholder="Apellido" required="required" value="<?php echo $cliente->getCliApellido();?>" class="form-control" />
                                        </div>
                                </div> <!-- /.form-group -->

                                <div class="form-group">
                                        <label class="col-md-4">Email</label>
                                        <div class="col-md-8">
                                            <input type="email" name="contacto" placeholder="contacto@dominio.tld" required="required" value="<?php echo $cliente->getCliCorreo();?>" class="form-control" />
                                        </div>
                                </div> <!-- /.form-group -->

                                <div class="form-group">
                                        <label class="col-md-4">Empresa</label>
                                        <div class="col-md-8">
                                            <input type="text" name="empresa" placeholder="Empresa" required="required" value="<?php echo $cliente->getCliEmpresa();?>" class="form-control" />
                                        </div>
                                </div> <!-- /.form-group -->

                                <hr />

                                <div class="form-group">
                                        <label class="col-md-4">Usuario</label>
                                        <div class="col-md-8">
                                            <input type="text" name="usuario" placeholder="Usuario" minlength="3" required="required" value="<?php echo $cliente->getCliUsuario();?>" class="form-control" />
                                        </div>
                                </div> <!-- /.form-group -->

                                <div class="form-group">
                                        <label class="col-md-4">Contraseña</label>
                                        <div class="col-md-8">
                                                <input type="password" name="password" placeholder="Contraseña" minlength="3" value="" class="form-control" />
                                        </div>
                                </div> <!-- /.form-group -->

                                <hr />


                                <div class="form-group">

                                        <div class="col-md-offset-4 col-md-8">

                                                <button type="submit" class="btn btn-success">Editar</button>

                                                <a href="<?php echo url_for("cliente/index");?>" class="btn btn-default">Volver</a>
                                        </div>

                                </div> <!-- /.form-group -->

                        </form>

                </div>
                


        </div>