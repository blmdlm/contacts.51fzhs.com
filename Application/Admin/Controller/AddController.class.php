<?php

namespace Admin\Controller;

use Think\Controller;

class AddController extends CommonController {
	public function index() {
		$this->display ();
	}
	public function userBasicInfo() {
		
		// if (!IS_POST){
		// $this->error('page not found');
		// }
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
		$flag = $user->add ();
		if ($flag) {
			$result = $user->where ( array (
					'email' => I ( 'email', '' ) 
			) )->find ();
		} else {
			$result = "2";
		}
		
		$this->ajaxReturn ( $result );
	}
	public function test() {
		echo mktime ( null, null, null, null, null, 2015 );
		echo time ();
	}
	public function userCollegeInfo() {
// 		if (! IS_POST) {
// 			$this->error ( 'page not found' );
// 		}	
		$undergraduate = M ( 'undergraduate' );
		
		$result = $undergraduate->where ( array (
				'userid' => I('userid',''),
				'type' => I ( 'type','' )
		) )->find ();
		
		if($result!=null){
			$this->ajaxReturn("1");
		}
		
		
		
		$undergraduate->userid = I('userid','');
		$undergraduate->college = I ( 'college' ,'');
		$undergraduate->academy = I ( 'academy' ,'');
		$undergraduate->major = I ( 'major' ,'');
		$undergraduate->start = mktime ( null, null, null, null, null, I ( 'start' ,'') );
		$undergraduate->end = mktime ( null, null, null, null, null, I ( 'end','' ) );
		$undergraduate->comments = I ( 'comments' ,'');
		$undergraduate->type = I ( 'type' ,'');
		$flag = $undergraduate->add ();

		if ($flag ) {
			$result = $undergraduate->where ( array (
				'userid' => I('userid',''),
				'type' => I ( 'type','' )
		) )->find ();
		} else {
			$this->ajaxReturn("2");
		}
		$this->ajaxReturn ( $result );
	}
	

	public function userCompanyInfo() {
// 		if (! IS_POST) {
// 			$this->error ( 'page not found' );
// 		}
	
		
		$graduate = M ( 'graduate' );
		
		$result = $graduate->where ( array (
				'userid' => I('userid',''),
				'start' => mktime ( null, null, null, null, null, I ( 'start','' ) ),
				'company' =>I ( 'company','')
		) )->find ();
		
		if ($result!=null){
			$this->ajaxReturn("1");
		}
		
		
		$graduate->userid = I('userid','');
		$graduate->company = I ( 'company','');
		$graduate->start = mktime ( null, null, null, null, null, I ( 'start','' ) );
		$graduate->comments = I ( 'comments' ,'');
		$flag = $graduate->add ();
		$result=null;
		if ($flag) {
			$result = $graduate->where ( array (
					'userid' => I('userid',''),
					'start' => mktime ( null, null, null, null, null, I ( 'start','' ) ),
					'company' =>I ( 'company','')
			) )->find ();
			
			
		} else {
			$result="2";
		}
		$this->ajaxReturn ( $result );
	}
}

?>