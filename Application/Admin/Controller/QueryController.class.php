<?php
namespace Admin\Controller;
use Think\Controller;

class QueryController extends  CommonController{

	function basic(){

		if (!IS_POST){
			$this->error('page not found');
		};
			

		$seniorid=I('id',null);
		$seniorModel=M('senior');
		$userModel=M('user');
		$highschoolModel=M('highschool');
		$result=$seniorModel->find($seniorid);
		$result['user']=$userModel->find($result['userid']);
		$result['highschool']=$highschoolModel->find($result['highschoolid']);

		$this->ajaxReturn($result);
	}

	function college(){
		if (!IS_POST){
			$this->error('page not found');
		};
			

		$seniorid=I('id',null);
		$undergraduateModel=M('undergraduate');
		$result=$undergraduateModel->where(array('seniorid'=>$seniorid))->select();
		$this->ajaxReturn($result);
	}
	
	function company(){
		if (!IS_POST){
			$this->error('page not found');
		};
		$seniorid=I('id',null);
		$graduateModel=M('graduate');
		$result=$graduateModel->where(array('seniorid'=>$seniorid))->select();
		$this->ajaxReturn($result);
	}
	
	
	
	
}