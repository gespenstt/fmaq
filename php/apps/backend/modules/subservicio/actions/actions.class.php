<?php

/**
 * subservicio actions.
 *
 * @package    Futumaq
 * @subpackage subservicio
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class subservicioActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {

    if($request->isMethod("post")){
        $tra_id = date("U").rand(111,999);
        $util = new Util();
        $log = $util->setLog("galeriaIndex[$tra_id]"); 
        
        $nombre = $request->getPostParameter("nombre");
        $descripcion = $request->getPostParameter("descripcion");
        $servicio = $request->getPostParameter("servicio");
        $imagenes = $_FILES["imagenes"];
        
        $log->debug("Datos de entrada | nombre=$nombre | servicio=$servicio | imagenes(count)=".count($imagenes));
        
        $galeria = new Galeria();
        $galeria->setGalNombre($nombre);
        $galeria->save();
        $galeria_id = $galeria->getGalId();
        
        $subservicio = new Subservicio();
        $subservicio->setSubTitulo($nombre);
        $subservicio->setSubContenido($descripcion);
        $subservicio->setSerId($servicio);
        $subservicio->save();
        $subservicio_id = $subservicio->getSubId();
        
        $util->setImagenesSubservicio($imagenes, $subservicio_id, $log);
        $log->debug("Subservicio creado | sub_id=$subservicio_id");
        
            
        $this->getUser()->setFlash("flag_msg","El sub-servicio ha sido creado.",true);
        $this->getUser()->setFlash("flag_tipo","success",true);
        
    }
    $c = new Criteria();
    $c->addDescendingOrderByColumn(SubservicioPeer::CREATED_AT);
    $pager = new sfPropelPager('subservicio', 10);
    $pager->setCriteria($c);
    $pager->setPage($request->getParameter('p', 1));
    $pager->init();
    
    $cs = new Criteria();
    $cs->addAscendingOrderByColumn(ServicioPeer::SER_TITULO);
    $this->servicios = ServicioPeer::doSelect($cs);

    $this->pagina = $request->getParameter('p', 1);

    $this->pager = $pager;
  	
  }
  public function executeEditar(sfWebRequest $request)
  {
      try {
          
          $sub_id = $request->getParameter("sub_id");
          
          $subservicio = SubservicioPeer::retrieveByPK($sub_id);
          
          if(!$subservicio){
              throw new Exception("El sub-servicio seleccionado no existe.");
          }
          
          if($request->isMethod("post")){
            $tra_id = date("U").rand(111,999);
            $util = new Util();
            $log = $util->setLog("executeEditar[$tra_id]");
        
            $nombre = $request->getPostParameter("nombre");
            $eliminar = $request->getPostParameter("eliminar");
            $descripcion = $request->getPostParameter("descripcion");
            $servicio = $request->getPostParameter("servicio");
            $imagenes = $_FILES["imagenes"];
        
            $log->debug("Datos de entrada | nombre=$nombre | imagenes(count)=".count($imagenes));
            
            
            $subservicio->setSubTitulo($nombre);
            $subservicio->setSubContenido($descripcion);
            $subservicio->setSerId($servicio);
            $subservicio->save();
            
            $util->setImagenesSubservicio($imagenes, $sub_id, $log);
            
            $util->eliminarImagenesSubservicio($eliminar,$sub_id,$log);
            
            $this->getUser()->setFlash("flag_msg","El sub-servicio ha sido actualizada.",true);
            $this->getUser()->setFlash("flag_tipo","success",true);
            
          }
          
          
          $this->subservicio = $subservicio;
          $this->url_frontend = sfConfig::get("app_frontend_url");
    
            $cs = new Criteria();
            $cs->addAscendingOrderByColumn(ServicioPeer::SER_TITULO);
            $this->servicios = ServicioPeer::doSelect($cs);
          
          
      } catch (Exception $ex) {
            $this->getUser()->setFlash("flag_msg",$ex->getMessage(),true);
            $this->getUser()->setFlash("flag_tipo","danger",true);
            $this->redirect("galeria/index");            
      }
  }
  public function executeEliminar(sfWebRequest $request)
  {
      try {
            $tra_id = date("U").rand(111,999);
            $util = new Util();
            $log = $util->setLog("executeEliminar[$tra_id]");
          
          $sub_id = $request->getParameter("sub_id");
          
          $log->debug("Datos de entrada | sub_id=$sub_id");
          
          $subservicio = SubservicioPeer::retrieveByPK($sub_id);
          
          if(!$subservicio){
              throw new Exception("El sub-servicio seleccionado no existe.");
          }
          
          $temp_ids = array();
          foreach($subservicio->getSubservicioArchivos() as $g){
              $temp_ids[] = $g->getSarId();
          }
          
          $log->debug("Inicio eliminar imagenes | temp_ids=".json_encode($temp_ids));
          $util->eliminarImagenesSubservicio($temp_ids, $sub_id, $log);
          
          $subservicio->delete();
          
          $log->debug("Subservicio eliminado");
          
          $this->getUser()->setFlash("flag_msg","El sub-servicio ha sido eliminado.",true);
            $this->getUser()->setFlash("flag_tipo","success",true);         
          
          
      } catch (Exception $ex) {
            $this->getUser()->setFlash("flag_msg",$ex->getMessage(),true);
            $this->getUser()->setFlash("flag_tipo","danger",true);
            $this->redirect("subservicio/index");

      }
      $this->redirect("subservicio/index");
  }
}
