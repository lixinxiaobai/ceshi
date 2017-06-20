<?php
namespace Home\Controller;
use Home\Controller\CommonController;

class GoodsController extends CommonController{

	public function detail(){
		$id = I('get.id');
		dump(HTML_PATH);
		$goodsinfo = D('Goods')->find($id);
		$history = cookie('history');	// 获取已经浏览过的历史记录
		if(count($history) >= 3){
			// 删除旧的，添加新的
			// 删除数组里第一条记录
			// array_shift 所有的数字键会从0开始重新计算，所以这里就不能使用array_shift了
			// 因为我们想要的是，删除第一条记录之后，原键名保留原来的，不让重新计算
			reset($history); // 把数组指针移到第一位
			$key = key($history); // 获取到数组当前指针的键
			unset($history[$key]); // 删除数组指定的键值
		}
		// 将数组序列化， 转化成字符串
		$history[$id] = serialize(array(
			'id' => $goodsinfo['id'],
			'name' => $goodsinfo['name'],
			'price' => $goodsinfo['price'],
			'goods_img' => $goodsinfo['goods_img']
		));	// 在已经浏览过的历史记录添加一条单元
		cookie('history', $history);	// 再将修改后的数组存进历史记录
		$this->assign('goodsinfo', $goodsinfo);
		$this->display();
	}

	public function test(){
		$this->display();
	}
}