<?php
namespace Admin\Controller;
use Admin\Controller\Controller;
class CateController extends Controller {

	// 分类管理首页 
    public function index(){
    	// 视图文件位置： View/Cate/index.html
        // select 进行查询
        $model = D('Cate');
        $list =  $model->getTreeData();
        // var_dump($list);
        $this->assign('list', $list);
    	$this->display(); // 引用视图
    }

    // 添加分类的方法 
    public function add(){
        // var_dump($_POST);
        if(IS_POST){ // IS_POST 来判断是否为post请求
            $model = D('Cate');
            /*array(4) { 
                ["name"]=> string(6) "服装" 
                ["parent_id"]=> string(1) "0" 
                ["remark"]=> string(27) "这是一个衣服的分类" 
                ["shop_order"]=> string(1) "1" }
            */
            $res = $model->create(I('post.')); // 自动填充数据并验证
            if(!$res){
                $error = $model->getError(); // 获取错误信息
                $this->error($error);
            }else{
                $res = $model->add(); // I('post.') 获取所有的post信息
                if($res){
                    $this->success('新增成功', U('Cate/index'));
                }else{
                    $this->error('新增失败');
                }
            }
            // 有post数据再进行插入
        }else{
        	// 视图文件位置： View/Cate/add.html
            $model = D('Cate');
            $list = $model->getTreeData();
            $this->assign('list', $list);
        	$this->display();
        }
    }

    // 修改分类
    public function edit($id){
        // $id = I('get.id'); // 先获取到get传过来的id
        // 首先先查询到这个id的记录内容
        // 第一种find查询
        $model = D('Cate');
        if(IS_POST){
            $res = $model->create(I('post.')); // 自动填充数据并验证
            if(!$res){
                $error = $model->getError(); // 获取错误信息
                $this->error($error);
            }else{
                $res = $model->save();
                $res ? $this->success('修改成功',U('Cate/index')):$this->error('修改失败');
            }
        }else{
            $info = $model->where(array("id"=>$id))->find();
            // View/Cate/edit.html
            $list = $model->getTreeData();
            $this->assign('list', $list);
            $this->assign('info', $info);
            $this->display(); // 引入视图
        }
    }

    // 删除分类
    public function delete($id){
        D('Cate')->delete($id) ? $this->success('删除成功') : $this->error('删除失败');
    }
}