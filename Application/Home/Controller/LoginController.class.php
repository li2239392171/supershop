<?php 	//管理员登录
namespace Home\Controller;
use Think\Controller;

header("content-type:text/html; charset=utf-8");
session_start();
session_destroy();

class LoginController extends Controller {
	public function index(){
		$username=null;
		$password=null;
		$verify=null;
		$un_placeholder="账户名aa";
		$pw_placeholder="密码";
		$verify_placeholder="验证码";
				

		if($_POST){
			if(strcasecmp($_SESSION['verifyImg'], $_POST['verifyImg'])){	//考虑MD5加密问题	//不区分大小写！
				$verify_placeholder=$_SESSION['verifyImg']."不正确！".$_POST['verifyImg'];
			}
			else{
				$username=trim($_POST['username']);
				$password=trim($_POST['password']);
				//$verify=trim($_POST['verify']);
				if($username!=null&&$password!=null){
					$user=D('User');
					$result=$user->login($username,$password);
					if($result==-1){	//用户名不存在
						 $username=null;
						 $password=null;
						$un_placeholder="该用户不存在!";
					}
					else if($result==-2){	//密码错误
						$password=null;
						$pw_placeholder="密码错误!";
					}
					else if($result==1){	 //登录成功
					 	$this->redirect('index/index');
						return;
					}
				}	
			}			
		}
		$data['un_placeholder']=$un_placeholder;
		$data['pw_placeholder']=$pw_placeholder;
		$data['verify_placeholder']=$verify_placeholder;
		//$data['verify']=$verify;
		$this->assign($data);
		$this->display();    
    }

    public function getverify(){
        // 验证码
        //import("@.Util.Image");
        $act=D('Action');
        $verify=$act->verifyImage();
		//$verify=$act->imageVerify();
        //Image::imageVerify();
    }
}