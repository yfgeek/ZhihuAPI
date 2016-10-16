<?php
/*
**	知乎API 数据接口
**	正在关注 和 关注者
**	@作者 yfgeek
**	@时间 2016-10-16
*/
require('Main.class.php');
class Follow extends Main{
	public $detail;
    // 重写init方法
    public function init(){
    define('ROOT_PATH',dirname(__FILE__));
	define('WEB_PATH','https://www.zhihu.com/people/');
	require_once(ROOT_PATH . './../phpQuery/phpQuery.php');
	phpQuery::newDocumentFile(WEB_PATH. $this->username."/followees"); 
    }
	public function getFollowees(){
		return 3;
	}
	// toString方法 返回 类型、拉取的数量、最后输出json
	function __toString(){
		return json_encode($this->detail);
	}
}
?>