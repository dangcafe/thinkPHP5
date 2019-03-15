<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:55:"/data/www/lfgj/application/user/view/index/bandpop.html";i:1531358923;s:53:"/data/www/lfgj/application/user/view/index/index.html";i:1531358923;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php echo config('WEB_NAME'); ?>-实名认证</title>
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
                    <li><a href="/index/index/index.html">首页</a></li>
                    <li><a href="/index/index/news.html">资讯中心</a></li>
                    <li><a href="/index/index/crude.html">原油期货</a></li>
                    <li><a href="/index/index/download.html">下载中心</a></li>
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
        <div class="tab-div on">
            <h2>实名认证</h2>
            <?php if($userlist['ppnum'] != null): ?>
                    <p>
                        您已完成实名认证,认证的用户为:<span style="color:green"><?php echo $userlist['realname']; ?></span>
                    </p>
            <?php else: ?> 
                <ul>
                    <form action="/user/index/bandpop" method="post" id="popform" enctype="multipart/form-data">
                        <li>
                            <label>真实姓名</label>
                            <span><input class="email-input" type="text" id='realname' name='realname' /></span>
                        </li>
                        <li>
                            <label>身份证号</label>
                            <span><input class="code-input" type="text"  id='ppnum' name='ppnum' /></span>
                        </li>                    
                        <li>
                            <label>身份证正面</label>
                            <span>
                                <input type="file" class="email-input"  name="image[]">
                            </span>
                        </li>
                        <li>
                            <label>身份证反面</label>
                            <span>
                                <input type="file"  name="image[]">
                            </span>
                        </li>
                    </form>
                </ul>
                <span class="save-div">
                     <input class="save-btn bandpop" type="button"  value="保存资料"/>
                </span>
            <?php endif; ?>
        </div>
    </span>


    </div>

	<div class="per-footer">友情提醒:请妥善保管您的相关账号及密码!</div>
<!--js-->
<script src="/public/static/home/js/jquery-1.8.2.min.js"></script>
<script src="/public/static/home/js/sweetalert-dev.js"></script>

<script>
    $(".bandpop").click(function(){
        var realname = $("#realname").val();
        if (realname=='') {
            swal("请输入真实姓名！")
            return false ;
        }        
        var ppnum = $("#ppnum").val();
        if (ppnum=='') {
            swal("请输入身份证号！")
            return false ;
        }        
        var idimg0 = $("#idimg0").val();
        if (idimg0=='') {
            swal("请上传身份证正面")
            return false ;
        }        
        var idimg1 = $("#idimg1").val();
        if (idimg1=='') {
            swal("请上传身份证反面")
            return false ;
        }
        $('#popform').submit();
    // $.ajax({
    //     type: 'post',
    //     dataType: "json",
    //     url: "/user/index/bandpop",
    //     data: {
    //         ppnum:ppnum,
    //         realname:realname,
    //     },
    //     success: function(data){
    //         if (data.status ==200) {
    //             alert("认证成功");
    //             window.location.reload();
    //         }else {
    //             swal(data.message);
    //         }
    //     },
    //     error: function(data){
    //             swal('实名认证失败');
    //     }
    // });
    })
</script>


</body>
</html>