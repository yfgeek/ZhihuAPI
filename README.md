# 知乎API

专注于特别关注:love_letter:

因为半年前在写程序的时候需要建立一个知乎特别关注的API，但是苦寻网络没有发现相关API，于是决定自己造车，而现在发现有一个基于Node的轮子，又不甘于放弃本轮子，于是就有了现在这个轮子，基于PHP实现。

## 功能
- [x] 获得用户的最新动态(问题点赞,专栏点赞,创建问题,回答问题,创建专栏点赞文章)
- [x] 获得用户的回答列表(回答问题,问题页数)
- [x] 获得用户的提问列表(提问问题)
- [x] 获得用户信息(姓名,性别,个性签名,地点,正在关注,关注者,获得点赞数,获得感谢数)
- [ ] 获得更多的最新动态
- [ ] 获得用户关注者/正在关注用户列表


## 路由

`index.php` 文件负责显示

| 请求           | 类型           | 值  |
|:------------- |:-------------|:--------|
| $user         | POST/GET | 用户名 |
| $class      | POST/GET      |   请求类   |
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

## Ask($username)

用户提过的问题

返回数据
```javascript
{
    "type": "Ask",
    "content": [
        {
            "title": "有什么有意思的大学名称缩写？ ",
            "date": "",
            "url": "http://www.zhihu.com/question/40430730",
            "status": false,
            "description": ""
        },
        {
            "title": "你在使用终端时发生了什么趣事？ ",
            "date": "",
            "url": "http://www.zhihu.com/question/35350053",
            "status": false,
            "description": ""
        },
        {
            "title": "北京地铁白石桥南站的墙壁什么意思？ ",
            "date": "",
            "url": "http://www.zhihu.com/question/34908245",
            "status": false,
            "description": ""
        },
        {
            "title": "你会怎么写2015年天津高考作文《范儿》？ ",
            "date": "",
            "url": "http://www.zhihu.com/question/31040988",
            "status": false,
            "description": ""
        },
        {
            "title": "数据库被恶意修改或删除如何恢复数据？ ",
            "date": "",
            "url": "http://www.zhihu.com/question/30767299",
            "status": false,
            "description": ""
        }
    ],
    "items": 5
}

```

### getAsks()
获取该用户提过的问题

## Answer($username,$page,$orderby)

返回数据

```javascript
{
    "type": "Answer",
    "pages": "3",
    "content": [
        {
            "title": "电影或电视剧中有哪些常识错误？ ",
            "date": "",
            "url": "http://www.zhihu.com/question/25524218/answer/31217880",
            "status": "",
            "description": "＜同桌的你＞ "
        },
        {
            "title": "如何评价 Windows 10 技术预览版 ？ ",
            "date": "",
            "url": "http://www.zhihu.com/question/25649710/answer/31290349",
            "status": "",
            "description": "多图，慎点 写在前面： 以下文字更新于2015年5月23日（build 10122） 1.如果说win8是个PC和平板的混合体的话，那么win10就是如果开启了平板模式 那真的就是个平板 不开启那么真的是PC... 比较极端，没有原来那么两个要融合在一起的概念了，因为微软终于意识… "
        },
        {
            "title": "超级课程表新出的 6.0 版本本末倒置，意图何在？ ",
            "date": "",
            "url": "http://www.zhihu.com/question/28510732/answer/42510995",
            "status": "",
            "description": "看到新版超级课程表6.0 里 翘课、泡妞、约炮 这种价值观就觉得，恶心。 这宣传的都是什么价值观。 隐晦地表达不行吗，一定要淫秽的表达。 不给年轻人树立正确的价值观，让我还怎么爱你。 注意：我说的价值观不是什么 拥护、什么主义荣辱观。但，至少要是 上… "
        },
        {
            "title": "Windows 10 Technical Preview 实际体验如何？ ",
            "date": "",
            "url": "http://www.zhihu.com/question/25660543/answer/31295602",
            "status": "",
            "description": "2015年3月25日更新 build 10040版本： 版本变化的太快了，UI变化各种变化太多了，一时半会没法给你们具体的评测了。 我先贴几张图，具体变化需要等待正式版出来后自己体验。 1.首先，用户登陆界面有所改变 2.加入小娜后感觉 整个世界都萌萌哒 小娜唱歌很好… "
        },
        {
            "title": "男生对游戏是什么情结？ ",
            "date": "",
            "url": "http://www.zhihu.com/question/29552666/answer/45028351",
            "status": "",
            "description": false
        },
        {
            "title": "什么是理性？什么是感性？ ",
            "date": "",
            "url": "http://www.zhihu.com/question/20195037/answer/36548754",
            "status": "",
            "description": "理性的人会觉得感性毫无意义； 感性的人会觉得理性不近人情。 "
        },
        {
            "title": "将图像 A 抠出来的人完美合成到图像 B 在对光影的处理有哪些要点？用 Ps 如何实现？ ",
            "date": "",
            "url": "http://www.zhihu.com/question/30563826/answer/48822046",
            "status": "",
            "description": "《男神和抱树女神的爱情故事》 （随便做了一个，细节比较粗糙，题主说要靠树，我做到啦~萌萌哒~） 大概分几步 1.抠图 2.调色 3.做阴影 我一般喜欢用蒙版 抠图的话大概可以用 快速选择、魔棒、抽出工具、蒙版等方法抠图 调色的话注意与周围颜色统一，用曲线… "
        },
        {
            "title": "怎样拒绝修电脑的请求？ ",
            "date": "",
            "url": "http://www.zhihu.com/question/22333385/answer/31094801",
            "status": "",
            "description": "一、维修是要有成本的，其他不计算，时间是最大的成本，修电脑不分男女，请衡量自己的时间成本值不值得。个人觉得修电脑是一件最浪费时间而且费力不讨好的事情！ 二、修电脑是个基础技能，像换电灯泡一样，不要以为给别人修个电脑别人就能看得上你。 三、拒… "
        },
        {
            "title": "Chrome 主页被 360 劫持，360 这样的做法违法么？ ",
            "date": "",
            "url": "http://www.zhihu.com/question/24770321/answer/28992527",
            "status": "",
            "description": "题主只是想知道是否违法 你们都在答写什么 如果能证明是360恶意劫持主页的话，那么当然是违法行为： 违反了 中华人民共和国反不正当竞争法 与 中华人民共和国反垄断法 中华人民共和国反垄断法（主席令第六十八号） 中华人民共和国反不正当竞争法 话说360不… "
        },
        {
            "title": "为什么有大量的同学喜欢刷路由器的系统？俗称刷机。 ",
            "date": "",
            "url": "http://www.zhihu.com/question/29475642/answer/96348488",
            "status": "",
            "description": "1.mwan 网络叠加/负载均衡 曾经把几个8M的网络叠加到30M 附一张图（图是8M叠加） 2.梯子 路由器直接爬梯子，很方便 （方案：pdns+chinadns+ss+透明代理） 3.samba 路由器上有USB接口的，直接挂在优盘，插上优盘，装上samba，局域网从此多了一个小NAS 4.QOS … "
        },
        {
            "title": "有哪些没有十年以上网龄就不会知道的事情？ ",
            "date": "",
            "url": "http://www.zhihu.com/question/38624160/answer/77397739",
            "status": "",
            "description": "1.超级兔子 小时候一直以为超级兔子是个游戏，下载下来发现比游戏还好玩。 2.windows98 非法操作 吓死宝宝了，真的，每次都害怕 3.把flash闪客视频一遍一遍地看 自己还学了一段时间flash，再后来，央视有了快乐驿站，都是动画版的相声小品，谁还记得 4.潜艇… "
        },
        {
            "title": "Windows 10 正式版 是一种怎样的体验？ ",
            "date": "",
            "url": "http://www.zhihu.com/question/33575561/answer/57097711",
            "status": "",
            "description": "在技术预览版的时候 起初大家都在吐槽这样的图标 这垃圾桶，太美…… 微软没忍住，终于为我们更换了图标当出现这样的图标的时候 天哪 这一定是测试版的临时图标 两个月过去以后，还是这样的图标 设计师一定在重新设计图标 一定的 当我听到build 10240就是传… "
        },
        {
            "title": "为什么李克强总理对网速流量如此在意，在不远的将来会有什么变化？ ",
            "date": "",
            "url": "http://www.zhihu.com/question/30366503/answer/47961826",
            "status": "",
            "description": false
        },
        {
            "title": "如何评价刚刚发布的小米平板？ ",
            "date": "",
            "url": "http://www.zhihu.com/question/23781849/answer/25641577",
            "status": "",
            "description": "小米这次发布小米平板似乎是意料之中的事情，走了多彩的这条路，似乎有些像5c，价格有些高，可能与ipad with retina display的竞争优势并不是很大。 用雷军自己的一句话说： 1.多彩 塑料 这次是大胆的抄袭了iphone 5C的多彩路线，包括从宣传海报到整体外观… "
        },
        {
            "title": "「树莓派」是什么以及普通人怎么玩？ ",
            "date": "",
            "url": "http://www.zhihu.com/question/20859055/answer/94433121",
            "status": "",
            "description": "新一代空气净化器 "
        },
        {
            "title": "如何评价微信 2.0 for Mac？ ",
            "date": "",
            "url": "http://www.zhihu.com/question/49659494/answer/117120783",
            "status": "",
            "description": "在聊天界面发送“2333”会有惊喜发生。 顺便多说一句，微信变网盘了，更方便了。 真的很费电还发热。 "
        },
        {
            "title": "自动化专业到底失败在哪里？存在哪些严重的问题？ ",
            "date": "",
            "url": "http://www.zhihu.com/question/36653708/answer/105477200",
            "status": "",
            "description": "自动化可不失败，BAT比自动化累多了。 下面请接招： "
        },
        {
            "title": "应该如何体验商场里的苹果电脑？ ",
            "date": "",
            "url": "http://www.zhihu.com/question/21341100/answer/62344531",
            "status": "",
            "description": "1.带上优盘 2.找到Mac 3.从finder里找到所有音乐，拷贝到优盘 4.回家导入iTunes，导入到iPhone 5.全部“正版” 2010年亲测成功 北京西单大悦城苹果直营店 "
        },
        {
            "title": "Bash on Windows 实际体验如何？ ",
            "date": "",
            "url": "http://www.zhihu.com/question/42228124/answer/95553678",
            "status": "",
            "description": "我的win10听说我不用cmd了，被吓死了...从此，磕巴了.. "
        },
        {
            "title": "以男生的眼光来看，女生有哪些加分项？ ",
            "date": "",
            "url": "http://www.zhihu.com/question/35391681/answer/91471983",
            "status": "",
            "description": "这是我在知乎上见到为数不多的男权问题，简练的答一下后天可以改变的： 1.不追星 不迷恋各种明星 不看韩剧 +20 2.会做一手好菜 +10 3.有趣 会接梗 笑点低 +20 4.老三样：温柔体贴贤惠 +10 5.爱笑 阳光 +20 6.能肯定关爱男生喜欢做的事 如打篮球 工作事业 +2… "
        }
    ],
    "items": 20
}
```

## getAnswers()

获取该用户回答的问题

## getPages()

获取该用户回答问题列表页数

# 声明

本项目仅用作数据研究学习，不允许用于商业用途

本项目一切数据来源于知乎(http://www.zhihu.com)

与本人无关
