<?php

/**
 * campo actions.
 *
 * @package    Futumaq
 * @subpackage campo
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class campoActions extends sfActions
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
          $log = $util->setLog("campoIndex[$tra_id]");

          $log->debug("executeIndex");
          
          $cliente = $request->getPostParameter("cliente");
          $nombre = $request->getPostParameter("nombre");
          $direccion = $request->getPostParameter("direccion");
          $contacto = $request->getPostParameter("contacto");
          
          $log->debug("Datos de entrada | cliente=$cliente | nombre=$nombre | direccion=$direccion | contacto=$contacto");
                    
          $campo = new Campo();
          $campo->setCliId($cliente);
          $campo->setCamNombre($nombre);
          $campo->setCamDireccion($direccion);
          $campo->setCamContacto($contacto);
          $campo->save();
          
          $this->getUser()->setFlash("flag_msg","Campo creado con éxito.",true);
          $this->getUser()->setFlash("flag_tipo","success",true);
          
      }catch(Exception $ex){
          $log->err($ex->getMessage());
          $this->getUser()->setFlash("flag_msg",$ex->getMessage(),true);
          $this->getUser()->setFlash("flag_tipo","danger",true);
      }
    }  
      
      
      
        $buscar = $request->getParameter("buscar","");
        $c = new Criteria();
        if($buscar!=""){
            //$buscar = "'%$buscar%'";
            $c->addJoin(CampoPeer::CLI_ID, ClientePeer::CLI_ID);
            $criterion = $c->getNewCriterion(CampoPeer::CAM_NOMBRE,"%$buscar%",Criteria::LIKE);
            $criterion->addOr($c->getNewCriterion(ClientePeer::CLI_NOMBRE,"%$buscar%",Criteria::LIKE)); 
            $criterion->addOr($c->getNewCriterion(ClientePeer::CLI_APELLIDO,"%$buscar%",Criteria::LIKE));   
            $c->add($criterion);
        }
        $c->addAscendingOrderByColumn(CampoPeer::CAM_NOMBRE);
        
        $pager = new sfPropelPager('campo', 10);
        $pager->setCriteria($c);
        $pager->setPage($request->getParameter('p', 1));
        $pager->init();
        
        //Listado clientes
        $cl = new Criteria();
        $cl->addAscendingOrderByColumn(ClientePeer::CLI_NOMBRE);
        $clientes = ClientePeer::doSelect($cl);
        $this->clientes = $clientes;

        $this->pagina = $request->getParameter('p', 1);
        $this->buscar = $buscar;

        $this->pager = $pager;
      
  }
}
