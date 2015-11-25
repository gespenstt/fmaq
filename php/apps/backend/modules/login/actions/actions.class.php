<?php

/**
 * login actions.
 *
 * @package    Futumaq
 * @subpackage login
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class loginActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->setLayout("layout_login");
    $this->msg = false;
        
    if($request->isMethod("post")){
        if(!$this->getUser()->hasFlash('referer') && !empty($this->getRequest()->getReferer())){
          $this->getUser()->setFlash('referer',$this->getRequest()->getReferer());
        }
        $tra_id = date("U").rand(111,999);
        $util = new Util();
        $log = $util->setLog("loginIndex[$tra_id]");

        $log->debug("executeIndex");
        $usuario = $request->getPostParameter("usuario");
        $password = $request->getPostParameter("password");
        
        $log->debug("Datos de entrada | usuario=$usuario | password(largo)=".strlen($password));
        
        $cu = new Criteria();
        $cu->add(UsuarioPeer::USU_USUARIO,$usuario);
        $cu->setIgnoreCase(true);
        $resCu = UsuarioPeer::doSelectOne($cu);
        
        if($resCu){
            $log->debug("Usuario encontrado | usu_id=".$resCu->getUsuId());
            if(md5($password) == $resCu->getUsuPassword()){
                $log->debug("Contrasena valida | Login OK");
                $this->getUser()->setAuthenticated(true);
                $this->getUser()->setAttribute("usu_id", $resCu->getUsuId());
                if($this->getUser()->hasFlash('referer') && !empty($this->getUser()->getFlash('referer')) && strpos($this->getUser()->getFlash('referer'), "login")===FALSE){
                  $referer = $this->getUser()->getFlash('referer');
                  $this->getUser()->setFlash('referer', null);  
                  $this->redirect($referer);
                }else{
                  $this->redirect("home/index");
                }
            }else{
                $this->msg = "La contraseña ingresada es incorrecta.";
                $log->warning("Contraseña ingresada incorrecta");
            }
        }else{
            $this->msg = "El usuario ingresado es incorrecto.";
            $log->warning("Usuario incorrecto");
        }
    }
  }
  public function executeSalir(sfWebRequest $request)
  {
    $this->getUser()->setAttribute("usu_id", null);
    $this->getUser()->setAuthenticated(false);
    $this->redirect("login/index");
  }
}
