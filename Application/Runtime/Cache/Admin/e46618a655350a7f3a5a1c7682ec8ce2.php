<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
<h3>编辑用户</h3>
<form action="" method="post" enctype="multipart/form-data">
<table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
	<tr>
		<td align="right">用户名</td>
		<td><input type="text" name="username" value="<?php echo ($data["username"]); ?>" placeholder=""/></td>
	</tr>
	<tr>
		<td align="right">密码</td>
		<td><input type="password" name="password"/></td>
	</tr>
	<tr>
		<td align="right">邮箱</td>
		<td><input type="text" name="email" placeholder="<?php echo ($data["email"]); ?>"/></td>
		
	</tr>
	<tr>
		<td align="right">性别</td>
	<!-- 
		<td><input type="radio" name="sex" value="1" <?php if($data["sex"] == '男'): ?>checked="checked"<?php endif; ?>  />男
		<input type="radio" name="sex" value="2" <?php if($data["sex"] == '女'): ?>checked="checked"<?php endif; ?>  />女
		<input type="radio" name="sex" value="3" <?php if($data["sex"] == '保密'): ?>checked="checked"<?php endif; ?>  />保密
		</td> 
					html标签内可以使用模板标签，如：<if></if>、<eq></eq>！！！！
	-->
		<td><input type="radio" name="sex" value="1" <?php if(($data["sex"]) == "男"): ?>checked="checked"<?php endif; ?>  />男
		<input type="radio" name="sex" value="2" <?php if(($data["sex"]) == "女"): ?>checked="checked"<?php endif; ?>  />女
		<input type="radio" name="sex" value="3" <?php if(($data["sex"]) == "保密"): ?>checked="checked"<?php endif; ?>  />保密
		</td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit"  value="编辑用户"/></td>
	</tr>

</table>
</form>
</body>
</html>