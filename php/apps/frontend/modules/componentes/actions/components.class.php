<?php


class componentesComponents extends sfComponents
{
  
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
 
    
}
