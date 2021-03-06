<?php

/**
 * nuestramaquinaria actions.
 *
 * @package    Futumaq
 * @subpackage nuestramaquinaria
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
    //GET | listar
    $c = new Criteria();
    $c->add(MaquinariaPeer::MAQ_VENTA,false);
    $c->addDescendingOrderByColumn(MaquinariaPeer::CREATED_AT);
    $pager = new sfPropelPager('maquinaria', 10);
    $pager->setCriteria($c);
    $pager->setPage($request->getParameter('p', 1));
    $pager->init();

    $this->pagina = $request->getParameter('p', 1);

    $this->pager = $pager;   
    
    $this->util = new Util();
  	
  }
  public function executeAgregar(sfWebRequest $request)
  {
    $tra_id = date("U").rand(111,999);
    $util = new Util();
    $log = $util->setLog("maquinariaAgregar[$tra_id]"); 

    $log->debug("executeAgregar");
    
    $cm = new Criteria();
    $cm->addAscendingOrderByColumn(MarcaMaquinariaPeer::MAR_NOMBRE);
    $marcas = MarcaMaquinariaPeer::doSelect($cm);
    $this->marcas = $marcas;
  	/*$files = $_FILES["imagenes"];
  	$files_tmp = $files["tmp_name"];
  	$files_name = $files["name"];
  	print_r($files_tmp);*/
    if($request->isMethod("post")){
        $maquinaria_id = null;
        try{
            
            $maquinaria_modelo = $request->getPostParameter("modelo");
            $maquinaria_marca = $request->getPostParameter("marca");
            $maquinaria_descripcion = $request->getPostParameter("descripcion");
            
            $log->debug("Datos de entrada | modelo=$maquinaria_modelo | marca=$maquinaria_marca | ".
                    "descripcion=[$maquinaria_descripcion]");
            
            $cm = new Criteria();
            $cm->add(MaquinariaPeer::MAQ_MODELO,$maquinaria_modelo);
            $cm->setIgnoreCase(true);
            $resCm = MaquinariaPeer::doSelectOne($cm);
            
            if($resCm){
                throw new Exception("El modelo '$maquinaria_modelo' ya existe.");
            }
            
            $maquinaria = new Maquinaria();
            $maquinaria->setMaqVenta(false);
            $maquinaria->setMaqModelo($maquinaria_modelo);
            //$maquinaria->setMarId($maquinaria_marca);
            $maquinaria->setMaqDescripcion($maquinaria_descripcion);
            $maquinaria->save();
            $maquinaria_id = $maquinaria->getMaqId();
            
            $log->debug("Maquinaria creada $maquinaria_id");
            
            $log->debug("Procesando imagenes");   
            $util->setImagenes($_FILES["imagenes"],$maquinaria_id,$log);
            
            $this->getUser()->setFlash("flag_msg","La maquinaria ha sido creada.",true);
            $this->getUser()->setFlash("flag_tipo","success",true);
            
            
            
            
        } catch (Exception $ex) {
            $log->err($ex->getMessage());
            $this->getUser()->setFlash("flag_msg",$ex->getMessage(),true);
            $this->getUser()->setFlash("flag_tipo","danger",true);
            $this->redirect("nuestramaquinaria/index");       

        }
        $this->redirect("nuestramaquinaria/editar/?maq_id=$maquinaria_id");
        
    }  	

  }
  
  public function executeEditar(sfWebRequest $request)
  {
    $tra_id = date("U").rand(111,999);
    $util = new Util();
    $log = $util->setLog("maquinariaEditar[$tra_id]"); 

    $log->debug("executeEditar");
    
    $cm = new Criteria();
    $cm->addAscendingOrderByColumn(MarcaMaquinariaPeer::MAR_NOMBRE);
    $marcas = MarcaMaquinariaPeer::doSelect($cm);
    $this->marcas = $marcas;
    $this->url_frontend = sfConfig::get("app_frontend_url");
  
    try{
        
        $maq_id = $request->getParameter("maq_id");
        $log->debug("Datos de entrada | maq_id=$maq_id");
        
        $maquinaria = MaquinariaPeer::retrieveByPK($maq_id);
        
        if(!$maquinaria){
            throw new Exception("La maquinaria seleccionada no existe.");
        }
        
        if($maquinaria->getMaqVenta()==true){
            throw new Exception("La maquinaria seleccionada no existe.");                        
        }
        
        if($request->isMethod("post")){
            
            $maquinaria_modelo = $request->getPostParameter("modelo");
            $maquinaria_marca = $request->getPostParameter("marca");
            $maquinaria_descripcion = $request->getPostParameter("descripcion");
            
            $log->debug("Datos de entrada | modelo=$maquinaria_modelo | marca=$maquinaria_marca | ".
                    "descripcion=[$maquinaria_descripcion]");
            
            $maquinaria->setMaqModelo($maquinaria_modelo);
            //$maquinaria->setMarId($maquinaria_marca);
            $maquinaria->setMaqDescripcion($maquinaria_descripcion);
            $maquinaria->setMaqVenta(false);
            $maquinaria->save();
            
            $log->debug("Maquinaria actualizada");
            
            $log->debug("Procesando imagenes");   
            $util->setImagenes($_FILES["imagenes"],$maq_id,$log);
            
            $this->getUser()->setFlash("flag_msg","Los datos han sido actualizados.",true);
            $this->getUser()->setFlash("flag_tipo","success",true);
            
        }
        
        $this->maquinaria = $maquinaria;
        
        
    }  catch (Exception $ex){
        $log->err($ex->getMessage());
        $this->getUser()->setFlash("flag_msg",$ex->getMessage(),true);
        $this->getUser()->setFlash("flag_tipo","danger",true);
        $this->redirect("nuestramaquinaria/index");        
    }
  	
  }
  
  
  
  public function executeEliminar(sfWebRequest $request)
  {
      
    $tra_id = date("U").rand(111,999);
    $util = new Util();
    $log = $util->setLog("maquinariaEliminar[$tra_id]"); 

    $log->debug("executeEliminar");
    
    if($request->isMethod("post")){
        
  
        try{

            $maq_id = $request->getParameter("maq_id");
            $log->debug("Datos de entrada | maq_id=$maq_id");

            $maquinaria = MaquinariaPeer::retrieveByPK($maq_id);

            if(!$maquinaria){
                throw new Exception("La maquinaria seleccionada no existe.");
            }
        
            if($maquinaria->getMaqVenta()==true){
                throw new Exception("La maquinaria seleccionada no existe.");                        
            }
            
            //Borrar imagenes
            foreach($maquinaria->getMaquinariaFotos() as $mf){
                $log->debug("Eliminando imagen");
                
                $path = sfConfig::get("sf_root_dir").DIRECTORY_SEPARATOR.sfConfig::get("app_frontend_webcarpeta").DIRECTORY_SEPARATOR."uploads".DIRECTORY_SEPARATOR."maquinaria".DIRECTORY_SEPARATOR.$maq_id.DIRECTORY_SEPARATOR;
                $path_file = $path.$mf->getMfoNombre();

                unlink($path_file);
                $log->debug("Eliminando archivo | $path_file");
                $mf->delete();
                $log->debug("Eliminando registro db");
            }
            
            $maquinaria->delete();
            $log->debug("Eliminando registro db maquinaria");
            
            $this->getUser()->setFlash("flag_msg","La maquinaria ha sido eliminada.",true);
            $this->getUser()->setFlash("flag_tipo","success",true);
            
        }  catch (Exception $ex){
            $log->err($ex->getMessage());
            $this->getUser()->setFlash("flag_msg",$ex->getMessage(),true);
            $this->getUser()->setFlash("flag_tipo","danger",true);
            
            
        }
        
    }
    $this->redirect("nuestramaquinaria/index");
    
  }
  
  public function executeEliminarimagen(sfWebRequest $request)
  {
      
    $tra_id = date("U").rand(111,999);
    $util = new Util();
    $log = $util->setLog("maquinariaEliminarimagen[$tra_id]"); 

    $log->debug("executeEliminarimagen");
    
    if($request->isMethod("post")){
        $mfo_id = $request->getPostParameter("mfo_id");
        $maquinaria_foto = MaquinariaFotoPeer::retrieveByPK($mfo_id);
        $maquinaria_id = $maquinaria_foto->getMaqId();
        
        $path = sfConfig::get("sf_root_dir").DIRECTORY_SEPARATOR.sfConfig::get("app_frontend_webcarpeta").DIRECTORY_SEPARATOR."uploads".DIRECTORY_SEPARATOR."maquinaria".DIRECTORY_SEPARATOR.$maquinaria_id.DIRECTORY_SEPARATOR;
        $path_file = $path.$maquinaria_foto->getMfoNombre();
        
        unlink($path_file);
        $log->debug("Eliminando archivo | $path_file");
        $maquinaria_foto->delete();
        $log->debug("Eliminando registro db");
        
        $this->getUser()->setFlash("flag_msg","Imagen eliminada.",true);
        $this->getUser()->setFlash("flag_tipo","success",true);
        
        $this->redirect("nuestramaquinaria/editar/?maq_id=$maquinaria_id");
    }
    
  }
}
