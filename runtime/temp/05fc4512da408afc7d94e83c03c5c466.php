<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:54:"/data/www/lfgj/application/admin/view/login/index.html";i:1531358923;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>后台管理平台</title>
<link rel="stylesheet" href="/public/static/admin/css/pulic.css">
<link rel="stylesheet" href="/public/static/admin/css/zui/dist/css/zui.min.css">
<script src="/public/static/admin/js/jquery.min.js"></script>
<script type="text/javascript" src="/public/static/admin/css/zui/dist/js/zui.min.js"></script>
<link rel="stylesheet" href="/public/static/home/css/sweetalert.css">
</head>
<body style="background:#ffffff !important;">
	<div class="main">
		<div class="header_login">
			<div class="header_login_content">
				<div class="header_login_logo">
			用户后台管理系统
				</div>
			</div>
		</div>
		<div class="con_login">
       <div class="infor_login">
       <p class="welcome_login">欢迎登入</p>
       <p class="account_login"> <input type="text" id="name"  placeholder="账号">  </p>
       <p class="password_login" > <input type="text" id="passwd" placeholder="请输入密码"> </p>
       <p class="remembe_login "><input   type="checkbox" name="" />  记住密码</p>
       <p > <button class="submit_login" id="submit_btn" onclick="login()">登录</button></p>
       <p class="link_login">
       <!-- <span class="pull-left"> <a href=""> 忘记密码</a> </span> -->
       <!-- <span class="pull-right"> <a href=""> 免费注册</a> </span> -->
       </p>
       </div>
		</div>

		<div class="footer_login">
          版权所有
		</div>
</div>
</body>
<script type="text/javascript" src="/public/static/admin/js/layer/layer.js"></script>
<script src="/public/static/home/js/sweetalert-dev.js"></script>
<script>
function login(){
    var name = $("#name").val();
    if (!name) {
        swal("请输入账号！")
        return false;
    }
    var passwd = $("#passwd").val();
    if (!passwd) {
        swal("请输入密码")
        return false;
    }
    $.ajax({
        type: 'post',
        dataType: "json",
        url: "/admin/login/index",
        data: {
            name: name,
            passwd:passwd,
        },
        success: function(data){
            if (data.status == 200) {
                window.location.href = "/admin/index/index";
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
</html>