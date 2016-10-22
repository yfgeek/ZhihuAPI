# 知乎API

专注于特别关注:love_letter:

因为半年前在写程序的时候需要建立一个知乎特别关注的API，但是苦寻网络没有发现相关API，于是决定自己造车，而现在发现有一个基于Node的轮子，又不甘于放弃本轮子，于是就有了现在这个轮子，基于PHP实现。

## 功能
- [x] 获得用户的最新动态(问题点赞,专栏点赞,创建问题,回答问题,创建专栏点赞文章)
- [x] 获得用户的回答列表
- [x] 获得用户的提问列表
- [x] 获得用户信息(姓名,性别,个性签名,地点,正在关注,关注者,获得点赞数,获得感谢数)
- [ ] 获得更多的最新动态
- [ ] 获得用户关注者/正在关注用户列表


## 路由

`index.php` 文件负责显示

| 请求           | 类型           | 值  |
|:------------- |:-------------|:--------|
| $user         | POST/GET | 用户名 |
| $class      | POST/GET      |   请求类  User/Activity |
| $method | POST/GET  |方法 可不写则全部输出 否则按照下面定义的方法输出|

#### 请求样例
```
index.php?user=yfgeek&class=User&method=getFollow
index.php?user=yfgeek&class=Activity
```
## User($username)
用户信息部分
示例代码

```php
require('API/User.php');
$p = new User("yfgeek");
$p->init();
echo $p;
```
返回数据
```javascript
{
    type: "User",
    name: "Ivan",
    gender: "男",
    bio: "求工作/Web前端",
    location: "北京",
    business: "互联网",
    follow: {
        following: "368",
        follower: "134"
    },
    agree: "1322",
    thanks: "238"
}
```
#### getName()

用户姓名

#### getGender()

用户性别 男或女

#### getBio()

个性签名

#### getLocation()

用户位置

#### getBusiness()

用户公司/学校

#### getFollow()

输出一个数组，包含`following`和`follower`

即正在关注 和 关注者

#### getAgree()

获得赞同数

#### getThanks()

获得感谢数

## Activity($username)
特定用户的最新动态部分
示例代码

```php
require('API/Activity.php');
$p = new Activity("yfgeek");
$p->init();
echo $p;
```
返回数据
```javascript
{
    type: "Activity", 
    content: [
        {
            title: "Come on Baby! 你也可以成为Web开发工程师！——Web开发工程师完全成长指南", 
            date: "20 小时前", 
            url: "http://zhuanlan.zhihu.com/p/22978846", 
            status: "赞了 中的文章 ", 
            description: "原文链接：The Practical Guide to Becoming a Professional Web Developer作者：Bill Sourour转载请提前沟通并注明出处！这篇文章是教你如何成为一名专业Web开发工程师的养成指南。我从事Web开发的相关工作已经有20个年头了。在工作中我也很乐于帮助其他开… "
        }, 
        {
            title: "学习JavaScript必读的12本书", 
            date: "3 天前", 
            url: "http://zhuanlan.zhihu.com/p/22914734", 
            status: "赞了 中的文章 ", 
            description: "原文链接：12 Books Every JavaScript Developer Should Read作者：Eric Elliott我巨喜欢读有关JavaScript的书。在学习JS的很长一段时间里，我读了特别多市面上广受欢迎的JavaScript书籍。最近我不再读一些写给菜鸟的书了，但我仍然会翻阅许多写给初阶JS开… "
        }, 
        {
            title: "新浪微博是怎么一步步衰退的？ ", 
            date: "3 小时前", 
            url: "http://www.zhihu.com/question/22361144/answer/28892085", 
            status: "赞同了回答 ", 
            description: "我也来分享一下我的观点吧，首先说说新浪微博成功的主要原因： 1.微博相对开放的舆论环境占领了用户宣泄诉求的市场空白。众所周知的原因，我国网民的这部分需求是被压抑住的，而微博打开了这个口子，形成了井喷。为什么是新浪？因为良好的政府关系，以及多… "
        }, 
        {
            title: "普通程序员如何向人工智能靠拢？ ", 
            date: "3 小时前", 
            url: "http://www.zhihu.com/question/51039416/answer/126717678", 
            status: "赞同了回答 ", 
            description: "说说我学习深度学习的经历吧，从开始学习到现在大概有4个月，只能算新手，刚好可以回答新手问题。 先说编程：自认会用C++， 熟悉Python 英语水平：中等，能很快读懂英文科学文献 最开始对人工智能／深度学习感兴趣是因为想用它试一试自然语言生成，后来想到… "
        }, 
        {
            title: "微博模拟登录如何应对Sina Visitor System？ ", 
            date: "15 小时前", 
            url: "http://www.zhihu.com/question/30619952/answer/103895434", 
            status: "赞同了回答 ", 
            description: "代码地址：GitHub - GannicusLiu/Crawler # 新浪微博模拟登录 ### 登录地址 http://weibo.com/login.php 把该页面的cookie取下来，后面登录发请求的时候需要用到 ### 获取前置登录所需参数 #### 请求地址 http://login.sina.com.cn/sso/prelogin.php?… "
        }, 
        {
            title: "SOA和微服务架构的区别？ ", 
            date: "2 天前", 
            url: "http://www.zhihu.com/question/37808426/answer/93335393", 
            status: "赞同了回答 ", 
            description: "谢多人邀请，其实前面几位的回答已经差不多了，在这里仅谈下自己的简单总结。 微服务架构强调的第一个重点就是业务系统需要彻底的组件化和服务化，原有的单个业务系统会拆分为多个可以独立开发，设计，运行和运维的小应用。这些小应用之间通过服务完成交互… "
        }, 
        {
            title: "厉害的程序员到底用不用 IDE，如果不用，为什么? ", 
            date: "4 天前", 
            url: "http://www.zhihu.com/question/26455783/answer/32848669", 
            status: "赞同了回答 ", 
            description: "不用 IDE 的人也用工具。 IDE 的全称是「集成开发环境」，与「非集成开发环境」相对应。IDE 与其他工具的关键区别在于「集成」，程序员肯定是需要工具的， IDE 把各种工具集成在一起。而非 IDE 的各种工具需要你自己搭配。 这就好像说，你是买一个成品工具… "
        }, 
        {
            title: "厉害的程序员到底用不用 IDE，如果不用，为什么? ", 
            date: "4 天前", 
            url: "http://www.zhihu.com/question/26455783/answer/32845913", 
            status: "赞同了回答 ", 
            description: "记得中学某课程中说过 人区别于动物的重要技能就是创造和使用工具。 与诸君共勉。 "
        }, 
        {
            title: "厉害的程序员到底用不用 IDE，如果不用，为什么? ", 
            date: "4 天前", 
            url: "http://www.zhihu.com/question/26455783/answer/32845625", 
            status: "赞同了回答 ", 
            description: "- 用 Vm/Emacs, 最后结果也是搞成一个IDE - 有人觉得自己做这件事的能力比 Jetbrains/M$/Apple 的专业人士加起来还强 (并不是说没有, 极少 - 写一堆 Bug 满满的插件来实现连 Eclipse 这钟 IDE 在十年前都已经做好的功能, 噢, 有的人连插件都不会写, 是用别… "
        }, 
        {
            title: "厉害的程序员到底用不用 IDE，如果不用，为什么? ", 
            date: "4 天前", 
            url: "http://www.zhihu.com/question/26455783/answer/91966498", 
            status: "赞同了回答 ", 
            description: "到现在这个年代居然还有人纠结工具的问题。我给大家说个事儿。 我爸爸今年55岁，在一个教赛艇的体育学校工作。他们运动员需要用一种专业的拉力器来训练运动员，这个机器可以模拟水上环境，并且测试运动员的输出功率。这样就需要这个机器上有一个传感器能够… "
        }
    ], 
    items: 10
}
```
#### getPostLink()
获取该用户关于专栏的最新动态
#### getPuestionLink()
获取该用户关于问题的最新动态

# 声明

本项目仅用作数据研究学习，不允许用于商业用途

本项目一切数据来源于知乎(http://www.zhihu.com) 

与本人无关
