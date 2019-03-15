<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:54:"/data/www/lfgj/application/admin/view/account/add.html";i:1531358923;s:54:"/data/www/lfgj/application/admin/view/index/index.html";i:1531358923;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<title>后台管理系统-添加交易账号</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/public/static/admin/css/pulic.css">
<link rel="stylesheet" href="/public/static/admin/css/zui/dist/css/zui.min.css">
<link rel="stylesheet" href="/public/static/admin/css/zui/dist/lib/datetimepicker/datetimepicker.min.css">
<link rel="stylesheet" href="/public/static/common/css/sweetalert.css">
<script type="text/javascript" src="/public/static/admin/css/zui/dist/lib/jquery/jquery.js"></script>
<script type="text/javascript" src="/public/static/admin/css/zui/dist/js/zui.min.js"></script>
<script type="text/javascript" src="/public/static/admin/css/zui/dist/lib/datetimepicker/datetimepicker.min.js"></script>
<script type="text/javascript" src="/public/static/common/js/sweetalert.js"></script>



</head>
<body>
<div class="main">
    <header class="header clearfix">
    	<div class="header-left">
    		<div class="sidebar-toggle">
    			<i class="icon icon-bars"></i>
    		</div>
    		<div class="logo">
    			<span class="">后台管理系统</span>
    		</div>
    	</div>
    	<div class="header-user">
    		<div class="item dropdown">
    			<span class="badge label label-dot label-danger"></span> <i
    				class="icon icon-bell-alt"></i>
    		</div>
    		<div class="item dropdown">
    			<span data-toggle="dropdown"> <i class="icon icon-user"></i>
    				<span>admin</span> <span class="caret"></span>
    			</span>
    			<ul class="dropdown-menu">
    				<li><a href="#">修改头像</a></li>
    				<li><a href="#">修改资料</a></li>
    				<li class="divider"></li>
    				<li><a href="#">注销</a></li>
    			</ul>
    		</div>
    		<div class="item">版本：V1.0</div>
    	</div>
    </header>
    <aside class="sidebar">
    <div class="sidebar-menu">
        <div class="item ">
            <a href="/admin">  <span class="index-bg">首页</span></a>
        </div>
        <div class="item vertical">
            <a href="#">  <span class="account-bg">网站账户管理</span></a>
            <div class="vertical-menu">
                <ul>
                    <li><a href="/admin/user/alluser" >注册用户管理</a></li>
                    <li><a href="/admin/user/allacc">已分配软件账户用户</a></li>
                    <li><a href="/admin/user/search">账号查询</a></li>
                </ul>
            </div>
        </div>        
        <div class="item vertical">
            <a href="#">  <span class="account-bg">交易账号管理</span></a>
            <div class="vertical-menu">
                <ul>
                    <li><a href="/admin/account/index" >交易账号列表</a></li>
                    <!-- <li><a href="/admin/account/accuse">已使用账号</a></li> -->
                    <li><a href="/admin/account/add">添加账号</a></li>
                </ul>
            </div>
        </div>
        <div class="item vertical">
            <a href="#">  <span class="account-bg"> 财务管理</span></a>
            <div class="vertical-menu">
                <ul >
                    <li><a href="/admin/pay/userlist">所有用户</a></li>
                    <li><a href="/admin/pay/registadd" target="_blank">三方开户</a></li>
                </ul>
            </div>
        </div>         
        <div class="item vertical">
            <a href="#">  <span class="account-bg"> 代理管理</span></a>
            <div class="vertical-menu">
                <ul >
                    <li><a href="/admin/agent/index">所有代理</a></li>
                </ul>
            </div>
        </div> 
        <div class="item vertical ">
        <a href="javascript:void(0);">  <span class="system-bg">系统管理</span>
        </a>
        <div class="vertical-menu">
        <ul>
        <li><a href="/admin/setting/index" >网站设置</a></li>
        <li><a href="/admin/setting/index">网站设置</a> </li>
        </ul>
        </div>
        </div>
    </div>
    </aside>
    
<div class="main-content  ">
    <div class="wrapper">
        <ol class="breadcrumb">
            <li>
                <span class="gray-color">交易账号管理 -</span>
                <span class="lgray-color">添加账户</span>
            </li>
        </ol>
        <div class="panel min-body">
            <div class="panel-body">
                <div class="main-heading"> <i class="icon icon-stop"></i> 添加交易账户</div>
                <form class="form-horizontal" action='/admin/account/add' method="post">
                    <div class="form-group">
                        <label class="col-sm-2">账号
                    </label>
                        <div class="col-md-6 col-sm-10">
                            <input type="text" class="form-control" name="account" placeholder="批量添加用to分开 例： 66to88">
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-2">密码
                        </label>
                        <div class="col-md-6 col-sm-10">
                            <input type="text" class="form-control"  name="password" value='000' placeholder="交易密码:默认为888" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2"></label>
                        <div class="col-md-6 col-sm-10">
                            <button type="submit"  class="submit_btn" >添加</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</div>
<script type="text/javascript" src="/public/static/admin/js/Common.js"></script>


</body>
</html>