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
    $c = new Criteria();
    $c->addDescendingOrderByColumn(PromocionPeer::PROM_ID);
    $c->setLimit(3);
    $promociones = PromocionPeer::doSelect($c);
    $this->promos = $promociones;
    //print_r($promociones);

    $d = new Criteria();
    $d->addDescendingOrderByColumn(NoticiaPeer::NOT_ID);
    $d->setLimit(5);
    $noticias = NoticiaPeer::doSelect($d);
    $this->notis = $noticias;

    $e = new Criteria();
    $servicios = ServicioPeer::doSelect($e);
    $this->servicios = $servicios;

    $f = new Criteria();
    $f->add(MaquinariaPeer::MAQ_VENTA,false);
    $f->setLimit(4);
    $nuestra = MaquinariaPeer::doSelect($f);
    $this->nuestras = $nuestra;

    //$util = new Util();
    //$url_admin = sfConfig::get("app_backend_url")."index.php/noticia/editar/not_id/1";
    //$util->setEmailNotificacion("Hay un nuevo CV cargado en Futamaq.", $url_admin);

    $this->msg = false;

    if($request->isMethod("post")){

        $nombre = $request->getPostParameter("cv_nombre");
        $email = $request->getPostParameter("cv_email");
        $rut = $request->getPostParameter("cv_rut");
        $telefono = $request->getPostParameter("cv_telefono");
        $solicitud = $request->getPostParameter("cv_solicitud");
        $archivo = $_FILES["cv_archivo"];
        
        $cv = new Curriculum();
        $cv->setCurNombre($nombre);
        $cv->setCurEmail($email);
        $cv->setCurCartaPresentacion($solicitud);
        $cv->setCurTelefono($telefono);
        $cv->save();
        $cur_id = $cv->getCurId();
        
    }
  }
}
