<?php
namespace Admin\Model;
use Think\Model;

class CateModel extends Model{
	
	// array(验证字段1,验证规则,错误提示,[验证条件,附加规则,验证时间]),
	protected $_validate = array(
		array('name','require','类别名称要存在', 1), //默认情况下用正则进行验证
		array('remark', '10,9999', '类别描述10个字符以上', 1, 'length',3),
		array('shop_order','validateOrder','排序必须是数字',1,'callback',3)
	);

	private $catelist;

	// 验证排序 返回值是false的话，验证则不通过
	public function validateOrder($value){
		if(is_numeric($value)){
			return true;
		}else{
			return false;
		}
	}

	// 获取所有的分类
	public function getCateList(){
		if(!$this->catelist){
			$this->catelist = $this->select(); // 获取所有的分类数据
		}
		return $this->catelist;
	}

	// 无限极分类
	//str_pad($input, 10, "-=", STR_PAD_LEFT);
	//第一个参数 字符串 填充数量 填充的内容 填充的方向
	public function getTreeData($p_id = 0, $lev = 0){
		$data = $this->getCateList();
		$arr = array(); // 定义一个空数组
		foreach ($data as $key => $value) { // 遍历分类数据
			if($value['parent_id'] == $p_id){
				$value['lev'] = $lev;
				$value['pad'] = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',$lev);
				$arr[] = $value;
				// $resArr = $this->getTreeData($value['id'], $lev+1); // 找到$value[id]的儿子,孙子，曾孙子，曾曾孙，孙子18代全部找到并且返回
				$arr = array_merge($arr, $this->getTreeData($value['id'], $lev+1));
			}
		}
		return $arr;
	}


}
