<?php
namespace Admin\Model;
use Think\Model;

class AuthModel extends Model{	
	//要模型名和数据表名不相同，必须在该模型页面赋一个数据表名！！！！
	protected $tableName='admin';
	/*tableName	不包含表前缀的数据表名称，一般情况下默认和模型名称相同，只有当你的
				表名和当前的模型类的名称不同的时候才需要定义。*/

	private $admin = ''; //当前登录管理员的信息，私有属性，避免修改，保证安全

	/**
	 * 登录注册检测
	 */
	public function __construct(){
		if(isset($_SESSION['admin'])&&(!empty($_SESSION['admin']))){
			$this->admin = $_SESSION['admin'];
		}
	}

	public function loginsubmit(){  //进行登录验证的一系列业务逻辑
		if(empty($_POST['username'])||empty($_POST['password'])){
			return false;
		}
		// $username = addslashes($_POST['username']);
		// $password = addslashes($_POST['password']);
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		//用户的验证操作 -> 拆分到另外一个方法里面去写 ，减少这个方法的代码量

		$obj=M('admin');
		$arr['adminname']=$username;
		$res=$obj->where($arr)->getfield('adminname');
		if($res){
			$condition['adminname']=$username;
			$condition['password']=md5($password);
			$result=$obj->where($condition)->find();
			if($result){
				session_start();
				$_SESSION['admin']=$username;
				return 1;
			}
			else{
				return -2;
			}
		}else{
			return -1;
		}
	}
	
	public function getadmin(){
		return $this->admin;		//通过公开方法获取私有属性
	}

	public function logout(){
		session_start();
		unset($_SESSION['admin']);
		$this->admin = '';
		return true;
	}

	function getsysteminfo(){
		//$php_os=PHP_OS;
		//$apache_gversion=apache_get_version();
		//$php_version=PHP_VERSION();
		//$php_sapi=PHP_SAPI;
		$array['php_os']=PHP_OS;
		$array['apache_gversion']=apache_get_version();
		$array['php_version']=PHP_VERSION;
		$array['php_sapi']=PHP_SAPI;
		return $array;
	}


	
	/**
	 * ---------------------------分页功能-----------------------------
	 */
	function page($tablename){
		$model=M($tablename);
		//$sql="select * from $tablename";
		//$res=$model->query($sql);
		$res=$model->select();
		$row=count($res);	//统计记录条数！！
		//var_dump($res);
		//var_dump($row);
		$pagesize=5;	//每页记录数
		$totals=$row;	//总记录条数
		$totalpage=ceil($totals/$pagesize);		//总页数
		$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
		if($page<=1||$page==null||!is_numeric($page)){
			$page=1;
		}
		if($page>=$totalpage){
			$page=$totalpage;
		}
		$offset=($page-1)*$pagesize;	//偏移量
		$result=$model->limit($offset,$pagesize)->select();
		//var_dump($result);
		return $result;
		//echo $this->showpage($page,$totalpage);
	}

		function showpage($page,$totalpage,$sep="&nbsp"){
			$url=$_SERVER['PHP_SELF'];	//得到当前脚步路径
			$index=($page==1)?"首页":"<a href='{$url}?page=1'>首页</a>";
			$last=($page==$totalpage)?"尾页":"<a href='{$url}?page={$totalpage}'>尾页</a>";
			$prev=($page==1)?"上一页":"<a href='{$url}?page=".($page-1)."'>上一页</a>";
			$next=($page==$totalpage)?"下一页":"<a href='{$url}?page=".($page+1)."'>下一页</a>";
			$str="总共{$totalpage}页/当前是第{$page}页";
			for($i=1;$i<=$totalpage;$i++){
				if($page==$i){
					$p.="[{$i}]";
				}
				else{
					$p.="<a href='{$url}?page={$i}'>[{$i}]</a>";

				}
			}
			$pagestr="<hr/>".$str."<br/>".$index.$sep. $prev.$sep .$p.$sep .$next.$sep .$last;
			return $pagestr;		
		}

		function getpage($tablename){
			$model=M($tablename);
			//$sql="select * from $tablename";
			//$res=$model->query($sql);
			$res=$model->select();
			$row=count($res);	//统计记录条数！！
			$pagesize=5;	//每页记录数
			$totals=$row;	//总记录条数
			$totalpage=ceil($totals/$pagesize);		//总页数
			$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
			if($page<=1||$page==null||!is_numeric($page)){
				$page=1;
			}
			if($page>=$totalpage){
				$page=$totalpage;
			}
			return $page;
		}

		function gettotalpage($tablename){
			$model=M($tablename);
			$res=$model->select();
			$row=count($res);	//统计记录条数！！
			$pagesize=5;	//每页记录数
			$totals=$row;	//总记录条数
			$totalpage=ceil($totals/$pagesize);		//总页数
			return $totalpage;
		}


}

?>