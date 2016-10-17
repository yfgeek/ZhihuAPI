<?php
/*
**    知乎API 数据接口
**    特定用户的最新动态部分
**    @作者 yfgeek
**    @时间 2016-10-14
*/
require('Main.php');
class Activity extends Main{
    public $detail;
    private $itemi = 0;
    public $arr;
    // 获得最近专栏点赞信息
    public function getPostLink(){
        $q = pq("#zh-profile-activity-wrap .zm-profile-activity-page-item-main");
        $column = pq($q)->find(".post-link");
        return $this->getQuestion($column);
    }
    public function getTest(){
        return parent::fixSpaces(" 1");
    }
    // 获得最近问题点赞信息
    public function getQuestionLink(){
        $q = pq("#zh-profile-activity-wrap .zm-profile-activity-page-item-main");
        $column = pq($q)->find(".question_link");
        return $this->getQuestion($column);
    }
    // 专栏问题统一获取平台
    private function getQuestion($column){
        if($column){
            foreach ($column as $item) {
                $this->arr[$this->itemi]["title"]= parent::fixSpaces(pq($item)->html());
                $this->arr[$this->itemi]["date"] = parent::fixSpaces(pq($item)->parent()->prev(".zm-profile-setion-time")->html());
                $this->arr[$this->itemi]["url"]= parent::fixUrl(pq($item)->attr("href")); 
                pq($item)->parent()->find("a")->html(""); //删掉链接
                $this->arr[$this->itemi]["status"] = parent::fixSpaces(pq($item)->parent()->text());
                pq($item)->parent()->parent()->find(".zh-summary")->find(".toggle-expand")->html(""); // 删掉阅读全文
                $this->arr[$this->itemi]["description"] = parent::fixSpaces(pq($item)->parent()->parent()->find(".zh-summary")->text());
                $this->itemi++;
            }
        }
        return $this->arr;
    }
    //toString方法 返回 类型、拉取的数量、最后生成json
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