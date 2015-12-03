

        <!-- Page Title
        ============================================= -->
        <section id="page-title">

            <div class="container clearfix">
                <h1>Noticias</h1>
                <span>Últimas noticias</span>
                <ol class="breadcrumb">
                    <li><a href="<?php echo url_for("home/index");?>">Home</a></li>
                    <li class="active">Noticias</li>
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

                        <!-- Posts
                        ============================================= -->
                        <div id="posts" class="small-thumbs">
                            
                            <?php foreach($notis as $noti){ ?>

                            <div class="entry clearfix">
                                <div class="entry-image">
                                    <a href="<?php echo $noti->getNotImagen(); ?>" data-lightbox="image"><img class="image_fade" src="<?php echo $noti->getNotImagen(); ?>" alt=""></a>
                                </div>
                                <div class="entry-c">
                                    <div class="entry-title">
                                        <h2><a href="<?php echo $noti->getNotUrl(); ?>" target="_blank"><?php echo $noti->getNotTitulo(); ?></a></h2>
                                    </div>
                                    <ul class="entry-meta clearfix">
                                        <li><i class="icon-calendar3"></i> <?php echo $util->setFecha($noti->getCreatedAt("U"),"d F Y","U"); ?></li>
                                    </ul>
                                    <div class="entry-content">
                                        <p><?php echo html_entity_decode($noti->getNotDescripcion()); ?></p>
                                        <a href="<?php echo $noti->getNotUrl(); ?>" target="_blank" class="more-link">leer más</a>
                                    </div>
                                </div>
                            </div>
                            
                            <?php } ?>

                        </div><!-- #posts end -->

                        <!-- Pagination
                        ============================================= -->
                       <!-- <ul class="pager nomargin">
                            <li class="previous"><a href="#">&larr; Anteriores</a></li>
                            <li class="next"><a href="#">Siguientes &rarr;</a></li>
                        </ul> .pager end -->

                    </div><!-- .postcontent end -->

                    <!-- Sidebar
                    ============================================= -->
                    <div class="sidebar nobottommargin col_last clearfix">
                        <div class="sidebar-widgets-wrap">

                            <div class="widget clearfix">
                     
                                <?php include_component("componentes", "nuestramaquinaria"); ?>

                            </div>
                            
                        </div>

                    </div><!-- .sidebar end -->

                </div>

            </div>

        </section><!-- #content end -->