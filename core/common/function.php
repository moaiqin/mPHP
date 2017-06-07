<?php
function p($var){
     if(is_bool($var)){
	      var_dump($var);
	 }else if (is_null($var)){
	       var_dump($val);
	 }else{
	       echo "<pre style='background:$666; color:#000'>".print_r($var,true)."</pre>";
	 }
}

