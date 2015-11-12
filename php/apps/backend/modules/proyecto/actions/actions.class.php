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
  public function executeTipo(sfWebRequest $request)
  {
    
  }
  public function executeArchivo(sfWebRequest $request)
  {
    
  }
}
