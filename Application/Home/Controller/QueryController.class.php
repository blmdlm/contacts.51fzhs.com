<?php
namespace Home\Controller;
use Think\Controller;

class QueryController extends  Controller{

	function userBasicInfo(){
		$id=I('id',-1);
		$user=M('user');
		$result=$user->where(array('id'=>$id))->find();
		$this->ajaxReturn($result);
	}

	function userAllCollegeInfo(){
		$id=I('id',-1);
		$undergraduate=M('undergraduate');
		$result=$undergraduate->where(array('userid'=>$id))->select();
		$this->ajaxReturn($result);
	}
	
	function userAllCompanyInfo(){
		$id=I('id',-1);
		$graduate=M('graduate');
		$result=$graduate->where(array('userid'=>$id))->select();
		$this->ajaxReturn($result);
	}
	
	function userDetailInfo(){
		$id=I('id',-1);
		$user=M('user');
		$result["basic"]=$user->where(array('id'=>$id))->find();
		$undergraduate=M('undergraduate');
		$result["colleges"]=$undergraduate->where(array('userid'=>$id))->select();
		$graduate=M('graduate');
		$result["companys"]=$graduate->where(array('userid'=>$id))->select();
		$this->ajaxReturn($result);
	}
	
	function collegeInfo(){
// 		if (!IS_POST){
// 			$this->error('page not found');
// 		};
			

		$id=I('id',-1);
		$undergraduate=M('undergraduate');
		$result=$undergraduate->where(array('id'=>$id))->find();
		$this->ajaxReturn($result);
	}
	
	function companyInfo(){


		$id=I('id',-1);
		$graduate=M('graduate');
		$result=$graduate->where(array('id'=>$id))->find();
		$this->ajaxReturn($result);
	}
	
	function allHighSchools(){
// 		if (!IS_POST){
// 			$this->error('page not found');
// 		};
		$highschool=M('highschool');
		$result=$highschool->select();
		$this->ajaxReturn($result);
	}
	
	
}