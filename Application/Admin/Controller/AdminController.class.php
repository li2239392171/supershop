<?php
namespace Admin\Controller;
use Think\Controller;

class AdminController extends Controller{

	public $admin='';	//保存当前管理员信息

	function __construct(){
		parent::__construct();	
		/*在控制器里面的__construct()方法覆盖掉了父类的构造方法。那么现在问题就很好解决了，只需要在我的构造方法里面引入父类的构造方法就可以了。*/
	}

	function index(){
		$obj=D('Auth');		//对应的模型名称首字母必须大写！！！
		$this->admin = $obj->getadmin();
		if(empty($this->admin)){
			//U('Admin/login/index');
			//$this->display('login');
			//$this->error('', U('Login/index'), 1);	 //暂时没有更好的重定向方法！！
			$this->redirect('login/index');
		}else{
			$this->display();	//相当于$this->display('admin/index');
		}		
	}

	function main(){
		$obj=D('auth');
		$data=$obj->getsysteminfo();
		$this->assign($data);
		$this->display('admin/main');	//相当于$this->display('admin/main'); 系统默认查找对应函数名的html，如：main.html
	}

	/*-----------------管理员管理模块-----------------*/
	function addAdmin(){
		if($_POST){		//0相当于false！！！			
			$obj=D('admin');
			$result=$obj->addAdmin();
			if($result==-1){
				echo "<script>alert('该管理员已存在！');</script>";
			}	
			else if($result==1){
				//echo "<script>alert('添加成功！');</script>";
				$this->success('添加成功！','listAdmin');
				return;
			}
			else if($result==0){
				echo "<script>alert('添加失败！！');</script>";
			}											
		}
		$this->display();			
	}

	function listAdmin(){
		$obj=D('admin');
		$list=$obj->listAdmin();
		$this->assign('list',$list);
		//var_dump($data); 
		$this->display();	
	}

	function editAdmin($id){
		$obj=D('admin');
		if($_POST){
			$result=$obj->saveEdit($id);
			if($result==-1){
				echo "<script>alert('该管理员已存在！');</script>";
			}
			else if($result==0){
				echo "<script>alert('添加失败！！');</script>";
			}		  
			else if($result==1){
				$this->success('修改成功!','listAdmin',1);
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
		$data=$obj->getAdmin($id);
		var_dump($data);
		$this->assign('data',$data);
		$this->display();			
	}

	function delAdmin($id){
		$res=D('admin')->delAdmin($id);
		if($res==1){
			//echo "<script>alert('删除成功！');</script>";
			$this->success('删除成功！','listAdmin');
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