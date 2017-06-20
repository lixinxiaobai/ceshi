<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>ShopCZ-首页</title>
	<link rel="stylesheet" href="/Public/Home/css/base.css" type="text/css" />
	<link rel="stylesheet" href="/Public/Home/css/shop_common.css" type="text/css" />
	<link rel="stylesheet" href="/Public/Home/css/shop_header.css" type="text/css" />
    <script type="text/javascript" src="/Public/Home/js/jquery.js" ></script>
    <script type="text/javascript" src="/Public/Home/js/topNav.js" ></script>
</head>
<body>
	<!-- Header  -wll-2013/03/24 -->
	<div class="shop_hd">
		<!-- Header TopNav -->
		<div class="shop_hd_topNav">
			<div class="shop_hd_topNav_all">
				<!-- Header TopNav Left -->
				<div class="shop_hd_topNav_all_left">
					<p>
						您好<?php if(is_login()): echo ($_SESSION['home_user']['username']); endif; ?>，欢迎来到
						<b>
							<a href="/">ShopCZ商城</a>
						</b>
						<?php if(!is_login()): ?>[<a href="<?php echo U('User/login');?>">登录</a>]
						[<a href="<?php echo U('User/register');?>">注册</a>]
						<?php else: ?>
						[<a href="<?php echo U('User/logout');?>">退出登陆</a>]<?php endif; ?>
					</p>
				</div>
				<!-- Header TopNav Left End -->

				<!-- Header TopNav Right -->
				<div class="shop_hd_topNav_all_right">
					<ul class="topNav_quick_menu">

						<li>
							<div class="topNav_menu">
								<a href="#" class="topNavHover">我的商城<i></i></a>
								<div class="topNav_menu_bd" style="display:none;" >
						            <ul>
						              <li><a title="已买到的商品" target="_top" href="#">已买到的商品</a></li>
						              <li><a title="个人主页" target="_top" href="#">个人主页</a></li>
						              <li><a title="我的好友" target="_top" href="#">我的好友</a></li>
						            </ul>
						        </div>
							</div>
						</li>
                                                <li>
							<div class="topNav_menu">
								<a href="#" class="topNavHover">卖家中心<i></i></a>
								<div class="topNav_menu_bd" style="display:none;">
						            <ul>
						              <li><a title="已售出的商品" target="_top" href="#">已售出的商品</a></li>
						              <li><a title="销售中的商品" target="_top" href="#">销售中的商品</a></li>
						            </ul>
						        </div>
							</div>
						</li>

						<li>
							<div class="topNav_menu">
								<a href="#" class="topNavHover">购物车<b>0</b>种商品<i></i></a>
								<div class="topNav_menu_bd" style="display:none;">
									<!--
						            <ul>
						              <li><a title="已售出的商品" target="_top" href="#">已售出的商品</a></li>
						              <li><a title="销售中的商品" target="_top" href="#">销售中的商品</a></li>
						            </ul>
						        	-->
						            <p>还没有商品，赶快去挑选！</p>
						        </div>
							</div>
						</li>

						<li>
							<div class="topNav_menu">
								<a href="#" class="topNavHover">我的收藏<i></i></a>
								<div class="topNav_menu_bd" style="display:none;">
						            <ul>
						              <li><a title="收藏的商品" target="_top" href="#">收藏的商品</a></li>
						              <li><a title="收藏的店铺" target="_top" href="#">收藏的店铺</a></li>
						            </ul>
						        </div>
							</div>
						</li>

						<li>
							<div class="topNav_menu">
								<a href="#">站内消息</a>
							</div>
						</li>

					</ul>
				</div>
				<!-- Header TopNav Right End -->
			</div>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
		<!-- Header TopNav End -->

		<!-- TopHeader Center -->
		<div class="shop_hd_header">
			<div class="shop_hd_header_logo"><h1 class="logo"><a href="/"><img src="/Public/Home/images/logo.png" alt="ShopCZ" /></a><span>ShopCZ</span></h1></div>
			<div class="shop_hd_header_search">
                            <ul class="shop_hd_header_search_tab">
			        <li id="search" class="current">商品</li>
			        <li id="shop_search">店铺</li>
			    </ul>
                            <div class="clear"></div>
			    <div class="search_form">
			    	<form method="post" action="index.php">
			    		<div class="search_formstyle">
			    			<input type="text" class="search_form_text" name="search_content" value="搜索其实很简单！" />
			    			<input type="submit" class="search_form_sub" name="secrch_submit" value="" title="搜索" />
			    		</div>
			    	</form>
			    </div>
                            <div class="clear"></div>
			    <div class="search_tag">
			    	<a href="">李宁</a>
			    	<a href="">耐克</a>
			    	<a href="">Kappa</a>
			    	<a href="">双肩包</a>
			    	<a href="">手提包</a>
			    </div>

			</div>
		</div>
		<div class="clear"></div>

				<!-- Header Menu -->
		<div class="shop_hd_menu">
			<!-- 所有商品菜单 -->

			<!-- 首页分类菜单一直显示，子页分类菜单鼠标放上去再显示 -->
			<div 
			<?php if(is_home()): ?>class="shop_hd_menu_all_category shop_hd_menu_hover"
			<?php else: ?>
			id="shop_hd_menu_all_category" class="shop_hd_menu_all_category "<?php endif; ?>
			><!-- 首页去掉 id="shop_hd_menu_all_category" 加上clsss shop_hd_menu_hover -->
				<div class="shop_hd_menu_all_category_title"><h2 title="所有商品分类"><a href="javascript:void(0);">所有商品分类</a></h2><i></i></div>
				<div id="shop_hd_menu_all_category_hd" class="shop_hd_menu_all_category_hd">
					<ul class="shop_hd_menu_all_category_hd_menu clearfix">
						<!-- 单个菜单项 -->
						<?php if(is_array($catelist)): foreach($catelist as $key=>$vo): if($vo['parent_id'] == 0): ?><li id="cat_1" class="">
							<h3><a href="<?php echo U('Cate/lists',array('id'=>$vo['id']));?>" title="<?php echo ($vo["name"]); ?>"><?php echo ($vo["name"]); ?></a></h3>
							<div id="cat_1_menu" class="cat_menu clearfix" style="">
								<?php if(is_array($catelist)): foreach($catelist as $key=>$vo2): if($vo2['parent_id'] == $vo['id']): ?><dl class="clearfix">
									<dt><a href="<?php echo U('Cate/lists',array('id'=>$vo2['id']));?>" ><?php echo ($vo2["name"]); ?></a></dt>
									<dd>
										<?php if(is_array($catelist)): foreach($catelist as $key=>$vo3): if($vo3['parent_id'] == $vo2['id']): ?><a href="<?php echo U('Cate/lists',array('id'=>$vo3['id']));?>"><?php echo ($vo3["name"]); ?></a><?php endif; endforeach; endif; ?>
									</dd>
								</dl><?php endif; endforeach; endif; ?>
							</div>
						</li><?php endif; endforeach; endif; ?>
					</ul>
				</div>
			</div>
			<!-- 所有商品菜单 END -->

			<!-- 普通导航菜单 -->
			<ul class="shop_hd_menu_nav">
				<li class="current_link"><a href=""><span>首页</span></a></li>
				<li class="link"><a href=""><span>团购</span></a></li>
				<li class="link"><a href=""><span>品牌</span></a></li>
				<li class="link"><a href=""><span>优惠卷</span></a></li>
				<li class="link"><a href=""><span>积分中心</span></a></li>
				<li class="link"><a href=""><span>运动专场</span></a></li>
				<li class="link"><a href=""><span>微商城</span></a></li>
			</ul>
			<!-- 普通导航菜单 End -->
		</div>
		<!-- Header Menu End -->
	</div>
	<div class="clear"></div>
	<!-- Header End -->
<link rel="stylesheet" href="/Public/Home/css/shop_list.css" type="text/css" />
<script type="text/javascript" src="/Public/Home/js/shop_list.js" ></script>

	<!-- 面包屑 注意首页没有 -->
	<!-- 首页 > 商品分类 > 当前分类的顶级分类 > -->
	<!-- 首页 > 商品分类 > 服装 > 男装 > 裤子 -->
	<div class="shop_hd_breadcrumb">
		<strong>当前位置：</strong>
		<span>
			<a href="">首页</a>&nbsp;›&nbsp;
			<a href="">商品分类</a>&nbsp;›&nbsp;
			<!--根据当前分类求得父类。。。直到顶级分类 -->
			<?php if(is_array($parent)): foreach($parent as $key=>$vo): ?><a href="<?php echo U('Cate/lists', array('id'=>$vo['id']));?>"><?php echo ($vo["name"]); ?></a>&nbsp;›&nbsp;<?php endforeach; endif; ?>
			<a href=""><?php echo ($cateinfo["name"]); ?></a>
		</span>
	</div>
	<div class="clear"></div>
	<!-- 面包屑 End -->

	<!-- Header End -->


	<!-- List Body 2013/03/27 -->
	<div class="shop_bd clearfix">
		<div class="shop_bd_list_left clearfix">
			<!-- 左边商品分类 -->
			<div class="shop_bd_list_bk clearfix">
				<div class="title">商品分类</div>
				<div class="contents clearfix">
					<dl class="shop_bd_list_type_links clearfix">
						<dt><strong><?php echo ($cateinfo["name"]); ?></strong></dt>
						<dd>
							<?php if(is_array($childlist)): foreach($childlist as $key=>$vo): ?><span><a href="<?php echo U('Cate/lists', array('id'=>$vo['id']));?>"><?php echo ($vo["name"]); ?></a></span><?php endforeach; endif; ?>
						</dd>
					</dl>
				</div>
			</div>
			<!-- 左边商品分类 End -->

			<!-- 热卖推荐商品 -->
			<div class="shop_bd_list_bk clearfix">
				<div class="title">热卖推荐商品</div>
				<div class="contents clearfix">
					<ul class="clearfix">
						<?php if(is_array($hot_r)): foreach($hot_r as $key=>$vo): ?><li class="clearfix">
							<div class="goods_name"><a href="<?php echo U('Goods/detail', array('id'=>$vo['id']));?>"><?php echo ($vo["name"]); ?></a></div>
							<div class="goods_pic"><span class="goods_price">¥ <?php echo ($vo["price"]); ?> </span><a href="<?php echo U('Goods/detail', array('id'=>$vo['id']));?>"><img src="<?php echo ($vo["goods_img"]); ?>" /></a></div>
							<div class="goods_xiaoliang">
								<span class="goods_xiaoliang_link"><a href="<?php echo U('Goods/detail', array('id'=>$vo['id']));?>">去看看</a></span>
								<span class="goods_xiaoliang_nums">已销售<strong>99</strong>笔</span>
							</div>
						</li><?php endforeach; endif; ?>
					</ul>
				</div>
			</div>
			<!-- 热卖推荐商品 -->
			<div class="clear"></div>

			<!-- 浏览过的商品 -->
			<div class="shop_bd_list_bk clearfix">
				<div class="title">浏览过的商品</div>
				<div class="contents clearfix">
					<ul class="clearfix">
						<?php if(is_array($history)): foreach($history as $key=>$vo): ?><li class="clearfix">
							<div class="goods_name"><a href=""><?php echo ($vo["name"]); ?></a></div>
							<div class="goods_pic"><span class="goods_price">¥ <?php echo ($vo["price"]); ?> </span><a href=""><img src="<?php echo ($vo["goods_img"]); ?>" /></a></div>
							<div class="goods_xiaoliang">
								<span class="goods_xiaoliang_link"><a href="">去看看</a></span>
								<span class="goods_xiaoliang_nums">已销售<strong>99</strong>笔</span>
							</div>
						</li><?php endforeach; endif; ?>
					</ul>
				</div>
			</div>
			<!-- 浏览过的商品 -->

		</div>

		<div class="shop_bd_list_right clearfix">
			<!-- 条件筛选框 -->
			<div class="module_filter">
				<div class="module_filter_line">
					<dl>
						<dt>尺码：</dt>
						<dd>
							<span><a href="">XXS</a></span>
							<span><a href="">XS</a></span>
							<span><a href="">S</a></span>
							<span><a href="">M</a></span>
							<span><a href="">L</a></span>
							<span><a href="">XL</a></span>
							<span><a href="">XXL</a></span>
							<span><a href="">XXXL</a></span>
							<span><a href="">加大XXXL</a></span>
							<span><a href="">均码</a></span>
						</dd>
					</dl>

					<dl>
						<dt>品牌：</dt>
						<dd>
							<span><a href="">彪马</a></span>
							<span><a href="">安踏</a></span>
							<span><a href="">阿迪达斯</a></span>
							<span><a href="">李宁</a></span>
							<span><a href="">匡威</a></span>
							<span><a href="">耐克</a></span>
							<span><a href="">卡帕</a></span>
							<span><a href="">鸿星尔克</a></span>
							<span><a href="">沃特</a></span>
							<span><a href="">垃圾</a></span>
						</dd>
					</dl>

					<dl>
						<dt>款式：</dt>
						<dd>
							<span><a href="">长袖</a></span>
							<span><a href="">短袖</a></span>
							<span><a href="">无袖</a></span>
							<span><a href="">两件套</a></span>
							<span><a href="">宽松</a></span>
							
						</dd>
					</dl>

					<dl>
						<dt>材质：</dt>
						<dd>
							<span><a href="">纯棉</a></span>
							<span><a href="">真丝</a></span>
							<span><a href="">聚酯</a></span>
							<span><a href="">棉+氨纶</a></span>
							<span><a href="">卡莱</a></span>
							<span><a href="">人造棉</a></span>
							<span><a href="">其它</a></span>
						</dd>
					</dl>


				</div>
				<div class="bottom"></div>
			</div>
			<!-- 条件筛选框 -->

			<!-- 显示菜单 -->
			<div class="sort-bar">
				<div class="bar-l"> 
		            <!-- 查看方式S -->
		            <div class="switch"><span class="selected"><a title="以方格显示" ecvalue="squares" nc_type="display_mode" class="pm" href="javascript:void(0)">大图</a></span><span style="border-left:none;"><a title="以列表显示" ecvalue="list" nc_type="display_mode" class="lm" href="javascript:void(0)">列表</a></span></div>
		            <!-- 查看方式E --> 
		            <!-- 排序方式S -->
		            <ul class="array">
		              <li class="selected"><a title="默认排序" onclick="javascript:dropParam(['key','order'],'','array');" class="nobg" href="javascript:void(0)">默认</a></li>
		              <li><a title="点击按销量从高到低排序" onclick="javascript:replaceParam(['key','order'],['sales','desc'],'array');" href="javascript:void(0)">销量</a></li>
		              <li><a title="点击按人气从高到低排序" onclick="javascript:replaceParam(['key','order'],['click','desc'],'array');" href="javascript:void(0)">人气</a></li>
		              <li><a title="点击按信用从高到低排序" onclick="javascript:replaceParam(['key','order'],['credit','desc'],'array');" href="javascript:void(0)">信用</a></li>
		              <li><a title="点击按价格从高到低排序" onclick="javascript:replaceParam(['key','order'],['price','desc'],'array');" href="javascript:void(0)">价格</a></li>
		            </ul>
		            <!-- 排序方式E --> 
		            <!-- 价格段S -->
		            <div class="prices"> <em>¥</em>
		              <input type="text" value="" class="w30">
		              <em>-</em>
		              <input type="text" value="" class="w30">
		              <input type="submit" value="确认" id="search_by_price">
		            </div>
		            <!-- 价格段E --> 
		          </div>
			</div>
			<div class="clear"></div>
			<!-- 显示菜单 End -->

			<!-- 商品列表 -->
			<div class="shop_bd_list_content clearfix">
				<ul>
					<?php if(is_array($goodslist)): foreach($goodslist as $key=>$vo): ?><li>
						<dl>
							<dt><a href="<?php echo U('Goods/detail',array('id'=>$vo['id']));?>"><img src="<?php echo ($vo["goods_img"]); ?>" /></a></dt>
							<dd class="title"><a href="<?php echo U('/Home/Goods/detail',array('id'=>$id));?>"><?php echo ($vo["name"]); ?></a></dd>
							<dd class="content">
								<span class="goods_jiage">￥<strong><?php echo ($vo["price"]); ?></strong></span>
								<span class="goods_chengjiao">最近成交5笔</span>
							</dd>
						</dl>
					</li><?php endforeach; endif; ?>
					

				</ul>
			</div>
			<div class="clear"></div>
			<?php echo ($page); ?>
			<!-- 商品列表 End -->


		</div>
	</div>
	<!-- List Body End -->

	 <!-- Footer - wll - 2013/3/24 -->
	<div class="clear"></div>
	<div class="shop_footer">
            <div class="shop_footer_link">
                <p>
                    <a href="">首页</a>|
                    <a href="">招聘英才</a>|
                    <a href="">广告合作</a>|
                    <a href="">关于ShopCZ</a>|
                    <a href="">关于我们</a>
                </p>
            </div>
            <div class="shop_footer_copy">
                <p>Copyright 2004-2013 itcast Inc.,All rights reserved.</p>
            </div>
        </div>
	<!-- Footer End -->
</body>
</html>