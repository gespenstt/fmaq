<?php

/**
 * servicios actions.
 *
 * @package    Futumaq
 * @subpackage servicios
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class serviciosActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
      $ser_id = $request->getParameter("servicio");
      $servicio = ServicioPeer::retrieveByPK($ser_id);
      if(!$servicio){
          $this->redirect("home/index");
      } 
      $this->servicio = $servicio;
      
  }
  public function executeSubservicio(sfWebRequest $request)
  {
      $sub_id = $request->getParameter("subservicio");
      $subservicio = SubservicioPeer::retrieveByPK($sub_id);
      if(!$subservicio){
          $this->redirect("home/index");
      } 
      $this->subservicio = $subservicio;
      $this->servicio = $subservicio->getServicio();
      $this->sub_id = $sub_id;
      
  }
}
