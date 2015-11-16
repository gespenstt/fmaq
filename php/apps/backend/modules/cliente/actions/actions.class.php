<?php

/**
 * cliente actions.
 *
 * @package    Futumaq
 * @subpackage cliente
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class clienteActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
      $c = new Criteria();
      $c->addAscendingOrderByColumn(ClientePeer::CLI_NOMBRE);
      $pager = new sfPropelPager('cliente', 10);
      $pager->setCriteria($c);
      $pager->setPage($request->getParameter('p', 1));
      $pager->init();
      
      $this->pagina = $request->getParameter('p', 1);
      
      $this->pager = $pager;
  	
  }
  public function executeAgregar(sfWebRequest $request)
  {
    $tra_id = date("U").rand(111,999);
    $util = new Util();
    $log = $util->setLog("clienteAgregar[$tra_id]"); 

    $log->debug("executeAgregar");
    if($request->isMethod("post")){
        
        try{
            $nombre = $request->getPostParameter("nombre");
            $apellido = $request->getPostParameter("apellido");
            $contacto = $request->getPostParameter("contacto");
            $empresa = $request->getPostParameter("empresa");
            $usuario = $request->getPostParameter("usuario");
            $password = $request->getPostParameter("password");

            $log->debug("Datos de entrada | nombre=$nombre | apellido=$apellido | contacto=$contacto | empresa=$empresa | ".
                    "usuario=$usuario | password(largo)=".strlen($password));

            //Buscar cliente
            $cb = new Criteria();
            $criterion = $cb->getNewCriterion(ClientePeer::CLI_CORREO,$contacto);
            $criterion->addOr($cb->getNewCriterion(ClientePeer::CLI_USUARIO,$usuario));
            $cb->add($criterion);
            $cb->setIgnoreCase(true);
            $resCb = ClientePeer::doSelectOne($cb);
            if($resCb){
                throw new Exception("El usuario y/o correo de cliente ya existe.");
            }  
            
            
            
            $cliente = new Cliente();
            $cliente->setCliNombre($nombre);
            $cliente->setCliApellido($apellido);
            $cliente->setCliCorreo($contacto);
            $cliente->setCliEmpresa($empresa);
            $cliente->setCliUsuario($usuario);
            $cliente->setCliPassword(md5($password));
            $cliente->save();
            $cliente_id = $cliente->getCliId();
            
            $log->debug("Cliente creado");
            $this->getUser()->setFlash("flag_msg","Cliente creado.",true);
            $this->getUser()->setFlash("flag_tipo","success",true);
            
            $this->redirect("cliente/editar/?cli_id=$cliente_id");
            
        } catch (Exception $ex) {

            $log->err($ex->getMessage());
            $this->getUser()->setFlash("flag_msg",$ex->getMessage(),true);
            $this->getUser()->setFlash("flag_tipo","danger",true);
            $this->redirect("cliente/agregar");

        }
        
    }
  	
  }
  public function executeEditar(sfWebRequest $request)
  {
    $tra_id = date("U").rand(111,999);
    $util = new Util();
    $log = $util->setLog("clienteEditar[$tra_id]"); 

    $log->debug("executeEditar");

    try{
        
        $cli_id = $request->getParameter("cli_id");
        $log->debug("Datos de entrada | cli_id=$cli_id");
        
        $cliente = ClientePeer::retrieveByPK($cli_id);
        
        if(!$cliente){
            throw new Exception("El cliente seleccionado no existe.");
        }
        
        if($request->isMethod("post")){
            
            $nombre = $request->getPostParameter("nombre");
            $apellido = $request->getPostParameter("apellido");
            $contacto = $request->getPostParameter("contacto");
            $empresa = $request->getPostParameter("empresa");
            $usuario = $request->getPostParameter("usuario");
            $password = $request->getPostParameter("password");

            $log->debug("Datos de entrada | nombre=$nombre | apellido=$apellido | contacto=$contacto | empresa=$empresa | ".
                    "usuario=$usuario | password(largo)=".strlen($password));
            
                       
            
            $cliente->setCliNombre($nombre);
            $cliente->setCliApellido($apellido);
            $cliente->setCliCorreo($contacto);
            $cliente->setCliEmpresa($empresa);
            $cliente->setCliUsuario($usuario);
            if(strlen($password)>0){
                $cliente->setCliPassword(md5($password));
            }
            
            $cliente->save();
            
            $log->debug("Cliente actualizado");
            
            $this->getUser()->setFlash("flag_msg","Datos actualizados",true);
            $this->getUser()->setFlash("flag_tipo","success",true);
            
        }
        
        $this->cliente = $cliente;
        
    } catch (Exception $ex) {

        $log->err($ex->getMessage());
        $this->getUser()->setFlash("flag_msg",$ex->getMessage(),true);
        $this->getUser()->setFlash("flag_tipo","danger",true);
        $this->redirect("cliente/index");

    }
  }
  public function executeEliminar(sfWebRequest $request)
  {
    $tra_id = date("U").rand(111,999);
    $util = new Util();
    $log = $util->setLog("clienteEditar[$tra_id]"); 

    $log->debug("executeEditar");
    
    if($request->isMethod("post")){

        try{

            $cli_id = $request->getParameter("cli_id");
            $log->debug("Datos de entrada | cli_id=$cli_id");

            $cliente = ClientePeer::retrieveByPK($cli_id);

            if(!$cliente){
                throw new Exception("El cliente seleccionado no existe.");
            }
            
            //Borrar campos
            foreach($cliente->getCampos() as $camp){
                //Borrar potretos
                foreach($camp->getPotreros() as $pot){
                    $p_nombre = $pot->getPotNombre();
                    $pot->delete();
                    $log->debug("Eliminando potrero=$p_nombre");
                }
                $c_nombre = $camp->getCamNombre();
                $camp->delete();
                $log->debug("Eliminando campo=$c_nombre");
            }
            
            $cliente->delete();
            $log->debug("Todos los datos del cliente han sido eliminados.");
            $this->getUser()->setFlash("flag_msg","Cliente eliminado.",true);
            $this->getUser()->setFlash("flag_tipo","success",true);
            
        }  catch (Exception $ex){

            $log->err($ex->getMessage());
            $this->getUser()->setFlash("flag_msg",$ex->getMessage(),true);
            $this->getUser()->setFlash("flag_tipo","danger",true);


        }
        
    }
    $this->redirect("cliente/index");
  	
  }
}
