<?php
namespace core;
class mophp{
	private static $functionAyyay=array();
	public static $assign=array();
    public static function run(){
	       \core\lib\log::init();
		   $route=new \core\lib\route();
		   $ctr=$route->ctr;
		   $action=$route->action;
		   $ctrFileName=APP.'/ctr/'.$ctr.'Ctr.php';
		   $ctrClass='\\'.MODULE.'\ctr\\'.$ctr.'Ctr';
		   if(is_file($ctrFileName)){
				 //include $ctrFileName;
		         $contrion=new $ctrClass();
				 $contrion->$action();
				 \core\lib\log::log('ctr: '.$ctr.'  action:'.$action,$file='log');
				 
		   }else{
		         //throw new \Exception('找不到控制器'.$ctrClass);//如果你的PHP文件定义了命名空间，那么该命名空间下面的class 用法必须加\表示根空间，也就是php自己的class，不是你PHP文件里面的class
		   }
	}
	public static function load($class){
		  //自动加载类
		  // new\core\route();
		  // $class='core\route';
		  //MOPHP.'/core/route.php';

		  if(isset(self::$functionAyyay[$class])){
		       return true;
		  }
		  self::$functionAyyay[$class]=$class;
		  $class = str_replace('\\','/',$class);
		  if(is_file(MOPHP.'/'.$class.'.php')){
		       include MOPHP.'/'.$class.'.php';
		  }else{
		        return false;
		  }
	}
	
	public static function assign($name,$data){
	      self::$assign[$name]=$data;
	}
	
	public static function display($file){
         $filePath=APP.'/view/'.$file;
		 if(is_file($filePath)){
			   extract(self::$assign);//assign是个数组，所以把2他打成变量，键名和键值；
		       include $filePath;
		 }	
	}
}