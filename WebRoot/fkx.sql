

CREATE TABLE `users` (
	  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
	  `pid` int(11) DEFAULT 0 COMMENT '����ID',
	  `phone` varchar(15) COMMENT '�ֻ���',
	  `balance` int(11) DEFAULT 0 COMMENT '���',
	  `blank` varchar(255) COMMENT '���п�',
	  `user_name` varchar(255) COMMENT '�û���',
	  `pic` varchar(255) COMMENT 'ͷ��',
	  `amount` int(11) COMMENT '�ۼ�Ӷ��',
	  `password` varchar(255) DEFAULT NULL COMMENT '��������',
	  `random` varchar(6) DEFAULT NULL COMMENT '�����',
	  `wechat` varchar(80) DEFAULT NULL COMMENT '�ͻ�΢�ź�',
	  `openid` varchar(255),
	  `unionid` varchar(255),
	  `status` tinyint(1) DEFAULT '0' COMMENT '0����1����',
	  `is_del` tinyint(1) DEFAULT '0' COMMENT '��¼״̬',
	  `created_at` int(11) COMMENT 'ע��ʱ��',
	  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='�ͻ���Ϣ��';

CREATE TABLE `loupan` (
	  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
	  `title` varchar(15) DEFAULT 0 COMMENT '����',
	  `des` text COMMENT '����',
	  `jianjie` text COMMENT '���',
	  `price` int(11) COMMENT '�۸�',
	  `jiage_id` int(11) COMMENT '�ܼ�����',
	  `huxing_id` int(11) COMMENT '����',
	  `zxiu_id` int(11) COMMENT 'װ��',
	  `type_id` int(11) COMMENT '����',
	  `city_id` int(11) COMMENT '����ID',
	  `area_id` int(11) COMMENT '����ID',
	  `prices` int(11) COMMENT 'Ӷ��۸�',
	  `pic` varchar(255) DEFAULT NULL COMMENT 'ͼƬ',
	  `address` varchar(255),
	  `status` tinyint(1) DEFAULT '0' COMMENT '0����1����',
	  `is_del` tinyint(1) DEFAULT '0' COMMENT '��¼״̬',
	  `created_at` int(11) COMMENT '���ʱ��',
	  `add_at` int(11) COMMENT '����ʱ��',
	  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='¥�̱�';

CREATE TABLE `zxiu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `zxiu_name` varchar(30) DEFAULT NULL,
  `is_del` tinyint(1) DEFAULT '0',
  `sort` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='װ�ޱ�';

CREATE TABLE `types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(30) DEFAULT NULL,
  `is_del` tinyint(1) DEFAULT '0',
  `sort` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='���ͱ�';


CREATE TABLE `huxing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `huxing_name` varchar(30) DEFAULT NULL,
  `is_del` tinyint(1) DEFAULT '0',
  `sort` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='���ͱ�';

CREATE TABLE `jiage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jiage_name` varchar(30) DEFAULT NULL,
  `is_del` tinyint(1) DEFAULT '0',
  `sort` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='�۸������';

CREATE TABLE `citys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11),
  `city_name` VARCHAR(30),
  `is_del` tinyint(1) DEFAULT '0',
  `sort` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='�����б�';

CREATE TABLE `zhuli` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `loupan_id` int(11),
  `zhuli_name` VARCHAR(30),
  `pic` varchar(255),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='��������';

CREATE TABLE `commission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `loupan_id` int(11),
  `contents` text,
  `des` varchar(255),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Ӷ�����';

CREATE TABLE `cooperation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `loupan_id` int(11),
  `contents` text,
  `des` varchar(255),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='��������';

CREATE TABLE `report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11),
  `loupan_id` int(11),
  `nick_name` varchar(30),
  `phone` varchar(15),
  `sex` tinyint(1) COMMENT='1Ů2��',
  `node` varchar(255),
  `zhiye` tinyint(1) COMMENT='1Ͷ�ʣ�2��ס��3Ͷ�ʼ���ס',
  `huxing` tinyint(1) COMMENT='1һ����2������3������4�ķ���5��',
  `status` tinyint(1) default 1 COMMENT='1������2�ɽ���3ʧЧ',
  `created_at` int(11),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='�ͻ�����';

CREATE TABLE `followup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `report_id` int(11),
  `contents` varchar(255),
  `created_at` int(11),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='����������';