<?php

/**
 * servicio actions.
 *
 * @package    Futumaq
 * @subpackage servicio
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class servicioActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {

    $c = new Criteria();
    $c->addDescendingOrderByColumn(ServicioPeer::SER_TITULO);
    $pager = new sfPropelPager('servicio', 10);
    $pager->setCriteria($c);
    $pager->setPage($request->getParameter('p', 1));
    $pager->init();

    $this->pagina = $request->getParameter('p', 1);

    $this->pager = $pager;
      
  }
  public function executeEditar(sfWebRequest $request)
  {
      $this->servicio = new Servicio();
  }
}
