<?php

/**
 * trabaja actions.
 *
 * @package    Futumaq
 * @subpackage trabaja
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class trabajaActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {

    $this->msg = false;
    $this->tipo_msg = "success";

    if($request->isMethod("post")){

        $nombre = $request->getPostParameter("cv_nombre");
        $email = $request->getPostParameter("cv_email");
        $rut = $request->getPostParameter("cv_rut");
        $telefono = $request->getPostParameter("cv_telefono");
        $solicitud = $request->getPostParameter("cv_solicitud");
        $archivo = $_FILES["cv_archivo"];
        
        $allowed =  array('doc','docx' ,'pdf');
        $filename = $archivo['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!in_array($ext,$allowed) ) {
            $this->msg = "El tipo de archivo cargado no es válido. Solo se permiten word y pdf.";
            $this->tipo_msg = "warning";
        }else{
            
            $util = new Util();
        
            $cv = new Curriculum();
            $cv->setCurNombre($nombre);
            $cv->setCurEmail($email);
            $cv->setCurCartaPresentacion($solicitud);
            $cv->setCurTelefono($telefono);
            $cv->setCurRut($rut);
            $cv->save();
            $cur_id = $cv->getCurId();
            
            $util->setArchivoCV($archivo, $cur_id);
            $url_backend = sfConfig::get("app_backend_url")."index.php/cv";
            $util->setEmailNotificacion("Hay un nuevo CV cargado en la web.",$url_backend);
            
            $this->msg = "El currículum ha sido cargado con éxito.";
            
        }
        
    }
      
  }
}
