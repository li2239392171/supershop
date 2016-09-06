<?php
namespace Admin\Model;
use Think\Model;

header('Content-type:text/html;charset=utf-8');

class GoodsModel extends Model{

	public function getcate(){	//获取分类数据
		$obj=M('category');
		//$cname=$obj->getField('cname', true);
		$cname=$obj->select();
		return $cname;
	}

	public function addGoods(){
		$obj=M('goods');
		$arr['gname']=$_POST['gname'];
		$res=$obj->where($arr)->getField('gname');
		if($res){
			return -1;	//商品名重复
		}
		else{
			// $goods['gname']=trim($_POST['gname']);
			// $goods['gno']=trim($_POST['gno']);
			// $goods['gnum']=trim($_POST['gnum']);
			// $goods['mprice']=trim($_POST['mprice']);
			// $goods['gprice']=trim($_POST['gprice']);
			// $goods['gintro']=trim($_POST['gintro']);
			// $goods['cid']=trim($_POST['cid']);
			$goods=$_POST;	//可代替上面表达式，但不能使用trim()函数！

			$img=D('Image');
			$path="Public/admin/goods_Img";
			$uploadFiles=$img->uploadFile($path);
			if(is_array($uploadFiles)&&$uploadFiles){
				foreach ($uploadFiles as $key => $file) {
					$img->thumb($path."/".$file['name'],"Public/admin/goods_Img/image_50/".$file['name'],50,50);
					$img->thumb($path."/".$file['name'],"Public/admin/goods_Img/image_220/".$file['name'],220,220);
					$img->thumb($path."/".$file['name'],"Public/admin/goods_Img/image_350/".$file['name'],350,350);
					$img->thumb($path."/".$file['name'],"Public/admin/goods_Img/image_800/".$file['name'],800,800);
				}
			}

			$goods['guptime']=time();
			$result=$obj->data($goods)->add();	  //添加商品信息
			$gid=$result;		//add()返回值为插入的id号！！
			//var_dump($result);
			//var_dump($gid);
			
			if($result){
				
				 // var_dump($uploadFiles);
				 // exit;
				foreach($uploadFiles as $file){
					$arr2['gid']=$gid;
					$arr2['path']=$file['name'];
					$res2=M('goods_img')->data($arr2)->add();	//添加商品图片！
					// if($res2){
					// 	return 1;
					// }
					// else{
					// 	return -3;
					// }
				}
				return 1;	//添加成功
			}
			else{
				foreach ($uploadFiles as $key => $file) {
					if(file_exists("Public/admin/goods_Img/image_50/".$file['name'])){
						unlink("Public/admin/goods_Img/image_50/".$file['name']);
					}
					if(file_exists("Public/admin/goods_Img/image_220/".$file['name'])){
						unlink("Public/admin/goods_Img/image_220/".$file['name']);
					}
					if(file_exists("Public/admin/goods_Img/image_350/".$file['name'])){
						unlink("Public/admin/goods_Img/image_350/".$file['name']);
					}
					if(file_exists("Public/admin/goods_Img/image_800/".$file['name'])){
						unlink("Public/admin/goods_Img/image_800/".$file['name']);
					}
				}
				return -2;	//添加失败
			}
		}
	}

	function listGoods(){
		$obj=M('category');
		$list=$obj->join('right join goods on category.id=goods.cid')->select();   //多表查询join, 以后面的表为主更新数据
		return $list;
	}

	function getGoods($id){
		$obj=M('goods');
		$arr['id']=$id;
		$data=$obj->where($arr)->find();
		return $data;
	}

	function saveGoods($id){	
		$obj=M('goods');
		$arr['gname'] = $_POST['gname'];
		$res=$obj->where($arr)->getfield('gname');
		// var_dump($res);
		// exit;
		if($res!=null){
			return -1;			
		}else{			
			$condition['id']=$id;
			$goods=$_POST;
			$result=$obj->where($condition)->data($goods)->save();
			if($result){
				return 1;
			}
			else{
				return 0;
			}
		}
	}

	function delGoods($id){
		$obj=M('goods');
		$arr['id'] = intval($id);
		$res=$obj->where($arr)->delete();
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
