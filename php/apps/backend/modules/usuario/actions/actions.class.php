<?php

/**
 * usuario actions.
 *
 * @package    Futumaq
 * @subpackage usuario
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class usuarioActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
        $c = new Criteria();
        $c->addAscendingOrderByColumn(UsuarioPeer::USU_NOMBRE);
        $pager = new sfPropelPager('usuario', 10);
        $pager->setCriteria($c);
        $pager->setPage($request->getParameter('p', 1));
        $pager->init();

        $this->pagina = $request->getParameter('p', 1);

        $this->pager = $pager;
  	
  }
  public function executeEliminar(sfWebRequest $request)
  {
      if($request->isMethod("post")){
        $tra_id = date("U").rand(111,999);
        $util = new Util();
        $log = $util->setLog("usuarioEliminar[$tra_id]");
    
        $log->debug("executeEliminar");
        try{
            $usu_id = $request->getParameter("usu_id");
            $log->debug("Datos de entrada | usu_id=$usu_id");
            $usuario = UsuarioPeer::retrieveByPK($usu_id);
            if(!$usuario){
                throw new Exception("El usuario que intentas eliminar no existe.");
            }
            $usuario->delete();

            $log->debug("Usuario eliminado en sistema | usu_id=$usu_id");

            $this->getUser()->setFlash("flag_msg","Usuario eliminado con éxito.",true);
            $this->getUser()->setFlash("flag_tipo","success",true);

            $this->redirect("usuario/index");
            
        } catch (Exception $ex) {
            $this->getUser()->setFlash("flag_msg",$ex->getMessage(),true);
            $this->getUser()->setFlash("flag_tipo","danger",true);
            $this->redirect("home/index");
        }
      }
      return sfView::NONE;
  }
  public function executeEditar(sfWebRequest $request)
  {
    $tra_id = date("U").rand(111,999);
    $util = new Util();
    $log = $util->setLog("usuarioEditar[$tra_id]");
    
    $log->debug("executeEditar");
    if($request->isMethod("post")){
        
        try{
            
            $usu_id = $request->getParameter("usu_id");
            $log->debug("Datos de entrada | usu_id=$usu_id");
            $usuario = UsuarioPeer::retrieveByPK($usu_id);
            if(!$usuario){
                throw new Exception("El usuario que intentas modificar no existe.");
            }
            
            $usuario_nombre = $request->getPostParameter("nombre");
            $usuario_apellido = $request->getPostParameter("apellido");
            $usuario_email = $request->getPostParameter("email");
            $usuario_usuario = $request->getPostParameter("usuario");
            $usuario_password = $request->getPostParameter("password");

            $log->debug("Datos de entrada | nombre=$usuario_nombre | apellido=$usuario_apellido | email=$usuario_email".
            " | usuario=$usuario_usuario | password(largo)=".strlen($usuario_password));
            
            $usuario->setUsuNombre($usuario_nombre);
            $usuario->setUsuApellido($usuario_apellido);
            $usuario->setUsuCorreo($usuario_email);
            if(strlen($usuario_password)>0){
                $usuario->setUsuPassword(md5($usuario_password));
            }            
            $usuario->setUsuUsuario($usuario_usuario);
            $usuario->save();
            
            $log->debug("Usuario actualizado");
            
            $this->getUser()->setFlash("flag_msg","Los datos han sido actualizados.",true);
            $this->getUser()->setFlash("flag_tipo","success",true);
            
            $this->usuario = $usuario;
            
        } catch (Exception $ex) {
        
            $this->getUser()->setFlash("flag_msg",$ex->getMessage(),true);
            $this->getUser()->setFlash("flag_tipo","danger",true);
            $this->redirect("home/index");

        }
        
    }else{
        try{
            $usu_id = $request->getParameter("usu_id");
            $log->debug("Datos de entrada | usu_id=$usu_id");
            $usuario = UsuarioPeer::retrieveByPK($usu_id);
            if(!$usuario){
                throw new Exception("El usuario que intentas modificar no existe.");
            }
            
            $this->usuario = $usuario;
            
        } catch (Exception $ex) {
            $this->getUser()->setFlash("flag_msg",$ex->getMessage(),true);
            $this->getUser()->setFlash("flag_tipo","danger",true);
            $this->redirect("home/index");
        }
    }
    

  }
  public function executeCrear(sfWebRequest $request)
  {
    if($request->isMethod("post")){

      try{

          $tra_id = date("U").rand(111,999);
          $util = new Util();
          $log = $util->setLog("usuarioCrear[$tra_id]");

          $log->debug("executeCrear");
          $usuario_nombre = $request->getPostParameter("nombre");
          $usuario_apellido = $request->getPostParameter("apellido");
          $usuario_email = $request->getPostParameter("email");
          $usuario_usuario = $request->getPostParameter("usuario");
          $usuario_password = $request->getPostParameter("password");

          $log->debug("Datos de entrada | nombre=$usuario_nombre | apellido=$usuario_apellido | email=$usuario_email".
                  " | usuario=$usuario_usuario | password(largo)=".strlen($usuario_password));

          //Buscar usuario
          $cb = new Criteria();
          $criterion = $cb->getNewCriterion(UsuarioPeer::USU_USUARIO,$usuario_usuario);
          $criterion->addOr($cb->getNewCriterion(UsuarioPeer::USU_CORREO,$usuario_email));
          $cb->add($criterion);
          $cb->setIgnoreCase(true);
          $log->debug(print_r(UsuarioPeer::doSelectStmt($cb),true));
          $resCb = UsuarioPeer::doSelectOne($cb);
          if($resCb){
              throw new Exception("Usuario ya existe en sistema");
          }

          $log->debug("Usuario no existe en sistema");

          $usuario = new Usuario();
          $usuario->setUsuNombre($usuario_nombre);
          $usuario->setUsuApellido($usuario_apellido);
          $usuario->setUsuCorreo($usuario_email);
          $usuario->setUsuPassword(md5($usuario_password));
          $usuario->setUsuUsuario($usuario_usuario);
          $usuario->save();
          $usuario_id = $usuario->getUsuId();

          $log->debug("Usuario creado en sistema | usu_id=$usuario_id");

          $this->getUser()->setFlash("flag_msg","Usuario creado con éxito.",true);
          $this->getUser()->setFlash("flag_tipo","success",true);

      } catch (Exception $ex) {

          $log->err($ex->getMessage());
          $this->getUser()->setFlash("flag_msg",$ex->getMessage(),true);
          $this->getUser()->setFlash("flag_tipo","danger",true);

      }
      $this->redirect("usuario/index");

    }
    return sfView::NONE;
  }
}
