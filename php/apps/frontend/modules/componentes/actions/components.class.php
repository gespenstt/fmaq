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
        
        $cs = new Criteria();
        $cs->addAscendingOrderByColumn(ServicioPeer::SER_TITULO);
        $servicios = ServicioPeer::doSelect($cs);
        $this->servicios = $servicios;
        
    }
    
    public function executeNuestramaquinaria(){        
      
        $co = new Criteria();
        $co->add(MaquinariaPeer::MAQ_VENTA,false);
        $co->addAscendingOrderByColumn('RAND()');
        $co->setLimit(5);
        $maquinaria = MaquinariaPeer::doSelect($co);
        $this->maquinaria = $maquinaria;
        
    }
    
    public function executeShare(){  
        $this->util = new Util();
    }
    
    public function executeFooter(){  
        $this->util = new Util();
        $cn = new Criteria();
        $cn->addDescendingOrderByColumn(NoticiaPeer::CREATED_AT);
        $cn->setLimit(2);
        $this->noticias = NoticiaPeer::doSelect($cn);
        
        
        
        $cs = new Criteria();
        $cs->addAscendingOrderByColumn(ServicioPeer::SER_TITULO);
        $servicios = ServicioPeer::doSelect($cs);
        $this->servicios = $servicios;
    }
 
    
}
