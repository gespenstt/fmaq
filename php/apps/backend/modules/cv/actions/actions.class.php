<?php

/**
 * cv actions.
 *
 * @package    Futumaq
 * @subpackage cv
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class cvActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
      
      $c = new Criteria();
      $c->addDescendingOrderByColumn(CurriculumPeer::CREATED_AT);
      $pager = new sfPropelPager('curriculum', 10);
      $pager->setCriteria($c);
      $pager->setPage($request->getParameter('p', 1));
      $pager->init();
      
      $this->pagina = $request->getParameter('p', 1);
      
      $this->pager = $pager;
  	
  }
  public function executeEliminar(sfWebRequest $request)
  {
    $tra_id = date("U").rand(111,999);
    $util = new Util();
    $log = $util->setLog("cvEliminar[$tra_id]"); 

    $log->debug("executeEliminar");
    
    try{
        
        $cur_id = $request->getParameter("cur_id");
        $log->debug("Datos de entrada | cur_id=$cur_id");
        
        $curriculum = CurriculumPeer::retrieveByPK($cur_id);
        
        if(!$curriculum){
            throw new Exception("El CV seleccionado no existe.");
        }
        
        $curriculum->delete();
        $log->debug("CV eliminado");
            
        $this->getUser()->setFlash("flag_msg","El CV ha sido eliminado.",true);
        $this->getUser()->setFlash("flag_tipo","success",true);
        
        
    }  catch (Exception $ex){
        $log->err($ex->getMessage());
        $this->getUser()->setFlash("flag_msg",$ex->getMessage(),true);
        $this->getUser()->setFlash("flag_tipo","danger",true);      
    }
    $this->redirect("cv/index");  
    
  }
}
