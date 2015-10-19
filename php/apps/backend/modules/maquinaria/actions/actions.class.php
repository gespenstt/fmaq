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
  	
  }
  public function executeAgregar(sfWebRequest $request)
  {
  	$files = $_FILES["imagenes"];
  	$files_tmp = $files["tmp_name"];
  	$files_name = $files["name"];
  	print_r($files_tmp);

  	

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
}
