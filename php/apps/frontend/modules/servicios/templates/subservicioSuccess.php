
        <!-- Page Title
        ============================================= -->
        <section id="page-title">

            <div class="container clearfix">
                <h1>Sub Servicios</h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo url_for("home/index");?>">Home</a></li>
                    <li><a href="<?php echo url_for("servicios/index/?servicio=".$servicio->getSerId());?>"><?php echo $servicio->getSerTitulo();?></a></li>
                    <li class="active">Servicio 1</li>
                </ol>
            </div>

        </section><!-- #page-title end -->

        <!-- Content
        ============================================= -->
        <section id="content">

            <div class="content-wrap">

                <div class="container clearfix">

                    <!-- Post Content
                    ============================================= -->
                    <div class="postcontent nobottommargin clearfix">

                        <div class="single-post nobottommargin">

                            <!-- Single Post
                            ============================================= -->
                            <div class="entry clearfix">

                                <!-- Entry Title
                                ============================================= -->
                                <div class="entry-title">
                                    <h2><?php echo $subservicio->getSubTitulo();?></h2>
                                </div><!-- .entry-title end -->

                                <!-- Entry Image
                                ============================================= -->
                                <div class="entry-image">
                                            
                                            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                                <!-- Indicators -->
                                                <ol class="carousel-indicators">
                                                  <?php $count = 0; foreach($subservicio->getSubservicioArchivos() as $gar){ ?>
                                                  <li data-target="#myCarousel" data-slide-to="<?php echo $count;?>" class="<?php if($count==0){ echo "active"; }?>"></li>
                                                  <?php $count++; } ?>
                                                </ol>

                                                <!-- Wrapper for slides -->
                                                <div class="carousel-inner" role="listbox">
                                                  <?php $primera = true; foreach($subservicio->getSubservicioArchivos() as $gar){ ?>
                                                  <div align="center" class="item <?php if($primera){ echo "active"; $primera=false; }?>">
                                                    <img src="<?php echo public_path($gar->getSarRuta()); ?>">
                                                  </div>
                                                  <?php } ?>
                                                </div>

                                                <!-- Left and right controls -->
                                                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                                                  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                                  <span class="sr-only">Anterior</span>
                                                </a>
                                                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                                                  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                                  <span class="sr-only">Siguiente</span>
                                                </a>
                                              </div>

                                </div><!-- .entry-image end -->

                                <!-- Entry Content
                                ============================================= -->
                                <div class="entry-content notopmargin">

                                    <p><?php echo html_entity_decode($subservicio->getSubContenido());?></p>
                                    <!-- Post Single - Content End -->

                                    <div class="clear"></div>

                                </div>
                            </div><!-- .entry end -->                           

                        </div>

                    </div><!-- .postcontent end -->

                    <!-- Sidebar
                    ============================================= -->
                    <div class="sidebar nobottommargin col_last clearfix">
                        <div class="sidebar-widgets-wrap">
                            
                            <div class="widget clearfix">
                                <h4>Sub servicios</h4>
                                <ul class="list-group">
                                    <?php foreach ($servicio->getSubservicios() as $su){ ?>
                                    <li class="list-group-item <?php if($sub_id==$su->getSubId()){ echo "list-group-item-success"; } ?>">
                                        <a href="<?php echo url_for("servicios/subservicio/?subservicio=".$su->getSubId()); ?>" ><?php echo $su->getSubTitulo(); ?></a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>

                            <div class="widget clearfix">

                                <?php include_component("componentes", "nuestramaquinaria"); ?>

                            </div>
                            
                            <div class="padding-tp">
                            <?php include_component("componentes","share");?>
                            </div>
                      
                        </div>

                    </div><!-- .sidebar end -->

                </div>

            </div>

        </section><!-- #content end -->