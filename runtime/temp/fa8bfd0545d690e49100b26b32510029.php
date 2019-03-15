<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:72:"D:\phpStudy\PHPTutorial\WWW\lfgj-1/application/user\view\index\link.html";i:1552615103;s:73:"D:\phpStudy\PHPTutorial\WWW\lfgj-1\application\user\view\index\index.html";i:1552615757;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>会员中心</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link href="images/common/favicon.png" type="image/x-icon" rel="shortcut icon">
    <link rel="stylesheet" href="/public/static/home/css/reset.css">
    <link rel="stylesheet" href="/public/static/home/css/sweetalert.css">
    <link rel="stylesheet" href="/public/static/home/css/member.css">
    
</head>
<body class="member-body">
	<div class="header" id="header"> 
        <div class="wrap clearfix">
            <div class="logo">
                 <a href="index.html" title=""></a> 
            </div>
            <div class="nav">
                <ul>  
                  
                    
                </ul>
            </div>
           <div class="info">
                <p class="user">
                    <a href="/user/index/"  class="lgBtn"><?php echo \think\Request::instance()->session('user_tel'); ?></a>
                    <a href="/user/login/outlogin"  class="lgBtn">退出</a>
                </p> 
            </div>
        </div>
    </div>
    <div class="tabar clearfix" style="margin-top: 100px;">
    	<ul class="tab">
        <a class="cur"  href="/user/index"><li>会员中心</li></a>
        <a href="/user/index/bandpop"><li>实名认证</li></a>
        <a href="/user/index/bandbank"><li>绑定银行卡</li></a>
        </ul>
        
      <span class="tab-div">
          <div class="on" style="text-align: center; padding-top: 150px;">
            <p style="color:#337ab7;"><a href="<?php echo $data['url']; ?>"><?php echo $data['message']; ?></a></p>
            <p style="color:#666; margin-top: 10px;">将在3秒后跳转去认证</p>
          </div>
        </span>


    </div>

	<div class="per-footer">友情提醒:请妥善保管您的相关账号及密码!</div>
<!--js-->
<script src="/public/static/home/js/jquery-1.8.2.min.js"></script>
<script src="/public/static/home/js/sweetalert-dev.js"></script>

<script>
  window.onload = function(){
  setTimeout(function(){
  window.location.href="<?php echo $data['url']; ?>" 
  },3000);  
  }
</script>


</body>
</html>