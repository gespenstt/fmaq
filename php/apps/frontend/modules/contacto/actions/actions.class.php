<?php

/**
 * contacto actions.
 *
 * @package    Futumaq
 * @subpackage contacto
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class contactoActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
      if($request->isMethod("post")){
        $this->msg = false;
        $this->tipo_msg = "success";
    
        $nombre = $request->getPostParameter("template-contactform-name");
        $email = $request->getPostParameter("template-contactform-email");
        $phone = $request->getPostParameter("template-contactform-phone");
        $subject = $request->getPostParameter("template-contactform-subject");
        $service = $request->getPostParameter("template-contactform-service");
        $direccion = $request->getPostParameter("template-contactform-address");
        $cantidad = $request->getPostParameter("template-contactform-mount");    
        $message = $request->getPostParameter("template-contactform-message");
     
        
        
        if($service!="consulta"){
            $cv = new Cotizacion();
            $cv->setCotNombre($nombre);
            $cv->setCotEmail($email);
            $cv->setCotFono($phone);
            $cv->setCotDireccion($direccion);
            $cv->setCotHectareas($cantidad);
            $cv->setCotAsunto($subject);
            $cv->setCotMensaje($message);
            $cv->save();
            $url_backend = sfConfig::get("app_backend_url")."index.php/cotizacion";
            $asuntoCorreoNotificacion = "Han ingresado una nueva cotización en el sistema"; 
        }else{
            $url_backend = "";
            $asuntoCorreoNotificacion = "Han enviado una consulta a través de la web<br>Nombre: ".$nombre." <br>Email: ".$email." <br>Telefono: ".$phone." <br>Mensaje: ".$message."  "; 
        }
        //print_r($nombre." ".$email." ".$phone." ".$subject." ".$service." ".$direccion." ".$cantidad." ".$message);
        
            $util = new Util();

            
            $util->setEmailNotificacionContacto($asuntoCorreoNotificacion,$url_backend);
            
            $this->msg = "Datos enviados correctamente";
        
        
      }
  }
  public function executeEnviaCorreo(sfWebRequest $request)
  {
      
  }
}
