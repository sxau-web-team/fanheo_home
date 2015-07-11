-- 
-- 表的结构 `mc_userlog`
-- 
CREATE TABLE `mc_userlog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `actionname` varchar(40) NOT NULL,
  `page` varchar(100) NOT NULL,
  `time` int(11) NOT NULL,
  `ip` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COMMENT='用户操作表';
-- 
-- 导出表中的数据 `mc_userlog`
--
INSERT INTO `mc_userlog` VALUES ('1','1','会员注册成功','/fanheo/index.php/Logo/addreg','1405385381','127.0.0.1');
INSERT INTO `mc_userlog` VALUES ('2','1','会员登陆','/fanheo/index.php/Logo/loging','1405385415','127.0.0.1');
INSERT INTO `mc_userlog` VALUES ('3','0','会员登陆','/fanheo/index.php/Home/Login/Login','1405589864','127.0.0.1');
INSERT INTO `mc_userlog` VALUES ('4','0','会员登陆','/FanHeo/index.php/Home/Login/Login','1405590032','127.0.0.1');
INSERT INTO `mc_userlog` VALUES ('5','9','会员登陆','/fanheo/index.php/Home/Login/Login','1405590329','127.0.0.1');
INSERT INTO `mc_userlog` VALUES ('6','guodong','会员注册成功','/mao10cms/index.php','1407062808','127.0.0.1');
INSERT INTO `mc_userlog` VALUES ('7','adminadmin','会员注册成功','/fanheo/index.php/Logo/addreg','1405385381','127.0.0.1');
INSERT INTO `mc_userlog` VALUES ('8','adminadmin2','会员注册成功','/fanheo/index.php/Logo/addreg','1405385381','127.0.0.1');
INSERT INTO `mc_userlog` VALUES ('9','adminadmin2','会员注册成功','/fanheo/index.php/Logo/addreg','1405385381','127.0.0.1');
INSERT INTO `mc_userlog` VALUES ('10','adminadmin2','会员注册成功','/fanheo/index.php/Logo/addreg','1405385381','127.0.0.1');
INSERT INTO `mc_userlog` VALUES ('11','adminadmin2','会员注册成功','/fanheo/index.php/Logo/addreg','1405385381','127.0.0.1');
INSERT INTO `mc_userlog` VALUES ('12','adminadmin2','会员注册成功','/fanheo/index.php/Logo/addreg','1405385381','127.0.0.1');
INSERT INTO `mc_userlog` VALUES ('13','adminadmin2','会员注册成功','/fanheo/index.php/Logo/addreg','1405385381','127.0.0.1');
INSERT INTO `mc_userlog` VALUES ('14','adminadmin2','会员注册成功','/fanheo/index.php/Logo/addreg','1405385381','127.0.0.1');
INSERT INTO `mc_userlog` VALUES ('15','adminadmin2','会员注册成功','/fanheo/index.php/Logo/addreg','1405385381','127.0.0.1');
INSERT INTO `mc_userlog` VALUES ('16','adminadmin2','会员注册成功','/fanheo/index.php/Logo/addreg','1405385381','127.0.0.1');
INSERT INTO `mc_userlog` VALUES ('17','adminadmin2','会员注册成功','/fanheo/index.php/Logo/addreg','1405385381','127.0.0.1');
INSERT INTO `mc_userlog` VALUES ('18','adminadmin2','会员注册成功','/fanheo/index.php/Logo/addreg','1405385381','127.0.0.1');
