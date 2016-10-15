<?php
/*
**	知乎API 数据接口路由
**	这是一个重复造轮子的项目
**	因为初期在写程序的时候需要建立一个知乎特别关注的API，但是苦寻网络没有发现相关API，于是决定自己造车，而现在发现有一个基于Node的轮子，又不甘于放弃本轮子，于是就有了现在这个轮子，基于PHP实现。
**	声明！本项目仅用作数据研究学习，不允许用于商业用途，本项目一切数据来源于知乎(http://www.zhihu.com)，与本人无关
**	@作者 yfgeek
**	@时间 2016-10-15
*/

/*
**	这个路有些的很简单，由三部分组成
**	$user 用户名
**	$action 表示行为
**	$do 表示获取内容 如果是list则全部输出 否则按照内容输出
**  请求样例：index.php?user=yfgeek&action=user&do=getFollow
*/

$user = isset($_REQUEST['user'])?$_REQUEST['user']:1;
$action = isset($_REQUEST['action'])?$_REQUEST['action']:2;
$do = isset($_REQUEST['do'])?$_REQUEST['do']:3;
if($action == "activity"){
    require_once('API/Activity.class.php');
    $p = new Activity($user);
    $p->init();
    if ($do=="list"){
        echo $p;
    }else{
        echo json_encode($p->$do());
    }
}else if($action == "user"){
    require_once('API/User.class.php');
    $p = new User($user);
    $p->init();
    if ($do=="list"){
        echo $p;
    }else{
        echo json_encode($p->$do());
    }
}

?>