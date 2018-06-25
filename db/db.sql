	CREATE TABLE `slide` (
 `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增',
 `title` varchar(30) NOT NULL COMMENT '标题',
 `identifying` varchar(32) NOT NULL COMMENT '标识',
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8

	CREATE TABLE `slide_links` (
`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
 `links_name` varchar(25) NOT NULL COMMENT '友情链接名称',
 PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='友情链接表'


	CREATE TABLE `slide_res` (
 `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增',
 `slide_id` int(11) NOT NULL COMMENT '幻灯片id',
 `type` tinyint(2) NOT NULL COMMENT '类型 1cms 2论坛',
 `relations_id` int(11) NOT NULL COMMENT '关联的id',
 `sort` int(11) NOT NULL COMMENT '排序',
 PRIMARY KEY (`id`),
 UNIQUE KEY `slide_id` (`slide_id`,`type`,`relations_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='幻灯片资源'