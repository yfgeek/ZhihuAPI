# 知乎API
这是一个重复造轮子的项目

因为半年前在写程序的时候需要建立一个知乎特别关注的API，但是苦寻网络没有发现相关API，于是决定自己造车，而现在发现有一个基于Node的轮子，又不甘于放弃本轮子，于是就有了现在这个轮子，基于PHP实现。

## User($username)
用户信息部分
示例代码

```php
require('API/User.class.php');
$p = new User("yfgeek");
$p->init();
echo $p;
```
返回数据
```javascript
{
    "type": "User",
    "name": "Ivan",
    "gender": "男",
    "bio": "求工作/Web前端",
    "location": "北京",
    "business": "互联网",
    "follow": {
        "following": "368",
        "follower": "134"
    },
    "agree": "1322",
    "thanks": "238"
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
require('API/Activity.class.php');
$p = new Activity("yfgeek");
$p->init();
$p->postLink();
$p->questionLink();
echo $p;
```
返回数据
```javascript
{
    content: [
        {
            title: "学习JavaScript必读的12本书",
            date: "1 天前",
            url: "http://zhuanlan.zhihu.com/p/22914734"
        },
        …
    ],
    items: 10,
    type: "Activity"
}
```
#### postLink()
获取该用户关于专栏的最新动态
#### questionLink()
获取该用户关于问题的最新动态

# 声明

本项目仅用作数据研究学习，不允许用于商业用途

本项目一切数据来源于知乎(http://www.zhihu.com) 

与本人无关
