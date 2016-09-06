<?php
namespace Admin\Model;
use Think\Model;

class UserModel extends Model{

	public function addUser(){
		$obj = M('user');
		$arr['username'] = htmlspecialchars($_POST['username']);
		$res=$obj->where($arr)->getfield('username');
		//echo $res;
		if(!$res){
			//$arr['jointime'] = date('Y-m-d H:i:s');
			$res = $obj->data($arr)->filter('strip_tags')->add();	//
			if($res){
				return 1;
			}
			else{
				return 0;
			}			
		}else{
			return -1;
		}		
	}

	function listUser(){	//传统罗列，不分页
		$obj=M('user');
		$data=$obj->order('id')->select();
		return $data;
	}

	function getUser($id){
		$obj=M('user');
		$arr['id']=$id;
		$data=$obj->where($arr)->find();
		return $data;
	}

	public function saveUser($id){
		$obj = M('user');

		$arr['username'] = $_POST['username'];
		$res=$obj->where($arr)->getfield('username');
		// var_dump($res);
		// exit;
		if($res!=null){
			return -1;			
		}else{
			$arr=$_POST;
			$condition['id']=$id;
			//$arr['jointime'] = date('Y-m-d H:i:s');
			$result = $obj->where($condition)->data($arr)->save();	//更新
			if($result){
				return 1;
			}
			else{
				return 0;
			}		
		}		
	}

	function delUser($id){
		$arr['id']=$id;
		$res=M('user')->where($arr)->delete();
		if($res){
			return 1;
		}
		else if($res==0){
			return 0;
		}
		else if($res==false){
			return -1;
		}
	}


}
