<?php
/*
**    知乎API 数据接口
**    正在关注 和 关注者
**    @作者 yfgeek
**    @时间 2016-10-16
*/
require('Main.php');
class Follow extends Main{
    public $detail;
    // 重写init方法
    public function init(){
	$web_path = "https://www.zhihu.com/people/";
    require_once(ROOT_PATH . '/phpQuery/phpQuery.php');
    phpQuery::newDocumentFile($web_path. $this->username."/followees"); 
    }
    public function getFollowees(){
	 phpQuery::browserGet('http://www.google.com/', 'success1');

    }
    public function getFollower(){

    }
    // toString方法 返回 类型、拉取的数量、最后输出json
    function __toString(){
        //让php支持json中文编码
        return json_encode($this->detail,JSON_UNESCAPED_UNICODE);
    }
}
?>

