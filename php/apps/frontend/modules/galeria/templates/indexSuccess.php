

<section id="page-title" class="page-title-parallax page-title-dark" style="background-image: url('<?php echo public_path("uploads/somos-header-bg.jpg");?>'); padding: 120px 0;" data-stellar-background-ratio="0.3">

        <div class="container clearfix">
                <h1>Galería</h1>
                <span>Las mejores imágenes de nuestro trabajo</span>

        </div>

</section><!-- #page-title end -->


<div class="content-wrap">
    
    <div class="container bottommargin-lg clearfix">
    <?php $count = 1; 
    $galid = 0;
    foreach ($pager->getResults() as $p){                             

    if($galid!=$p->getGalId() ){
        $galid =$p->getGalId(); 

    ?>

        <div class="col_one_third nobottommargin <?php if($count==3){ echo "col_last"; }?>">
                <div class="feature-box media-box">
                    <a href="<?php echo url_for("galeria/detalle/?galid=".$p->getGalId());?>">
                        <div class="fbox-media">
                            <div class="div-galeria" style="background-image: url(<?php echo public_path($p->getGaleriaArchivos()[0]->getGarRuta()); ?>)">
                                
                            </div>
                        </div>
                        <div class="fbox-desc">
                                <h3><?php echo $p->getGalNombre(); ?></h3>

                        </div>
                    </a>
                </div>
        </div>
    <?php   $count++;} 
     } ?>
    </div>
        
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
                            echo '<li><a href="'.url_for("galeria/index/?p=1").'">«</a></li>';
                        endif;

                        foreach ($links as $e): 
                            $current = '';
                            if($actualPagina == $e):
                                $current = ' active';
                            endif;
                            if(($e < $minimo && $minimo > 1) || ($e <= $maximo)):
                            echo '<li class="'.$current.'"><a href="'.url_for("galeria/index/?p=$e").'">'.$e.'</a></li>';
                            endif;
                        endforeach; 

                        if($linkSaltoUltimo <= $ultimaPagina):                                            
                            echo '<li><a href="'.url_for("galeria/index/?p=$ultimaPagina").'">»</a></li>';
                        endif;

                        ?>                                         
                    </ul>
                    <?php } ?> 

						</div> 
        
        
        
</div> <!-- container / end -->