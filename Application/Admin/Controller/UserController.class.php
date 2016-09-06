<?php
namespace Admin\Controller;
use Think\Controller;

class UserController extends Controller{
	function addUser(){
		if($_POST){		//0相当于false！！！			
			$obj=D('user');
			$result=$obj->addUser();
			if($result==-1){
				echo "<script>alert('该管理员已存在！');</script>";
			}	
			else if($result==1){
				//echo "<script>alert('添加成功！');</script>";
				$this->success('添加成功！','listUser');
				return;
			}
			else if($result==0){
				echo "<script>alert('添加失败！！');</script>";
			}											
		}
		$this->display();			
	}

	function listUser(){
		//$obj=D('user');
		//$list=$obj->listUser();
		$obj=D('auth');
		$list=$obj->page("user");
		//var_dump($list);
		$this->assign('list',$list);

		$page=$obj->getpage("user");
		$totalpage=$obj->gettotalpage("user");
		//var_dump($page);var_dump($totalpage);
		$pagestr=$obj->showpage($page,$totalpage);
		//var_dump($pagestr);
		$this->assign('pagestr',$pagestr);				
		$this->display();	
		
	}

	function editUser($id){
		$obj=D('user');
		if($_POST){
			$result=$obj->saveUser($id);
			if($result==-1){
				echo "<script>alert('该用户已存在！');</script>";
			}
			else if($result==0){
				echo "<script>alert('添加失败！！');</script>";
			}		  
			else if($result==1){
				$this->success('修改成功!','listUser',1);
				return;		//本函数内，后面所有语句都不会执行

				//echo "<script>alert('添加成功！');</script>";
				//echo '<script>location.href="javascript:history.go(-2);";</script>';
				//header("refresh:{2};url={:U('listAdmin')}"); 
				//echo "<meta http-equiv='Refresh' content='1;URL=$url'>"; 
				//echo '<script>window.location.href="{:U("listAdmin")}";</script>';	//不可以在控制器里用U方法
				// sleep(2);
				//$this->redirect('listAdmin');	/				
			}
			
		}
		$data=$obj->getUser($id);
		var_dump($data);
		$this->assign('data',$data);
		$this->display();			
	}

	function delUser($id){
		$res=D('user')->delUser($id);
		if($res==1){
			//echo "<script>alert('删除成功！');</script>";
			$this->success('删除成功！','listUser');
			return;
		}
		else if($res==0){
			echo "<script>alert('没有删除任何数据！');</script>";
		}
		else if($res==-1){
			echo "<script>alert('sql语句出错！');</script>";
		}
	}


}