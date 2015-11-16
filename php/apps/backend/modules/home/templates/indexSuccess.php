    <div class="widget-header">
            <i class="icon-home"></i>
            <h3>Dashboard</h3>
    </div> <!-- /widget-header -->

    <div class="widget-content">	

        <h4>Hola <?php echo $usuario->getUsuNombre();?>!</h4>
        
        <hr />
        
        <div class="row">
            <div class="col-md-12">
                            
                <div class="col-md-4">                
                    <div class="widget stacked">

                            <div class="widget-header">
                                    <i class="icon-folder-open"></i>
                                    <h3>Últimos proyectos</h3>
                            </div> <!-- /widget-header -->

                            <div class="widget-content">
                                <?php if($proyectos){?>
                                <ul>
                                    <?php foreach($proyectos as $pro){ ?>
                                    <li>
                                        <a href="<?php echo url_for("proyecto/editar/?pro_id=".$pro->getProId());?>"><?php echo $pro->getProNombre();?></a>
                                    </li>
                                    <?php } ?>
                                </ul>
                                <?php }else{ ?>
                                Sin información
                                <?php } ?>
                            </div> <!-- /widget-content -->
                    </div>
                </div>
                <div class="col-md-4">                
                    <div class="widget stacked">

                            <div class="widget-header">
                                    <i class="icon-user"></i>
                                    <h3>Últimos clientes</h3>
                            </div> <!-- /widget-header -->

                            <div class="widget-content">
                                <?php if($clientes){?>
                                <ul>
                                    <?php foreach($clientes as $cli){ ?>
                                    <li>
                                        <a href="<?php echo url_for("cliente/editar/?cli_id=".$cli->getCliId());?>"><?php echo $cli->getCliNombre()." ".$cli->getCliApellido();?></a>
                                    </li>
                                    <?php } ?>
                                </ul>
                                <?php }else{ ?>
                                Sin información
                                <?php } ?>
                            </div> <!-- /widget-content -->
                    </div>
                </div>
                <div class="col-md-4">                
                    <div class="widget stacked">

                            <div class="widget-header">
                                    <i class="icon-briefcase"></i>
                                    <h3>Últimos CV recepcionados</h3>
                            </div> <!-- /widget-header -->

                            <div class="widget-content">
                                <?php if($cvs){?>
                                <ul>
                                    <?php foreach($cvs as $cv){ ?>
                                    <li>
                                        <a href="<?php echo url_for("cv/index");?>"><?php echo $cv->getCurNombre();?></a>
                                    </li>
                                    <?php } ?>
                                </ul>
                                <?php }else{ ?>
                                Sin información
                                <?php } ?>
                            </div> <!-- /widget-content -->
                    </div>
                </div>
                
            </div>
        </div>

    </div> <!-- /widget-content -->