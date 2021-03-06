<?php

class Util{
    



    
    public function setFecha($date,$formato_salida,$formato_entrada='d/m/Y H:i:s'){ //"13/05/2014 10:15:28"
        try{
            if(is_null($date) || empty($date) || $date=="null"){
                return "";
            }
            $fecha = DateTime::createFromFormat($formato_entrada, $date);
            $fecha_retorno = $fecha->format($formato_salida);
            switch(true){
                case (strpos($formato_salida, "F")!==FALSE):
                        $mes_ingles = array(
                            "January","February","March","April","May","June","July","August","September","October","November","December",
                        );
                        $mes_esp = array(
                            "Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre",
                        );
                        $fecha_retorno = str_replace($mes_ingles, $mes_esp, $fecha_retorno);                        
                    break;
                case (strpos($formato_salida, "M")!==FALSE):
                        $mes_ingles = array(
                            "Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec",
                        );
                        $mes_esp = array(
                            "Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic",
                        );
                        $fecha_retorno = str_replace($mes_ingles, $mes_esp, $fecha_retorno);
                    break;
                
            }
            return $fecha_retorno;
        } catch (Exception $ex) {
            return "";
        }
    }

    public function checkMenu($current_modulo,$modulo){
            if($current_modulo==$modulo){
                    return "current";
            }else{
                    return "";
            }
    }
    
 
    
    public function setLimitString($str, $len)
    {
        $start = 0;
    $str_clean = substr(strip_tags($str),$start,$len);
    $pos = strrpos($str_clean, " ");
    if($pos === false) {
        $str_clean = substr(strip_tags($str),$start,$len);  
        }else
        $str_clean = substr(strip_tags($str),$start,$pos);

    if(preg_match_all('/\<[^>]+>/is',$str,$matches,PREG_OFFSET_CAPTURE)){

        for($i=0;$i<count($matches[0]);$i++){

            if($matches[0][$i][1] < $len){

                $str_clean = substr($str_clean,0,$matches[0][$i][1]) . $matches[0][$i][0] . substr($str_clean,$matches[0][$i][1]);

            }else if(preg_match('/\<[^>]+>$/is',$matches[0][$i][0])){

                $str_clean = substr($str_clean,0,$matches[0][$i][1]) . $matches[0][$i][0] . substr($str_clean,$matches[0][$i][1]);

                break;

            }

        }

        return $str_clean;

    }else{
        $string = substr($str,$start,$len);
         $pos = strrpos($string, " ");
        if($pos === false) {
            return substr($str,$start,$len);
        }
            return substr($str,$start,$pos);

    }
    
    }
    
    public function getShareUrl($social){
        $current_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        switch ($social){
            case "facebook":
                    return "http://www.facebook.com/sharer.php?u=$current_url";
                break;
            case "twitter":
                    return "https://twitter.com/share?url=$current_url";
                break;
            case "pinterest":
                    return "https://pinterest.com/pin/create/bookmarklet/?url=$current_url";
                break;
            case "gplus":
                    return "https://plus.google.com/share?url=$current_url";
                break;
        }
    }
    
    public function setEmailNotificacion($mensaje,$url){
        
        if(empty($mensaje)||empty($url)){
            return false;
        }
        
        $email = sfConfig::get("app_notificacion_email");
        $asunto = "Notificación desde web Futamaq";
        $ruta_template_email = sfconfig::get("sf_root_dir").DIRECTORY_SEPARATOR.sfConfig::get("app_frontend_webcarpeta").
                DIRECTORY_SEPARATOR."uploads".DIRECTORY_SEPARATOR."assets".DIRECTORY_SEPARATOR."email_template.html";
        
        if(!is_file($ruta_template_email)){
            return false;
        }
        
        $contenido_template_email = file_get_contents($ruta_template_email);
        
        if(strpos($contenido_template_email, "{{MENSAJE}}")===FALSE || strpos($contenido_template_email, "{{URL}}")===FALSE){
            return false;
        }
        
        $contenido_template_email = str_replace("{{MENSAJE}}", $mensaje, $contenido_template_email);
        $contenido_template_email = str_replace("{{URL}}", $url, $contenido_template_email);
      

        $mailer = sfContext::getInstance()->getMailer();
        $mensaje = Swift_Message::newInstance()
                      ->setFrom(array("notificacion@idioteque.ninja" => "Notificación Futamaq"))
                      ->setTo($email)
                      ->setSubject($asunto)
                      ->setBody($contenido_template_email,'text/html')
                  ;
                  $mailer->send($mensaje);    
                  
    }
    
    
     public function setEmailNotificacionContacto($mensaje,$url=""){
        
         
        if(empty($mensaje)){
            return false;
        }
        
        $email = sfConfig::get("app_notificacion_email");
        $asunto = "Notificación Contacto desde web Futamaq";
        $ruta_template_email = sfconfig::get("sf_root_dir").DIRECTORY_SEPARATOR.sfConfig::get("app_frontend_webcarpeta").
                DIRECTORY_SEPARATOR."uploads".DIRECTORY_SEPARATOR."assets".DIRECTORY_SEPARATOR."email_template_con.html";
        
        if(!is_file($ruta_template_email)){
            return false;
        }
        
        $contenido_template_email = file_get_contents($ruta_template_email);
        
        if(strpos($contenido_template_email, "{{MENSAJE}}")===FALSE){
            return false;
        }
        
        $contenido_template_email = str_replace("{{MENSAJE}}", $mensaje, $contenido_template_email);
        if($url!=""){
            $url = '<a href="'.$url.'">Ver en el administrador</a>';
            $contenido_template_email = str_replace("{{URL}}", $url, $contenido_template_email);        
        }else{
            $contenido_template_email = str_replace("{{URL}}", "", $contenido_template_email); 
        }
      

        $mailer = sfContext::getInstance()->getMailer();
        $mensaje = Swift_Message::newInstance()
                      ->setFrom(array("notificacion@idioteque.ninja" => "Notificación Futamaq"))
                      ->setTo($email)
                      ->setSubject($asunto)
                      ->setBody($contenido_template_email,'text/html')
                  ;
                  $mailer->send($mensaje);    
                  
    }
    
    
    function setArchivoCV($archivo,$cvid){
        $cv = CurriculumPeer::retrieveByPK($cvid);
        if(!$cv){
            return false;
        }     
        $f_name = strtolower($cvid."_".$archivo["name"]);
        $path = sfConfig::get("sf_root_dir").DIRECTORY_SEPARATOR.sfConfig::get("app_frontend_webcarpeta").DIRECTORY_SEPARATOR."uploads".DIRECTORY_SEPARATOR."cv".DIRECTORY_SEPARATOR.$cvid.DIRECTORY_SEPARATOR;
        $path_db = "uploads/cv/$cvid/$f_name";    
        $path_file = $path.$f_name;          
            
        //Creacion carpeta
        mkdir($path, 0755);
        move_uploaded_file($archivo["tmp_name"], $path_file);
        
        $cv->setCurNombreArchivo($f_name);
        $cv->setCurRuta($path_db);
        $cv->save();            
        
    }
}