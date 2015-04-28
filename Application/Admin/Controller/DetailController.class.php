<?php
namespace Admin\Controller;
use Think\Controller;


class DetailController extends CommonController{
	
	function index(){
		
		$id=I('id',null);
		$this->assign('id',$id);
		$this->display();
	}
	
	
	
}