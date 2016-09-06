<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>-.-</title>
<link rel="stylesheet" href="/SpSp/Public/admin/css/backstage.css">
</head>

<body>
                <div class="details">
                    <div class="details_operation clearfix">
                        <div class="bui_select">
                            <input type="button" value="添&nbsp;&nbsp;加" class="add"  onclick="addUser()">
                        </div>
                            
                    </div>
                    <!--表格-->
                    <table class="table" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th width="15%">编号</th>
                                <th width="20%">用户名称</th>
                                <th width="20%">用户邮箱</th>
                                <th width="20%">是否激活</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($list)): foreach($list as $key=>$k): ?><tr>
                                <!--这里的id和for里面的c1 需要循环出来-->
                                <td><input type="checkbox" id="c1" class="check"><label for="c1" class="label"><?php echo ($k["id"]); ?></label></td>
                                <td><?php echo ($k["username"]); ?></td>
                                <td><?php echo ($k["email"]); ?></td>
                                 <td>
                                 		<?php  echo $row['activeFlag']==0?"未激活":"激活"; ?>
                                 </td>
                                <td align="center"><input type="button" value="修改" class="btn" onclick="editUser('<?php echo ($k["id"]); ?>')"><input type="button" value="删除" class="btn"  onclick="delUser('<?php echo ($k["id"]); ?>')"></td>
                            </tr><?php endforeach; endif; ?>
                        </tbody>
                    </table>
                    <div class="page"><?php echo ($pagestr); ?></div>
                </div>
</body>
<script type="text/javascript">

	function addUser(){
		window.location="<?php echo U('addUser');?>";	
	}
	function editUser(id){
			window.location="<?php echo U('editUser');?>?id="+id;
	}
	function delUser(id){
			if(window.confirm("您确定要删除吗？删除之后不可以恢复哦！！！")){
				window.location="<?php echo U('delUser');?>?id="+id;
			}
	}
</script>
</html>