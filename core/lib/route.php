<?php
namespace core\lib;
use core\lib\conf;
class route{
	 public $ctr;
	 public $action;
     public function __construct(){
	       //xxx.com/index/index实际是下面的那个网址
		   //xxx.com/index.php/index/index
		   /**
		    *1.隐藏index.php
			*2.获取URL 参数部分
			*3.返回对应控制器和方法
		   */
		   if(isset($_SERVER['PATH_INFO'])&&$_SERVER['PATH_INFO']!='/'){
		         $path=explode('/',trim($_SERVER['PATH_INFO'],'/'));
				 if(isset($path[0])){
				      $this->ctr=$path[0];
					  unset($path[0]);
				 }
				 if(isset($path[1])){
				      $this->action=$path[1];
					  unset($path[1]);
				 }else{
				       $this->action=conf::get('ACTION','route');
				 }
				 $num=count($path)+2;
				 $i=2;
				 while($i<$num){
					 if(isset($path[$i+1])){
				         $_GET[$path[$i]]=$path[$i+1];
					 }else{
					     break;
					 }
					 $i+=2;
				 }
		   }else{
				      $this->ctr=conf::get('CTR','route');
					  $this->action=conf::get('ACTION','route');
		   }
	 }
}