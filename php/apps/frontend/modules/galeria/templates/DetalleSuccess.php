<!--####
### How to add in your boostrap project
1) Add jQuery "<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>"
2) Download fancybox (https://github.com/fancyapps/fancyBox)
3) Or use CDN (http://cdnjs.com/libraries/fancybox)
####--!>

<!-- References: https://github.com/fancyapps/fancyBox -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
<style type="text/css">
    .gallery
{
    display: inline-block;
    margin-top: 20px;
}
</style>
<script type="text/javascript">
$(document).ready(function(){

    $(".fancybox").fancybox({
        openEffect: "none",
        closeEffect: "none"
    });
});
   
  
</script>
<script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>


		<section id="page-title" class="page-title-parallax page-title-dark" style="background-image: url('<?php echo public_path("uploads/somos-header-bg.jpg");?>'); padding: 120px 0;" data-stellar-background-ratio="0.3">

			<div class="container clearfix">
				<h1>Galería</h1>
				<span>Las mejores imágenes de nuestro trabajo</span>
				
			</div>

		</section><!-- #page-title end -->


<div class="container">
    <h1><?php echo $nombreGaleria->getGalNombre(); ?></h1>
    <a href="<?php echo url_for("galeria/index"); ?>" >Volver</a>
	<div class="row">
		<div class='list-group gallery'>
                    <?php $count = 1; 
                            foreach ($pager->getResults() as $p){                       ?>
                    
            <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3'>
               
                   
                <a class="thumbnail fancybox" rel="ligthbox" href="<?php echo public_path($p->getGarRuta());?>">
                    <img class="img-responsive" alt="" src="<?php echo public_path($p->getGarRuta()); ?>" />

                </a>
            </div> <!-- col-6 / end -->
            <?php $count++;    } ?>
        </div> <!-- list-group / end -->
	</div> <!-- row / end -->
        
        <div align="center">
          
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
                            echo '<li><a href="'.url_for("galeria/detalle/?p=1&galid=".$galid).'">«</a></li>';
                        endif;

                        foreach ($links as $e): 
                            $current = '';
                            if($actualPagina == $e):
                                $current = ' active';
                            endif;
                            if(($e < $minimo && $minimo > 1) || ($e <= $maximo)):
                            echo '<li class="'.$current.'"><a href="'.url_for("galeria/detalle/?p=$e&galid=".$galid).'">'.$e.'</a></li>';
                            endif;
                        endforeach; 

                        if($linkSaltoUltimo <= $ultimaPagina):                                            
                            echo '<li><a href="'.url_for("galeria/detalle/?p=$ultimaPagina&galid=".$galid).'">»</a></li>';
                        endif;

                        ?>                                         
                    </ul>
                    <?php } ?> 

						</div>
</div> <!-- container / end -->