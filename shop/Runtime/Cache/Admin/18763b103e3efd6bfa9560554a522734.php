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
<div class="panel admin-panel margin-top">
  	<div class="panel-head" id="add">
  		<strong><span class="icon-pencil-square-o"></span>查看商品</strong>
  	</div>
  	<div class="body-content">
  		<table class="table table-hover text-center">
  			<tr>
  				<td width=120>商品名称：</td>
  				<td align="left"><?php echo ($info["name"]); ?></td>
  			</tr>
  			<tr>
  				<td>货号：</td>
  				<td align="left"><?php echo ($info["sn"]); ?></td>
  			</tr>
  			<tr>
  				<td>详情：</td>
  				<td align="left"><?php echo ($info["detail"]); ?></td>
  			</tr>
  			<tr>
  				<td>描述：</td>
  				<td align="left"><?php echo ($info["remark"]); ?></td>
  			</tr>
  			<tr>
  				<td>价格：</td>
  				<td align="left"><?php echo ($info["price"]); ?></td>
  			</tr>
  			<tr>
  				<td>图片：</td>
  				<td align="left"><img src="<?php echo ($info["goods_img"]); ?>" alt=""></td>
  			</tr>
  			<tr>
  				<td>数量：</td>
  				<td align="left"><?php echo ($info["number"]); ?></td>
  			</tr>
  			<tr>
  				<td>分类：</td>
  				<td align="left"><?php echo ($info["catename"]); ?></td>
  			</tr>
  			<tr>
  				<td>排序：</td>
  				<td align="left"><?php echo ($info["shop_order"]); ?></td>
  			</tr>
  			<tr>
  				<td>创建时间：</td>
  				<!-- date('Y-m-d',$info['create_timed']) -->
  				<td align="left"><?php echo (date('Y-m-d H:i:s',$info["create_timed"])); ?></td>
  			</tr>
		</table>
	</div>
</div>