<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<title>meizu</title>
<meta http-equiv="content-Type" content="text/html" charset="utf-8">
<link rel="stylesheet" type="text/css" href="/SpSp/Public/home/css/login.css">
<script type="text/javascript" src="/SpSp/Public/home/js/jquery-1.9.1.min.js"></script>
<!--<script type="text/javascript" src="/SpSp/Public/home/js/login.js"></script>-->
</head>
<body>
	<div class="content">
		<div class="ucSimpleHeader">
			<a href="##" class="meizuLogo"></a>
			<div class="trigger">
				<a href="" style="color:#474747;">登录</a>
				<span>&nbsp;|&nbsp;</span>
				<a href="<?php echo U('register/index');?>">注册</a>
			</div>
		</div>
		<form id="#mainForm1" name="mainForm1" class="mainForm mainForm1" action="" method="post">
			<div class="number">
				<a href="" class="linkAGray2 number2">账户名登录</a>
			</div>
			<div class="normalInput">
				<input type="text" class="username" name="username" maxlength="32" placeholder="<?php echo ($un_placeholder); ?>" autocomplete="off">	
				<span class="grayTip">@flyme.cn</span>
			</div>
			<span class="error error1"></span>		
			<div class="normalInput">
				<input type="password" class="passwordN" name="password" maxlength="16" autocomplete="off" placeholder="<?php echo ($pw_placeholder); ?>">		
			</div>
			<span class="error error3"></span>			
			<input type="text" class="verify" name="verifyImg" maxlength="10" autocomplete="off" placeholder="<?php echo ($verify_placeholder); ?>">			
			<img class="verifyImg" src="<?php echo U('Login/getverify');?>" onclick="changeverifyImg()" alt="点击刷新验证码" />
			<button class="fullBtnBlue" type="button" name="button"  onclick="validate()">登录</button>
		</form>
	</div>
	<script>
        function validate(){
           if(mainForm1.username.value==""){
                document.mainForm1.username.focus();//聚焦
                return;
           }
           else if(mainForm1.password.value==""){
               document.mainForm1.password.focus();//聚焦
               return;
           }    
           else if(mainForm1.verifyImg.value==""){
               document.mainForm1.verifyImg.focus();//聚焦
               return;
           }      
		   mainForm1.submit();
		}		

		function changeverifyImg(){
			url="<?php echo U('login/getverify');?>?rand="+Math.random();
			$('.verifyImg').attr("src",url);
			return false;
		}
		/*
		function changing(){
			document.getElementById('checkpic').src="checkcode.php?"+Math.random();	
		}
		*/

	</script>	
	</div>
	<ul class="bRadius2 mail">
		<li data-mail="@qq.com" class="item item1">@qq.com</li>
		<li data-mail="@sina.com" class="item item2">@sina.com</li>
		<li data-mail="@126.com" class="item item3">@126.com</li>
		<li data-mail="@163.com" class="item item4">@163.com</li>
		<li data-mail="@gmail.com" class="item item5">@gmail.com</li>
	</ul>
	<div id="mz_Float">
		<div class="mz_FloatBox">
			<div class="mz3AngleL">
				<i class="i_icon"></i>
			</div>
			<div class="mzFloatTip bRadius2">长度为8-16个字符，区分大小写，至少包含两种类型</div>
		</div>
	</div>
</body>
</html>