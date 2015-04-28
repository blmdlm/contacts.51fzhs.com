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
		$graduation=I('graduation',null);
		$class=I('class',null);

		$college=I('college',null);
		$major=I('major',null);

		$company=I('company',null);

		
		
		
		
		if ($username!=null){//
			$userModel=M('user');
			$map['name']=array('LIKE','%'.$username.'%');
			$userids=$userModel->field('id')->where($map)->select();
			if ($userids==null){ 
				$this->ajaxReturn(null);
			}
		}

		
		
		
		if ($userids!=null||$highschoolid!=null||$graduation!=null||$class!=null){ //some input for basic	
			if ($userids!=null){  //input for name and find users ,else no input for name

				$map01['userid']=array('IN',array_column($userids,'id'));
			}
			if ($highschoolid!=null){
				$map01['highschoolid']=$highschoolid;
			}
			if($graduation!=null){
				$map01['graduation']=$graduation;
			}
			if ($class!=null){
				$map01['class']=$class;
			}
			$seniorModel=M('senior');
			$ids01=$seniorModel->field('id as seniorid')->where($map01)->select();
			
			if ($ids01==null){
				$this->ajaxReturn(null);
			}	
		}
		

		
		

		


		if ($college!=null||$major!=null){
			$undergraduateModel=M('undergraduate');
			$map02['college']=array('LIKE','%'.$college.'%');
			$map02['major']=array('LIKE','%'.$major.'%');
			$ids02=$undergraduateModel->distinct(true)->field('seniorid')->where($map02)->select();
			
		if ($ids02==null){
				$this->ajaxReturn(null);
			}
		}
			
		if ($company!=null){
			$graduateModel=M('graduate');
			$map03['company']=array('LIKE','%'.$company.'%');
			$ids03=$graduateModel->distinct(true)->field('seniorid')->where($map03)->select();
			
			if ($ids03==null){
				$this->ajaxReturn(null);
			}
			
			
		}
		
		if ($ids01==null&&$ids02==null&&$ids03==null){
			$this->ajaxReturn(null);
		}else {//must find senoirids
			if ($ids01!=null){
				$temp=array_column($ids01,'seniorid');
			}
			
			if ($ids02!=null){
				if ($temp!=null){
				$temp=array_intersect($temp,array_column($ids02,'seniorid'));
				}else {
					$temp=array_column($ids02,'seniorid');
				}
			}
			if ($ids03!=null){
				if ($temp!=null){
					$temp=array_intersect($temp,array_column($ids03,'seniorid'));
				}else {
					$temp=array_column($ids03,'seniorid');
				}
				
			}

			
			
			if ($temp==null){
				$this->ajaxReturn(null);
			}
				
			$map04['id']=array('IN',$temp);
			$result=$seniorModel->where($map04)->select();
			
			$count=count($result);
			$highschoolModel=M('highschool');
			for ($i = 0; $i < $count; $i++) {
				$result[$i]['user']=$userModel->find($value['userid']);
				$result[$i]['highschoool']=$highschoolModel->find($value['highschoolid']);
			}
			

			
			$this->ajaxReturn($result);
						
		}
			
		
		
		
		




	}






}