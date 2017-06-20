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
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>修改分类</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="">   
      <input type="hidden" name="id" value="<?php echo ($info["id"]); ?>">
      <div class="form-group">
        <div class="label">
          <label>分类名称：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="name" value="<?php echo ($info["name"]); ?>"  />         
          <div class="tips"></div>
        </div>
      </div>       
      <div class="form-group">
        <div class="label">
          <label>上级分类：</label>
        </div>
        <div class="field">
          <select class="input w50" name="parent_id" id="">
            <option value="0" >顶级分类</option>
            <?php if(is_array($list)): foreach($list as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>" <?php if($info['parent_id'] == $vo['id']): ?>selected<?php endif; ?> ><?php echo ($vo["pad"]); echo ($vo["name"]); ?></option><?php endforeach; endif; ?>
          </select>         
        </div>
      </div>

      <div class="form-group">
        <div class="label">
          <label>分类描述：</label>
        </div>
        <div class="field">
          <textarea type="text" class="input" name="remark" style="height:100px;" ><?php echo ($info["remark"]); ?></textarea>        
        </div>
     </div>
    
      <div class="form-group">
        <div class="label">
          <label>排序：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="shop_order" value="0"   value="<?php echo ($info["shop_order"]); ?>" />
          <div class="tips"></div>
        </div>
      </div>
     <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
          <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>
        </div>
      </div>
    </form>
  </div>
</div>