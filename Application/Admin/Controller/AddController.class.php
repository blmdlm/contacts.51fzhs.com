<?php
namespace Admin\Controller;
use Think\Controller;

class AddController extends  CommonController{
	public function index(){
		$this->display();
	}
	
	// have not verify the number is unique or not!!!!!!!!!!!!!!!!!!!!!!!!!!!
	
	
	public function highschool(){
		
		if (!IS_POST){
			$this->error('page not found');
		}
		$tran=M();
		$tran->startTrans();
		
		$user=M('user');
		$user->name=I('username');
		$user->email=I('email');
		$user->qq=I('qq');
		$user->phone=I('phone');
		$user->gender=I('gender');
		$user->comments=I('usercomments');
		$flag1=$user->add();
		$user=$user->where(array('name'=>I('username'),'phone'=>I('phone')))->find();		
		//var_dump($user);
		$senior=M('senior');
		$senior->userid=$user['id'];
		$senior->highschoolid=I('highschoolid');
		$senior->class=I('class');
		$senior->graduation=mktime(null,null,null,null,null,I('graduation'));
		$senior->comments=I('seniorcomments');
		$flag2=$senior->add();
		$senior=$senior->where(array('userid'=>$user['id']))->find();			
		//var_dump($senior);
		$result=null;
		if($flag1&&$flag2){
			$tran->commit();
			$result[0]=$user;
			$result[1]=$senior;		
		}else {
			$tran->rollback();			
		}
			
		$this->ajaxReturn($result);
		
	}
public function test(){
	echo mktime(null,null,null,null,null,2015);
	echo time();
}
	
public function college(){
		
		if (!IS_POST){
			$this->error('page not found');
		}
		$tran=M();
		$tran->startTrans();
		
		$undergraduate=M('undergraduate');
		$undergraduate->seniorid=11;
		$undergraduate->college=I('college');
		$undergraduate->academy=I('academy');
		$undergraduate->major=I('major');
		$undergraduate->start=mktime(null,null,null,null,null,I('start'));
		$undergraduate->end=mktime(null,null,null,null,null,I('end'));
		$undergraduate->comments=I('comments');
		$flag=$undergraduate->add();
		$undergraduate=$undergraduate->where(array('seniorid'=>11,'type'=>I('type')))->find();		
		//var_dump($undergraduate);
		$result=null;
		if($flag){
	        $tran->commit();
			$result=$undergraduate;		
		}else {
			$tran->rollback();			
		}			
		$this->ajaxReturn($result);
		
	}
	
	
	
public function company(){
		
		if (!IS_POST){
			$this->error('page not found');
		}
		$tran=M();
		$tran->startTrans();
		
		$graduate=M('graduate');
		$graduate->seniorid=11;
		$graduate->company=I('company');
		$graduate->comments=I('comments');
		$flag=$graduate->add();
		$graduate=$graduate->where(array('seniorid'=>11,'company'=>I('company')))->find();		
		//var_dump($graduate);
		$result=null;
		if($flag){
	        $tran->commit();
			$result=$graduate;		
		}else {
			$tran->rollback();			
		}			
		$this->ajaxReturn($result);
		
	}	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}




?>