<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="sheetstyle" type="text/html" src="/SpSp/Public/admin/js/jquery-1.9.1.min.js">
<title>Insert title here</title>
</head>
<body>
<h3>添加管理员</h3>
<form name="addadmin" action="" method="post">
<table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
    <tr>
        <td align="right">管理员名称</td>
        <td><input type="text" name="adminname" id="adminname" placeholder="请输入管理员名称"/></td>
    </tr>
    <tr>
        <td align="right">管理员密码</td>
        <td><input type="password" name="password" id="password" /></td>
    </tr>
    <tr>
        <td align="right">管理员邮箱</td>
        <td><input type="text" name="email" id="email" placeholder="请输入管理员邮箱"/></td>
    </tr>
    <tr>
        <td colspan="2"><input type="button" onclick="validate()" value="添加管理员"/></td>
    </tr>
    <script type="text/javascript">
        function validate(){
           if(addadmin.adminname.value==""){
                document.addadmin.adminname.focus();
                return;
           }
           else if(addadmin.password.value==""){
                document.addadmin.password.focus();
                return;
           }
           else if(addadmin.email.value==""){
                document.addadmin.email.focus();
                return;
           }
           addadmin.submit();
        }
    </script>

</table>
</form>
</body>
</html>