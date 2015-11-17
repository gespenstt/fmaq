<?php

/**
 * noticia actions.
 *
 * @package    Futumaq
 * @subpackage noticia
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class noticiaActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $tra_id = date("U").rand(111,999);
    $util = new Util();
    $log = $util->setLog("noticiaIndex[$tra_id]"); 

    $log->debug("executeIndex");
    
    if($request->isMethod("post")){

        try{
            
            $noticia_url = $request->getParameter("url");
            $log->debug("Datos de entrada | url=$noticia_url");
            
            $metas = array();
            $metas = $util->getMetas($noticia_url);
            
            $log->debug("Metas:".PHP_EOL.json_encode($metas));
            
            if(empty($metas["titulo"])||empty($metas["bajada"])||empty($metas["imagen"])){
                throw new Exception("No se ha podido agregar el link por falta de información necesaria.");
            }
            
            $noticia = new Noticia();
            $noticia->setNotTitulo($metas["titulo"]);
            $noticia->setNotImagen($metas["imagen"]);
            $bajada = preg_replace("/&#?[a-z0-9]{2,8};/i","",$metas["bajada"]);
            $noticia->setNotDescripcion($bajada);
            $noticia->setNotUrl($noticia_url);
            $noticia->save();
            
            $this->getUser()->setFlash("flag_msg","Noticia creada",true);
            $this->getUser()->setFlash("flag_tipo","success",true);  

        }  catch (Exception $ex){
            $log->err($ex->getMessage());
            $this->getUser()->setFlash("flag_msg",$ex->getMessage(),true);
            $this->getUser()->setFlash("flag_tipo","danger",true);  

        }
        
    }


    $c = new Criteria();
    $c->addDescendingOrderByColumn(NoticiaPeer::CREATED_AT);
    $pager = new sfPropelPager('noticia', 10);
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
    $log = $util->setLog("noticiaEliminar[$tra_id]"); 

    $log->debug("executeEliminar");
    
    try{
        
        $not_id = $request->getParameter("not_id");
        $log->debug("Datos de entrada | not_id=$not_id");
        
        $noticia = NoticiaPeer::retrieveByPK($not_id);
        
        if(!$noticia){
            throw new Exception("La noticia seleccionada no existe.");
        }
        
        if($request->isMethod("post")){
        
            $titulo = $request->getParameter("titulo");
            $url = $request->getParameter("url");
            $imagen = $request->getParameter("imagen");
            $descripcion = $request->getParameter("descripcion");
            $log->debug("Datos de entrada | titulo=$titulo | url=$url | imagen=$imagen | descripcion=[$descripcion]");
            
            $noticia->setNotTitulo($titulo);
            $noticia->setNotImagen($imagen);
            $noticia->setNotDescripcion($descripcion);
            $noticia->setNotUrl($url);
            $noticia->save();
            
            $log->debug("Noticia actualizada");
            
            $this->getUser()->setFlash("flag_msg","Noticia actualizada",true);
            $this->getUser()->setFlash("flag_tipo","success",true);  
        }
        
        $this->noticia = $noticia;
                
        
    }  catch (Exception $ex){
        $log->err($ex->getMessage());
        $this->getUser()->setFlash("flag_msg",$ex->getMessage(),true);
        $this->getUser()->setFlash("flag_tipo","danger",true);   
        $this->redirect("noticia/index");
    }
      
  }
  public function executeEliminar(sfWebRequest $request)
  {
    $tra_id = date("U").rand(111,999);
    $util = new Util();
    $log = $util->setLog("noticiaEliminar[$tra_id]"); 

    $log->debug("executeEliminar");
    
    try{
        
        $not_id = $request->getParameter("not_id");
        $log->debug("Datos de entrada | not_id=$not_id");
        
        $noticia = NoticiaPeer::retrieveByPK($not_id);
        
        if(!$noticia){
            throw new Exception("La noticia seleccionada no existe.");
        }
        
        $noticia->delete();
        $log->debug("noticia eliminada");
            
        $this->getUser()->setFlash("flag_msg","La noticia ha sido eliminada.",true);
        $this->getUser()->setFlash("flag_tipo","success",true);
        
        
    }  catch (Exception $ex){
        $log->err($ex->getMessage());
        $this->getUser()->setFlash("flag_msg",$ex->getMessage(),true);
        $this->getUser()->setFlash("flag_tipo","danger",true);      
    }
    $this->redirect("noticia/index");  
    
  }
}
