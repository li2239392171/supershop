<?php if (!defined('THINK_PATH')) exit();?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>-.-</title>
<link rel="stylesheet" href="/SpSp/Public/admin/css/global.css" type="text/css" media="all" />
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
		<td><input type="text" name="gname" required="required" placeholder="请输入商品名称"/></td>
	</tr>
	<tr>
		<td align="right">商品分类</td>
		<td>
		<select name="cid">
			<?php if(is_array($cname)): $i = 0; $__LIST__ = $cname;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo['cname']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
		</select>
		</td>
	</tr>
	<tr>
		<td align="right">商品货号</td>
		<td><input type="text" name="gno" required="required" placeholder="请输入商品货号"/></td>
	</tr>
	<tr>
		<td align="right">商品数量</td>
		<td><input type="text" name="gnum" required="required" placeholder="请输入商品数量"/></td>
	</tr>
	<tr>
		<td align="right">商品市场价</td>
		<td><input type="text" name="mprice" required="required" placeholder="请输入商品市场价"/></td>
	</tr>
	<tr>
		<td align="right">商品慕课价</td>
		<td><input type="text" name="gprice" required="required" placeholder="请输入商品慕课价"/></td>
	</tr>
	<tr>
		<td align="right">商品描述</td>
		<td>
			<textarea name="gintro" id="editor_id" style="width:100%;height:150px;"></textarea>
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
		<td colspan="2"><input type="submit"  value="发布商品"/></td>
	</tr>
</table>
</form>
</body>
</html>