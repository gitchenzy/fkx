

CREATE TABLE `users` (
	  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
	  `pid` int(11) DEFAULT 0 COMMENT '父级ID',
	  `phone` varchar(15) COMMENT '手机号',
	  `balance` int(11) DEFAULT 0 COMMENT '余额',
	  `blank` varchar(255) COMMENT '银行卡',
	  `user_name` varchar(255) COMMENT '用户名',
	  `pic` varchar(255) COMMENT '头像',
	  `amount` int(11) COMMENT '累计佣金',
	  `password` varchar(255) DEFAULT NULL COMMENT '密码密码',
	  `random` varchar(6) DEFAULT NULL COMMENT '随机数',
	  `wechat` varchar(80) DEFAULT NULL COMMENT '客户微信号',
	  `openid` varchar(255),
	  `unionid` varchar(255),
	  `status` tinyint(1) DEFAULT '0' COMMENT '0正常1锁定',
	  `is_del` tinyint(1) DEFAULT '0' COMMENT '记录状态',
	  `created_at` int(11) COMMENT '注册时间',
	  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='客户信息表';

CREATE TABLE `loupan` (
	  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
	  `title` varchar(15) DEFAULT 0 COMMENT '标题',
	  `des` text COMMENT '详情',
	  `jianjie` text COMMENT '简介',
	  `price` int(11) COMMENT '价格',
	  `jiage_id` int(11) COMMENT '总价区间',
	  `huxing_id` int(11) COMMENT '户型',
	  `zxiu_id` int(11) COMMENT '装修',
	  `type_id` int(11) COMMENT '类型',
	  `city_id` int(11) COMMENT '城市ID',
	  `area_id` int(11) COMMENT '区域ID',
	  `prices` int(11) COMMENT '佣金价格',
	  `pic` varchar(255) DEFAULT NULL COMMENT '图片',
	  `address` varchar(255),
	  `status` tinyint(1) DEFAULT '0' COMMENT '0正常1锁定',
	  `is_del` tinyint(1) DEFAULT '0' COMMENT '记录状态',
	  `created_at` int(11) COMMENT '添加时间',
	  `add_at` int(11) COMMENT '上市时间',
	  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='楼盘表';

CREATE TABLE `zxiu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `zxiu_name` varchar(30) DEFAULT NULL,
  `is_del` tinyint(1) DEFAULT '0',
  `sort` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='装修表';

CREATE TABLE `types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(30) DEFAULT NULL,
  `is_del` tinyint(1) DEFAULT '0',
  `sort` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='类型表';


CREATE TABLE `huxing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `huxing_name` varchar(30) DEFAULT NULL,
  `is_del` tinyint(1) DEFAULT '0',
  `sort` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='户型表';

CREATE TABLE `jiage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jiage_name` varchar(30) DEFAULT NULL,
  `is_del` tinyint(1) DEFAULT '0',
  `sort` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='价格区间表';

CREATE TABLE `citys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11),
  `city_name` VARCHAR(30),
  `is_del` tinyint(1) DEFAULT '0',
  `sort` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='城市列表';

CREATE TABLE `zhuli` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `loupan_id` int(11),
  `zhuli_name` VARCHAR(30),
  `pic` varchar(255),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='主力户型';

CREATE TABLE `commission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `loupan_id` int(11),
  `contents` text,
  `des` varchar(255),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='佣金规则';

CREATE TABLE `cooperation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `loupan_id` int(11),
  `contents` text,
  `des` varchar(255),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='合作规则';

CREATE TABLE `report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11),
  `loupan_id` int(11),
  `nick_name` varchar(30),
  `phone` varchar(15),
  `sex` tinyint(1) COMMENT='1女2男',
  `node` varchar(255),
  `zhiye` tinyint(1) COMMENT='1投资，2自住，3投资兼自住',
  `huxing` tinyint(1) COMMENT='1一房，2二房，3三方，4四房，5房',
  `status` tinyint(1) default 1 COMMENT='1跟进，2成交，3失效',
  `created_at` int(11),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='客户报备';

CREATE TABLE `followup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `report_id` int(11),
  `contents` varchar(255),
  `created_at` int(11),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='报备跟进表';