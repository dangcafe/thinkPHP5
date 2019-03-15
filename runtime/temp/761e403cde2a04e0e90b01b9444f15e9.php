<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:54:"/data/www/lfgj/application/user/view/login/regist.html";i:1531358923;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php echo config('WEB_NAME'); ?>-注册</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link href="/public/static/home/images/common/favicon.png" type="image/x-icon" rel="shortcut icon">
    <link rel="stylesheet" href="/public/static/home/css/reset.css">
    <link rel="stylesheet" href="/public/static/home/css/sweetalert.css">
    <link rel="stylesheet" href="/public/static/home/css/login.css">
</head>
<body class="login-body">
    <div class="login-warp">
           <div class="registered-main">
            <p class="login-title">注册</p>
            <input class="login-text" type="text" id="phone"  placeholder="请输入手机号"/>
            <input class="login-text" type="text" id="passwd"  placeholder="请输入密码"/>
            <input class="login-text" type="text" id="repass"  placeholder="请再次输入密码"/>
            <input class="login-text" type="text" id="invite"  placeholder="请输入邀请码"/>
            <div class="registered-code">
            <input class="code-text" type="text" id="recode"  placeholder="请输入验证码"/>
            <input class="code-btn" type="button" class="send" onclick="sendValidCode();" value="获取验证码"/>
             <em style="display: none" class="count"></em>
            </div>
             <div style="visibility: hidden; margin-left: 192px; " id="errorNotice"></div>
            <input class="login-btn" type="button"  onclick="regist()" value="注册"/>
           <p class="login-link">已有账号？<a style='color:red' href="/user/login/index">直接登录</a></p>
           </div>
    </div>
    <div class="footer-number"><?php echo config('WEB_ICP'); ?> </div>
<!--js-->
<script src="/public/static/home/js/jquery-2.1.3.min.js"></script>
<script src="/public/static/home/js/sweetalert-dev.js"></script>

<script>
    //发送验证码
function sendValidCode(){
    var phone = $("#phone").val();
    if (phone=='') {
        swal("请输入手机号！")
        return false ;
    }
    var passwd = $("#passwd").val();
    var repass = $("#repass").val();
    if (!passwd) {
        swal("请输入密码")
        return false ;
    }
    if (passwd != repass) {
        swal("两次密码不一致")
        return false ;
    }  

    $('#errorNotice').html('');
    $('.input_text').val('');


    $.ajax({
        type: 'post',
        dataType: "json",
        url: "/user/login/sendSms",
        data: {
            phone: phone,
        },
        success: function(data){
            if (data.result ==200) {
            //60秒后重新发送
            var btnSend = $(".send");
            var msg = $('.code-btn');

            var left_time = 60;
            var tt = window.setInterval(function(){
                left_time = left_time - 1;
                    if (left_time <= 0) {
                        window.clearInterval(tt);
                        msg.val('（60）秒后重新发送');
                    }
                    else {
                        msg.val('（' + left_time + '）秒后重新发送');
                    }
                }, 1000);
            }else {
                swal(data.message);
            }
        },
        error: function(data){
                swal('短信发送失败：000001');
        }
    });
}
function regist(){
    var phone = $("#phone").val();
    if (phone=='') {
        swal("请输入手机号！")
        return false ;
    }
    var passwd = $("#passwd").val();
    var repass = $("#repass").val();
    if (!passwd) {
        swal("请输入密码")
        return false ;
    }
    if (passwd != repass) {
        swal("两次密码不一致")
        return false ;
    }
    var recode = $("#recode").val();
    if (!recode) {
        swal("请输入短信验证码")
        return false ;
    }
    var invite = $("#invite").val();
    if (invite=='') {
        swal("请输入邀请码")
        return false ;
    }
    $('#errorNotice').html('');
    $('.input_text').val('');


    $.ajax({
        type: 'post',
        dataType: "json",
        url: "/user/login/regist",
        data: {
            phone: phone,
            passwd:passwd,
            recode: recode,
            invite:invite
        },
        success: function(data){
            if (data.status == 200) {
                swal({
                  title: "注册成功",
                  text: "你将前往登录页面！",
                  type: "success",
                  showCancelButton: true,
                  cancelButtonText: '留在此页',
                  confirmButtonColor: "#DD6B55",
                  confirmButtonText: "前往登录！",
                  closeOnConfirm: false
                },
                function(){
                    window.location.href = "/user/index/index";
                });
            }else {
                swal(data.message);
            }
        },
        error: function(data){
                swal('注册失败');
        }
    });
}
</script>
</body>
</html>