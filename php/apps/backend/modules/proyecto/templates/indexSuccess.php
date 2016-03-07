				<div class="widget-header">
					<i class="icon-folder-open"></i>
					<h3>Proyectos</h3>
				</div> <!-- /widget-header -->
				
				<div class="widget-content">	

						<h3>Listado</h3>
						<br>
						<div class="col-md-12">

							<form action="<?php echo url_for("proyecto/index");?>" method="post">
							
								<div class="form-group col-md-5">
									<label class="col-md-2">Cliente:</label>
									<div class="col-md-10">
                                                                            <select name="combocliente" class="form-control">
                                                                                <option value="">Seleccione cliente</option>
											<?php foreach($clientes as $m){ ?>
                                                                                        <option value="<?php echo $m->getCliId();?>" <?php if($m->getCliId()==$combocliente){ echo "selected"; }?>><?php echo $m->getCliNombre();?></option>
                                                                                        <?php } ?>
										</select>
									</div>
								</div> <!-- /.form-group -->
							
                                                                <div class="form-group col-md-5">
									<label class="col-md-2">Tipo Proyecto:</label>
									<div class="col-md-10">
                                                                            <select name="combotipoProyecto" class="form-control">
                                                                                <option value="">Seleccione tipo</option>
											<?php foreach($tipoProyecto as $m){ ?>
                                                                                        <option value="<?php echo $m->getTprId();?>" <?php if($m->getTprId()==$combocliente){ echo "selected"; }?>><?php echo $m->getTprNombre();?></option>
                                                                                        <?php } ?>
										</select>
									</div>
								</div> <!-- /.form-group -->
                                                                <div class="form-group col-md-5">
                                                                        <label class="col-md-4">Fecha Desde:</label>
                                                                        <div class="col-md-8">
                                                                                <input type="text" name="fechadesde" placeholder="" value="<?php echo $fechadesde; ?>" class="form-control fecha" />
                                                                        </div>
                                                                </div> <!-- /.form-group -->
                                                                 <div class="form-group col-md-5">
                                                                        <label class="col-md-4">Fecha Hasta:</label>
                                                                        <div class="col-md-8">
                                                                                <input type="text" name="fechahasta" placeholder="" value="<?php echo $fechahasta; ?>" class="form-control fecha" />
                                                                        </div>
                                                                </div> <!-- /.form-group -->
                                                                
								<div class="form-group  col-md-5">
									<label class="col-md-2">Buscar:</label>
									<div class="col-md-10">
										<input type="text" name="textoBusqueda" placeholder="Ingrese texto a buscar" value="<?php echo $texto;?>" class="form-control" />
									</div>
								</div> <!-- /.form-group -->

								<div class="form-group col-md-2">
									<input type="submit" name="submit" value="Buscar" class="btn btn-success" />
								</div>

							</form>

						</div>
						<br>
						<br>
						<div class="table-responsive">
                                                    <?php if($pager->count()>0){ ?>
							<table class="table table-bordered table-hover table-striped">
						        <thead>
						          <tr>
						            <th>#</th>
						            <th>Proyecto</th>
						            <th>Cliente</th>
						            <th>Campo</th>
						            <th>Potrero</th>
						            <th>Acciones</th>
						          </tr>
						        </thead>
						        <tbody>
						        <?php $count = 1; 
                                                            foreach ($pager->getResults() as $p){  ?>
						          <tr>
                                                              
                                                            <td ><?php echo $count; ?></td>
						            <td class="col-md-3"><?php echo $p->getProNombre(); ?></td>
                                                            <td ><?php echo $p->getPotrero()->getCampo()->getCliente()->getCliNombre()." ".$p->getPotrero()->getCampo()->getCliente()->getCliApellido(); ?></td>
                                                            <td ><?php echo $p->getPotrero()->getCampo()->getCamNombre(); ?></td>
                                                            <td ><?php echo $p->getPotrero()->getPotNombre(); ?></td>
						            
						            <td class="col-md-3">
                                                            <form action="<?php echo url_for("proyecto/eliminar");?>" method="post">
                                                                <input type="hidden" name="pro_id" value="<?php echo $p->getProId(); ?>" />
						            	<a tabindex="-1" href="<?php echo url_for("proyecto/editar/?pro_id=".$p->getProId());?>"><i class="icon-edit"></i> Editar</a> 
                                                                <a href="javascript:;" class="msgbox-eliminar" data-msg="¿Está seguro de eliminar el proyecto?"><i class="icon-remove"></i> Eliminar</a>
                                                            </form>
						            </td>
                                                              
						          
						          </tr>
						            <?php $count++;    } ?>
						        </tbody>
					      	</table>
                                                     <?php }else{ ?>
                    <p>No hay proyectos creados</p>
                    <?php } ?>
					  	</div>

					  	<div align="right">
          
				         <?php if ($pager->haveToPaginate()){ ?>
                    <ul class="pagination">
                        <?php                                         
                        $actualPagina = $pager->getPage();
                        $ultimaPagina = $pager->getLastPage();
                        $minimo = $actualPagina - 1;
                        $maximo = $actualPagina + 2;
                        $linkSaltoPrimero = $actualPagina - 3;
                        $linkSaltoUltimo = $actualPagina + 3;
                        $links = $pager->getLinks();

                        if($linkSaltoPrimero >= 1):
                            echo '<li><a href="'.url_for("cliente/index/?p=1").'">«</a></li>';
                        endif;

                        foreach ($links as $e): 
                            $current = '';
                            if($actualPagina == $e):
                                $current = ' active';
                            endif;
                            if(($e < $minimo && $minimo > 1) || ($e <= $maximo)):
                            echo '<li class="'.$current.'"><a href="'.url_for("cliente/index/?p=$e").'">'.$e.'</a></li>';
                            endif;
                        endforeach; 

                        if($linkSaltoUltimo <= $ultimaPagina):                                            
                            echo '<li><a href="'.url_for("cliente/index/?p=$ultimaPagina").'">»</a></li>';
                        endif;

                        ?>                                         
                    </ul>
                    <?php } ?> 

						</div> 

					
					
				</div> <!-- /widget-content -->