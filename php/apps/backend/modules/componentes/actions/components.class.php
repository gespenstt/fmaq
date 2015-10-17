<?php


class componentesComponents extends sfComponents
{
  
    public function executeModales(sfWebRequest $request)
    {

        
    }
  
    public function executeMenu(sfWebRequest $request)
    {
    	$parametrosIn = ($request->getParameterHolder()->getAll());
        $activo = $parametrosIn['module'];
        if(empty($activo)){
            $activo = "home";
        }
        $this->modulo = $activo;
        $this->util = new Util();
        
    }
  
    public function executeMensaje(sfWebRequest $request)
    {
        $flag_msg = false;
        $flag_tipo = "info"; //info - success - danger - warning
        
        if($this->getContext()->getUser()->hasFlash("flag_msg")){
          $flag_msg = $this->getContext()->getUser()->getFlash("flag_msg");
          $this->getContext()->getUser()->setFlash("flag_msg",null);
        } 
        if($this->getContext()->getUser()->hasFlash("flag_tipo")){
          $flag_tipo = $this->getContext()->getUser()->getFlash("flag_tipo");
          $this->getContext()->getUser()->setFlash("flag_tipo",null);
        } 
        
        $this->flag_msg = $flag_msg;
        $this->flag_tipo = $flag_tipo;
    }
    
}
