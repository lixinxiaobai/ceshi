<?php
namespace Admin\Controller;
use Think\Controller as ThinkController;

class Controller extends ThinkController{

	// 构造函数
	public function __construct(){
		parent::__construct();
		if(!session('?user')){
			$this->redirect('Login/index');
		}
	}
}

