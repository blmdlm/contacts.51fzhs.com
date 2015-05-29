<?php
namespace Admin\Controller;
use Think\Controller;

class DeleteController extends  CommonController{
	public function index(){
		$this->display();
	}
	
	public function companyInfo(){
	
// 		if (!IS_POST){
// 			$this->error('page not found');
// 		}


		$graduate=M('graduate');
		$id=I('id',-1);
		$flag=$graduate->where('id='.$id)->delete();
		$this->ajaxReturn($flag);
	
	}
	
	public function collegeInfo(){
	
		// 		if (!IS_POST){
		// 			$this->error('page not found');
		// 		}
	
	
		$undergraduate=M('undergraduate');
		$id=I('id','');
		$flag=$undergraduate->where('id='.$id)->delete();
		$this->ajaxReturn($flag);
	
	}
	
	public function user(){
		$user=M('user');
		$id=I('id','');
		$flag=$user->where('id='.$id)->delete();
		$this->ajaxReturn($flag);
		
	}
	
	
	
	
}