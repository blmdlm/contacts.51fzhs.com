<?php
namespace Admin\Controller;
use Think\Controller;

class SearchController extends  CommonController{
	public function index(){
		$this->display();
	}
	
	public function specific(){
		if (!IS_POST){
			$this->error('page not found');
		}
		$username=I('username',null);
		$highschoolid=I('highschoolid',null);
		$graduate=I('graduate',null);
		$class=I('class',null);
		
		
		$college=I('college',null);
		$major=I('major',null);

		
		$company=I('company',null);
		
		
		
	}
}