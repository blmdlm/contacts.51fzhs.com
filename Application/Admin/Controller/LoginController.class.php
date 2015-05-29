<?php namespace Admin\Controller;
use Think\Controller;

class LoginController extends Controller{

	public function index(){
		$this->display();
	}

	public function login(){
		if (!IS_POST) {
			$this->error('page not found');
		}
		$name = I('name');
		$pwd=I('password');
		$admin=M('admin')->where(array('name' => $name))->find();

		if (!admin||$admin['password']!=$pwd) {
			return "user is not exist or password is wrong";
// 			$this->error('user is not exist or password is wrong');
		}
		session('aid',$admin['id']);
		session('aname',$admin['name']);
		$this->redirect('/Admin/Index/index');
	}

}
?>