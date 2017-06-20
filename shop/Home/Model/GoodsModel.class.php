<?php
namespace Home\Model;
use Think\Model;

class GoodsModel extends Model{

	/***
	命名范围
	'命名范围标识'=>array(
		'属性1'=>'值1',
		'属性2'=>'值2',
		...
	)
	***/
	protected $_scope = array(
		'status' => array(
			'where' => array('status'=>1),
			'order' => 'shop_order desc'
		)
	);

	/**
	* @param $type int 1表示推荐 2表示热销 3表示新品
	*/
	public function getTypeList($type){
		switch ($type) {
			case 1:
				$where['is_recommend'] = 1;
				break;
			case 2:
				$where['is_hot'] = 1;
				break;
			case 3:
				$where['is_new'] = 1;
				break;
		}
		$where['status'] = 1;
		return $this->where($where)->order('shop_order desc,id desc')->limit(0,5)->select(); // 推荐商品
	}

	/**
	* @param $cate 分类列表
	* sql语句 select * from shop_goods where cate_id in 集合
	*/
	public function getGoodsCate($cate){
		$goods = array();
		foreach ($cate as $key => $value) {
			if($value['parent_id'] == 0){
				$catelist = $this->getChildCate($value['id']); // 获取一级分类下的所有子级分类
				if(!empty($catelist)){
					$where = array(
						'cate_id' => array('in', $catelist)
					);
					$goods[$value['id']] = $this->where($where)->select();
				}
			}
		}
		return $goods;
	}

	// 递归 或得子级分类
	public function getChildCate($cate_id){
		$list = M('Cate')->where('parent_id='.$cate_id)->select();
		$arr = array();
		foreach ($list as $key => $value) {
			$arr[] = $value['id'];
			$arr = array_merge($arr,$this->getChildCate($value['id']));
		}
		return $arr;
	}

}