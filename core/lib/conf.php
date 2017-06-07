<?php
namespace core\lib;
class conf{
	 static $conf=array();
     static public function get($name,$file){
	       /*
		   1.判断文件是否存在；
		   1.判断配置是否存在
		   3.缓存配置
		   */
		   if(isset(self::$conf[$file])&&isset(self::$conf[$file][$name])){
		        return self::$conf[$file][$name];
		   }
		   $fileName=MOPHP.'/core/config/'.$file.'.php';
		   if(is_file($fileName)){
			     $conf=include $fileName;
				 if(isset($conf[$name])){
				       self::$conf[$file]=$conf;
					   return $conf[$name];
				 }else{
				      throw new \Exception('没有找到配置项'.$name);
				 }
			}else{
			       throw new \Exception('找不到配置文件'.$file);
			}
	 }
	 
	 public static function getAllConf($file){
	       if(isset(self::$conf[$file])&&isset(self::$conf[$file][$name])){
		        return self::$conf[$file];
		   }
		   $fileName=MOPHP.'/core/config/'.$file.'.php';
		   if(is_file($fileName)){
			     $conf=include $fileName;
				 self::$conf[$file]=$conf;
			     return $conf;
				 
			}else{
			       throw new \Exception('找不到配置文件'.$file);
			}
	 }
}