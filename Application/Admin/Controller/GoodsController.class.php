<?php
namespace Admin\Controller;
use Think\Controller;

class GoodsController extends Controller{


	/*-----------------商品管理模块-----------------*/
	function addGoods(){
		$obj=D('goods');
		if($_POST){		//0相当于false！！！					
			$result=$obj->addGoods();
			if($result==-1){
				echo "<script>alert('该商品名已存在！');</script>";
			}	
			else if($result==1){
				//echo "<script>alert('添加成功！');</script>";
				$this->success('添加成功！','listGoods');
				return;
			}
			else if($result==-2){
				echo "<script>alert('内容添加失败！！');</script>";
			}	
			else if($result==-3){
				echo "<script>alert('图片添加失败！！');</script>";
			}											
		}
		$cname=$obj->getcate();
		$this->assign('cname', $cname);
		$this->display();			
	}

	function listGoods(){
		$obj=D('auth');
		$list=$obj->page('goods');
		$page=$obj->getpage('goods');
		$totalpage=$obj->gettotalpage('goods');
		$pagestr=$obj->showpage($page,$totalpage);
		$this->assign('pagestr',$pagestr);
		$this->assign('list',$list);
		$this->assign('empty','<span class="empty">没有数据!</span>');
		//var_dump($list); 
		//exit;
		$this->display();	
	}

	function editGoods($id){
		$obj=D('goods');
		if($_POST){
			$result=$obj->saveGoods($id);
			if($result==-1){
				echo "<script>alert('该商品名已存在！');</script>";
			}
			else if($result==0){
				echo "<script>alert('编辑失败！！');</script>";
			}		  
			else if($result==1){
				$this->success('修改成功!','listGoods',1);
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

		$data=$obj->getGoods($id);
		$cname=$obj->getcate();
		var_dump($data);
		$this->assign('cname',$cname);
		$this->assign('data',$data);
		$this->display();			
	}

	/**
	 * 
	 */
	function delGoods($id){
		$res=D('goods')->delGoods($id);
		if($res==1){
			//echo "<script>alert('删除成功！');</script>";
			$this->success('删除成功！','listGoods');
			return;
		}
		else if($res==0){
			echo "<script>alert('没有删除任何数据！');</script>";
		}
		else if($res==-1){
			echo "<script>alert('sql语句出错！');</script>";
		}
	}

	//function

}