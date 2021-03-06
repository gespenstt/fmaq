
        <!-- Page Title
        ============================================= -->
        <section id="page-title">

            <div class="container clearfix">
                <h1>Servicios</h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo url_for("home/index");?>">Home</a></li>
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
                                    <h2><?php echo $servicio->getSerTitulo();?></h2>
                                </div><!-- .entry-title end -->

                                <!-- Entry Image
                                ============================================= -->
                                <div class="entry-image">
                                    <?php if($servicio->getSerImagen()){ ?>
                                    <img src="<?php echo public_path($servicio->getSerImagen());?>" alt="">
                                    <?php } ?>
                                </div><!-- .entry-image end -->

                                <!-- Entry Content
                                ============================================= -->
                                <div class="entry-content notopmargin">

                                    <p><?php echo html_entity_decode($servicio->getSerContenido());?></p>
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
                                    <li class="list-group-item">
                                        <a href="<?php echo url_for("servicios/subservicio/?subservicio=".$su->getSubId()); ?>"><?php echo $su->getSubTitulo(); ?></a>
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