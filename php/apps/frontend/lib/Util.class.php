<?php

class Util{
    




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
}