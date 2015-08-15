<?php
namespace Home\Controller;
use Think\Controller;

class SearchController extends  Controller{
	public function index(){
		
		$this->display();
	}
	

	
	private function handleIds($ids,$temp){
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
	private function handleTemps($temp,$result){
		if ($temp!=null){
			$result=$this->mergeTemps($temp, $result);
			$result=$this->isEmpty($result);
		}
		return $result;
	}
	
	private function mergeTemps($temp,$result){
		
	
		if ($result==null){
			$result=$temp;
		}else {
			$result=array_intersect($temp,$result);
		}
		return $result;
	}
	
	private function isEmpty($temp){
		if ($temp==null){
			$this->ajaxReturn(null);
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
			$this->isEmpty($ids00);
			
		}
		if ($highschoolid!=null){
			$map=null;
			$map['highschoolid']=$highschoolid;
			$ids01=$user->field('id')->where($map)->select();
			$this->isEmpty($ids01);
		}
		if ($gender!=null){
			$map=null;
			$map['gender']=$gender;
			$ids02=$user->field('id')->where($map)->select();
			$this->isEmpty($ids02);
		}
		if ($phone!=null){
			$map['phone']=$phone;
			$ids03=$user->field('id')->where($map)->select();
			$this->isEmpty($ids03);
		}
		if ($qq!=null){
			$map=null;
			$map['qq']=$qq;
			$ids04=$user->field('id')->where($map)->select();
			$this->isEmpty($ids04);
		}
		if ($graduation!=null){
			$map=null;
			$map['graduation']=mktime ( null, null, null, null, null,$graduation);
			$ids05=$user->field('id')->where($map)->select();
			$this->isEmpty($ids05);
		}
		if ($class!=null){
			$map=null;
			$map['class']=array('LIKE','%'.$class.'%');
			$ids06=$user->field('id')->where($map)->select();
			$this->isEmpty($ids06);
		}
		

		$temp1=null;
		$temp1=$this->handleIds($ids00, $temp1);
		$temp1=$this->handleIds($ids01, $temp1);
		$temp1=$this->handleIds($ids02, $temp1);
		$temp1=$this->handleIds($ids03, $temp1);
		$temp1=$this->handleIds($ids04, $temp1);
		$temp1=$this->handleIds($ids05, $temp1);
		$temp1=$this->handleIds($ids06, $temp1);
		
		//濡傛灉鏈�鍚庝竴涓繕鏄痭ull  閭ｄ箞temp
	
		
		$undergraduate=M('undergraduate');
		if ($college!=null){
			$map=null;
			$map['college']=array('LIKE','%'.$college.'%');
			$ids07=$undergraduate->distinct(true)->field('userid as id')->where($map)->select();
			$this->isEmpty($ids07);	
		}
		if ($academy!=null){
			$map=null;
			$map['academy']=array('LIKE','%'.$academy.'%');
			$ids08=$undergraduate->distinct(true)->field('userid as id')->where($map)->select();	
			$this->isEmpty($ids08);
		}
		if ($major!=null){
			$map=null;
			$map['major']=array('LIKE','%'.$major.'%');
			$ids09=$undergraduate->distinct(true)->field('userid as id')->where($map)->select();	
			$this->isEmpty($ids09);	
		}
		if ($type!=null){
			$map=null;
			$map['type']=$type;
			$ids10=$undergraduate->distinct(true)->field('userid as id')->where($map)->select();
			$this->isEmpty($ids10);
		}
		
		$temp2=null;
		$temp2=$this->handleIds($ids07, $temp2);
		$temp2=$this->handleIds($ids08, $temp2);
		$temp2=$this->handleIds($ids09, $temp2);
		$temp2=$this->handleIds($ids10, $temp2);
		
		
		$graduate=M('graduate');
		if ($company!=null){
			$map=null;
			$map['company']=array('LIKE','%'.$company.'%');
			$ids11=$graduate->distinct(true)->field('userid as id')->where($map)->select();
			$this->isEmpty($ids11);
		}
		
		$temp3=null;
		$temp3=$this->handleIds($ids11, $temp3);

		
		$result=null;
		$result=$this->handleTemps($temp1, $result);
		$result=$this->handleTemps($temp2, $result);
		$result=$this->handleTemps($temp3, $result);
			
		$this->ajaxReturn($result);
		
	}
		







}