<?php

/**
 * cotizacion actions.
 *
 * @package    Futumaq
 * @subpackage cotizacion
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class cotizacionActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
      
      $c = new Criteria();
      $c->addDescendingOrderByColumn(CotizacionPeer::CREATED_AT);
      $pager = new sfPropelPager('cotizacion', 10);
      $pager->setCriteria($c);
      $pager->setPage($request->getParameter('p', 1));
      $pager->init();
      
      $this->pagina = $request->getParameter('p', 1);
      
      $this->pager = $pager;
  }
  public function executeDetalle(sfWebRequest $request)
  {
      
    try{
        $cot_id = $request->getParameter("cot_id");
        $cotizacion = CotizacionPeer::retrieveByPK($cot_id);
        
        if(!$cotizacion){
            throw new Exception("La cotización seleccionada no existe.");
        }
        $this->cotizacion = $cotizacion;

    } catch (Exception $ex) {
        $this->getUser()->setFlash("flag_msg",$ex->getMessage(),true);
        $this->getUser()->setFlash("flag_tipo","danger",true);  
        $this->redirect("cotizacion/index");
    }
  }
  public function executeEliminar(sfWebRequest $request)
  {
      
    try{
        $cot_id = $request->getParameter("cot_id");
        $cotizacion = CotizacionPeer::retrieveByPK($cot_id);
        
        if(!$cotizacion){
            throw new Exception("La cotización seleccionada no existe.");
        }
        $cotizacion->delete();
            
        $this->getUser()->setFlash("flag_msg","La cotización ha sido eliminada.",true);
        $this->getUser()->setFlash("flag_tipo","success",true);

    } catch (Exception $ex) {
        $this->getUser()->setFlash("flag_msg",$ex->getMessage(),true);
        $this->getUser()->setFlash("flag_tipo","danger",true);  
        $this->redirect("cotizacion/index");
    }
    $this->redirect("cotizacion/index");
  }
}
