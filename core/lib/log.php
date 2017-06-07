<?php
namespace core\lib;
use core\lib\conf;
class log{
    /*
	1.先选择哪种日志;
	*/
	static public $logClass;
    static public function init(){
	      $drive=conf::get('DRIVE','logconf');
		  $logClass='\core\lib\drive\log\\'.$drive;
		  self::$logClass=new $logClass();
	} 
	static public function log($name,$file='log'){
	      self::$logClass->log($name,$file='log');
	}
}