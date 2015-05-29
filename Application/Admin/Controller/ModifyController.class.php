<?php
namespace Admin\Controller;
use Think\Controller;

class ModifyController extends  CommonController{
	public function index(){
		$this->display();
	}
	
	public function userBasicInfo(){
		$user = M ( 'user' );
		$result = $user->where ( array (
				'email' => I ( 'email', '' )
		) )->find ();
		if ($result != null) {
			$this->ajaxReturn ( "1" );
		}
		$user->name = I ( 'name', '' );
		$user->highschoolid = I ( 'highschoolid', '' );
		$user->gender = I ( 'gender', '' );
		$user->phone = I ( 'phone', '' );
		$user->qq = I ( 'qq', '' );
		$user->email = I ( 'email', '' );
		$user->graduation = mktime ( null, null, null, null, null, I ( 'graduation', '' ) );
		$user->class = I ( 'class', '' );
		$user->comments = I ( 'comments', '' );
		$flag = $user->where(array('id'=>I('id',-1)))->save();

		if ($flag) {
			$result = $user->where ( array (
					'id' => I ( 'id',-1)
			) )->find ();
		} else {
			$result = "2";
		}
		
		$this->ajaxReturn ( $result );
	}
	
	
	
	
	
	
	public function userCollegeInfo(){
		$undergraduate = M ( 'undergraduate' );
		$undergraduate->college = I ( 'college' ,'');
		$undergraduate->academy = I ( 'academy' ,'');
		$undergraduate->major = I ( 'major' ,'');
		$undergraduate->start = mktime ( null, null, null, null, null, I ( 'start' ,'') );
		$undergraduate->end = mktime ( null, null, null, null, null, I ( 'end','' ) );
		$undergraduate->comments = I ( 'comments' ,'');
		$flag = $undergraduate->where(array('id'=>I('id',-1)))->save();
		
		$result=null;
		if ($flag ) {
			$result = $undergraduate->where ( array (
					'id' => I('id',-1),
			) )->find ();
		} else {
			$result="2";
		}
		$this->ajaxReturn ( $result );
	}
	
	
	public function userCompanyInfo(){
		$graduate = M ( 'graduate' );
		$graduate->company = I ( 'company','');
		$graduate->start = mktime ( null, null, null, null, null, I ( 'start','') );
		$graduate->comments = I ( 'comments' ,'');
		$flag = $graduate->where(array('id'=>I('id',-1)))->save();
		$result=null;
		if ($flag) {
			$result = $graduate->where ( array (
					'id' => I('id',-1)
			) )->find ();
					
		} else {
			$result="2";
		}
		$this->ajaxReturn ( $result );
	}
	
	
	
	
	
	
}