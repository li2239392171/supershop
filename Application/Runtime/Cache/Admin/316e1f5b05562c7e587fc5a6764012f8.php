<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
<link rel="stylesheet" href="/SpSp/Public/admin/css/backstage.css">
</head>
<body>
        <div class="details">
            <div class="details_operation clearfix">
                <div class="bui_select">
                    <input type="button" value="添&nbsp;&nbsp;加" class="add"  onclick="addCate()">
                </div>
                    
            </div>
            <!--表格-->
            <table class="table" cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                        <th width="15%">编号</th>
                        <th width="25%">分类</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                        <!--这里的id和for里面的c1 需要循环出来-->
                        <td><input type="checkbox" id="c1" class="check"><label for="c1" class="label"><?php echo ($vo["id"]); ?></label></td>
                        <td><?php echo ($vo["cname"]); ?></td>
                        <td align="center"><input type="button" value="修改" class="btn" onclick="editCate('<?php echo ($vo["id"]); ?>')"><input type="button" value="删除" class="btn"  onclick="delCate('<?php echo ($vo["id"]); ?>')"></td>
                    </tr><?php endforeach; endif; else: echo "$empty" ;endif; ?>
                    <?php if($totalRows>$pageSize):?>
                    <tr>
                    	<td colspan="4"><?php echo showPage($page, $totalPage);?></td>
                    </tr>
                    <?php endif;?>
                </tbody>
            </table>
        </div>
<script type="text/javascript">
	function editCate(id){
		window.location="<?php echo U('editCate');?>?id="+id;
	}
	function delCate(id){
		if(window.confirm("您确定要删除吗？删除之后不能恢复哦！！！")){
			window.location="<?php echo U('delCate');?>?id="+id;
		}
	}
	function addCate(){
		window.location="<?php echo U('addCate');?>";
	}
</script>
</body>
</html>