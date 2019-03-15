<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:56:"/data/www/lfgj/application/user/view/index/bandbank.html";i:1531358923;s:53:"/data/www/lfgj/application/user/view/index/index.html";i:1531358923;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php echo config('WEB_NAME'); ?>-银行卡绑定</title>
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
        <h2>绑定银行卡</h2>
        <?php if($userlist['banknum'] == null): ?>
            <ul>
                <li>
                    <label>归属行(具体到支行)</label>
                    <span><input class="code-input"  id='bankname' type="text" placeholder="例:中国银行上海陆家嘴支行" /></span>
                </li>                
                <li>
                    <label>银行卡号</label>
                    <span><input class="code-input" id='banknum'  type="text" placeholder="例:62284804*******39" /></span>
                </li>
                <li>
                    <label>该卡绑定的手机号</label>
                    <span><input class="email-input" id='banktel'  type="text" placeholder="例:131****8888"/></span>
                </li>
            </ul>
            <span class="save-div">
                 <input class="save-btn bandbank" type="button"  value="保存资料"/>
            </span>
        <?php else: ?> 
            <ul>
                <li>
                    <label>归属行</label>
                    <span><?php echo $userlist['bankname']; ?></span>
                </li>                
                <li>
                    <label>银行卡号</label>
                    <span><?php echo $userlist['banknum']; ?></span>
                </li>
            </ul>
        <?php endif; ?>
    </div>
</span>


    </div>

	<div class="per-footer">友情提醒:请妥善保管您的相关账号及密码!</div>
<!--js-->
<script src="/public/static/home/js/jquery-1.8.2.min.js"></script>
<script src="/public/static/home/js/sweetalert-dev.js"></script>

<script>
    $(".bandbank").click(function(){
        var bankname = $("#bankname").val();
        if (bankname=='') {
            swal("请输入归属行！")
            return false ;
        }        
        var banknum = $("#banknum").val();
        if (banknum=='') {
            swal("请输入银行卡号！")
            return false ;
        }        
        var banktel = $("#banktel").val();
        if (banktel=='') {
            swal("请输入手机号！")
            return false ;
        }
    $.ajax({
        type: 'post',
        dataType: "json",
        url: "/user/index/bandbank",
        data: {
            bankname:bankname,
            banknum:banknum,            
            banktel:banktel,
        },
        success: function(data){
            if (data.status ==200) {
                alert("认证成功");
                window.location.reload();
            }else {
                swal(data.message);
            }
        },
        error: function(data){
                swal('实名认证失败');
        }
    });
    })
</script>


</body>
</html>