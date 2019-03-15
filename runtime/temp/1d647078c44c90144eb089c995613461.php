<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:57:"/data/www/lfgj/application/index/view/index/download.html";i:1531358923;s:54:"/data/www/lfgj/application/index/view/index/index.html";i:1531471623;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title><?php echo config('WEB_NAME'); ?>-下载中心</title>
  <meta name="keywords" content="">
  <meta name="description" content="">
  <link href="images/common/favicon.png" type="image/x-icon" rel="shortcut icon">
  <link rel="stylesheet" href="/public/static/home/css/reset.css">
  
    <link rel="stylesheet" href="/public/static/home/css/download.css">
        <style>
        .sdk ul li{
            position: relative;
        }
        .download-android,.download-ios {
            width: 180px;
            height: 180px;
            position: absolute;
            bottom: 5px;
            left: 15px;
        }
        .download-android:hover{
            background:url(/public/static/common/image/anzhuo.png) no-repeat center center;
            background-size: 180px 180px;
        }
        .download-ios:hover{
            background:url(/public/static/common/image/ios.png) no-repeat center center;
            background-size: 180px 180px;
        }
    </style>

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
                <li><a href="/index/index/download.html">下载中心</a></li>
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

    <div class="wrap sdk">
            <h2>下载中心</h2>
            <ul class="clearfix">
                <li>
                    <div class="icon icon-top icon1"></div>
                    <h3>Android 下载</h3>

                    <a class="down" href="#">立即下载<span class="icon icon-bottom icon5"></span></a>
                    <div class="download-android">
                    </div>
                </li>
                <li>
                    <div class="icon icon-top icon2"></div>
                    <h3>iOS 下载</h3>

                    <a class="down" href="">立即下载<span class="icon icon-bottom icon5"></span></a>
                    <div class="download-ios">
                    </div>
                </li>
                <li>
                    <div class="icon icon-top icon4"></div>
                    <h3>交易端  下载</h3>

                    <a class="down" href="/public/uploads/交易端.exe">立即下载<span class="icon icon-bottom icon5"></span></a>
              
                </li>
            </ul>
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