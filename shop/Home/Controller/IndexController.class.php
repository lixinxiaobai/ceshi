<?php
namespace Home\Controller;
use Home\Controller\CommonController;
class IndexController extends CommonController {
    public function index(){
    	// 视图应该建在哪?
    	// View/控制器名/方法名.html
    	// View/Index/index.html
    	// D实例化的是当前模块(Home)下的model
    	// 可以使用 D('Admin/Cate') 可以来实例化Admin模块下的Model
    	// 比如说A商品是标识是最新推荐，那么A商品能不能又是热销商品
    	// 解决方案: 建表方案， 新建立 热销商品表， 最新推荐表。。。 
    	// 商品表添加字段
        // 首页的控制器是Index, 首页的方法名是 index
    	$model = D('Cate');
        $goodsModel = D('Goods');
    	$catelist = $model->select();
        $recommendlist = $goodsModel->getTypeList(1); // 推荐商品
        $hotlist = $goodsModel->getTypeList(2); // 热门商品
        $newlist = $goodsModel->getTypeList(3); // 新品商品
        $goodslist = $goodsModel->getGoodsCate($catelist); // 查询出类别下的商品
        $this->assign('goodslist', $goodslist);
        $this->assign('recommendlist', $recommendlist);
        $this->assign('hotlist', $hotlist);
        $this->assign('newlist', $newlist);
        $this->display(); // 引入视图
    }


    public function test(){
        // array_merge 索引数组下，后面的会追加到前面
        // 关联数组下，后面的会覆盖前面的
        $arr = array(
            array('a'=>'a','b'=>'b')
            );
        $arr1 = array(
            array('a'=>'c','b'=>'d')
            );
        dump(array_merge($arr, $arr1));
    }
}