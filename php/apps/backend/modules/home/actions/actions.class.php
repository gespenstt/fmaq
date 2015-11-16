<?php

/**
 * home actions.
 *
 * @package    Futumaq
 * @subpackage home
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class homeActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
      $usu_id = $this->getUser()->getAttribute("usu_id");
      $usuario = UsuarioPeer::retrieveByPK($usu_id);
      
      if(!$usuario){
          $this->redirect("login/salir");
      }
      
      $this->usuario = $usuario;
      
      //Proyectos
      $cp = new Criteria();
      $cp->addDescendingOrderByColumn(ProyectoPeer::CREATED_AT);
      $cp->setLimit(10);
      $this->proyectos = ProyectoPeer::doSelect($cp);
      
      //Clientes
      $cc = new Criteria();
      $cc->addDescendingOrderByColumn(ClientePeer::CREATED_AT);
      $cc->setLimit(10);
      $this->clientes = ClientePeer::doSelect($cc);
      
      //CV
      $cu = new Criteria();
      $cu->addDescendingOrderByColumn(CurriculumPeer::CREATED_AT);
      $cu->setLimit(10);
      $this->cvs = CurriculumPeer::doSelect($cu);
  }
}
