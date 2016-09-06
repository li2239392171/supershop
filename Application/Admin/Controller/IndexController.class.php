<?php
namespace Admin\Controller;
use Think\Controller;

header('Content-type:text/html; charset=utf-8');

class IndexController extends Controller {
    public function index(){

        //$this->success('welcome to supershop!',U('login/login'));
        $test=M('admin');
        $data = $test->select();
        var_dump($data);
        //$this->display('login/login');
    }

    function login(){

    }
}