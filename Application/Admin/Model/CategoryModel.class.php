<?php
namespace Admin\Model;
use Think\Model;

class CategoryModel extends Model{

	public function addCate(){
		$obj = M('category');
		$arr['cname'] = htmlspecialchars($_POST['cname']);
		$res=$obj->where($arr)->getfield('cname');
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

	function listCate(){
		$obj=M('Category');
		$data=$obj->order('id')->select();
		return $data;
	}

	function getCate($id){
		$obj=M('Category');
		$arr['id']=$id;
		$data=$obj->where($arr)->find();
		return $data;
	}

	public function saveCate($id){
		$obj = M('Category');

		$arr['cname'] = $_POST['cname'];
		$res=$obj->where($arr)->getfield('cname');
		// var_dump($res);
		// exit;
		if($res!=null){
			return -1;			
		}else{
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

	function delCate($id){
		$arr['id']=$id;
		$res=M('Category')->where($arr)->delete();
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
