<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<title>meizu</title>
<meta http-equiv="content-Type" content="text/html" charset="utf-8">
<link rel="stylesheet" type="text/css" href="/SpSp/Public/home/css/login.css">

<script type="text/javascript" src="/SpSp/Public/home/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="/SpSp/Public/home/js/login.js"></script>

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
		<form id="#mainForm1" class="mainForm mainForm1">
			<div class="number">
				<a href="" class="linkAGray2 number2">账户名登录</a>
			</div>
			<div class="normalInput">
				<input type="text" class="username" maxlength="32" placeholder="账户名" autocomplete="off">	
				<span class="grayTip">@flyme.cn</span>
			</div>
			<span class="error error1"></span>		
			<div class="normalInput">
				<input type="text" class="password1N" maxlength="16" autocomplete="off" placeholder="密码">
				<input type="password" class="passwordN" maxlength="16" autocomplete="off" placeholder="密码">
				
			</div>
			<span class="error error3"></span>
			
			<a href="##" class="fullBtnBlue">登录</a>
		</form>
	</div>
	
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