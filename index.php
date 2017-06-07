<?php
header('Content-type:text/html; charset=utf-8');

/*
  *入口文件
  *1.定义常量
  *2.加载函数库
  *3.启动框架
*/
define('MOPHP',realpath('./'));
define('CORE',MOPHP.'/core');
define('APP',MOPHP.'/app');
define('DEBUG',true);
define('MODULE','app');
include MOPHP.'/vendor/autoload.php';
if(DEBUG){
	  $whoops= new \Whoops\run;
	  //$whoops->pushHandler( new \Whoops\Handler\PrettyPageHandler);
	  //也可以
	  $option=new \Whoops\Handler\PrettyPageHandler;
	  $option->setPageTitle('框架出错了');
	  $whoops->pushHandler();
	  $whoops->register($option);
      ini_set('display_error','on');
}else{
      ini_set('display_error','off');
}
include CORE.'/common/function.php';
include CORE.'/mophp.php';
spl_autoload_register('\core\mophp::load');//如果new一个累时候没有需要的方法就会自动的找到类里面的load方法；
\core\mophp::run();