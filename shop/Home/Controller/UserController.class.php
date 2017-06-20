<?php
namespace Home\Controller;
use Home\Controller\CommonController;

class UserController extends CommonController{
	// 登陆
	public function login(){
		if(IS_POST){
			$model = D('User');
			if($model->create()){
				$res = $model->login();
				$res ? $this->success('登陆成功',U('Index/index')) : $this->error($model->getError());
			}else{
				$this->error($model->getError());
			}
		}else{
			$this->display();
		}
	}

	// 注册
	public function register(){
		if(IS_POST){
			$model = D('User');
			if($model->create(I('post.'),4)){
				$res = $model->register();
				$res ? $this->success('注册成功',U('User/login')) : $this->error('注册失败');
			}else{
				$this->error($model->getError());
			}
		}else{
			$this->display();
		}
	}

	// 退出登陆
	public function logout(){
		session('home_user', null);
		$this->success('退出登陆');
	}

	// 验证码
	public function code(){
		$verify = new \Think\Verify();
		$verify->entry();
	}
}