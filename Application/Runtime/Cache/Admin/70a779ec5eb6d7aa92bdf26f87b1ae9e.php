<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
<h3>编辑管理员</h3>
<form action="" method="post">
<table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
    <tr>
        <td align="right">管理员名称</td>
        <td><input type="text" name="adminname" required="required" placeholder="<?php echo ($data["adminname"]); ?>"/></td>
    </tr>
    <tr>
        <td align="right">管理员密码</td>
        <td><input type="password" name="password"  placeholder="...再想一个呗"/></td>
    </tr>
    <tr>
        <td align="right">管理员邮箱</td>
        <td><input type="text" name="email" placeholder="<?php echo ($data['email']); ?>"/></td>
    </tr>
    <tr>
        <td colspan="2"><input type="submit" value="保存"/></td>
    </tr>

</table>
</form>
</body>
</html>