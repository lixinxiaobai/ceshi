<?php
namespace Home\Model;
use Think\Model;

class CateModel extends Model{

	// 取得父类, 递归
	public function getParent($parent_id){
		$arr = array();
		$parent = $this->where(array('id'=>$parent_id))->find(); // 求得父类
		$arr[] = $parent;
		if($parent['parent_id'] == 0){
			return $arr;
		}else{
			return array_merge($arr, $this->getParent($parent['parent_id']));
		}
	}
	
}
