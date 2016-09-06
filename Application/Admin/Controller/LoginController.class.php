<?php 	//管理员登录
namespace Admin\Controller;
use Think\Controller;

header('Content-type:text/html; charset=utf-8');
session_start();
session_destroy();

class LoginController extends Controller{
	public function index(){
		// $username=$_POST['username'];
		// $username=addslashes($username);
		// $password=md5($_POST['password']);
		$un_placeholder="管理员帐号";
		$pw_placeholder="密码";
		$verify_placeholder="验证码";
		$verify=$_POST['verifyImg'];
		$verify1=$_SESSION['verifyImg'];
		//$autoFlag=$_POST['autoFlag'];
		if($_POST){		//0相当于false！！！
			if(!strcasecmp($_SESSION['verifyImg'], $_POST['verifyImg'])){	//该函数返回：0 - 如果两个字符串相等!!!
				$obj=D('auth');
				$result=$obj->loginsubmit();
				if($result==-1){
					$un_placeholder="帐号错误!";
				}
				else if($result==-2){
					$pw_placeholder="密码错误!";
				}else if($result==1){	 //登录成功
					$this->redirect("admin/index");
				}
			}
			else{
				$verify_placeholder=$verify."验证码错误!".$verify1;
			}							
		}
		$data['un_placeholder']=$un_placeholder;
		$data['pw_placeholder']=$pw_placeholder;
		$data['verify_placeholder']=$verify_placeholder;
		$this->assign($data);
		$this->display();		
	}     

	function getverify(){
		$obj=D('Action');
		$obj->verifyImage();
	}

	function logout(){
		$obj=D('auth');
		if($obj->logout()){
			$this->redirect('login/index');		//定向模块/方法跳转。。。
		}	
	}


}










// class LoginController extends Controller {
// 	public function index(){
// 		$username=null;
// 		$password=null;
// 		$verify=null;
// 		$un_placeholder="账户名aa";
// 		$pw_placeholder="密码";
// 		$verify_placeholder="验证码";

// 		$verify=D('Action')->verifyImage();


// 		if($_POST){
// 			$username=trim($_POST['username']);
// 			$password=trim($_POST['password']);
// 			//$verify=trim($_POST['verify']);
// 			if($username!=null&&$password!=null){
// 				$user=D('User');
// 				$result=$user->login($username,$password);
// 				if($result==-1){	//用户名不存在
// 					 $username=null;
// 					 $password=null;
// 					$un_placeholder="该用户不存在!";
// 				}
// 				else if($result==-2){	//密码错误
// 					$password=null;
// 					$pw_placeholder="密码错误!";
// 				}
// 				else if($result==1){	 //登录成功
// 				 	$this->redirect('login/index');
// 					return;
// 				}
// 			}
// 		}
// 		$data['un_placeholder']=$un_placeholder;
// 		$data['pw_placeholder']=$pw_placeholder;
// 		$data['verify_placeholder']=$verify_placeholder;
// 		$data['verify']=$verify;
// 		$this->assign($data);
// 		$this->display();
       
//     }
//}