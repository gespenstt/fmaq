<?php
    use_javascript("proyecto.js");
?>
    <div class="widget-header">
            <i class="icon-folder-open"></i>
            <h3>Proyectos</h3>
    </div> <!-- /widget-header -->

    <div class="widget-content">


        <form action="<?php echo url_for("proyecto/agregar");?>" method="post" role="form" class="form-horizontal col-md-12">

            <div class="col-md-8">

                    <div class="col-md-10">

                    <h3>Agregar</h3>
                    <br>

                            <div class="form-group">
                                    <label class="col-md-4">Nombre</label>
                                    <div class="col-md-8">
                                            <input type="text" name="nombre" placeholder="Nombre" required="required" value="" class="form-control" />
                                    </div>
                            </div> <!-- /.form-group -->

                            <div class="form-group">
                                    <label class="col-md-4">Tipo proyecto</label>
                                    <div class="col-md-8">
                                            <select name="tipo" class="form-control" required="required">
                                                    <option>Seleccione...</option>
                                                    <?php foreach($tipos as $tip){ ?>
                                                    <option value="<?php echo $tip->getTprId();?>"><?php echo $tip->getTprNombre();?></option>                                                    
                                                    <?php } ?>
                                            </select>
                                    </div>
                            </div> <!-- /.form-group -->

                            <div class="form-group">
                                    <label class="col-md-4">Fecha</label>
                                    <div class="col-md-8">
                                            <input type="text" name="fecha" placeholder="" required="required" value="" class="form-control fecha" />
                                    </div>
                            </div> <!-- /.form-group -->

                            <div class="form-group">
                                    <label class="col-md-4">Descripción</label>
                                    <div class="col-md-8">
                                            <textarea name="descripcion" class="form-control" rows="6"></textarea>
                                    </div>
                            </div> <!-- /.form-group -->

                            <hr />


                            <div class="form-group">

                                    <div class="col-md-offset-4 col-md-8">

                                            <button type="submit" class="btn btn-success">Crear</button>

                                    </div>

                            </div> <!-- /.form-group -->


                            </div>

            </div>	

            <div class="col-md-4 border-left">

                    <h4>Seleccione Potrero</h4>
                    <br>

                            <div class="form-group">
                                    <label class="col-md-4">Cliente</label>
                                    <div class="col-md-8">
                                            <select data-url="<?php echo url_for("api/index");?>" id="select-cliente" name="cliente" class="form-control" required="required">
                                                    <option>Seleccione cliente</option>
                                                    <?php foreach($clientes as $cli){ ?>
                                                    <option value="<?php echo $cli->getCliId();?>"><?php echo $cli->getCliNombre();?></option>
                                                    <?php } ?>
                                            </select>
                                    </div>
                            </div> <!-- /.form-group -->

                            <div class="form-group">
                                    <label class="col-md-4">Campo</label>
                                    <div class="col-md-8">
                                            <select data-url="<?php echo url_for("api/index");?>" id="select-campo" name="campo" class="form-control" required="required">
                                                    <option>Seleccione campo</option>
                                            </select>
                                    </div>
                            </div> <!-- /.form-group -->

                            <div class="form-group">
                                    <label class="col-md-4">Potrero</label>
                                    <div class="col-md-8">
                                            <select id="select-potrero" name="potrero" class="form-control" required="required">
                                                    <option>Seleccione potrero</option>
                                            </select>
                                    </div>
                            </div> <!-- /.form-group -->

            </div>

            </form>


    </div> <!-- /widget-content -->