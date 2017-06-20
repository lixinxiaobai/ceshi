<?php
namespace Admin\Controller;
use Think\Controller;

class LoginController extends Controller{

	public function index(){
		if(IS_POST){
			$model = D('Admin');
			if($model->create(I('post.'))){
				if($user = $model->checkUser()){
					unset($user['password']);
					session('user', $user);
					$this->redirect('Index/index');
				}else{
					$this->error('账号密码错误');
				}
			}else{
				$this->error($model->getError());
			}
		}else{
			$this->display();
		}
	}


	public function verify(){
		$verify = new \Think\Verify(array(
			'length' => 4,
			'fontSize' => 30
			));
		$verify->entry();
	}

	public function logout(){
		session('[destroy]'); // 清除session
		$this->success('退出登陆',U('Index/index'));
	}
}