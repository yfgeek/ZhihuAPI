<?php
/*
**	知乎API 数据接口
**	用户信息部分
**	@作者 yfgeek
**	@时间 2016-10-14
*/
require('Main.class.php');
class User extends Main{
	public $detail;
	// 获取名字
	public function getName(){
		$q = pq(".title-section .name")->html();
        return $q;
	}
    // 获取个性签名
    public function getBio(){
		$q = pq(".title-section .bio")->html();
        return $q; 
    }
    // 获取地点
    public function getLocation(){
		$q = pq(".info-wrap .location")->find("a")->html();
        return $q; 
    }
    // 获取领域
    public function getBusiness(){
		$q = pq(".info-wrap .business")->find("a")->html();
        return $q; 
    }
    // 获取性别
    public function getGender(){
		$q = pq(".info-wrap .gender")->find("i")->attr("class");
        return $this->__fixGender($q); 
    }
    // 获取关注和粉丝
    public function getFollow(){
        $i =0;
		$q = pq(".zm-profile-side-following .item")->find("strong");
        foreach ($q as $item) {
				$arr[$i] = pq($item)->html();
                $i++;
		}
        return array("following" =>$arr[0], "follower"=>$arr[1]); 
    }
    // 获得赞同
    public function getAgree(){
		$q = pq(".zm-profile-header-user-agree")->find("strong")->html();
        return $q; 
    }
    // 获得感谢
    public function getThanks(){
		$q = pq(".zm-profile-header-user-thanks")->find("strong")->html();
        return $q; 
    }
    // 将性别显示男或女
    private function __fixGender($classname){
        if(stristr($classname,"female")){
            return "女";
        }else{
            return "男";
        }
    }
	// toString方法 返回 类型、拉取的数量、最后输出json
	function __toString(){
		$this->detail["type"] = "User";
        $this->detail["name"] = $this->getName();
        $this->detail["gender"] = $this->getGender();
        $this->detail["bio"] = $this->getBio();
        $this->detail["location"] = $this->getLocation();
        $this->detail["business"] = $this->getBusiness();
        $this->detail["follow"] = $this->getFollow();   
        $this->detail["agree"] = $this->getAgree(); 
        $this->detail["thanks"] = $this->getThanks();  
		return json_encode($this->detail);
	}
}
?>