<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:74:"D:\phpStudy\PHPTutorial\WWW\lfgj-1/application/index\view\index\crude.html";i:1536411034;s:74:"D:\phpStudy\PHPTutorial\WWW\lfgj-1\application\index\view\index\index.html";i:1539754415;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title><?php echo config('WEB_NAME'); ?>-产品中心</title>
  <meta name="keywords" content="">
  <meta name="description" content="">
  <link href="images/common/favicon.png" type="image/x-icon" rel="shortcut icon">
  <link rel="stylesheet" href="/public/static/home/css/reset.css">
  
    <link rel="stylesheet" href="/public/static/home/css/about.css">

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

  <div class="about crude">
      <div class="wrap">
        <div class="crude-img">
          <h2>产品简介</h2>
            <p><img src="/public/static/home/images/crude/baiyin.jpg" alt="" /></p>
            <p><img src="/public/static/home/images/crude/hengzhi.jpg" alt="" /></p>
	   <p><img src="/public/static/home/images/crude/MAX.png" alt="" /></p>
            <p><img src="/public/static/home/images/crude/huangjin.jpg" alt="" /></p>
            <p><img src="/public/static/home/images/crude/yuanyou.jpg" alt="" /></p>
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


</body>
</html>