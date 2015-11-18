<?php

/**
 * galeria actions.
 *
 * @package    Futumaq
 * @subpackage galeria
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class galeriaActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
     
            $c = new Criteria();
            $c->addDescendingOrderByColumn(GaleriaPeer::GAL_ID);
            $c->addJoin(GaleriaArchivoPeer::GAL_ID, GaleriaPeer::GAL_ID);
            
            //$resultado = GaleriaArchivoPeer::doSelectStmt($c);
            //print_r($resultado);exit;
            
            
            $pager = new sfPropelPager('galeria', 60);
            $pager->setCriteria($c);
            $pager->setPage($request->getParameter('p', 1));
            $pager->init();
            $this->pagina = $request->getParameter('p', 1);

            $this->pager = $pager;
            
            
  
  }
   public function executeDetalle(sfWebRequest $request)
  {
            
            $galid = $request->getParameter("galid");
            
            $d = new Criteria();
            $d->add(GaleriaPeer::GAL_ID, $galid);
            $resultado = GaleriaPeer::doSelectOne($d);
            $this->galeria = $resultado;
            $this->galid=$galid;
  }
}
