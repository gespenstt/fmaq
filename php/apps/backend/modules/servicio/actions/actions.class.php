<?php

/**
 * servicio actions.
 *
 * @package    Futumaq
 * @subpackage servicio
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class servicioActions extends sfActions
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
            $log = $util->setLog("servicioIndex[$tra_id]");

            $log->debug("executeIndex");
            
            $titulo = $request->getPostParameter("titulo");
            $contenido = $request->getPostParameter("contenido");
            $servicio_padre = $request->getPostParameter("servicio");
            $imagen = $_FILES["imagen"]; 

            $log->debug("Datos de entrada | titulo=$titulo | contenido=$contenido");
            
            $servicio = new Servicio();
            if($servicio_padre!=""){
                $servicio->setSerSerId($servicio_padre);                
            }else{                
                $servicio->setSerSerId(null); 
            }
            $servicio->setSerTitulo($titulo);
            $servicio->setSerContenido($contenido);
            $servicio->save();
            
            $path_imagen = $util->setArchivoServicio($imagen,$servicio->getSerId());
            $servicio->setSerImagen($path_imagen);
            $servicio->save();
                      
            
            $log->debug("Servicio creado");            
                        
            $this->getUser()->setFlash("flag_msg","Servicio creado.",true);
            $this->getUser()->setFlash("flag_tipo","success",true);
            
        } catch (Exception $ex) {
        
            $this->getUser()->setFlash("flag_msg",$ex->getMessage(),true);
            $this->getUser()->setFlash("flag_tipo","danger",true);
            $this->redirect("servicio/index");

        }
          
      }
      
      $c = new Criteria();
      $c->addAscendingOrderByColumn(ServicioPeer::SER_TITULO);
      $pager = new sfPropelPager('servicio', 10);
      $pager->setCriteria($c);
      $pager->setPage($request->getParameter('p', 1));
      $pager->init();
      
      $this->pagina = $request->getParameter('p', 1);
      $this->util = new Util();
      
      $cs = new Criteria();
      $cs->addAscendingOrderByColumn(ServicioPeer::SER_TITULO);
      $cs->add(ServicioPeer::SER_SER_ID,null);
      $this->servicios = ServicioPeer::doSelect($cs);
      
      $this->pager = $pager;
  }
  public function executeEditar(sfWebRequest $request)
  {
      
      try{
          
        $tra_id = date("U").rand(111,999);
        $util = new Util();
        $log = $util->setLog("servicioEditar[$tra_id]");

        $log->debug("executeEditar");
          
        $ser_id = $request->getParameter("ser_id");
        
        $servicio = ServicioPeer::retrieveByPK($ser_id);
        
        if(!$servicio){
            throw new Exception("El servicio seleccionado no existe.");
        }
        
        if($request->isMethod("post")){
            
            $titulo = $request->getPostParameter("titulo");
            $contenido = $request->getPostParameter("contenido");
            $servicio_padre = $request->getPostParameter("servicio");
            $imagen = $_FILES["imagen"];             
            
            if($servicio_padre!=""){
                $servicio->setSerSerId($servicio_padre);                
            }else{                
                $servicio->setSerSerId(null); 
            }
            $servicio->setSerTitulo($titulo);
            $servicio->setSerContenido($contenido);
            $servicio->save();
            
            $path_imagen = $util->setArchivoServicio($imagen,$servicio->getSerId());
            $servicio->setSerImagen($path_imagen);
            $servicio->save();
            
            $log->debug("Servicio actualizado");            
                        
            $this->getUser()->setFlash("flag_msg","Servicio actualizado.",true);
            $this->getUser()->setFlash("flag_tipo","success",true);
            
        }
        
        $this->servicio = $servicio;
        $this->util = new Util();
      
        $cs = new Criteria();
        $cs->addAscendingOrderByColumn(ServicioPeer::SER_TITULO);
        $cs->add(ServicioPeer::SER_SER_ID,null);
        $this->servicios = ServicioPeer::doSelect($cs);
        
        $this->url_frontend = sfConfig::get("app_frontend_url");
          
      } catch (Exception $ex) {
          
        $this->getUser()->setFlash("flag_msg",$ex->getMessage(),true);
        $this->getUser()->setFlash("flag_tipo","danger",true);
        $this->redirect("servicio/index");
      }
  }
  public function executeEliminar(sfWebRequest $request)
  {
      try{
          
        $ser_id = $request->getParameter("ser_id");
        
        $servicio = ServicioPeer::retrieveByPK($ser_id);
        
        if(!$servicio){
            throw new Exception("El servicio seleccionado no existe.");
        }
        
        $servicio->delete();
                        
        $this->getUser()->setFlash("flag_msg","Servicio eliminado.",true);
        $this->getUser()->setFlash("flag_tipo","success",true);
          
      } catch (Exception $ex) {
          
        $this->getUser()->setFlash("flag_msg",$ex->getMessage(),true);
        $this->getUser()->setFlash("flag_tipo","danger",true);
        $this->redirect("servicio/index");

      }
        $this->redirect("servicio/index");
  }
}
