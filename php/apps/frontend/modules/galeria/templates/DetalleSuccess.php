

<section id="page-title">

        <div class="container clearfix">
                <h1><?php echo $galeria->getGalNombre(); ?></h1>

        </div>

</section><!-- #page-title end -->

<div>
    
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <?php $count = 0; foreach($galeria->getGaleriaArchivos() as $gar){ ?>
    <li data-target="#myCarousel" data-slide-to="<?php echo $count;?>" class="<?php if($count==0){ echo "active"; }?>"></li>
    <?php $count++; } ?>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <?php $primera = true; foreach($galeria->getGaleriaArchivos() as $gar){ ?>
    <div align="center" class="item <?php if($primera){ echo "active"; $primera=false; }?>">
      <img src="<?php echo public_path($gar->getGarRuta()); ?>">
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
    
</div>