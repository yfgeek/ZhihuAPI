<?php
/*
**    知乎API 数据接口
**    这是一个重复造轮子的项目
**    因为初期在写程序的时候需要建立一个知乎特别关注的API，但是苦寻网络没有发现相关API，于是决定自己造车，而现在发现有一个基于Node的轮子，又不甘于放弃本轮子，于是就有了现在这个轮子，基于PHP实现。
**    声明！本项目仅用作数据研究学习，不允许用于商业用途，本项目一切数据来源于知乎(http://www.zhihu.com)，与本人无关
**    @作者 yfgeek
**    @时间 2016-10-14
*/
class Main {
    //构造器
    function Main($username){
        $this->username = $username;
    }
    // 初始化 加载phpquery类
    public function init(){
	$web_path = "https://www.zhihu.com/people/";
    require_once(ROOT_PATH . '/phpQuery/phpQuery.php');
    phpQuery::newDocumentFile($web_path. $this->username); 
    }
    // 修正Url
    protected function fixUrl($url){
    if($url[0]=='/'){
        return "http://www.zhihu.com".$url;
    }
    else return $url;
    }
    // 删除多余空格 回车
    protected function fixSpaces($str){
        //fix bug我的账号会报 Uninitialized string offset: 0的错误
        while(!empty($str[0])&&($str[0]==" " || $str[0]=="　" || $str[0]=="\n")){
            $str = substr($str,1);
        }
        return $str;
    }
    // 销毁phpQuery
    function __destruct() {
       phpQuery::unloadDocuments();
    } 
}
?>


