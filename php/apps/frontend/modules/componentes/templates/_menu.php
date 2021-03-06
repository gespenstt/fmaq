            <div id="header-wrap">

                <!-- Primary Navigation
                ============================================= -->
                <nav id="primary-menu" class="style-2 center">

                    <div class="container clearfix">

                        <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

                        <ul>
                            <li class="<?php echo $util->checkMenu($modulo,"home");?>"><a href="<?php echo url_for("home/index");?>"><div>Inicio</div></a></li>
                            <li class="<?php echo $util->checkMenu($modulo,"quienessomos");?>"><a href="<?php echo url_for("quienessomos/index");?>"><div>Cómo trabajamos</div></a></li>
                            <li class="<?php echo $util->checkMenu($modulo,"servicios");?>"><a href="#"><div>Servicios</div></a>
                                <ul>
                                    <?php foreach($servicios as $se){ ?>
                                    <li><a href="<?php echo url_for("servicios/index/?servicio=".$se->getSerId());?>"><div><?php echo $se->getSerTitulo();?></div></a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <li class="<?php echo $util->checkMenu($modulo,"maquinarias");?>"><a href="#"><div>Maquinaria usada</div></a>
                                <ul>
                                    <?php foreach($maquinaria_tipo as $mt){ ?>
                                    <li><a href="<?php echo url_for("maquinarias/index/?tipo=".$mt->getTmaId());?>"><div><?php echo $mt->getTmaNombre();?></div></a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                             <li class="<?php echo $util->checkMenu($modulo,"nuestramaquinaria");?>"><a href="<?php echo url_for("nuestramaquinaria/index");?>">Nuestra maquinaria<div></div></a>
                             
                            </li>
                            <li class="<?php echo $util->checkMenu($modulo,"galeria");?>"><a href="<?php echo url_for("galeria/index");?>"><div>Galería</div></a></li>
                            <li class="<?php echo $util->checkMenu($modulo,"noticias");?>"><a href="<?php echo url_for("noticias/index");?>"><div>Noticias</div></a></li>
                            <li class="<?php echo $util->checkMenu($modulo,"contacto");?>"><a href="<?php echo url_for("contacto/index");?>"><div>Contacto</div></a></li>
                        </ul>

                        <!-- Top Search
                        =============================================
                        <div id="top-search">
                            <a href="#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>
                            <form action="<?php echo url_for("buscar/index");?>" method="get">
                                <input type="text" name="q" class="form-control" value="" placeholder="Buscar...">
                            </form>
                        </div><!-- #top-search end -->

                    </div>

                </nav><!-- #primary-menu end -->

            </div>      