<?php
// 判断是否是首页
function is_home(){
	if(CONTROLLER_NAME == 'Index' && ACTION_NAME == 'index'){
		return true;
	}else{
		return false;
	}
}

// 判断是否登陆
function is_login(){
	return session('?home_user');
}