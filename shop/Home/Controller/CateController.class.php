<?php
namespace Home\Controller;
use Home\Controller\CommonController;

class CateController extends CommonController{

	// 类别下面的商品列表
	public function lists($id){
		$goodsModel = D('Goods');
		$cateModel = D('Cate');
		$cateinfo = $cateModel->find($id); // 查询出类别信息
		$childlist = $cateModel->where(array('parent_id'=>$id))->select(); // 当前分类的子类
		$parent = $cateModel->getParent($cateinfo['parent_id']); // 求得父类
		// 热销或者推荐查询 is_hot is_recommend
		// select * from shop_goods where is_hot=1 or is_recommend=1
		// 把自己的where条件写在scope后面，如果说写在前面的话，命名范围的条件会将自己的条件覆盖掉
		$this->goodspage($id);
		// array_map 将数组每一个单元的值都运用指定的函数
		$this->assign('childlist', $childlist);
		$this->assign('cateinfo', $cateinfo);
		$this->assign('parent', array_reverse($parent));
		$this->display();
	}

	protected function goodspage($id){
		$goodsModel = D('Goods');
		$count = $goodsModel->scope('status')->where(array('cate_id'=>$id))->count();
		$Page = new \Common\Tool\Page($count, 1);
		$Page->setConfig('prev','上一页');
		$Page->setConfig('next','下一页');
		$goodslist = $goodsModel
		->scope('status')
		->where(array('cate_id'=>$id))
		->limit($Page->firstRow.','.$Page->listRows)
		->select();
		$this->assign('goodslist', $goodslist);
		$this->assign('page', $Page->show());
	}
}