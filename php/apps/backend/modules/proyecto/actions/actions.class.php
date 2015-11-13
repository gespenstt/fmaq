<?php

/**
 * proyecto actions.
 *
 * @package    Futumaq
 * @subpackage proyecto
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class proyectoActions extends sfActions
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
        $log = $util->setLog("IndexClienteProyecto[$tra_id]"); 
        try{
            
            if($request->isMethod("post")){
                
                $cliente = $request->getPostParameter("combocliente");
                $texto = $request->getPostParameter("textoBusqueda");
                $c = new Criteria();
                $c->addDescendingOrderByColumn(ProyectoPeer::PRO_FECHA);
                $c->addJoin(TipoProyectoPeer::TPR_ID, ProyectoPeer::TPR_ID);
                $c->addJoin(PotreroPeer::POT_ID, ProyectoPeer::POT_ID);
                $c->addJoin(CampoPeer::CAM_ID, PotreroPeer::CAM_ID);
                $c->addJoin(ClientePeer::CLI_ID, CampoPeer::CLI_ID);
                $c->add(ClientePeer::CLI_ID, $cliente);
                $pager = new sfPropelPager('proyecto', 15);
                $pager->setCriteria($c);
                $pager->setPage($request->getParameter('p', 1));
                $pager->init();
                $this->pagina = $request->getParameter('p', 1);
                $this->pager = $pager;
            }else{
                $c = new Criteria();
                $c->addDescendingOrderByColumn(ProyectoPeer::PRO_FECHA);
                $c->addJoin(TipoProyectoPeer::TPR_ID, ProyectoPeer::TPR_ID);
                $c->addJoin(PotreroPeer::POT_ID, ProyectoPeer::POT_ID);
                $c->addJoin(CampoPeer::CAM_ID, PotreroPeer::CAM_ID);
                $c->addJoin(ClientePeer::CLI_ID, CampoPeer::CLI_ID);
                $pager = new sfPropelPager('proyecto', 15);
                $pager->setCriteria($c);
                $pager->setPage($request->getParameter('p', 1));
                $pager->init();
                $this->pagina = $request->getParameter('p', 1);
                $this->pager = $pager;
            }
            
            
            
            
            
            $d = new Criteria();
            $clientes = ClientePeer::doSelect($d);
            $this->clientes = $clientes;
            
            
            
            
        }catch(Exception $e){
            $this->msg = "Ha ocurrido un error inesperado al obtener los proyectos";
            $log->err($e->getMessage());
        }
  }
  public function executeAgregar(sfWebRequest $request)
  {
  	
  }
  public function executeArchivo(sfWebRequest $request)
  {
    
  }
  
  
  
  
  public function executeTipo(sfWebRequest $request)
  {
    $tra_id = date("U").rand(111,999);
    $util = new Util();
    $log = $util->setLog("proyectoTipo[$tra_id]");

    if($request->isMethod("post")){
      $nombre = $request->getPostParameter("nombre");

      $log->debug("Datos de entrada | nombre=$nombre");

      $tipo_proyecto = new TipoProyecto();
      $tipo_proyecto->setTprNombre($nombre);
      $tipo_proyecto->save();

      $log->debug("Tipo de proyecto creado");

      $this->getUser()->setFlash("flag_msg","Tipo de proyecto creado.",true);
      $this->getUser()->setFlash("flag_tipo","success",true);
    }

    $c = new Criteria();
    $c->addDescendingOrderByColumn(TipoProyectoPeer::TPR_NOMBRE);
    $pager = new sfPropelPager('tipoproyecto', 10);
    $pager->setCriteria($c);
    $pager->setPage($request->getParameter('p', 1));
    $pager->init();

    $this->pagina = $request->getParameter('p', 1);

    $this->pager = $pager;


    
  }
  public function executeTipoeditar(sfWebRequest $request)
  {
    $tra_id = date("U").rand(111,999);
    $util = new Util();
    $log = $util->setLog("proyectoTipoeditar[$tra_id]");
    $tpr_id = $request->getParameter("tpr_id");

    try{

      $tipo_proyecto = TipoProyectoPeer::retrieveByPK($tpr_id);

      if(!$tipo_proyecto){
        throw new Exception("El tipo seleccionado no existe.");
        
      }

        if($request->isMethod("post")){

            $nombre = $request->getPostParameter("nombre");
            $log->debug("Datos de entrada | tpr_id=$tpr_id | nombre=$nombre");

            $tipo_proyecto->setTprNombre($nombre);
            $tipo_proyecto->save();
                
            $log->debug("Tipo actualizado");
            
            $this->getUser()->setFlash("flag_msg","Tipo de proyecto actualizado.",true);
            $this->getUser()->setFlash("flag_tipo","success",true);

        }
        
        
        $this->tipo_proyecto = $tipo_proyecto;


    }catch(Exception $e){        
      $this->getUser()->setFlash("flag_msg",$ex->getMessage(),true);
      $this->getUser()->setFlash("flag_tipo","danger",true);
      $this->redirect("proyecto/tipo");
    }


    
  }
  public function executeTipoeliminar(sfWebRequest $request)
  {
    $tra_id = date("U").rand(111,999);
    $util = new Util();
    $log = $util->setLog("proyectoTipoeliminar[$tra_id]");
    
    try{
        
        $tpr_id = $request->getParameter("tpr_id");
        $log->debug("Datos de entrada | tpr_id=$tpr_id");

        $tipo_proyecto = TipoProyectoPeer::retrieveByPK($tpr_id);

        if(!$tipo_proyecto){
          throw new Exception("El tipo seleccionado no existe.");

        }
        
        $tipo_proyecto->delete();
        $log->debug("Tipo eliminado");
            
        $this->getUser()->setFlash("flag_msg","Tipo de proyecto eliminado.",true);
        $this->getUser()->setFlash("flag_tipo","success",true);      
        
        
    } catch (Exception $ex) {
      $this->getUser()->setFlash("flag_msg",$ex->getMessage(),true);
      $this->getUser()->setFlash("flag_tipo","danger",true);
    }
    
    $this->redirect("proyecto/tipo");
      
  }
}
