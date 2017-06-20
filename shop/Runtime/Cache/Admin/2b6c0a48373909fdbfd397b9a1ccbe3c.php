<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>商城后台管理</title>  
    <link rel="stylesheet" href="/Public/Admin/css/pintuer.css">
    <link rel="stylesheet" href="/Public/Admin/css/admin.css">
    <script src="/Public/Admin/js/jquery.js"></script>
    <script src="/Public/Admin/js/pintuer.js"></script>  
</head>
<body>
	<div class="panel admin-panel">
  <div class="panel-head"><strong class="icon-reorder"> 内容列表</strong></div>
  <div class="padding border-bottom">  
  <a class="button border-yellow" href="<?php echo U('Goods/add');?>"><span class="icon-plus-square-o"></span> 添加商品</a>
  </div> 
  <table class="table table-hover text-center">
    <tr>
      <th width="5%">ID</th>
      <th >商品名称</th>
      <th>商品分类</th>
      <th>商品图片</th>
      <th >商品价格</th>
      <th>热销</th>
      <th>推荐</th>
      <th>新品</th>
      <th>排序</th>     
      <th width="250">操作</th>
    </tr>
   <?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
        <td><?php echo ($vo["id"]); ?></td>      
        <td><?php echo ($vo["name"]); ?></td>
        <td><?php echo ($vo["catename"]); ?></td>
        <td><a href="<?php echo ($vo["goods_img"]); ?>" target="_blank"><img src="<?php echo ($vo["thumb_img"]); ?>" alt=""></a></td>
        <td><?php echo ($vo["price"]); ?></td>
        <td>
          <a href="<?php echo U('Goods/type',array('id'=>$vo['id'],'type'=>'hot'));?>" >
            <?php echo ($vo['is_hot'] ? '是' : '否'); ?>
          </a>
        </td>
        <td>
          <a href="<?php echo U('Goods/type',array('id'=>$vo['id'],'type'=>'recommend'));?>">
            <?php echo ($vo['is_recommend'] ? '是' : '否'); ?>
          </a>
        </td>
        <td>
          <a href="<?php echo U('Goods/type',array('id'=>$vo['id'],'type'=>'new'));?>">
            <?php echo ($vo['is_new'] ? '是' : '否'); ?>
          </a>
        </td>
        <td><?php echo ($vo["shop_order"]); ?></td>     
        <td>
        <div class="button-group">
          <a type="button" class="button border-main" 
        href="<?php echo U('Goods/view',array('id'=>$vo['id']));?>"><span class="icon-edit"></span>查看</a>
        <a type="button" class="button border-main" 
        href="<?php echo U('Goods/edit',array('id'=>$vo['id']));?>"><span class="icon-edit"></span>修改</a>
         <a class="button border-red" href="<?php echo U('Goods/delete',array('id'=>$vo['id']));?>"><span class="icon-trash-o"></span> 删除</a>
        </div>
        </td>
      </tr><?php endforeach; endif; ?>
  </table>
</div>
<?php echo ($page); ?>
</body>
</html>