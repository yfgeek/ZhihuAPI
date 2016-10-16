<?php
/*
**	知乎API 数据接口demo
**	这是一个重复造轮子的项目
**	因为初期在写程序的时候需要建立一个知乎特别关注的API，但是苦寻网络没有发现相关API，于是决定自己造车，而现在发现有一个基于Node的轮子，又不甘于放弃本轮子，于是就有了现在这个轮子，基于PHP实现。
**	声明！本项目仅用作数据研究学习，不允许用于商业用途，本项目一切数据来源于知乎(http://www.zhihu.com)，与本人无关
**	@作者 yfgeek
**	@时间 2016-10-14
*/
require('API/Activity.php');
$p = new Activity("yfgeek");
$p->init();
echo $p;

// require('API/User.class.php');
// $p = new User("yfgeek");
// $p->init();
// echo $p;

?>