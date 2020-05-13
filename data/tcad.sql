--
-- 表的结构 `cmf_tcad`
--

CREATE TABLE IF NOT EXISTS `cmf_plugin_tcad` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL default '0' COMMENT '用户id',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '状态,1:显示,0不显示',
  `delete_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '删除时间',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `start_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '广告开始时间',
  `end_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '广告结束时间',
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '广告名称',
  `content` text COMMENT '广告内容',
  `remark` varchar(255) NOT NULL DEFAULT '' COMMENT '广告备注',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='自定义广告表';
