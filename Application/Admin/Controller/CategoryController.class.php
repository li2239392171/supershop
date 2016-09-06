<?php
namespace Admin\Controller;
use Think\Controller;

class CategoryController extends Controller{
	public function listCate(){
		$obj=D('category');
		$list=$obj->listCate();
		$this->assign('list',$list);
		$this->assign('empty','<span class="empty">没有分类，请添加!</span>');
		//var_dump($list); 
		//exit;
		$this->display();	
	}

	function addCate(){
		if($_POST){		//0相当于false！！！			
			$obj=D('category');
			$result=$obj->addCate();
			if($result==-1){
				echo "<script>alert('该分类已存在！');</script>";
			}	
			else if($result==1){
				//echo "<script>alert('添加成功！');</script>";
				$this->success('添加成功！','listCate');
				return;
			}
			else if($result==0){
				echo "<script>alert('添加失败！！');</script>";
			}											
		}
		$this->display();			
	}

	function editCate($id){
		$obj=D('category');
		if($_POST){
			$result=$obj->saveCate($id);
			if($result==-1){
				echo "<script>alert('该管理员已存在！');</script>";
			}
			else if($result==0){
				echo "<script>alert('添加失败！！');</script>";
			}		  
			else if($result==1){
				$this->success('修改成功!','listCate',0);
				return;		//本函数内，后面所有语句都不会执行		
			}
			
		}
		$data=$obj->getCate($id);
		var_dump($data);
		$this->assign('data',$data);
		$this->display();			
	}

	function delCate($id){
		$res=D('category')->delCate($id);
		if($res==1){
			//echo "<script>alert('删除成功！');</script>";
			$this->success('删除成功！','listCate');
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