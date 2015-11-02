<?php

/**
 * potrero actions.
 *
 * @package    Futumaq
 * @subpackage potrero
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class potreroActions extends sfActions
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
          $log = $util->setLog("potreroIndex[$tra_id]");

          $log->debug("executeIndex");
          
          $cam_id = $request->getParameter("cam_id");
          $nombre = $request->getPostParameter("nombre");
          $ubicacion = $request->getPostParameter("ubicacion");
          $hectareas = $request->getPostParameter("hectareas");
          
          $log->debug("Datos de entrada | cam_id=$cam_id | nombre=$nombre | ubicacion=$ubicacion | hectareas=$hectareas");
          
          $campo = CampoPeer::retrieveByPK($cam_id);
          if(!$campo){
            throw new Exception("El campo seleccionado no existe.");
          }          
          $potrero = new Potrero();
          $potrero->setCamId($cam_id);
          $potrero->setPotNombre($nombre);
          $potrero->setPotUbicacion($ubicacion);
          $potrero->setPotCantidadHectareas($hectareas);
          $potrero->save();
          
          $this->getUser()->setFlash("flag_msg","Potrero creado con éxito.",true);
          $this->getUser()->setFlash("flag_tipo","success",true);
          
      }catch(Exception $ex){
          $log->err($ex->getMessage());
          $this->getUser()->setFlash("flag_msg",$ex->getMessage(),true);
          $this->getUser()->setFlash("flag_tipo","danger",true);
      }
    }  
    
    try{
        $cam_id = $request->getParameter("cam_id");
        $campo = CampoPeer::retrieveByPK($cam_id);
        if(!$campo){
            throw new Exception("El campo seleccionado no existe.");
        }   
              
        $buscar = $request->getParameter("buscar","");
        $c = new Criteria();
        if($buscar!=""){
            //$buscar = "'%$buscar%'";
            $c->add(PotreroPeer::POT_NOMBRE,"%$buscar%",  Criteria::LIKE);
            $c->setIgnoreCase(true);
        }
        $c->add(PotreroPeer::CAM_ID,$cam_id);
        $c->addAscendingOrderByColumn(PotreroPeer::POT_NOMBRE);
        
        $pager = new sfPropelPager('potrero', 10);
        $pager->setCriteria($c);
        $pager->setPage($request->getParameter('p', 1));
        $pager->init();
        

        $this->pagina = $request->getParameter('p', 1);
        $this->buscar = $buscar;

        $this->pager = $pager;
        $this->cam_id = $cam_id;
        $this->campo = $campo;
        
    } catch (Exception $ex) {
        
        $this->getUser()->setFlash("flag_msg",$ex->getMessage(),true);
        $this->getUser()->setFlash("flag_tipo","danger",true);
        $this->redirect("campo/index");

    }
      
  }
  public function executeEditar(sfWebRequest $request)
  {     
      try{
          
        $pot_id = $request->getParameter("pot_id");
        $potrero = PotreroPeer::retrieveByPK($pot_id);
        if(!$potrero){
          throw new Exception("El potrero seleccionado no existe.");
        }
          
      } catch (Exception $ex) {
        
        $this->getUser()->setFlash("flag_msg",$ex->getMessage(),true);
        $this->getUser()->setFlash("flag_tipo","danger",true);
        $this->redirect("potrero/index");

      }
      if($request->isMethod("post")){

        try{

            $tra_id = date("U").rand(111,999);
            $util = new Util();
            $log = $util->setLog("potreroEditar[$tra_id]");

            $log->debug("executeEditar");
            
            
            $nombre = $request->getPostParameter("nombre");
            $ubicacion = $request->getPostParameter("ubicacion");
            $hectareas = $request->getPostParameter("hectareas");

            $log->debug("Datos de entrada | pot_id=$pot_id | nombre=$nombre | ubicacion=$ubicacion | hectareas=$hectareas");

            $potrero = PotreroPeer::retrieveByPK($pot_id);
            if(!$potrero){
              throw new Exception("El potrero seleccionado no existe.");
            }          
            
            
            $potrero->setPotNombre($nombre);
            $potrero->setPotUbicacion($ubicacion);
            $potrero->setPotCantidadHectareas($hectareas);
            $potrero->save();

            $this->getUser()->setFlash("flag_msg","Potrero actualizado.",true);
            $this->getUser()->setFlash("flag_tipo","success",true);

        }catch(Exception $ex){
            $log->err($ex->getMessage());
            $this->getUser()->setFlash("flag_msg",$ex->getMessage(),true);
            $this->getUser()->setFlash("flag_tipo","danger",true);
        }
          
      }
      
      $this->potrero = $potrero;
  }
  public function executeEliminar(sfWebRequest $request)
  {
    $tra_id = date("U").rand(111,999);
    $util = new Util();
    $log = $util->setLog("potreroEliminar[$tra_id]"); 

    $log->debug("executeEliminar");
    
    try{
        
        $pot_id = $request->getParameter("pot_id");
        $cam_id = $request->getParameter("cam_id");
        $log->debug("Datos de entrada | pot_id=$pot_id | cam_id=$cam_id");
        
        $potrero = PotreroPeer::retrieveByPK($pot_id);
        $campo = CampoPeer::retrieveByPK($cam_id);
        
        if(!$potrero){
            throw new Exception("El potrero seleccionado no existe.");
        }
        
        if(!$campo){
            throw new Exception("El campo seleccionado no existe.");
        }
        
        if($potrero->getProyectos()){
            throw new Exception("El potrero no puede ser eliminado, porque tiene proyectos asignados.");
        }
        
        $potrero->delete();
        $log->debug("potrero eliminada");
            
        $this->getUser()->setFlash("flag_msg","El potrero ha sido eliminado.",true);
        $this->getUser()->setFlash("flag_tipo","success",true);
        
        
    }  catch (Exception $ex){
        $log->err($ex->getMessage());
        $this->getUser()->setFlash("flag_msg",$ex->getMessage(),true);
        $this->getUser()->setFlash("flag_tipo","danger",true);      
    }
    $this->redirect("potrero/index/?cam_id=$cam_id");  
    
  }
}
