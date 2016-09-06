<?php
namespace Admin\Model;
use Think\Model;

class AdminModel extends Model{	//从数据库存取数据
	public function addAdmin(){
		$obj = M('admin');

		$arr['adminname'] = $_POST['adminname'];
		$res=$obj->where($arr)->getfield('adminname');
		echo $res;
		if(!$res){
			$arr['password'] = MD5($_POST['password']);
			$arr['email'] = $_POST['email'];
			$arr['jointime'] = date('Y-m-d H:i:s');
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

	function listAdmin(){
		$obj=M('admin');
		$data=$obj->select();
		return $data;
	}

	function getAdmin($id){
		$obj=M('admin');
		$arr['id']=$id;
		$data=$obj->where($arr)->find();
		return $data;
	}

	public function saveEdit($id){
		$obj = M('admin');

		$arr['adminname'] = $_POST['adminname'];
		$res=$obj->where($arr)->getfield('adminname');
		// var_dump($res);
		// exit;
		if($res!=null){
			return -1;			
		}else{
			$condition['id']=$id;
			$arr['password'] = MD5($_POST['password']);
			$arr['email'] = $_POST['email'];
			$arr['jointime'] = date('Y-m-d H:i:s');
			$result = $obj->where($condition)->data($arr)->save();	//更新
			// var_dump($result);
			//echo $result;
			//exit;
			if($result){
				return 1;
			}
			else{
				return 0;
			}		
		}		
	}

	function delAdmin($id){
		$arr['id']=$id;
		$res=M('admin')->where($arr)->delete();
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

