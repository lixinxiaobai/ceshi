<?php
namespace Admin\Controller;
use Admin\Controller\Controller;
class GoodsController extends Controller {

	public function index(){
		$model = D('Goods');
		// 获取总行数
		$count = $model->where("status=1")->count();
		// 实例化分页类，传入两个参数， 总行数和每页显示行数
		$Page = new \Think\Page($count, 5);
		$show = $Page->show(); // 分页显示输出 show是一个html
		// 连接类别表，左连接
		$list = $model->field('shop_cate.name as catename,shop_goods.*')
		->join('shop_cate on shop_goods.cate_id=shop_cate.id','left')
		->where('shop_goods.status=1')
		->order('shop_goods.shop_order desc')
		->limit($Page->firstRow.','.$Page->listRows)
		->select();
		// select * from shop_goods order by shop_order desc;
		//$list = $model->field('shop_cate.name as catename,shop_goods.*')->join('shop_cate on shop_goods.cate_id=shop_cate.id','left')->order('shop_goods.shop_order desc')->select();
		$this->assign('list', $list);
		$this->assign('page', $show);
		$this->display();
	}

	// 添加商品
	public function add(){
		if(IS_POST){
			$model = D('Goods');
			if($model->create(I('post.'))){
				$model = $this->uploadThumb($model);
				$result = $model->add();
				$result ? $this->success('添加成功',U('Goods/index')) : $this->error('添加失败');
			}else{
				$this->error($model->getError());
			}
		}else{
			$list = D('Cate')->getTreeData();
			$this->assign('list', $list);
			$this->display();
		}
	}

	// 修改
	public function edit($id){
		if(IS_POST){
			$model = D('Goods');
			if($model->create(I('post.'))){
				// 修改的时候没有图片，允许修改吗
				if($_FILES['goods_img']['size']){
					$model = $this->uploadThumb($model);
				}
				$result = $model->save();
				$result ? $this->success('修改成功', U('Goods/index')) : $this->error('修改失败');
			}else{
				$this->error($model->getError());
			}
		}else{
			$model = D('Goods');
			$info = $model->find($id);
	        $list = D('Cate')->getTreeData(); // 求出所有列表
	        $this->assign('list', $list);
			$this->assign('info', $info);
			$this->display();
		}
	}

	// 查看
	public function view($id){
		$info = D('Goods')->find($id);
		// getField 只查询一个字段的内容
		$info['catename'] = D('Cate')->where(array('id'=>$info['cate_id']))->getField('name');
		$this->assign('info', $info);
		$this->display();
	}


	// 上传图片并生成缩略图
	protected function uploadThumb($model){
		$upload = new \Think\Upload();
		$upload->maxSize = 3145728;
		$upload->exts = array('jpg','gif','png','jpeg');
		$upload->rootPath = './Uploads/';
		$info = $upload->upload();
		if($info){
			$image_path = '/Uploads/'.$info['goods_img']['savepath'].$info['goods_img']['savename'];
			$thumb_path = '/Uploads/'.$info['goods_img']['savepath'].'thumb_'.$info['goods_img']['savename'];
			$image = new \Think\Image(); // 实例化图片处理类
			$image->open(".{$image_path}");	// 打开图片
			$image->thumb(50,50)->save(".{$thumb_path}"); // 生成缩略图并且保存
			$model->goods_img = $image_path;
			$model->thumb_img = $thumb_path;
			return $model;
		}else{
			$this->error($upload->getError());
		}
	}

	// 删除并不是删除，而是进入到了回收站
	// 先判断数据的status是否为0，如果是0的话就彻底删除
	// 如果status是1的话，就把1改为0 
	// date('Y-m-d',时间戳)
	public function delete($id){
		$model = D('Goods');
		$info = $model->find($id);
		// 如果在商品管理里面，就将该商品放入回收站
		// 如果在回收站里面删除，就彻底删除
		if($info['status'] == 0){ // 如果status是0的话，说明该记录已经在回收站里面了，所以可以彻底删除
			$model->delete($id) ? $this->success('彻底删除ok') : $this->error('彻底删除失败');
		}else{	// 如果status不是0的话，说明在商品管理里面，进行假删除
			$model->id = $id;
			$model->status = 0;
			$model->save() ? $this->success('删除成功') : $this->error('删除失败');
		}
	}

	// 回收站
	public function recycle(){
		$model = D('Goods');
		// 获取总行数
		$count = $model->where("status=0")->count();
		// 实例化分页类，传入两个参数， 总行数和每页显示行数
		$Page = new \Think\Page($count, 5);
		$show = $Page->show(); // 分页显示输出 show是一个html
		// 连接类别表，左连接
		$list = $model->field('shop_cate.name as catename,shop_goods.*')
		->join('shop_cate on shop_goods.cate_id=shop_cate.id','left')
		->where('shop_goods.status=0')
		->order('shop_goods.shop_order desc')
		->limit($Page->firstRow.','.$Page->listRows)
		->select();
		// select * from shop_goods order by shop_order desc;
		//$list = $model->field('shop_cate.name as catename,shop_goods.*')->join('shop_cate on shop_goods.cate_id=shop_cate.id','left')->order('shop_goods.shop_order desc')->select();
		$this->assign('list', $list);
		$this->assign('page', $show);
		$this->display();
	}

	// 还原
	public function huanyuan($id){
		$model = D('Goods');
		$res = $model->where(array('id'=>$id))->setField('status',1);
		$res ? $this->success('还原成功') : $this->error('还原失败');
	}

	//修改标识
	public function type($id, $type){
		$model = D('Goods');
		$info = $model->find($id);
		$model->id = $id;
		switch ($type) {
			case 'hot':	// 热销
				$model->is_hot = !$info['is_hot'];
				break;

			case 'recommend':	// 推荐
				$model->is_recommend = !$info['is_recommend'];
				break;

			case 'new':	// 新品
				$model->is_new = !$info['is_new'];
				break;
		}
		$model->save() ? $this->success('成功') : $this->error('失败');
	}


}