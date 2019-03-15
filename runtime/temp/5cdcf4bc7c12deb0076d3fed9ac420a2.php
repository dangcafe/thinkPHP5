<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:73:"D:\phpStudy\PHPTutorial\WWW\lfgj-1/application/index\view\index\news.html";i:1536411035;s:74:"D:\phpStudy\PHPTutorial\WWW\lfgj-1\application\index\view\index\index.html";i:1539754415;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title><?php echo config('WEB_NAME'); ?>-资讯中心</title>
  <meta name="keywords" content="">
  <meta name="description" content="">
  <link href="images/common/favicon.png" type="image/x-icon" rel="shortcut icon">
  <link rel="stylesheet" href="/public/static/home/css/reset.css">
  
    <link rel="stylesheet" href="/public/static/home/css/news.css">

</head>
<body>
<div class="header" id="header">
    <div class="wrap clearfix">
        <div class="logo">
             <a href=" " title="">国内期货专业服务商</a>
        </div>
        <div class="nav">
            <ul>
                <li><a href="/index/index/index.html">首页</a></li>
                <li><a href="/index/index/news.html">资讯中心</a></li>
                <li><a href="/index/index/crude.html">产品中心</a></li>
				<li><a href="/index/index/about.html">关于我们</a></li>
                
            </ul>
        </div>
       <div class="info">
            <?php if(\think\Request::instance()->session('user_tel')!= null): ?>
            <p class="user">
                <a href="/user/index/"  class="lgBtn"><?php echo \think\Request::instance()->session('user_tel'); ?></a>
                <a href="/user/login/outlogin"  class="lgBtn">退出</a>
            </p> 
            <?php else: ?> 
            <p class="user">
                <a href="/user/login" target="_blank" class="lgBtn">登录</a>
                <a href="/user/login/regist" target="_blank" class="lgBtn">注册</a>
            </p >
            <?php endif; ?>
        </div>
    </div>
</div>

<div id="intro">
  <div class="intro_index"></div>
</div>

<div class="fullbg"></div>

    <div class="help">
        <div class="wrap">
            <div class="content clearfix">
                <!-- 左侧 -->
                <ul class="fl navbar">
                    <!-- <li>
                        <a href="javascript:;" class="clearfix">
                            <div class="fl icon icon1"></div>
                            <p class="fl">热门问题</p>
                            <span class="conceal"></span>
                        </a>
                    </li> -->
                    <li>
                        <a href="javascript:;" class="clearfix first" value="start">
                            <div class="fl icon icon2"></div>
                            <p class="fl">财经日历</p>
                            <span class=""></span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" class="clearfix" value="contract">
                            <div class="fl icon icon3"></div>
                            <p class="fl">财经要闻</p>
                            <span class="conceal"></span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" class="clearfix" value="terrace">
                            <div class="fl icon icon4"></div>
                            <p class="fl">期货资讯</p>
                            <span class="conceal"></span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" class="clearfix" value="pay">
                            <div class="fl icon icon5"></div>
                            <p class="fl">外盘动态</p>
                            <span class="conceal"></span>
                        </a>
                    </li>

                </ul>
                <!-- 右侧 -->
                <div class="question fl">
                    <ul id="start" class="clearfix">
                        <li>
                            <a href="javascript:;">央行：保持货币政策稳健中性</a>
                            <span>2018-3-19</span>
                        </li>
                        <li>
                            <a href="javascript:;">全球经济复苏和原油价格上行助推全球化工业进入景气周期</a>
                            <span>2018-3-19</span>
                        </li>
                        <li>
                            <a href="javascript:;">一股强烈的卖空力量正在回归！油市两大危机迫在眉睫</a>
                            <span>2018-3-19</span>
                        </li>
                        <li>
                            <a href="javascript:;">特朗普关税计划恐拖累美国原油生产 俄罗斯和欧佩克或收获意外之喜</a>
                            <span>2018-3-16</span>
                        </li>
                        <li>
                            <a href="javascript:;">沙特阿美称IPO被推迟至2019年 油价达70美元每桶或成关键</a>
                            <span>2018-3-16</span>
                        </li>
                        <li>
                            <a href="javascript:;">比特币期货登陆华尔街 比特币价和期货价格双双飙涨 </a>
                            <span>2018-3-16</span>
                        </li>
                        <li>
                            <a href="javascript:;">全球经济复苏和原油价格上行助推全球化工业进入景气周期</a>
                            <span>2018-3-16</span>
                        </li>
                        <li>
                            <a href="javascript:;">两大利好来袭！国际油价亚市持稳在数月高位 </a>
                            <span>2018-3-14</span>
                        </li>
                        <li>
                            <a href="javascript:;">沙特应该彻底忘记减产 唯有一方法能自救 </a>
                            <span>2018-3-14</span>
                        </li>
                        <li>
                            <a href="javascript:;">沙相比OPEC成员国 俄罗斯真的需要减产协议吗？</a>
                            <span>2018-3-14</span>
                        </li>

                    </ul>
                    <ul id="contract" class="hide">
                          <li>
                            <a href="javascript:;">减产协议目标已有所转变 OPEC正寻求油市平衡标准？ </a>
                            <span>2018-3-14</span>
                        </li>
                        <li>
                            <a href="javascript:;">【EIA】美原油产量突破1000万桶/日 库存再度累积 </a>
                            <span>2018-3-14</span>
                        </li>
                        <li>
                            <a href="javascript:;">亚洲原油市场走势坚挺 产量攀升限制原油价格 </a>
                            <span>2018-3-14</span>
                        </li>
                        <li>
                            <a href="javascript:;">OPEC和俄罗斯均认为供应过剩问题局面正在加速消散</a>
                            <span>2018-3-14</span>
                        </li>
                        <li>
                            <a href="javascript:;">美国页岩油稳步复苏 国际油价周度跌幅10% </a>
                            <span>2018-3-12</span>
                        </li>
                         <li>
                            <a href="javascript:;">过度套保错过油价上涨 页岩油商利润承压或影响产量 </a>
                            <span>2018-3-12</span>
                        </li>
                        <li>
                            <a href="javascript:;">美国油产两个月首降 但汽油库存七周连涨 油价微跌 </a>
                            <span>2018-3-12</span>
                        </li>
                        <li>
                            <a href="javascript:;">原油年度盛宴：中东冲突，风云再起？ </a>
                            <span>2018-3-5</span>
                        </li>
                        <li>
                            <a href="javascript:;">空头去哪儿了？比特币期货涨20% 现货抹平跌幅站上17000美元 </a>
                            <span>2018-3-5</span>
                        </li>
                        <li>
                            <a href="javascript:;">沙特阿美称IPO被推迟至2019年 油价达70美元每桶或成关键</a>
                            <span>2018-3-5</span>
                        </li>

                    </ul>
                    <ul id="terrace" class="hide">
                          <li>
                            <a href="javascript:;">七禾美国基金考察之旅首站：探寻比特币期货 </a>
                            <span>2018-3-16</span>
                        </li>
                        <li>
                            <a href="javascript:;">比特币期货挺进欧洲！德意志交易所也考虑推出 </a>
                            <span>2018-3-16</span>
                        </li>
                        <li>
                            <a href="javascript:;">“金融期货之父”梅拉梅德：市场才知道真相 </a>
                            <span>2018-3-16</span>
                        </li>
                        <li>
                            <a href="javascript:;">沙特阿拉伯风暴：为什么石油期权市场过度乐观</a>
                            <span>2018-3-16</span>
                        </li>
                        <li>
                            <a href="javascript:;">国际油价开启连涨模式 国内个别地区油价望上调</a>
                            <span>2018-3-16</span>
                        </li>
                         <li>
                            <a href="javascript:;">两大利好来袭！国际油价亚市持稳在数月高位 </a>
                            <span>2018-3-12</span>
                        </li>
                        <li>
                            <a href="javascript:;">全球经济复苏和原油价格上行助推全球化工业进入景气周期</a>
                            <span>2018-3-12</span>
                        </li>
                        <li>
                            <a href="javascript:;">一股强烈的卖空力量正在回归！油市两大危机迫在眉睫</a>
                            <span>2018-3-12</span>
                        </li>
                        <li>
                            <a href="javascript:;">25美元之争 分析师舌战黄金牛市新起点</a>
                            <span>2018-3-5</span>
                        </li>
                        <li>
                            <a href="javascript:;">海外分析师发现了原油市场一个最大规模牛市的催化剂 </a>
                            <span>2018-3-5</span>
                        </li>

                    </ul>
                    <ul id="pay" class="hide">
                          <li>
                            <a href="javascript:;">央全球经济复苏和原油价格上行助推全球化工业进入景气周期</a>
                            <span>2018-3-18</span>
                        </li>
                        <li>
                            <a href="javascript:;">港股市场的小众产品：“省钱又省事”的个股期货</a>
                            <span>2018-3-18</span>
                        </li>
                        <li>
                            <a href="javascript:;">特朗普或放贸易保护大招 对钢铁进口征24%全球关税 </a>
                            <span>2018-3-16</span>
                        </li>
                        <li>
                            <a href="javascript:;">美国油产两个月首降 但汽油库存七周连涨 油价微跌 </a>
                            <span>2018-3-16</span>
                        </li>
                        <li>
                            <a href="javascript:;">原油罢工威胁利好突降多头再度崛起 </a>
                            <span>2018-3-5</span>
                        </li>

                        <li>
                            <a href="javascript:;">机构：12月23日止四周OPEC石油日均出口料跳增43万桶 </a>
                            <span>2018-3-14</span>
                        </li>
                        <li>
                            <a href="javascript:;">2018油价最大的黑天鹅可能是——委内瑞拉 </a>
                            <span>2018-3-14</span>
                        </li>
                        <li>
                            <a href="javascript:;">美元反弹及美国产量忧虑双重利空来袭 油价周二盘中涨跌不一 </a>
                            <span>2018-3-5</span>
                        </li>
                        <li>
                            <a href="javascript:;">芝商所新型期货交易重磅出击 做空它竟比做空黄金还赚钱？</a>
                            <span>2018-3-5</span>
                        </li>
                         <li>
                            <a href="javascript:;">芝原油市场本周还将会出现大波动？ 美国是主要因素 </a>
                            <span>2018-3-5</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

<div class="footer clearfix">
<div class="w1200 clearfix">
    <div class="contact-nav">
            <a href=" ">联系我们</ a>
            <a href="javascript:;">关于我们</ a>
            <a href="javascript:;">安全保障</ a>
            <a href="javascript:;">商务合作</ a>
    </div>
        <p class="f_email">公司网址：<?php echo config('WEB_URL'); ?></p >

        <p class="f_company">公司地址：<?php echo config('WEB_ADDRESS'); ?></p >
    </div>
    <div class="backTop" id="backTop">
        <div class="backTopBtn">
            <img src="/public/static/home/images/common/backtop.png" width="17" height="10" alt="回到顶部" title="回到顶部" />
            <span>Top</span>
        </div>
    </div>
 </div>

<script src="/public/static/home/js/jquery-1.8.2.min.js"></script>
<script src="/public/static/home/js/common.js"></script>
<script src="/public/static/home/js/prefixfree.min.js"></script>
<script src="/public/static/home/js/jquery.waypoints.js"></script>
<script src="/public/static/home/js/index.js"></script>

    <script>
        $(function () {
            $(".navbar a").on("click",function(){
                $(".navbar span,.navbar img").addClass("conceal");
                $(this).children("span,img").removeClass("conceal");
                $(".question ul").addClass("hide");
                var a = $(this).attr("value");
                $("#"+a).removeClass("hide");
                $("#"+a).children("li").removeClass("hide");
                $("#"+a).find("p").removeClass("show")
            });
            $(".question a").on("click",function(){

                $(this).siblings("p").addClass("show")
            })
        });
    </script>

</body>
</html>