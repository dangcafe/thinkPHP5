<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:54:"/data/www/lfgj/application/index/view/index/index.html";i:1531471623;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title><?php echo config('WEB_NAME'); ?>-首页</title>
  <meta name="keywords" content="">
  <meta name="description" content="">
  <link href="images/common/favicon.png" type="image/x-icon" rel="shortcut icon">
  <link rel="stylesheet" href="/public/static/home/css/reset.css">
  
  <link rel="stylesheet" href="/public/static/home/css/index.css">
  <link rel="stylesheet"  href="/public/static/home/css/superslide.css"/>

  
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

<!--轮播图-->
<div id="slideBox" class="slideBox">
  <div class="hd">
    <ul><li></li><li></li><li></li>
  </div>
  <div class="bd">
    <ul>
      <li><a ><img src="/public/static/home/images/banner01.png" /></a></li>
      <li><a><img src="/public/static/home/images/banner02.png" /></a></li>
      <li><a><img src="/public/static/home/images/banner03.png" /></a></li>
      
    </ul>
  </div>
</div>


<div class="fullbg"></div>

  <div class="index">
    <!--产品介绍-->
    <div class="product">
      <div class="wrap">
        <div class="pro-cont">
          <h2>公司简介</h2>
          <p class="desc"><?php echo config('WEB_NAME'); ?>有限公司(证监会中央编号︰AXW976)，业务涵盖境外期货、股票领域，其中尤以外盘期货业务见长；目前成为业内一家颇具影响、且专注于外盘期货开户 的专业公司。</p>
        </div>
      </div>
    </div>
       <div class="teams">
          <div class="wrap">
              <h2>专业团队</h2>

              <div class="trees">
                  <div class="t1 tree"><img src="/public/static/home/images/index/team1.png" alt="专业团队"/></div>
                  <div class="t2 tree"><img src="/public/static/home/images/index/team2.png" alt="专业团队"/></div>
                  <div class="t3 tree"><img src="/public/static/home/images/index/team3.png" alt="专业团队"/></div>
                  <div class="t4 tree"><img src="/public/static/home/images/index/team4.png" alt="专业团队"/></div>

                  <div class="tag tag1"><img src="/public/static/home/images/index/team_icon_1.png" alt="专业团队"/></div>
                  <div class="tag tag2"><img src="/public/static/home/images/index/team_icon_2.png" alt="专业团队"/></div>
                  <div class="tag tag3"><img src="/public/static/home/images/index/team_icon_3.png" alt="专业团队"/></div>
                  <div class="tag tag4"><img src="/public/static/home/images/index/team_icon_4.png" alt="专业团队"/></div>
              </div>
              <div class="trees-text">
                  <p class="bottom"> 经多年运营，公司业务涵盖境外期货、股票领域，其中尤以外盘期货业务见长；目前成为业内一家颇具影响、且专注于外盘期货开户 的专业公司，</p>
                  <p class="bottom">已为300余家机构投资者提供服务。</p>
              </div>
          </div>
      </div>
    <!--我们的优势-->
    <div class="threeChar">
      <div class="wrap">
        <h2>我们的优势</h2>
        <ul>
          <li> <a href="javascript:;" class="safe"></a>
            <p>安全合规</p>
            <p>大账户+子账户</p>
          </li>
          <li> <a href="javascript:;" class="cost"></a>
            <p>成本可控</p>
            <p>为平台运营减轻负担</p>
          </li>
          <li> <a href="javascript:;" class="speed"></a>
            <p>快速上线</p>
            <p>快速完成合规对接</p>
          </li>
          <li> <a href="javascript:;" class="efficient"></a>
            <p>体验更佳</p>
            <p>操作流畅到账及时</p>
          </li>
        </ul>
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

<script src="/public/static/home/js/jquery.superslide.2.1.1.js"></script>
<script type="text/javascript">
    jQuery(".slideBox").slide({mainCell:".bd ul",autoPlay:true});
</script>

</body>
</html>