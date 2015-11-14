<?php
    use_javascript("proyecto.js");
?>
    <div class="widget-header">
            <i class="icon-folder-open"></i>
            <h3>Proyectos</h3>
    </div> <!-- /widget-header -->

    <div class="widget-content">


        <form action="<?php echo url_for("proyecto/editar");?>" method="post" role="form" class="form-horizontal col-md-12">
            <input type="hidden" name="pro_id" value="<?php echo $proyecto->getProId();?>" />
            <div class="col-md-8">

                    <div class="col-md-10">

                    <h3>Agregar</h3>
                    <br>

                            <div class="form-group">
                                    <label class="col-md-4">Nombre</label>
                                    <div class="col-md-8">
                                        <input type="text" name="nombre" placeholder="Nombre" required="required" value="<?php echo $proyecto->getProNombre();?>" class="form-control" />
                                    </div>
                            </div> <!-- /.form-group -->

                            <div class="form-group">
                                    <label class="col-md-4">Tipo proyecto</label>
                                    <div class="col-md-8">
                                            <select name="tipo" class="form-control" required="required">
                                                    <option>Seleccione...</option>
                                                    <?php foreach($tipos as $tip){ ?>
                                                    <option value="<?php echo $tip->getTprId();?>" <?php if($tip->getTprId()==$proyecto->getTprId()){ echo "selected"; } ?>><?php echo $tip->getTprNombre();?></option>                                                    
                                                    <?php } ?>
                                            </select>
                                    </div>
                            </div> <!-- /.form-group -->

                            <div class="form-group">
                                    <label class="col-md-4">Fecha</label>
                                    <div class="col-md-8">
                                        <input type="text" name="fecha" placeholder="" required="required" data-fecha="<?php echo $proyecto->getProFecha("d-m-Y");?>" class="form-control fecha" />
                                    </div>
                            </div> <!-- /.form-group -->

                            <div class="form-group">
                                    <label class="col-md-4">Descripción</label>
                                    <div class="col-md-8">
                                        <textarea name="descripcion" class="form-control" rows="6"><?php echo $proyecto->getProDescripcion();?></textarea>
                                    </div>
                            </div> <!-- /.form-group -->

                            <hr />


                            <div class="form-group">

                                    <div class="col-md-offset-4 col-md-8">

                                            <button type="submit" class="btn btn-success">Actualizar</button> 
                                            <a href="<?php echo url_for("proyecto/index") ?>" class="btn btn-default">Volver</a>

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
                                                    <option value="<?php echo $cli->getCliId();?>" <?php if($cli_id==$cli->getCliId()){ echo "selected"; } ?>><?php echo $cli->getCliNombre();?></option>
                                                    <?php } ?>
                                            </select>
                                    </div>
                            </div> <!-- /.form-group -->

                            <div class="form-group">
                                    <label class="col-md-4">Campo</label>
                                    <div class="col-md-8">
                                            <select data-url="<?php echo url_for("api/index");?>" id="select-campo" name="campo" class="form-control" required="required">
                                                <option value="">Seleccione campo</option>
                                                <?php foreach($campos as $cam){ ?>
                                                <option value="<?php echo $cam->getCamId();?>" <?php if($cam_id==$cam->getCamId()){ echo "selected"; }?>><?php echo $cam->getCamNombre();?></option>
                                                <?php } ?>
                                            </select>
                                    </div>
                            </div> <!-- /.form-group -->

                            <div class="form-group">
                                    <label class="col-md-4">Potrero</label>
                                    <div class="col-md-8">
                                            <select id="select-potrero" name="potrero" class="form-control" required="required">
                                                <option value="">Seleccione potrero</option>
                                                <?php foreach($potreros as $pot){ ?>
                                                <option value="<?php echo $pot->getPotId();?>" <?php if($proyecto->getPotId()==$pot->getPotId()){ echo "selected"; } ?>><?php echo $pot->getPotNombre();?></option>
                                                <?php } ?>
                                            </select>
                                    </div>
                            </div> <!-- /.form-group -->
                            <hr />
                            <h4>Archivos</h4>
                            <div class="col-md-12">
                                <div class="float-right">
                                <a class="btn btn-md" href="<?php echo url_for("proyecto/archivo/?pro_id=".$proyecto->getProId());?>"><i class="icon-file"></i> Administrar archivos del proyecto</a>
                                </div>
                            </div>

            </div>

            </form>


    </div> <!-- /widget-content -->