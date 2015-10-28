<?php

/**
 * cuenta actions.
 *
 * @package    Futumaq
 * @subpackage cuenta
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class cuentaActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
            $tra_id = date("U").rand(111,999);
            $util = new Util();
            $log = $util->setLog("cuentaVer[$tra_id]"); 
  	try{
            
            $clid = $this->getUser()->getAttribute("cli_id");
            
            $c = new Criteria();
            $c->add(ClientePeer::CLI_ID, $clid);
            $resCb = ClientePeer::doSelectOne($c);
            $this->cliente = $resCb;
             
            if($request->isMethod("post")){
                $clid = $this->getUser()->getAttribute("cli_id");
                $pass1 = $request->getPostParameter("pass1");
                $pass2 = $request->getPostParameter("pass2");
                
                $c2 = new Criteria();
                $c2->add(ClientePeer::CLI_ID, $clid);
                $c2->add(ClientePeer::CLI_PASSWORD, md5($pass1));
                $comparaPass = ClientePeer::doSelectOne($c2);
                
                if($comparaPass){
                    $comparaPass->setCliPassword(md5($pass2));
                    $comparaPass->save();
                    $log->debug("Contraseña cliente actualizada");
            
                    $this->getUser()->setFlash("flag_msg","Contraseña actualizada",true);
                    $this->getUser()->setFlash("flag_tipo","success",true);
                }else{
                    throw new Exception("Las contraseña ingresada no coincide con la actual");
                }
            }
            
        }catch(Exception $ex){
            $log->err($ex->getMessage());
            $this->getUser()->setFlash("flag_msg",$ex->getMessage(),true);
            $this->getUser()->setFlash("flag_tipo","danger",true);
            $this->redirect("cuenta/index");
        }
  }
  
}
