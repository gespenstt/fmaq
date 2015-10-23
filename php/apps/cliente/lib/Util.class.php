<?php

class Util{
    
   
    
    public function setLog($modulo="",$archivo="backend_cliente"){
        
        //LOG
        $logFechaNombre = $archivo."_".date("Ymd").".log";
        $logPath = sfConfig::get('sf_log_dir').'/'.$logFechaNombre;
        $log = new sfFileLogger(new sfEventDispatcher(), array('level' => sfFileLogger::DEBUG,'file' => $logPath,'type' => $modulo)); 
        return $log;
        
    }




	public function checkMenu($current_modulo,$modulo){
		if($current_modulo==$modulo){
			return "active";
		}else{
			return "";
		}
	}
}