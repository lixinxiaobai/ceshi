-- 创建分类表
create table shop_cate(
	id int primary key auto_increment,
	name varchar(20) not null comment '类别名称',
	remark varchar(255) comment '类别描述',
	parent_id int not null comment '父级分类',
	shop_order int not null comment '排序'
)charset=utf8;


-- 创建商品表 default
create table shop_goods(
	id int primary key auto_increment,
	name varchar(50) not null comment '商品名称',
	sn char(10) not null comment '货号',
	detail text comment '商品详情',
	remark varchar(255) comment '商品描述',
	price decimal(10,2) comment '商品价格',
	goods_img varchar(255) comment '商品图片',
	thumb_img varchar(255) comment '商品缩略图',
	number int comment '商品数量',
	type tinyint comment '商品标识',
	cate_id int not null comment '商品分类',
	shop_order int not null comment '排序',
	status tinyint not null default 1 comment '商品状态1正常，0删除',
	create_time int comment '商品创建时间'
)charset=utf8;

-- 登陆
create table shop_admin(
	id int primary key auto_increment,
	username varchar(50) comment '用户名',
	password char(32) comment '密码',
	login_time int comment '最后登陆时间',
	login_ip varchar(17) comment '最后登陆IP'
)charset=utf8;

-- 用户表 加盐的方式进行加密
create table shop_user(
	id int primary key auto_increment,
	username varchar(50) comment '用户名',
	password char(32) comment '密码',
	salt char(6) comment '盐，其实是一个随机字符串',
	email varchar(100) comment '邮箱'
)charset=utf8;