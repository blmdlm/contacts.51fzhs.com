<?php
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller{
		
	public function _initialize(){
		if (!isset($_SESSION['aid'])||!isset($_SESSION['aname'])){
			$this->redirect('Admin/Login/index');
		}
	}
	
	
}



?>