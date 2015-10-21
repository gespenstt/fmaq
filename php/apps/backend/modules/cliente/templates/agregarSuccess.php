        <div class="widget-header">
            <i class="icon-user"></i>
            <h3>Cliente</h3>
        </div> <!-- /widget-header -->

        <div class="widget-content">	

            <div class="col-md-7">

                <h3>Agregar</h3>
                <br>
                <form action="<?php echo url_for("cliente/agregar"); ?>" method="post" role="form" class="form-horizontal col-md-11">

                        <div class="form-group">
                                <label class="col-md-4">Nombre</label>
                                <div class="col-md-8">
                                        <input type="text" name="nombre" placeholder="Nombre" required="required" value="" class="form-control" />
                                </div>
                        </div> <!-- /.form-group -->

                        <div class="form-group">
                                <label class="col-md-4">Apellido</label>
                                <div class="col-md-8">
                                        <input type="text" name="apellido" placeholder="Apellido" required="required" value="" class="form-control" />
                                </div>
                        </div> <!-- /.form-group -->

                        <div class="form-group">
                                <label class="col-md-4">Contacto</label>
                                <div class="col-md-8">
                                        <input type="email" name="contacto" placeholder="contacto@dominio.tld" required="required" value="" class="form-control" />
                                </div>
                        </div> <!-- /.form-group -->

                        <div class="form-group">
                                <label class="col-md-4">Empresa</label>
                                <div class="col-md-8">
                                        <input type="text" name="empresa" placeholder="Empresa" required="required" value="" class="form-control" />
                                </div>
                        </div> <!-- /.form-group -->

                        <hr />

                        <div class="form-group">
                                <label class="col-md-4">Usuario</label>
                                <div class="col-md-8">
                                        <input type="text" name="usuario" placeholder="Usuario" minlength="3" required="required" value="" class="form-control" />
                                </div>
                        </div> <!-- /.form-group -->

                        <div class="form-group">
                                <label class="col-md-4">Contraseña</label>
                                <div class="col-md-8">
                                        <input type="password" name="password" placeholder="Contraseña" minlength="3" required="required" value="" class="form-control" />
                                </div>
                        </div> <!-- /.form-group -->

                        <hr />


                        <div class="form-group">

                                <div class="col-md-offset-4 col-md-8">

                                        <button type="submit" class="btn btn-success">Crear</button>

                                        <button class="btn btn-default">Cancelar</button>
                                </div>

                        </div> <!-- /.form-group -->

                </form>

            </div>

        </div>