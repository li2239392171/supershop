<?php 	//注册控制器
namespace Home\Controller;
use Think\Controller;

header('Content-type:text/html; charset=utf-8');

class RegisterController extends Controller {
	public function index(){
		if($_POST){
			$username=$password="";
			$username=trim($_POST['username']);
			$password=trim($_POST['password']);
			if($username!=null&&$password!=null){
				$user = D('user');
				$result=$user->register($username,$password);	//调用注册api
				if(!$result){	//注册成功
					echo "<script>window.alert('注册成功,现在登录>>');window.location.href='../Login/login';</script>";
					
				}
				else{	
					echo "<script>window.alert('注册失败,返回注册>>');</script>";
				}
			}
		}
		else{
				$this->display();
	    	}
		}

	public function register(){
		if($_POST){
			print_r($_POST);
			$username=trim($_POST['username']);
			$password=trim($_POST['password']);
			if($username!=null&&$password!=null){
				$user = D('users');
				$result=$user->register($username,$password);	//调用注册api
				if(!$result){	//注册成功
					echo "<script>window.alert('注册成功,现在登录>>');window.location.href='../Login/';</script>";
				}
				else{	
					echo "<script>window.alert('注册失败,返回注册>>');</script>";
				}
			}
		}
		else{
				$this->display();
	    	}
		}
        
}