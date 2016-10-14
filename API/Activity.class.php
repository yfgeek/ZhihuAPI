<?php
/*
**	知乎API 数据接口
**	特定用户的最新动态部分
**	@作者 yfgeek
**	@时间 2016-10-14
*/
require('Main.class.php');
class Activity extends Main{
	public $username;
	public $detail;
	private $itemi = 0;
	// 构造器
	function Activity($username){
		$this->username = $username;
	}
	// 获得最近专栏点赞信息
	function postLink(){
		$q = pq("#zh-profile-activity-wrap .zm-profile-activity-page-item-main");
		$column = pq($q)->find(".post-link");
		$this->getQuestion($column);
	}
	// 获得最近问题点赞信息
	function questionLink(){
		$q = pq("#zh-profile-activity-wrap .zm-profile-activity-page-item-main");
		$column = pq($q)->find(".question_link");
		$this->getQuestion($column);
	}
	// 专栏问题统一获取平台
	function getQuestion($column){
		if($column){
			foreach ($column as $item) {
				$this->detail["content"][$this->itemi]["title"]= pq($item)->html();
				$this->detail["content"][$this->itemi]["date"] = pq($item)->parent()->prev(".zm-profile-setion-time")->html();
				$this->detail["content"][$this->itemi]["url"]= parent::fixUrl(pq($item)->attr("href")); 
				$this->itemi++;
			}
		}
	}
	//toString方法 返回 类型、拉取的数量、最后输出json
	function __toString(){
		$this->detail["type"] = "Activity";
		$this->detail["items"]=$this->itemi;
		return json_encode($this->detail);
	}
}
?>