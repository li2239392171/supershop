<?php
namespace Home\Controller;
use Think\Controller;

header('Content-type:text/html; charset=utf-8');

class IndexController extends Controller {
    public function index(){
    	//echo "首页还没建好，敬请期待！！";
        //$this->success('welcome to supershop!',U('login/login'));
        //$this->showmessage("首页还没建好，敬请期待！！","home/index");
        $this->display();
    }



    function showmessage($info,$url){
    	echo "<script>alert('$info');window.location.href='$url';</script>";
    	//exit;
    }


}

