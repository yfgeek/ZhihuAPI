<?php
/*
**    知乎API 数据接口
**    特定用户的最新动态部分
**    @作者 yfgeek
**    @时间 2016-10-14
*/
require_once('Main.php');
class Activity extends Main{
    // 获得最近专栏点赞信息
    public function getPostLink(){
        $q = pq("#zh-profile-activity-wrap .zm-profile-activity-page-item-main");
        $column = pq($q)->find(".post-link");
        return $this->getQuestion($column);
    }
    // 获得最近问题点赞信息
    public function getQuestionLink(){
        $q = pq("#zh-profile-activity-wrap .zm-profile-activity-page-item-main");
        $column = pq($q)->find(".question_link");
        return $this->getQuestion($column);
    }
    // toString方法 返回 类型、拉取的数量、最后生成json
    function __toString(){
        $this->detail["type"] = "Activity";
        $this->getPostLink();
        $this->getQuestionLink();
        $this->detail["content"]=$this->arr;
        $this->detail["items"]=$this->itemi;
        //让php支持json中文编码
        return json_encode($this->detail,JSON_UNESCAPED_UNICODE);
    }
}
?>