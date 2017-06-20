<?php
namespace Admin\Model;
use Think\Model;

class GoodsModel extends Model{
	
	// 自动验证.
	// array(验证字段1,验证规则,错误提示,[验证条件,附加规则,验证时间]),
	protected $_validate = array(
		array('name', 'require', '商品名称不能为空'),
		array('sn','','货号不能重复',3,'unique'),
		array('price', 'currency', '商品价格必须是数字'),
		array('number', 'valiNumber', '商品数量必须是数字并且必须大于0',3,'callback'),
		array('shop_order', 'number', '商品排序必须是数字')
	);

	// 自动完成
	// array(完成字段1,完成规则,[完成条件,附加规则]),
	protected $_auto = array(
		array('create_timed','time',1,'function'),
		array('status',1)
	);

	function valiNumber($value){
		if(is_numeric($value) && $value >= 0){
			return true;
		}else{
			return false;
		}
	}

	
}