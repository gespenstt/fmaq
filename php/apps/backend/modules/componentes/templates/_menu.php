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
						</ul>     				
					</li>
									
					<li class="<?php echo $util->checkMenu($modulo,"usuario");?>">
						<a href="<?php echo url_for("usuario/index");?>">
							<i class="icon-cog"></i>
							<span>Administradores</span>
						</a>	    				
					</li>
				
				</ul>		