<?php

/**
 * galeria actions.
 *
 * @package    Futumaq
 * @subpackage galeria
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class galeriaActions extends sfActions
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
        $imagenes = $_FILES["imagenes"];
        
        $log->debug("Datos de entrada | nombre=$nombre | imagenes(count)=".count($imagenes));
        
        $galeria = new Galeria();
        $galeria->setGalNombre($nombre);
        $galeria->save();
        $galeria_id = $galeria->getGalId();
        
        $util->setImagenesGaleria($imagenes, $galeria_id, $log);
        $log->debug("Galeria creada | gal_id=$galeria_id");
        
            
        $this->getUser()->setFlash("flag_msg","La galería ha sido creada.",true);
        $this->getUser()->setFlash("flag_tipo","success",true);
        
    }
    $c = new Criteria();
    $c->addDescendingOrderByColumn(GaleriaPeer::CREATED_AT);
    $pager = new sfPropelPager('galeria', 10);
    $pager->setCriteria($c);
    $pager->setPage($request->getParameter('p', 1));
    $pager->init();

    $this->pagina = $request->getParameter('p', 1);

    $this->pager = $pager;
  	
  }
  public function executeEditar(sfWebRequest $request)
  {
      try {
          
          $gal_id = $request->getParameter("gal_id");
          
          $galeria = GaleriaPeer::retrieveByPK($gal_id);
          
          if(!$galeria){
              throw new Exception("La galería seleccionada no existe.");
          }
          
          if($request->isMethod("post")){
            $tra_id = date("U").rand(111,999);
            $util = new Util();
            $log = $util->setLog("galeriaEditar[$tra_id]");
        
            $nombre = $request->getPostParameter("nombre");
            $eliminar = $request->getPostParameter("eliminar");
            $imagenes = $_FILES["imagenes"];
        
            $log->debug("Datos de entrada | nombre=$nombre | imagenes(count)=".count($imagenes));
            
            
            $galeria->setGalNombre($nombre);
            $galeria->save();
            
            $util->setImagenesGaleria($imagenes, $gal_id, $log);
            
            $util->eliminarImagenesGaleria($eliminar,$gal_id,$log);
            
            $this->getUser()->setFlash("flag_msg","La galería ha sido actualizada.",true);
            $this->getUser()->setFlash("flag_tipo","success",true);
            
          }
          
          
          $this->galeria = $galeria;
          
          
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
            $log = $util->setLog("galeriaElimianr[$tra_id]");
          
          $gal_id = $request->getParameter("gal_id");
          
          $log->debug("Datos de entrada | gal_id=$gal_id");
          
          $galeria = GaleriaPeer::retrieveByPK($gal_id);
          
          if(!$galeria){
              throw new Exception("La galería seleccionada no existe.");
          }
          
          $temp_ids = array();
          foreach($galeria->getGaleriaArchivos() as $g){
              $temp_ids[] = $g->getGarId();
          }
          
          $util->eliminarImagenesGaleria($temp_ids, $gal_id, $log);
          
          $galeria->delete();
          
          $log->debug("Galeria eliminada");
          
          $this->getUser()->setFlash("flag_msg","La galería ha sido eliminada.",true);
            $this->getUser()->setFlash("flag_tipo","success",true);         
          
          
      } catch (Exception $ex) {
            $this->getUser()->setFlash("flag_msg",$ex->getMessage(),true);
            $this->getUser()->setFlash("flag_tipo","danger",true);
            $this->redirect("galeria/index");

      }
      $this->redirect("galeria/index");
  }
}
