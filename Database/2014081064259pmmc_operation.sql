-- 
-- 表的结构 `mc_operation`
-- 
CREATE TABLE `mc_operation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `page` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `type` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `ip` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COMMENT='操作记录';
-- 
-- 导出表中的数据 `mc_operation`
--
INSERT INTO `mc_operation` VALUES ('30','admin','/mao10cms/index.php','系统设置更新成功','127.0.0.1','1406887847');
INSERT INTO `mc_operation` VALUES ('31','admin','/mao10cms/index.php/Admin/Setting/index','系统设置更新成功','127.0.0.1','1406888024');
INSERT INTO `mc_operation` VALUES ('32','admin','/mao10cms/index.php/Admin/Setting/email','stmp邮箱设置更新成功','127.0.0.1','1406889516');
