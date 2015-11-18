<?php

/**
 * maquinarias actions.
 *
 * @package    Futumaq
 * @subpackage nuestramaquina
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class nuestramaquinariaActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $c = new Criteria();
    $c->add(MaquinariaPeer::MAQ_VENTA,false);  
      
    $pager = new sfPropelPager('maquinaria', 60);
    $pager->setCriteria($c);
    $pager->setPage($request->getParameter('p', 1));
    $pager->init();
    $this->pagina = $request->getParameter('p', 1);

    $this->pager = $pager;

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
      $co->add(MaquinariaPeer::MAQ_VENTA,false);
      $otrasmaquinas = MaquinariaPeer::doSelect($co);
      
      $this->otrasmaquinas = $otrasmaquinas;
      $this->util = new Util();
  }
}
