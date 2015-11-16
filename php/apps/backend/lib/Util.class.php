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
            if(empty($files_tmp[$idx]) || empty($files_name[$idx])){
                continue;
            }
            //Get ID
            $maquinaria_foto = new MaquinariaFoto();
            $maquinaria_foto->save();
            $maquinaria_foto_id = $maquinaria_foto->getMfoId();
            
            $f_tmp = $files_tmp[$idx];
            $f_name = $maquinaria_foto_id."_".$files_name[$idx];
            $log->debug("Procesando $idx | tmp=$f_tmp | name=$f_name");
            
            //UPLOAD DIR FRONTEND(WEB)/UPLOADS            
            $path = sfConfig::get("sf_root_dir").DIRECTORY_SEPARATOR."web".DIRECTORY_SEPARATOR."uploads".DIRECTORY_SEPARATOR."maquinaria".DIRECTORY_SEPARATOR.$mqid.DIRECTORY_SEPARATOR;
            $path_db = "uploads/maquinaria/$mqid/$f_name";
            $path_file = $path.$f_name;            
            
            $log->debug("id=$maquinaria_foto_id | path=$path | path_db=$path_db | path_file=$path_file");
            
            //Creacion carpeta
            mkdir($path, 0755);
            
            move_uploaded_file($f_tmp, $path_file);
            
            
            $maquinaria_foto->setMfoNombre($f_name);
            $maquinaria_foto->setMfoRuta($path_db);
            $maquinaria_foto->setMaqId($mqid);
            $maquinaria_foto->save();
            
            $log->debug("Registro MaquinariaFoto creado | mfo_id=$maquinaria_foto_id ");
        }        
        
    }
    
    public function setArchivoProyecto($nombre,$archivo,$pro_id,$par_id){
        
        //UPLOAD DIR FRONTEND(WEB)/UPLOADS       
        $f_name = $par_id."_".$archivo["name"];
        $path = sfConfig::get("sf_root_dir").DIRECTORY_SEPARATOR."web".DIRECTORY_SEPARATOR."uploads".DIRECTORY_SEPARATOR."proyecto".DIRECTORY_SEPARATOR.$pro_id.DIRECTORY_SEPARATOR;
        $path_db = "uploads/proyecto/$pro_id/$f_name";    
        $path_file = $path.$f_name;       
            
        //Creacion carpeta
        mkdir($path, 0755);
        move_uploaded_file($archivo["tmp_name"], $path_file);
        
        $proyecto_archivo = ProyectoArchivoPeer::retrieveByPK($par_id);
        $proyecto_archivo->setParRuta($path_db);
        $proyecto_archivo->setParDescripcion($f_name);
        $proyecto_archivo->save();
    }
    
    public function setArchivoServicio($archivo,$ser_id){
        
        //UPLOAD DIR FRONTEND(WEB)/UPLOADS       
        $f_name = $ser_id."_".$archivo["name"];
        $path = sfConfig::get("sf_root_dir").DIRECTORY_SEPARATOR."web".DIRECTORY_SEPARATOR."uploads".DIRECTORY_SEPARATOR."servicio".DIRECTORY_SEPARATOR.$ser_id.DIRECTORY_SEPARATOR;
        $path_db = "uploads/servicio/$ser_id/$f_name";    
        $path_file = $path.$f_name;       
            
        //Creacion carpeta
        mkdir($path, 0755);
        move_uploaded_file($archivo["tmp_name"], $path_file);
        
        return $path_db;
    }
    
    public function getMetas($url){
        $html = file_get_contents($url);

	//parsing begins here:
	$doc = new DOMDocument();
	@$doc->loadHTML($html);
	$nodes = $doc->getElementsByTagName('title');

	//get and display what you need:
	//$title = $nodes->item(0)->nodeValue;

	$metas = $doc->getElementsByTagName('meta');
	$titulo = "";
	$bajada = "";
	$imagen = "";
	//print_r($metas); exit;
	for ($i = 0; $i < $metas->length; $i++)
	{
	    $meta = $metas->item($i);
	    $property = $meta->getAttribute('property');
	    if($property!=""){
	    	//facebook
	    	switch($property){
	    		case "og:title":
	    			if($titulo==""){
	    				$titulo = $meta->getAttribute('content');
	    			}
	    		break;
	    		case "og:url":
	    			if($url==""){
	    				$url = $meta->getAttribute('content');
	    			}
	    		break;
	    		case "og:image":
	    			if($imagen==""){
	    				$imagen = $meta->getAttribute('content');
	    			}
	    		break;
	    		case "og:description":
	    			if($bajada==""){
	    				$bajada = $meta->getAttribute('content');
	    			}
	    		break;
	    	}

	    }else{

	    	$name = $meta->getAttribute('name');
	    	switch($name){
	    		case "title":
	    			if($titulo==""){
	    				$titulo = $meta->getAttribute('content');
	    			}
	    		break;
	    		case "description":
	    			if($bajada==""){
	    				$bajada = $meta->getAttribute('content');
	    			}
	    		break;
	    		case "og:title":
	    			if($titulo==""){
	    				$titulo = $meta->getAttribute('content');
	    			}
	    		break;
	    		case "og:url":
	    			if($url==""){
	    				$url = $meta->getAttribute('content');
	    			}
	    		break;
	    		case "og:image":
	    			if($imagen==""){
	    				$imagen = $meta->getAttribute('content');
	    			}
	    		break;
	    		case "og:description":
	    			if($bajada==""){
	    				$bajada = $meta->getAttribute('content');
	    			}
	    		break;
	    	}

	    }
	}
        
        return array(
            "titulo" => $titulo,
            "bajada" => $bajada,
            "imagen" => $imagen,
        );
    }
}