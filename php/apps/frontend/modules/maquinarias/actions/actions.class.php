<?php

/**
 * maquinarias actions.
 *
 * @package    Futumaq
 * @subpackage maquinarias
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class maquinariasActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $tipo = $request->getParameter("tipo",false);  
      
    $c = new Criteria();
    if($tipo && is_numeric($tipo)){
        $c->add(MaquinariaPeer::TMA_ID,$tipo);
    }
    $c->add(MaquinariaPeer::MAQ_VENTA,true);  
      
    $pager = new sfPropelPager('maquinaria', 20);
    $pager->setCriteria($c);
    $pager->setPage($request->getParameter('p', 1));
    $pager->init();
    $this->pagina = $request->getParameter('p', 1);

    $this->pager = $pager;  
    
    $this->tipo = $tipo;
        
    $ct = new Criteria();
    $ct->addAscendingOrderByColumn(TipoMaquinariaPeer::TMA_NOMBRE);
    $maquinaria_tipo = TipoMaquinariaPeer::doSelect($ct);
    $this->maquinaria_tipo = $maquinaria_tipo;

  }
  public function executeDetalle(sfWebRequest $request)
  {
      $maqid = $request->getParameter("maqid");
      $maquinaria = MaquinariaPeer::retrieveByPK($maqid);
      if(!$maquinaria){
          $this->redirect("home/index");
      }
      $this->maquinaria = $maquinaria;
      
      $co = new Criteria();
      $co->add(MaquinariaPeer::MAQ_ID,$maqid,  Criteria::NOT_IN);
      $co->add(MaquinariaPeer::MAQ_VENTA,true);
      $otrasmaquinas = MaquinariaPeer::doSelect($co);
      
      $this->otrasmaquinas = $otrasmaquinas;
      $this->util = new Util();
  }
}
