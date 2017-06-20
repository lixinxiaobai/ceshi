<?php
namespace Home\Model;
use Think\Model;
use Org\Util\String;

class UserModel extends Model{

	
	// array(验证字段1,验证规则,错误提示,[验证条件,附加规则,验证时间]),
	// 密码一般 数字或者字母或者下划线组合 \w [0-9a-zA-Z_]
	protected $_validate = array(
		array('username', 'require', '用户名必须存在'),
		array('username', '', '用户名必须唯一', 0, 'unique',4),
		array('password', '/^\w{6,}$/','密码必须是数字或者字母或者下划线组合，并且最少6位',0,'regex',4),
		array('repwd','password','重复密码和密码要相同',0,'confirm',4),
		array('email','email','邮箱格式不正确',0,'regex',4),
		array('code', 'checkCode','验证码不正确',0,'callback'),
		array('agree', '1', '必须同意服务条款',1,'equal',4)
	);

	protected function checkCode($value){
		$verify = new \Think\Verify();
		return $verify->check($value);
	}

	// 字段映射
	protected $_map = array(
		'user' => 'username',
		'pwd' => 'password'
	);

	/***
		加密盐怎么用
		正常加密方式是直接使用一个 md5(str)，如果这个字符串(str)  是123456这种简单
		的字符串的话，是容易被破解的 123456  ->  32位的字符串
		加盐加密的话, 盐是一个随机字符串，谁也不知道是什么
		str连接这个盐进行md5加密
		比如说原先的str  就是123456
		盐是随机的字符串 比如是fhkasfg
		md5(123456fhkasfg)
	*/
	// 注册
	public function register(){
		$password = $this->password;
		// 生成盐， 盐是一个随机字符串
		$salt = String::randString();
		$this->password = md5($password.$salt);
		$this->salt = $salt;
		return $this->add();
	}

	// 登陆
	// pIHVqb
	// md5(123456pIHVqb) == b0369fd8ef20c533b177c171cc49584e
	// md5(用户输入的密码pIHVqb) 是否等于 b0369fd8ef20c533b177c171cc49584e
	public function login(){
		$password = $this->password;
		$username = $this->username;
		$info = $this->where(array('username'=>$username))->find();
		if($info){
			if(md5($password.$info['salt']) == $info['password']){
				session('home_user', $info);
				return true;
			}else{
				$this->error = '密码错误';
				return false;
			}
		}else{
			$this->error = '用户名不存在';
			return false;
		}
	}


}