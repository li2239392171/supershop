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
				<a href="<?php echo U('login/login');?>">登录</a>
				<span>&nbsp;|&nbsp;</span>
				<a href="##" style="color:#474747;">注册</a>
			</div>
		</div>
		<form id="mainForm1" name="mainForm1" class="mainForm mainForm1" action="" method="post">
			<div class="number">
				<a href="" class="linkAGray2 number2">账户名注册</a>
			</div>
			<div class="normalInput">
				<input type="text" class="username" id="username" name="usrname" maxlength="32" placeholder="账户名" autocomplete="off">	
				<span class="grayTip">@flyme.cn</span>
			</div>
			<span class="error error1"></span>		
			<div class="normalInput">
				<input type="password" class="passwordN" id="passwordN" name="password" maxlength="16" autocomplete="off" placeholder="密码">
				<label id="pwdBtnN" href="" class="pwdBtnShowN" isshow="false">
					<i class="i_icon"></i>
				</label>
			</div>
			<span class="error error3"></span>
			<div class="normalInput">
				<input type="text" id="email" class="email" maxlength="32" placeholder="安全邮箱" autocomplete="off">
			</div>
			<span class="error error2"></span>
			<div class="rememberField">
				<span class="checkboxPic check_chk" tabindex="-1" isshow="false">
					<i class="i_icon"></i>
				</span>
				<label class="pointer">我已阅读并接受</label>
				<a href="https://www.17sucai.com/" target="_blank" class="linkABlue">《Flyme服务协议条款》</a>
			</div>
			<span class="otherError">请确认已阅读并同意Flyme服务协议条款</span>
			<button class="fullBtnBlue" type="button" name="button"  onclick="validate()">注册</button>
		</form>
	</div>
	<script>
        function validate(){
           if(mainForm1.username.value==""){
                document.mainForm1.username.focus();//聚焦
                return;
           }
           else if(mainForm1.passwordN.value==""){
               document.mainForm1.passwordN.focus();//聚焦
               return;
           }
           else if(mainForm1.email.value==""){
           		document.mainForm1.email.focus();
           		return;
           }
		   mainForm1.submit();
		}	
		
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