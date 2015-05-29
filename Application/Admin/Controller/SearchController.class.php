<?php
namespace Admin\Controller;
use Think\Controller;

class SearchController extends  CommonController{
	public function index(){
		
		$this->display();
	}
	

	
	private function handle($ids,$temp){
		if ($ids!=null){
			$temp=$this->mergeIds($ids, $temp);
			$temp=$this->isEmpty($temp);
		}
		return $temp;
	}
	
	private function mergeIds($ids,$temp){
		
		$ids=array_column($ids,'id');
	
		if ($temp==null){
			$temp=$ids;
		}else {
			$temp=array_intersect($temp,$ids);
		}
		
	
		
		return $temp;
	}
	
	private function isEmpty($temp){
		if ($temp==null){
			$this->ajaxReturn("No result");
		}else{
			return $temp;
		}
	}
	
	
	public function specific(){
// 		if (!IS_POST){
// 			$this->error('page not found');
// 		}
		
		

		$name=I('name',null);
		$highschoolid=I('highschoolid',null);
		$gender=I('gender',null);
		$phone=I('phone',null);
		$qq=I('qq',null);
		$email=I('email',null);
		$graduation=I('graduation',null);
		$class=I('class',null);
		
		$college=I('college',null);
		$academy=I('academy',null);
		$major=I('major',null);
		$type=I('type',null);
		
		$company=I('company',null);
		
		
		$user=M('user');
	
		if ($name!=null){
			$map=null;
			$map['name']=array('LIKE','%'.$name.'%');
			$ids00=$user->field('id')->where($map)->select();
			
		}
		if ($highschoolid!=null){
			$map=null;
			$map['highschoolid']=$highschoolid;
			$ids01=$user->field('id')->where($map)->select();
		}
		if ($gender!=null){
			$map=null;
			$map['gender']=$gender;
			$ids02=$user->field('id')->where($map)->select();
		}
		if ($phone!=null){
			$map['phone']=$phone;
			$ids03=$user->field('id')->where($map)->select();
		}
		if ($qq!=null){
			$map=null;
			$map['qq']=$qq;
			$ids04=$user->field('id')->where($map)->select();
		}
		if ($graduation!=null){
			$map=null;
			$map['graduation']=mktime ( null, null, null, null, null,$graduation);
			$ids05=$user->field('id')->where($map)->select();
		}
		if ($class!=null){
			$map=null;
			$map['class']=array('LIKE','%'.$class.'%');
			$ids06=$user->field('id')->where($map)->select();
		}
		

		$temp1=null;
		$temp1=$this->handle($ids00, $temp1);
		$temp1=$this->handle($ids01, $temp1);
		$temp1=$this->handle($ids02, $temp1);
		$temp1=$this->handle($ids03, $temp1);
		$temp1=$this->handle($ids04, $temp1);
		$temp1=$this->handle($ids05, $temp1);
		$temp1=$this->handle($ids06, $temp1);
		
		//如果最后一个还是null  那么temp
		
		
		if ($college!=null){
			$map=null;
			$map['college']=array('LIKE','%'.$college.'%');
			$ids07=$user->field('userid as id')->where($map)->select();	
		}
		if ($academy!=null){
			$map=null;
			$map['academy']=array('LIKE','%'.$academy.'%');
			$ids08=$user->field('userid as id')->where($map)->select();	
		}
		if ($major!=null){
			$map=null;
			$map['major']=array('LIKE','%'.$major.'%');
			$ids09=$user->field('userid as id')->where($map)->select();	
		}
		if ($type!=null){
			$map=null;
			$map['type']=$type;
			$ids09=$user->field('userid as id')->where($map)->select();	
		}
		
		$temp2=null;
		$temp2=$this->handle($ids00, $temp2);
		
		var_dump($temp);
		die();
		
		
		
		
		
		
		
		
		
		//搜索基本信息		
		

		
		

		


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