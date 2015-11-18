        <ul class="mainnav">

                <li class="<?php echo $util->checkMenu($modulo,"home");?>">
                        <a href="<?php echo url_for("home/index");?>">
                                <i class="icon-home"></i>
                                <span>Home</span>
                        </a>	    				
                </li>

                <li class="dropdown <?php echo $util->checkMenu($modulo,"cliente");?>">					
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-user"></i>
                                <span>Clientes</span>
                                <b class="caret"></b>
                        </a>	    

                        <ul class="dropdown-menu">
                                <li><a href="<?php echo url_for("cliente/index");?>">Todos</a></li>
                                <li><a href="<?php echo url_for("cliente/agregar");?>">Agregar</a></li>
                        </ul> 				
                </li>

                <li class="<?php echo $util->checkMenu($modulo,"campo")." ".$util->checkMenu($modulo,"potrero");?>">
                        <a href="<?php echo url_for("campo/index");?>">
                                <i class="icon-leaf"></i>
                                <span>Campos</span>
                        </a>	    				
                </li>
                
                

                <li class="dropdown <?php echo $util->checkMenu($modulo,"proyecto");?>">					
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-folder-open"></i>
                                <span>Proyectos</span>
                                <b class="caret"></b>
                        </a>	    

                        <ul class="dropdown-menu <?php echo $util->checkMenu($modulo,"proyecto");?>">
                                <li><a href="<?php echo url_for("proyecto/index");?>">Todos</a></li>
                                <li><a href="<?php echo url_for("proyecto/agregar");?>">Agregar</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo url_for("proyecto/tipo");?>">Tipos</a></li>
                        </ul> 				
                </li>

                <li class="<?php echo $util->checkMenu($modulo,"noticia");?>">
                        <a href="<?php echo url_for("noticia/index");?>">
                                <i class="icon-globe"></i>
                                <span>Noticias</span>
                        </a>	    				
                </li>

                <li class="<?php echo $util->checkMenu($modulo,"cv");?>">
                        <a href="<?php echo url_for("cv/index");?>">
                                <i class="icon-briefcase"></i>
                                <span>CV</span>
                        </a>	    				
                </li>

                <li class="<?php echo $util->checkMenu($modulo,"cotizacion");?>">
                        <a href="<?php echo url_for("cotizacion/index");?>">
                                <i class="icon-star"></i>
                                <span>Cotización</span>
                        </a>	    				
                </li>

                <li class="<?php echo $util->checkMenu($modulo,"promocion");?>">
                        <a href="<?php echo url_for("promocion/index");?>">
                                <i class="icon-shopping-cart"></i>
                                <span>Promoción</span>
                        </a>	    				
                </li>

                <li class="dropdown <?php echo $util->checkMenu($modulo,"maquinaria");?>">					
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-wrench"></i>
                                <span>Maquinaria</span>
                                <b class="caret"></b>
                        </a>	    

                        <ul class="dropdown-menu">
                                <li><a href="<?php echo url_for("maquinaria/index");?>">Todos</a></li>
                                <li><a href="<?php echo url_for("maquinaria/agregar");?>">Agregar</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo url_for("maquinaria/marcas");?>">Marcas</a></li>
                                <li><a href="<?php echo url_for("maquinaria/tipos");?>">Tipos</a></li>
                        </ul>     				
                </li>

                <li class="dropdown <?php echo $util->checkMenu($modulo,"nuestramaquinaria");?>">					
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-magnet"></i>
                                <span>Nuestra maq.</span>
                                <b class="caret"></b>
                        </a>	    

                        <ul class="dropdown-menu">
                                <li><a href="<?php echo url_for("nuestramaquinaria/index");?>">Todos</a></li>
                                <li><a href="<?php echo url_for("nuestramaquinaria/agregar");?>">Agregar</a></li>
                        </ul>     				
                </li>

                <li class="dropdown <?php echo $util->checkMenu($modulo,"servicio").$util->checkMenu($modulo,"subservicio");?>">					
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-tasks"></i>
                                <span>Servicios</span>
                                <b class="caret"></b>
                        </a>	    

                        <ul class="dropdown-menu">
                                <li><a href="<?php echo url_for("servicio/index");?>">Servicios</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo url_for("subservicio/index");?>">Sub-servicios</a></li>
                        </ul>     				
                </li>

                <li class="<?php echo $util->checkMenu($modulo,"galeria");?>">
                        <a href="<?php echo url_for("galeria/index");?>">
                                <i class="icon-picture"></i>
                                <span>Galeria</span>
                        </a>                                    
                </li>

                <li class="<?php echo $util->checkMenu($modulo,"usuario");?>">
                        <a href="<?php echo url_for("usuario/index");?>">
                                <i class="icon-cog"></i>
                                <span>Admin</span>
                        </a>	    				
                </li>

        </ul>		