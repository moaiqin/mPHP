<?php
namespace app\ctr;
use core\lib\module;
class indexCtr extends \core\mophp{
     public function index(){
	      /*p('this is index');
		  $module=new \core\lib\module();
		  $sql='select * from test1';
		  $result=$module->query($sql);
		  p($result->fetch_all());*/
		  //$data='这里是师徒';
		  //$this->assign('data',$data);
		  //$this->display('index.html');
		  //$conf=new \core\lib\conf();
		  //echo $conf->get('CTR','route');
		  //new \core\lib\module();
		  $module=new module();
		  p($module);
	 }
}