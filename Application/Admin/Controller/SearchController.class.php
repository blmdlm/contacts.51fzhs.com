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


		if ($username!=null){
			$userModel=M('user');
			$map['name']=array('LIKE','%'.$username.'%');
			$userids=$userModel->field('id')->where($map)->select();
			if ($userids==null){
				$this->ajaxReturn(null);
			}
		}
		
		if ($userids!=null||$highschoolid!=null||$graduation!=null||$class!=null){ //some input for basic	
			if ($userids!=null){
				var_dump($userids);
				echo "--------";
				$map01['userid']=array('IN','13,14');
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
			$ids01=$seniorModel->field('id,userid')->where($map01)->select();
			
		}else{
			echo "no basic input";
			$flag01=false;
		} 
		
		
		
		echo "<br/>basic senior ids<br/>";
		var_dump($ids01);	
		die();			
			
	
		
		
		
		
		
		if ($company!=null){
			$graduateModel=M('graduate');
			$map02['company']=array('LIKE','%'.$company.'%');
			$ids02=$graduateModel->field('seniorid')->where($map02)->select();

		}
		echo "<br/>company ids<br/>";
		var_dump($ids02);

		if ($college!=null||$major!=null){
			$undergraduateModel=M('undergraduate');
			$map03['college']=array('LIKE','%'.$college.'%');
			$map03['major']=array('LIKE','%'.$major.'%');
			$ids03=$undergraduateModel->field('seniorid')->where($map03)->select();

		}
		echo "<br/>college ids<br/>";
		var_dump($ids03);

		die();






	}






}