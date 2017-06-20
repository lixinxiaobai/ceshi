<?php
namespace Admin\Model;
use Think\Model;

class AdminModel extends Model{
	//array(验证字段1,验证规则,错误提示,[验证条件,附加规则,验证时间]),
	protected $_validate = array(
		array('username','require','账号不能为空'),
		array('password','require','密码不能为空'),
		array('code', 'checkCode', '验证码不正确',1,'callback')
	);

	public function checkCode($value){
		$verify = new \Think\Verify();
		return $verify->check($value);
	}

	// 验证账号是否存在
	public function checkUser(){
		$where = array('username' => $this->username, 'password' => md5($this->password));
		$res = $this->where($where)->find();
		return $res;
	}
}