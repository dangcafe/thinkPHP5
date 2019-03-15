<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:53:"/data/www/lfgj/application/user/view/login/index.html";i:1531358923;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php echo config('WEB_NAME'); ?>-登录</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link href="/public/static/home/images/common/favicon.png" type="image/x-icon" rel="shortcut icon">
    <link rel="stylesheet" href="/public/static/home/css/reset.css">
    <link rel="stylesheet" href="/public/static/home/css/login.css">
    <link rel="stylesheet" href="/public/static/home/css/sweetalert.css">
</head>
<body class="login-body">
    <div class="login-warp">
           <div class="login-main">
            <p class="login-title">登录</p>
            <!-- <form action="/user/login/index" method="post"> -->
                <input class="login-text" type="text" id="utel"  placeholder="请输入手机号"/>
                <input class="login-text" type="password" id="upass"  placeholder="请输入密码"/>
                <input class="login-btn" type="submit" onclick="login()" value="登录"/>
            <!-- </form> -->
           <p class="login-link">没有账号？<a href="/user/login/regist">免费注册</a></p>
           </div>
    </div>
<!--js-->
<script src="/public/static/home/js/jquery-1.8.2.min.js"></script>
<script src="/public/static/home/js/sweetalert-dev.js"></script>
<script>
function login(){
    var utel = $("#utel").val();
    if (!utel) {
        swal("请输入手机号！")
        return false;
    }
    var upass = $("#upass").val();
    if (!upass) {
        swal("请输入密码")
        return false;
    }
    $.ajax({
        type: 'post',
        dataType: "json",
        url: "/user/login/index",
        data: {
            utel: utel,
            upass:upass,
        },
        success: function(data){
            if (data.status == 200) {
                swal({
                  title: "登录成功",
                  text: "你将前往个人中心！",
                  type: "success",
                  showCancelButton: true,
                  cancelButtonText: '留在此页',
                  confirmButtonColor: "#DD6B55",
                  confirmButtonText: "前往个人中心！",
                  closeOnConfirm: false
                },
                function(){
                    window.location.href = "/user/index/index";
                });
            }else{
                swal(data.message);
            }
        },
        error: function(data){
                swal('登录失败');
        }
    });
}  
</script>
</body>
</html>