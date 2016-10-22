<?php
/*
**    知乎API 数据接口
**    回答内容部分
**    @作者 yfgeek
**    @时间 2016-10-22
*/
require_once('Main.php');
class Answer extends Main{
    // private $page =1 ;
    public function init(){
        $page = isset($_REQUEST['page']) ? $_REQUEST['page'] : "1";
        $orderby = isset($_REQUEST['orderby']) ? $_REQUEST['orderby'] : "vote_num";
	    $web_path = "https://www.zhihu.com/people/";
        require_once(ROOT_PATH . '/phpQuery/phpQuery.php');
        phpQuery::newDocumentFile($web_path. $this->username."/answers?page=".$page."&order_by=".$orderby); 
    }
    public function getAnswers(){
        $q = pq("#zh-profile-answer-list");
        $column = pq($q)->find(".zm-item .question_link");
        return parent::getQuestion($column);
    }
    public function getPages(){
        $q = pq(".zm-invite-pager span:last");
        $column = pq($q)->prev()->text();
        $this->detail["pages"]=$column;
        return $column;

    }
    // toString方法 返回 类型、拉取的数量、最后生成json
    function __toString(){
        $this->init();
        $this->detail["type"] = "Answer";
        // $this->datail["page"] = $page;
        $this->getAnswers();
        $this->getPages();
        $this->detail["content"]=$this->arr;
        $this->detail["items"]=$this->itemi;
        //让php支持json中文编码
        return json_encode($this->detail,JSON_UNESCAPED_UNICODE);
    }
}
?>