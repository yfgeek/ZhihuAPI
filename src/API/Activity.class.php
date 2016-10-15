<?php
/*
**	知乎API 数据接口
**	特定用户的最新动态部分
**	@作者 yfgeek
**	@时间 2016-10-14
*/
require('Main.class.php');
class Activity extends Main{
	public $detail;
	private $itemi = 0;
	public $arr;
	// 获得最近专栏点赞信息
	function getPostLink(){
		$q = pq("#zh-profile-activity-wrap .zm-profile-activity-page-item-main");
		$column = pq($q)->find(".post-link");
		return $this->getQuestion($column);
	}
	// 获得最近问题点赞信息
	function getQuestionLink(){
		$q = pq("#zh-profile-activity-wrap .zm-profile-activity-page-item-main");
		$column = pq($q)->find(".question_link");
		return $this->getQuestion($column);
	}
	// 专栏问题统一获取平台
	function getQuestion($column){
		if($column){
			foreach ($column as $item) {
				$this->arr[$this->itemi]["title"]= pq($item)->html();
				$this->arr[$this->itemi]["date"] = pq($item)->parent()->prev(".zm-profile-setion-time")->html();
				$this->arr[$this->itemi]["url"]= parent::fixUrl(pq($item)->attr("href")); 
				$this->itemi++;
			}
		}
		return $this->arr;
	}
	//toString方法 返回 类型、拉取的数量、最后生成json
	function __toString(){
		$this->detail["type"] = "Activity";
		$this->detail["items"]=$this->itemi;
		$this->getPostLink();
		$this->getQuestionLink();
		$this->detail["content"]=$this->arr;
		return json_encode($this->detail);
	}
}
?>