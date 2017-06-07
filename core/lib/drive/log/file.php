<?php
namespace core\lib\drive\log;
use core\lib\conf;
class file{
	 public $path;
	 public function __construct(){
	      $path=conf::get('OPTION','logconf');
		  $this->path=$path['path'];
	 }
     public function log($message,$file='log'){
	      $filename=MOPHP.'/'.$this->path;
		  if(!file_exists($filename)){
		       mkdir($filename,0777,true);
		  }
		  $cachefile=$filename.'/'.date('YmdH');
		  if(!file_exists($filename.'/'.date('YmdH'))){
		       mkdir($cachefile,0777,true);
		  }
		  $putfile=$cachefile.'/'.date('YmdHis').$file.'.php';
		  file_put_contents($putfile,date('Y-m-d h:i:s').'  '.json_encode($message).PHP_EOL,FILE_APPEND);//就是同时可以插入很多条数据
	 }
}