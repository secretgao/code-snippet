sql

CREATE TABLE `chat_log` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `rec` varchar(10) NOT NULL DEFAULT '0',
  `sender` varchar(10) NOT NULL DEFAULT '0',
  `content` text,
  `is_new` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`log_id`)
) ENGINE=MyISAM AUTO_INCREMENT=75 DEFAULT CHARSET=utf8;


在浏览器分别运行 server.php 和client.php 就能发起聊天了
