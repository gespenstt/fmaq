<?php

/**
 * promocion actions.
 *
 * @package    Futumaq
 * @subpackage promocion
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class promocionActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
      if($request->isMethod("post")){   
        
        try{
            $tra_id = date("U").rand(111,999);
            $util = new Util();
            $log = $util->setLog("promocionIndex[$tra_id]");

            $log->debug("executeIndex");
            
            $titulo = $request->getPostParameter("titulo");
            $link = $request->getPostParameter("link");
            $descripcion = $request->getPostParameter("descripcion");

            $log->debug("Datos de entrada | titulo=$titulo | link=$link | descripcion=$descripcion");
            
            $promocion = new Promocion();
            $promocion->setPromTitulo($titulo);
            $promocion->setPromUrlvideo($link);
            $promocion->setPromDescripcion($descripcion);
            $promocion->save();
            
            $log->debug("Promocion creada actualizado");
            
            $this->getUser()->setFlash("flag_msg","Promoción creada.",true);
            $this->getUser()->setFlash("flag_tipo","success",true);
            
        } catch (Exception $ex) {
        
            $this->getUser()->setFlash("flag_msg",$ex->getMessage(),true);
            $this->getUser()->setFlash("flag_tipo","danger",true);
            $this->redirect("home/index");

        }
          
      }
      
      $c = new Criteria();
      $c->addAscendingOrderByColumn(PromocionPeer::PROM_TITULO);
      $pager = new sfPropelPager('promocion', 10);
      $pager->setCriteria($c);
      $pager->setPage($request->getParameter('p', 1));
      $pager->init();
      
      $this->pagina = $request->getParameter('p', 1);
      
      $this->pager = $pager;
  }
  public function executeEditar(sfWebRequest $request)
  {
    $tra_id = date("U").rand(111,999);
    $util = new Util();
    $log = $util->setLog("promocionEditar[$tra_id]"); 

    $log->debug("executeEditar");
    
    try{
        
        $prom_id = $request->getParameter("prom_id");
        $log->debug("Datos de entrada | prom_id=$prom_id");
        
        $promocion = PromocionPeer::retrieveByPK($prom_id);
        
        if(!$promocion){
            throw new Exception("La promoción seleccionada no existe.");
        }
        
        if($request->isMethod("post")){            
            
            $titulo = $request->getPostParameter("titulo");
            $link = $request->getPostParameter("link");
            $descripcion = $request->getPostParameter("descripcion");

            $log->debug("Datos de entrada | titulo=$titulo | link=$link | descripcion=$descripcion");
            
            $promocion->setPromTitulo($titulo);
            $promocion->setPromUrlvideo($link);
            $promocion->setPromDescripcion($descripcion);
            $promocion->save();
            
            $log->debug("Promocion actualizada");
            
            $this->getUser()->setFlash("flag_msg","Los datos han sido actualizados.",true);
            $this->getUser()->setFlash("flag_tipo","success",true);
            
        }
        
        $this->promocion = $promocion;
        
        
    }  catch (Exception $ex){
        $log->err($ex->getMessage());
        $this->getUser()->setFlash("flag_msg",$ex->getMessage(),true);
        $this->getUser()->setFlash("flag_tipo","danger",true);
        $this->redirect("promocion/index");        
    }
      
  }
}
