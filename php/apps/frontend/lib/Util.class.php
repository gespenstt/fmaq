<?php

class Util{
    




    public function checkMenu($current_modulo,$modulo){
            if($current_modulo==$modulo){
                    return "current";
            }else{
                    return "";
            }
    }
    
 
    
    public function setLimitString($x, $length)
    {
      if(strlen($x)<=$length)
      {
        echo $x;
      }
      else
      {
        $y=substr($x,0,$length) . '...';
        echo $y;
      }
    }
}