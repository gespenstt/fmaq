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
  	/*$this->setLayout("layout_login");
  	if($request->isMethod("post")){
  		$this->redirect("proyecto/index");
  	}*/
    $this->setLayout("layout_login");
    $this->msg = false;
    
    if($request->isMethod("post")){
        try{
            $tra_id = date("U").rand(111,999);
            $util = new Util();
            $log = $util->setLog("loginIndexCliente[$tra_id]");

            $log->debug("executeIndex");
            $usuario = $request->getPostParameter("username");
            $password = $request->getPostParameter("password");
            $log->debug("Datos de entrada | usuario=$usuario | password(largo)=".strlen($password));

            $cu = new Criteria();
            $cu->add(ClientePeer::CLI_USUARIO,$usuario);
            $cu->setIgnoreCase(true);
            $resCu = ClientePeer::doSelectOne($cu);

            if($resCu){
                $log->debug("Cliente encontrado | cli_id=".$resCu->getCliId());
                
                if(md5($password) == $resCu->getCliPassword()){
                    $log->debug("Contrasena valida | Login cliente OK");
                    $this->getUser()->setAuthenticated(true);
                    $this->getUser()->setAttribute("cli_id", $resCu->getCliId());
                    $this->redirect("proyecto/index");
                }else{
                    $this->msg = "La contraseña ingresada es incorrecta.";
                    $log->warning("Contraseña ingresada incorrecta");
                }
            }else{
                $this->msg = "El usuario ingresado es incorrecto.";
                $log->warning("Usuario incorrecto");
            }
        }catch(Exception $e){
            $this->msg = "Ha ocurrido un error inesperado";
            $log->err($e->getMessage());
        }
       
        
    }
      
      
      
      
  }
  public function executeSalir(sfWebRequest $request)
  {
    $this->redirect("login/index");
  }
}
