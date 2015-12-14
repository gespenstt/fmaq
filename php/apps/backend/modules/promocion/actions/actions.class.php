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
            $esvideo = $request->getPostParameter("esvideo");
            $imagen = $_FILES["imagen"];
            if($esvideo=="si"){
                $esvideo=true;
            }else{
                $esvideo=false;
            }

            $log->debug("Datos de entrada | titulo=$titulo | link=$link | descripcion=$descripcion");
            
            $promocion = new Promocion();
            $promocion->setPromTitulo($titulo);
            $promocion->setPromUrlvideo($link);
            $promocion->setPromDescripcion($descripcion);
            $promocion->setPromEsvideo($esvideo);
            $promocion->save();
            $promocion_id = $promocion->getPromId();
            
            if(!empty($imagen) && !$esvideo){
                $f_name = strtolower($maquinaria_foto_id."_".$imagen["name"]);
            
                //UPLOAD DIR FRONTEND(WEB)/UPLOADS            
                $path = sfConfig::get("sf_root_dir").DIRECTORY_SEPARATOR.sfConfig::get("app_frontend_webcarpeta").DIRECTORY_SEPARATOR."uploads".DIRECTORY_SEPARATOR."promocion".DIRECTORY_SEPARATOR.$promocion_id.DIRECTORY_SEPARATOR;
                $path_db = "uploads/promocion/$promocion_id/$f_name";
                $path_file = $path.$f_name;
                mkdir($path, 0755);
            
                move_uploaded_file($imagen["tmp_name"], $path_file);
                
                $promocion->setPromNombreimagen($f_name);
                $promocion->setPromRutaimagen($path_db);
                $promocion->save();
                
            }
            
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
      $c->addDescendingOrderByColumn(PromocionPeer::CREATED_AT);
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
            $esvideo = $request->getPostParameter("esvideo");
            $imagen = $_FILES["imagen"];
            if($esvideo=="si"){
                $esvideo=true;
            }else{
                $esvideo=false;
            }


            $log->debug("Datos de entrada | titulo=$titulo | link=$link | descripcion=$descripcion");
            
            
            $promocion->setPromTitulo($titulo);
            $promocion->setPromUrlvideo($link);
            $promocion->setPromDescripcion($descripcion);
            $promocion->setPromEsvideo($esvideo);
            $promocion->save();
            $promocion_id = $promocion->getPromId();
            
            if(!empty($imagen) && !$esvideo){
                $f_name = strtolower($maquinaria_foto_id."_".$imagen["name"]);
            
                //UPLOAD DIR FRONTEND(WEB)/UPLOADS            
                $path = sfConfig::get("sf_root_dir").DIRECTORY_SEPARATOR.sfConfig::get("app_frontend_webcarpeta").DIRECTORY_SEPARATOR."uploads".DIRECTORY_SEPARATOR."promocion".DIRECTORY_SEPARATOR.$promocion_id.DIRECTORY_SEPARATOR;
                $path_db = "uploads/promocion/$promocion_id/$f_name";
                $path_file = $path.$f_name;
                mkdir($path, 0755);
            
                move_uploaded_file($imagen["tmp_name"], $path_file);
                
                $promocion->setPromNombreimagen($f_name);
                $promocion->setPromRutaimagen($path_db);
                $promocion->save();
                
            }
            
            $log->debug("Promocion actualizada");
            
            $this->getUser()->setFlash("flag_msg","Los datos han sido actualizados.",true);
            $this->getUser()->setFlash("flag_tipo","success",true);
            
        }
        
        $this->promocion = $promocion;
        $this->url_frontend = sfConfig::get("app_frontend_url");
        
        
    }  catch (Exception $ex){
        $log->err($ex->getMessage());
        $this->getUser()->setFlash("flag_msg",$ex->getMessage(),true);
        $this->getUser()->setFlash("flag_tipo","danger",true);
        $this->redirect("promocion/index");        
    }
      
  }
  public function executeEliminar(sfWebRequest $request)
  {
    $tra_id = date("U").rand(111,999);
    $util = new Util();
    $log = $util->setLog("promocionEliminar[$tra_id]"); 

    $log->debug("executeEliminar");
    
    try{
        
        $prom_id = $request->getParameter("prom_id");
        $log->debug("Datos de entrada | prom_id=$prom_id");
        
        $promocion = PromocionPeer::retrieveByPK($prom_id);
        
        if(!$promocion){
            throw new Exception("La promoción seleccionada no existe.");
        }
        
        if($promocion->getPromNombreimagen()&&$promocion->getPromRutaimagen()){
            $path = sfConfig::get("sf_root_dir").DIRECTORY_SEPARATOR.sfConfig::get("app_frontend_webcarpeta").DIRECTORY_SEPARATOR."uploads".DIRECTORY_SEPARATOR."promocion".DIRECTORY_SEPARATOR.$prom_id.DIRECTORY_SEPARATOR;
            $ruta_imagen = $path.$promocion->getPromNombreimagen();
            if(file_exists($ruta_imagen)){
                unlink($ruta_imagen);
            }

        }
        
        $promocion->delete();
        $log->debug("Promocion eliminada");
            
        $this->getUser()->setFlash("flag_msg","La promoción ha sido eliminada.",true);
        $this->getUser()->setFlash("flag_tipo","success",true);
        
        
    }  catch (Exception $ex){
        $log->err($ex->getMessage());
        $this->getUser()->setFlash("flag_msg",$ex->getMessage(),true);
        $this->getUser()->setFlash("flag_tipo","danger",true);      
    }
    $this->redirect("promocion/index");  
    
  }
}
