<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>-.-</title>
<link href="./styles/global.css"  rel="stylesheet"  type="text/css" media="all" />
<script type="text/javascript" charset="utf-8" src="/SpSp/Public/admin/plugins/kindeditor/kindeditor.js"></script>
<script type="text/javascript" charset="utf-8" src="/SpSp/Public/admin/plugins/kindeditor/lang/zh_CN.js"></script>
<script type="text/javascript" src="/SpSp/Public/admin/js/jquery-1.6.4.js"></script>
<script>
        KindEditor.ready(function(K) {
                window.editor = K.create('#editor_id');
        });
        $(document).ready(function(){
        	$("#selectFileBtn").click(function(){
        		$fileField = $('<input type="file" name="thumbs[]"/>');
        		$fileField.hide();
        		$("#attachList").append($fileField);
        		$fileField.trigger("click");
        		$fileField.change(function(){
        		$path = $(this).val();
        		$filename = $path.substring($path.lastIndexOf("\\")+1);
        		$attachItem = $('<div class="attachItem"><div class="left">a.gif</div><div class="right"><a href="#" title="删除附件">删除</a></div></div>');
        		$attachItem.find(".left").html($filename);
        		$("#attachList").append($attachItem);		
        		});
        	});
        	$("#attachList>.attachItem").find('a').live('click',function(obj,i){
        		$(this).parents('.attachItem').prev('input').remove();
        		$(this).parents('.attachItem').remove();
        	});
        });
</script>
</head>
<body>
<h3>添加商品</h3>
<form action="" method="post" enctype="multipart/form-data">
<table width="70%"  border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
	<tr>
		<td align="right">商品名称</td>
		<td><input type="text" name="gname"  value="<?php echo ($data["gname"]); ?>"/></td>
	</tr>
	<tr>
		<td align="right">商品分类</td>
		<td>
		<select name="cId">
			<?php if(is_array($cname)): foreach($cname as $key=>$k): ?><option value="<?php echo ($k["id"]); ?>"><?php echo ($k["cname"]); ?></option><?php endforeach; endif; ?>
		</select>
		</td>
	</tr>
	<tr>
		<td align="right">商品货号</td>
		<td><input type="text" name="gno"  value="<?php echo ($data["gno"]); ?>"/></td>
	</tr>
	<tr>
		<td align="right">商品数量</td>
		<td><input type="text" name="gnum"  value="<?php echo ($data["gnum"]); ?>"/></td>
	</tr>
	<tr>
		<td align="right">商品市场价</td>
		<td><input type="text" name="mprice"  value="<?php echo ($data["mprice"]); ?>"/></td>
	</tr>
	<tr>
		<td align="right">商品慕课价</td>
		<td><input type="text" name="gprice"  value="<?php echo ($data["gprice"]); ?>"/></td>
	</tr>
	<tr>
		<td align="right">商品描述</td>
		<td>
			<textarea name="gintro" id="editor_id" style="width:100%;height:150px;"><?php echo ($data["gintro"]); ?></textarea>
		</td>
	</tr>
	<tr>
		<td align="right">商品图像</td>
		<td>
			<a href="javascript:void(0)" id="selectFileBtn">添加附件</a>
			<div id="attachList" class="clear"></div>
		</td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit"  value="编辑商品"/></td>
	</tr>
</table>
</form>
</body>
</html>