<?php

class Util{
    
   
    
    public function setLog($modulo="",$archivo="backend"){
        
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
    
    public function setImagenes($files,$mqid,$log){
        /*$files = $_FILES["imagenes"];
  	$files_tmp = $files["tmp_name"];
  	$files_name = $files["name"];
  	print_r($files_tmp);*/
  	$files_tmp = $files["tmp_name"];
  	$files_name = $files["name"]; 
        
        $log->debug("setImagenes");
        
        for($idx=0;$idx<count($files_tmp);$idx++){
            $f_tmp = $files_tmp[$idx];
            $f_name = $files_name[$idx];
            $log->debug("Procesando $idx | tmp=$f_tmp | name=$f_name");
            //UPLOAD DIR FRONTEND(WEB)/UPLOADS
            
            $path = sfConfig::get("sf_root_dir").DIRECTORY_SEPARATOR."web".DIRECTORY_SEPARATOR."uploads".DIRECTORY_SEPARATOR.$mqid.DIRECTORY_SEPARATOR;
            $path_db = "uploads/$mqid/$f_name";
            $path_file = $path.$f_name;            
            
            $log->debug("path=$path | path_db=$path_db | path_file=$path_file");
            
            //Creacion carpeta
            mkdir($path, 0755);
            
            move_uploaded_file($f_tmp, $path_file);
            
            $maquinaria_foto = new MaquinariaFoto();
            $maquinaria_foto->setMfoNombre($f_name);
            $maquinaria_foto->setMfoRuta($path_db);
            $maquinaria_foto->setMaqId($mqid);
            $maquinaria_foto->save();
            
            $log->debug("Registro MaquinariaFoto creado | mfo_id=".$maquinaria_foto->getMfoId());
        }        
        
    }
}