<?php

/**
 * maquinaria actions.
 *
 * @package    Futumaq
 * @subpackage maquinaria
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class maquinariaActions extends sfActions
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
    $c->add(MaquinariaPeer::MAQ_VENTA,true);
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
    
    $ct = new Criteria();
    $ct->addAscendingOrderByColumn(TipoMaquinariaPeer::TMA_NOMBRE);
    $tipos = TipoMaquinariaPeer::doSelect($ct);
    $this->tipos = $tipos;
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
            $maquinaria_precio = $request->getPostParameter("precio");
            $maquinaria_fono = $request->getPostParameter("fono");
            $maquinaria_contacto = $request->getPostParameter("contacto");
            $maquinaria_email = $request->getPostParameter("email");
            $maquinaria_ano = $request->getPostParameter("ano");        
            $maquinaria_hora = $request->getPostParameter("hora");
            $maquinaria_tipo = $request->getPostParameter("tipo");
            
            $log->debug("Datos de entrada | modelo=$maquinaria_modelo | marca=$maquinaria_marca | ".
                    "descripcion=[$maquinaria_descripcion] | precio=$maquinaria_precio | fono=$maquinaria_fono | ".
                    "contacto=$maquinaria_contacto | email=$maquinaria_email | ano=$maquinaria_ano | ".
                    "hora=$maquinaria_hora | tipo=$maquinaria_tipo");
            
            $cm = new Criteria();
            $cm->add(MaquinariaPeer::MAQ_MODELO,$maquinaria_modelo);
            $cm->setIgnoreCase(true);
            $resCm = MaquinariaPeer::doSelectOne($cm);
            
            if($resCm){
                throw new Exception("El modelo '$maquinaria_modelo' ya existe.");
            }
            
            $maquinaria = new Maquinaria();
            $maquinaria->setMaqVenta(true);
            $maquinaria->setMaqModelo($maquinaria_modelo);
            $maquinaria->setMarId($maquinaria_marca);
            $maquinaria->setMaqDescripcion($maquinaria_descripcion);
            $maquinaria->setMaqPrecio($maquinaria_precio);
            $maquinaria->setMaqFono($maquinaria_fono);
            $maquinaria->setMaqContacto($maquinaria_contacto);
            $maquinaria->setMaqCorreo($maquinaria_email);
            $maquinaria->setMaqAno($maquinaria_ano);
            $maquinaria->setMaqHoras($maquinaria_hora);
            $maquinaria->setTmaId($maquinaria_tipo);
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
            $this->redirect("maquinaria/index");       

        }
        $this->redirect("maquinaria/editar/?maq_id=$maquinaria_id");
        
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
    
    $ct = new Criteria();
    $ct->addAscendingOrderByColumn(TipoMaquinariaPeer::TMA_NOMBRE);
    $tipos = TipoMaquinariaPeer::doSelect($ct);
    $this->tipos = $tipos;
    
    $this->url_frontend = sfConfig::get("app_frontend_url");
  
    try{
        
        $maq_id = $request->getParameter("maq_id");
        $log->debug("Datos de entrada | maq_id=$maq_id");
        
        $maquinaria = MaquinariaPeer::retrieveByPK($maq_id);
        
        if(!$maquinaria){
            throw new Exception("La maquinaria seleccionada no existe.");
        }
        
        if($maquinaria->getMaqVenta()==false){
            throw new Exception("La maquinaria seleccionada no existe.");                        
        }
        
        if($request->isMethod("post")){
            
            $maquinaria_modelo = $request->getPostParameter("modelo");
            $maquinaria_marca = $request->getPostParameter("marca");
            $maquinaria_descripcion = $request->getPostParameter("descripcion");
            $maquinaria_precio = $request->getPostParameter("precio");
            $maquinaria_fono = $request->getPostParameter("fono");
            $maquinaria_contacto = $request->getPostParameter("contacto");
            $maquinaria_email = $request->getPostParameter("email");
            $maquinaria_ano = $request->getPostParameter("ano");        
            $maquinaria_hora = $request->getPostParameter("hora");
            $maquinaria_tipo = $request->getPostParameter("tipo");
            
            $log->debug("Datos de entrada | modelo=$maquinaria_modelo | marca=$maquinaria_marca | ".
                    "descripcion=[$maquinaria_descripcion] | precio=$maquinaria_precio | fono=$maquinaria_fono | ".
                    "contacto=$maquinaria_contacto | email=$maquinaria_email | ano=$maquinaria_ano | ".
                    "hora=$maquinaria_hora | tipo=$maquinaria_tipo");
            
            $maquinaria->setMaqModelo($maquinaria_modelo);
            $maquinaria->setMarId($maquinaria_marca);
            $maquinaria->setMaqDescripcion($maquinaria_descripcion);
            $maquinaria->setMaqPrecio($maquinaria_precio);
            $maquinaria->setMaqFono($maquinaria_fono);
            $maquinaria->setMaqContacto($maquinaria_contacto);
            $maquinaria->setMaqCorreo($maquinaria_email);
            $maquinaria->setMaqAno($maquinaria_ano);
            $maquinaria->setMaqHoras($maquinaria_hora);
            $maquinaria->setMaqVenta(true);
            $maquinaria->setTmaId($maquinaria_tipo);
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
        $this->redirect("maquinaria/index");        
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
        
            if($maquinaria->getMaqVenta()==false){
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
    $this->redirect("maquinaria/index");
    
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
        
        $this->redirect("maquinaria/editar/?maq_id=$maquinaria_id");
    }
    
  }
  
  public function executeMarcas(sfWebRequest $request)
  {
    //GET | listar
    $c = new Criteria();
    $c->addAscendingOrderByColumn(MarcaMaquinariaPeer::MAR_NOMBRE);
    $pager = new sfPropelPager('marcamaquinaria', 10);
    $pager->setCriteria($c);
    $pager->setPage($request->getParameter('p', 1));
    $pager->init();

    $this->pagina = $request->getParameter('p', 1);

    $this->pager = $pager;     
    
    
  }
  
  public function executeMarcasEditar(sfWebRequest $request)
  {
    $tra_id = date("U").rand(111,999);
    $util = new Util();
    $log = $util->setLog("maquinariaMarcasEditar[$tra_id]"); 

    $log->debug("executeMarcasEditar");
  
    try{
        
        $mar_id = $request->getParameter("mar_id");
        $log->debug("Datos de entrada | mar_id=$mar_id");
        
        $marca = MarcaMaquinariaPeer::retrieveByPK($mar_id);
        
        if(!$marca){
            throw new Exception("La marca que quiere editar, no existe.");
        }
        
        $this->marca = $marca;
        
    } catch (Exception $ex) {
        $log->err($ex->getMessage());
        $this->getUser()->setFlash("flag_msg",$ex->getMessage(),true);
        $this->getUser()->setFlash("flag_tipo","danger",true);
        $this->redirect("maquinaria/marcas");
    }   
    
  }
  public function executeMarcasAcciones(sfWebRequest $request)
  {
    $tra_id = date("U").rand(111,999);
    $util = new Util();
    $log = $util->setLog("maquinariaMarcasAcciones[$tra_id]"); 

    $log->debug("executeMarcasAcciones");
    
    try{

        if($request->isMethod("post")){
            //POST | agregar - modificar - eliminar     
            $accion = $request->getPostParameter("accion");
            $log->debug("POST | accion=$accion");

            switch($accion){
                case "agregar":
                    
                        $marca_nombre = $request->getPostParameter("marca");
                        $log->debug("Datos de entrada | marca=$marca_nombre");
                        
                        $cm = new Criteria();
                        $cm->add(MarcaMaquinariaPeer::MAR_NOMBRE,$marca_nombre);
                        $cm->setIgnoreCase(true);
                        $resCm = MarcaMaquinariaPeer::doSelectOne($cm);
                        
                        if($resCm){
                            throw new Exception("La marca ingresada ya existe");
                        }
                        
                        $marca = new MarcaMaquinaria();
                        $marca->setMarNombre($marca_nombre);
                        $marca->save();
                        
                        $log->debug("Marca creada");
                        
                        $this->getUser()->setFlash("flag_msg","La marca ha sido creada.",true);
                        $this->getUser()->setFlash("flag_tipo","success",true);
                        
                    break;
                case "modificar":
                    
                        $mar_id = $request->getPostParameter("mar_id");
                        $marca_nombre = $request->getPostParameter("marca");
                        $log->debug("Datos de entrada | mar_id=$mar_id | marca=$marca_nombre");
                        
                        $marca = MarcaMaquinariaPeer::retrieveByPK($mar_id);
                        
                        if(!$marca){
                            throw new Exception("La marca que quiere eliminar no existe.");
                        }
                        $marca->setMarNombre($marca_nombre);
                        $marca->save();
                        
                        $log->debug("Marca creada");
                        
                        $this->getUser()->setFlash("flag_msg","La marca ha sido actualizada.",true);
                        $this->getUser()->setFlash("flag_tipo","success",true);
                        
                    break;
                case "eliminar":
                    
                        $mar_id = $request->getPostParameter("mar_id");
                        $log->debug("Datos de entrada | mar_id=$mar_id");
                        
                        $marca = MarcaMaquinariaPeer::retrieveByPK($mar_id);
                        
                        if(!$marca){
                            throw new Exception("La marca que quiere eliminar no existe.");
                        }
                        
                        $marca->delete();
                        
                        $log->debug("Marca eliminada");
                        
                        $this->getUser()->setFlash("flag_msg","La marca ha sido eliminada.",true);
                        $this->getUser()->setFlash("flag_tipo","success",true);
                        
                        
                    break;
            }
            
                          
        }
        
    } catch (Exception $ex) {
        $log->err($ex->getMessage());
        $this->getUser()->setFlash("flag_msg",$ex->getMessage(),true);
        $this->getUser()->setFlash("flag_tipo","danger",true);
        $this->redirect("maquinaria/marcas");
    }   
    
    $this->redirect("maquinaria/marcas"); 
    
  }
  
  public function executeTipos(sfWebRequest $request)
  {
    //GET | listar
    $c = new Criteria();
    $c->addDescendingOrderByColumn(TipoMaquinariaPeer::CREATED_AT);
    $pager = new sfPropelPager('tipomaquinaria', 10);
    $pager->setCriteria($c);
    $pager->setPage($request->getParameter('p', 1));
    $pager->init();

    $this->pagina = $request->getParameter('p', 1);

    $this->pager = $pager;     
    
    
  }
  
  public function executeTiposEditar(sfWebRequest $request)
  {
    $tra_id = date("U").rand(111,999);
    $util = new Util();
    $log = $util->setLog("maquinariaMarcasEditar[$tra_id]"); 

    $log->debug("executeMarcasEditar");
  
    try{
        
        $tma_id = $request->getParameter("tma_id");
        $log->debug("Datos de entrada | tma_id=$tma_id");
        
        $tipo = TipoMaquinariaPeer::retrieveByPK($tma_id);
        
        if(!$tipo){
            throw new Exception("El tipo que quiere editar, no existe.");
        }
        
        $this->tipo = $tipo;
        
    } catch (Exception $ex) {
        $log->err($ex->getMessage());
        $this->getUser()->setFlash("flag_msg",$ex->getMessage(),true);
        $this->getUser()->setFlash("flag_tipo","danger",true);
        $this->redirect("maquinaria/tipos");
    }   
    
  }
  public function executeTiposAcciones(sfWebRequest $request)
  {
    $tra_id = date("U").rand(111,999);
    $util = new Util();
    $log = $util->setLog("maquinariaMarcasAcciones[$tra_id]"); 

    $log->debug("executeMarcasAcciones");
    
    try{

        if($request->isMethod("post")){
            //POST | agregar - modificar - eliminar     
            $accion = $request->getPostParameter("accion");
            $log->debug("POST | accion=$accion");

            switch($accion){
                case "agregar":
                    
                        $nombre = $request->getPostParameter("nombre");
                        $log->debug("Datos de entrada | tipo=$nombre");
                        
                        $cm = new Criteria();
                        $cm->add(TipoMaquinariaPeer::TMA_NOMBRE,$nombre);
                        $cm->setIgnoreCase(true);
                        $resCm = TipoMaquinariaPeer::doSelectOne($cm);
                        
                        if($resCm){
                            throw new Exception("El tipo ingresado ya existe");
                        }
                        
                        $tipo = new TipoMaquinaria();
                        $tipo->setTmaNombre($nombre);
                        $tipo->save();
                        
                        $log->debug("Tipo creado");
                        
                        $this->getUser()->setFlash("flag_msg","El tipo ha sido creado.",true);
                        $this->getUser()->setFlash("flag_tipo","success",true);
                        
                    break;
                case "modificar":
                    
                        $tma_id = $request->getPostParameter("tma_id");
                        $nombre = $request->getPostParameter("nombre");
                        $log->debug("Datos de entrada | tma_id=$tma_id | tipo=$nombre");
                        
                        $tipo = TipoMaquinariaPeer::retrieveByPK($tma_id);
                        
                        if(!$tipo){
                            throw new Exception("El tipo que quiere modificar no existe.");
                        }
                        $tipo->setTmaNombre($nombre);
                        $tipo->save();
                        
                        $log->debug("Tipo creada");
                        
                        $this->getUser()->setFlash("flag_msg","El tipo ha sido actualizado.",true);
                        $this->getUser()->setFlash("flag_tipo","success",true);
                        
                    break;
                case "eliminar":
                    
                        $tma_id = $request->getPostParameter("tma_id");
                        $log->debug("Datos de entrada | tma_id=$tma_id");
                        
                        $tipo = TipoMaquinariaPeer::retrieveByPK($tma_id);
                        
                        if(!$tipo){
                            throw new Exception("El tipo que quiere eliminar no existe.");
                        }
                        
                        $tipo->delete();
                        
                        $log->debug("Tipo eliminada");
                        
                        $this->getUser()->setFlash("flag_msg","El tipo ha sido eliminado.",true);
                        $this->getUser()->setFlash("flag_tipo","success",true);
                        
                        
                    break;
            }
            
                          
        }
        
    } catch (Exception $ex) {
        $log->err($ex->getMessage());
        $this->getUser()->setFlash("flag_msg",$ex->getMessage(),true);
        $this->getUser()->setFlash("flag_tipo","danger",true);
        $this->redirect("maquinaria/tipos");
    }   
    
    $this->redirect("maquinaria/tipos"); 
    
  }
}
