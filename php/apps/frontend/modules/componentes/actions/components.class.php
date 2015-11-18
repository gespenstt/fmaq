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
        
        $c = new Criteria();
        $c->addAscendingOrderByColumn(TipoMaquinariaPeer::TMA_NOMBRE);
        $maquinaria_tipo = TipoMaquinariaPeer::doSelect($c);
        $this->maquinaria_tipo = $maquinaria_tipo;
        
    }
 
    
}
