<?php
/*
**    知乎API 数据接口路由
**    这是一个重复造轮子的项目
**    因为初期在写程序的时候需要建立一个知乎特别关注的API，但是苦寻网络没有发现相关API，于是决定自己造车，而现在发现有一个基于Node的轮子，又不甘于放弃本轮子，于是就有了现在这个轮子，基于PHP实现。
** 
**    声明！本项目仅用作数据研究学习，不允许用于商业用途，本项目一切数据来源于知乎(http://www.zhihu.com)，与本人无关
**    @作者 yfgeek
**    @时间 2016-10-15
*/

/*
**    这个路有些的很简单，由三部分组成
**    $user 用户名
**    $class 使用的API的类
**    $method 获取内容 如果是list则全部输出 否则按照内容输出
**  请求样例：index.php?user=yfgeek&class=user&method=getFollow
**  method方法可省略
*/

// 模糊匹配 class
function fuzz_maching($str){
    $str = strtolower($str);
    $str[0] = strtoupper($str);
    return $str;
}
// 加载类
function load_class($class)
{
    define('ROOT_PATH',dirname(__FILE__));
    $filename = ROOT_PATH. '/API/' . $class . '.php';
    if(file_exists($filename)){
     require_once($filename);
    } 
}

$user = isset($_REQUEST['user']) ? $_REQUEST['user'] : "";
$class = isset($_REQUEST['class']) ? fuzz_maching($_REQUEST['class']) : "";
$method = isset($_REQUEST['method']) ? $_REQUEST['method'] : "list";
$filename = 'API/' . $class . '.php';
try{
if ($user && $class && $method) { // 当请求非空时
        // 判断API类文件是否存在
        try{
        if (file_exists($filename)){        
            if(spl_autoload_register('load_class')){
            $p = new $class($user); 
            $p->init(); 
            if ($method == "list") {
                echo $p;
            } else {
                try {
                    if (method_exists($p, $method)) {   // 检测是否存在这个方法
                        echo json_encode($p->$method()); // json encode 请求的方法

                    } else {
                        throw new Exception('API method is not exist');
                    }
                }
                catch(Exception $e) {
                    echo json_encode(array("status"=>"fail","error"=>$e->getMessage()));
                }
            }
        }
        }else{
            throw new Exception('API is not exist');
        }
        }catch(Exception $e) {
             echo json_encode(array("status"=>"fail","error"=>$e->getMessage()));
            }
}else {
    throw new Exception('Request error');
}
}catch(Exception $e) {
    echo json_encode(array("status"=>"fail","error"=>$e->getMessage()));
}
?>