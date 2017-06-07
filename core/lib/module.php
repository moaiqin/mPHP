<?php
namespace core\lib;
use core\lib\conf;
use Medoo\Medoo;
class module extends \Medoo{
      public function __construct(){
		  
		  /*$res=conf::getAllConf('dbconfig');
		  extract($res);
		  parent::__construct($host,$user,$passward,$db);
		  
		  if(mysqli_connect_error()){
		        throw new \Exception('Connect error'.mysqli_connect_errno());
		  }*/
		  $res=conf::getAllConf('dbconfig');
		  parent::__construct($res);
	  }
}