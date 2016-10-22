<?php
/*
**    知乎API 数据接口
**    提问内容部分
**    @作者 yfgeek
**    @时间 2016-10-22
*/
require_once('Main.php');
class Ask extends Main{
    public function init(){
	    $web_path = "https://www.zhihu.com/people/";
        require_once(ROOT_PATH . '/phpQuery/phpQuery.php');
        phpQuery::newDocumentFile($web_path. $this->username."/asks"); 
    }
    public function getAsks(){
        $q = pq("#zh-profile-ask-list");
        $column = pq($q)->find(".zm-profile-section-item .question_link");
        return parent::getQuestion($column);
    }
    // toString方法 返回 类型、拉取的数量、最后生成json
    function __toString(){
        $this->getAsks();
        $this->detail["type"] = "Ask";
        $this->detail["content"]=$this->arr;
        $this->detail["items"]=$this->itemi;
        //让php支持json中文编码
        return json_encode($this->detail,JSON_UNESCAPED_UNICODE);
    }
}
?>