# 知乎API
这是一个重复造轮子的项目

> 声明
> 
> 本项目仅用作数据研究学习，不允许用于商业用途，本项目一切数据来源于知乎(http://www.zhihu.com) 
> 与本人无关

因为半年前在写程序的时候需要建立一个知乎特别关注的API，但是苦寻网络没有发现相关API，于是决定自己造车，而现在发现有一个基于Node的轮子，又不甘于放弃本轮子，于是就有了现在这个轮子，基于PHP实现。

## Activity($username)
特定用户的最新动态部分
### 返回
```
{
 content: [{title: "学习JavaScript必读的12本书", date: "1 天前", url: "http://zhuanlan.zhihu.com/p/22914734"},…],
 items : 10,
 type : "Activity"
}
```
示例

```
require('API/Activity.class.php');
$p = new Activity("yfgeek");
$p->init();
$p->postLink();
$p->questionLink();
echo $p;
```
### postLink()
获取该用户关于专栏的最新动态
### questionLink()
获取该用户关于问题的最新动态
