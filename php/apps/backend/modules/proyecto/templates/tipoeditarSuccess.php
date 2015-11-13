    <div class="widget-header">
            <i class="icon-folder-open"></i>
            <h3>Proyectos</h3>
    </div> <!-- /widget-header -->

    <div class="widget-content">

        <form action="<?php echo url_for("proyecto/tipoeditar");?>" method="post" role="form" class="form-horizontal col-md-12">
            <input type="hidden" name="tpr_id" value="<?php echo $tipo_proyecto->getTprId();?>" />
            <div class="col-md-8">

                    <div class="col-md-10">

                    <h3>Editar tipo</h3>
                    <br>

                            <div class="form-group">
                                    <label class="col-md-4">Nombre</label>
                                    <div class="col-md-8">
                                            <input type="text" name="nombre" placeholder="Nombre del tipo" required="required" value="<?php echo $tipo_proyecto->getTprNombre(); ?>" class="form-control" />
                                    </div>
                            </div> <!-- /.form-group -->

                            <hr />


                            <div class="form-group">

                                    <div class="col-md-offset-4 col-md-8">

                                            <button type="submit" class="btn btn-success">Actualizar</button>

                                            <a href="<?php echo url_for("proyecto/tipo");?>" class="btn btn-default">Volver</a>

                                    </div>

                            </div> <!-- /.form-group -->


                    </div>

            </div>	

        </form>


    </div> <!-- /widget-content -->