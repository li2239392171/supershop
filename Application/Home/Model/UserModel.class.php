<?php
namespace Home\Model;
use Think\Model;

class UserModel extends Model{

	public function register($username,$password){
		$user = M('user');
		$arr['username'] = $username;
		$res = $user->where($arr)->find();

		if($res){
			return -1;
		}
		else{
			$arr['username'] = $username;
			$arr['password'] = md5($password);
			$arr['jointime'] = date('Y-m-d H:i:s');
			M('user')->data($arr)->filter('htmlspecialchars')->add();
			return 0;
		}
		
	}


	public function login($username,$password){
		$user=M('user');
		$arr['username'] = $username;
		$result=$user->where($arr)->getfield('username');
		if(!$result){
			return -1; 	//用户名不正确
		}
		else{
			//setcookie("user","$username",time()+60*60*24*7);	//用户名存在，设置用户名cookie，保存时间为一周
			$condition['username']=$username;
			$condition['password']=md5($password);
			//$condition['verify']=$verify;	//验证码
			$res=M('user')->where($condition)->select();
			if($res){
				session_start();
				$_SESSION['user']=$username;
				return 1;	//登录成功
			}
			else{
				return -2;	//密码错误
			}
		}
	}
}
