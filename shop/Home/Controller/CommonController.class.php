<?php
namespace Home\Controller;
use Think\Controller;

class CommonController extends Controller{

	// 构造函数
	public function __construct(){
		parent::__construct();
		//$catelist = S('catelist');
		//if($catelist === false){
		$catelist = D('Cate')->cache(true)->where("id=1")->select();
			//S('catelist', $catelist);
		//}
		$where['is_hot|is_recommend'] = 1;
		$hot_r = D('Goods')->scope('status')->where($where)->limit(3)->select();
		$history = cookie('history');
		$this->assign('history',  array_reverse(array_map('unserialize', $history)));
		$this->assign('hot_r', $hot_r);
		$this->assign('catelist', $catelist);
	}
}