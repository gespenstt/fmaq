

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
                            
                            <?php for($a=1;$a<=10;$a++){ ?>

                            <div class="entry clearfix">
                                <div class="entry-image">
                                    <a href="#" data-lightbox="image"><img class="image_fade" src="<?php echo public_path("uploads/400x300-2.jpg");?>" alt=""></a>
                                </div>
                                <div class="entry-c">
                                    <div class="entry-title">
                                        <h2><a href="#" target="_blank">Este es el título de la noticia <?php echo $a; ?></a></h2>
                                    </div>
                                    <ul class="entry-meta clearfix">
                                        <li><i class="icon-calendar3"></i> 10 julio 2015</li>
                                    </ul>
                                    <div class="entry-content">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate, asperiores quod est tenetur in. Eligendi, deserunt, blanditiis est quisquam doloribus voluptate id aperiam ea ipsum magni aut perspiciatis rem voluptatibus officia eos rerum deleniti quae nihil facilis repellat atque vitae voluptatem libero at eveniet veritatis ab facere.</p>
                                        <a href="#" target="_blank" class="more-link">leer más</a>
                                    </div>
                                </div>
                            </div>
                            
                            <?php } ?>

                        </div><!-- #posts end -->

                        <!-- Pagination
                        ============================================= -->
                        <ul class="pager nomargin">
                            <li class="previous"><a href="#">&larr; Anteriores</a></li>
                            <li class="next"><a href="#">Siguientes &rarr;</a></li>
                        </ul><!-- .pager end -->

                    </div><!-- .postcontent end -->

                    <!-- Sidebar
                    ============================================= -->
                    <div class="sidebar nobottommargin col_last clearfix">
                        <div class="sidebar-widgets-wrap">

                            <div class="widget clearfix">

                                <h4>Nuestras Máquinas</h4>
                                <div id="oc-portfolio-sidebar" class="owl-carousel portfolio-5">
                                    
                                    <?php for($a=1;$a<=2;$a++){ ?>

                                    <div class="oc-item">
                                        <div class="iportfolio">
                                            <div class="portfolio-image">
                                                <a href="#">
                                                    <img src="<?php echo public_path("uploads/400x300-4.jpg");?>" alt="">
                                                </a>
                                                <div class="portfolio-overlay">
                                                    <a href="<?php echo public_path("uploads/400x300-4.jpg");?>" class="center-icon" data-lightbox="iframe"><i class="icon-line-plus"></i></a>
                                                </div>
                                            </div>
                                            <div class="portfolio-desc center nobottompadding">
                                                <h3><a href="<?php echo url_for("maquinarias/detalle");?>">Tractor</a></h3>
                                                <span><a href="<?php echo url_for("maquinarias/detalle");?>">John Deere - 7210R</a></span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <?php } ?>

                                </div>

                                <script type="text/javascript">

                                    jQuery(document).ready(function($) {

                                        var ocClients = $("#oc-portfolio-sidebar");

                                        ocClients.owlCarousel({
                                            items: 1,
                                            margin: 10,
                                            loop: true,
                                            nav: false,
                                            autoplay: true,
                                            dots: true,
                                            autoplayHoverPause: true
                                        });

                                    });

                                </script>

                            </div>
                            
                        </div>

                    </div><!-- .sidebar end -->

                </div>

            </div>

        </section><!-- #content end -->