
				<ul class="mainnav">
				
					<li class="<?php echo $util->checkMenu($modulo,"proyecto");?>">
						<a href="<?php echo url_for("proyecto/index");?>">
							<i class="icon-folder-open"></i>
							<span>Mis Proyectos</span>
						</a>	    				
					</li>
							
					<li class="<?php echo $util->checkMenu($modulo,"cuenta");?>">
						<a href="<?php echo url_for("cuenta/index");?>">
							<i class="icon-user"></i>
							<span>Mi cuenta</span>
						</a>	    				
					</li>
									
					<li class="<?php echo $util->checkMenu($modulo,"login");?>">
						<a href="<?php echo url_for("login/salir");?>">
							<i class="icon-off"></i>
							<span>Salir</span>
						</a>	    				
					</li>
				
				</ul>