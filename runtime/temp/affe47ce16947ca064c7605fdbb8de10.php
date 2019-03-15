<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:75:"D:\phpStudy\PHPTutorial\WWW\lfgj-1/application/admin\view\pay\userlist.html";i:1536411046;s:74:"D:\phpStudy\PHPTutorial\WWW\lfgj-1\application\admin\view\index\index.html";i:1552615942;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<title>管理系统</title>
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
    
    <div class="main-content">
        <div class="wrapper">
            <ol class="breadcrumb">
                <li>
               <span class="gray-color">财务管理 -</span>
               <span class="lgray-color">已实名用户</span>
                </li>
            </ol>
            <div class="panel">
                <div class="panel-body">
                   <div class="main-heading clearfix">
                        <span class="pull-left"><i class="icon icon-stop"></i> 已实名用户<?php echo $lists->total(); ?>位</span>
                        <form action="<?php echo url('/admin/pay/search'); ?>" method='post'>
                            <select name="param" >
                                <option value="realname" checked>姓名</option>
                                <option value="accountid">交易账号</option>
                            </select>
                            <input type="text" name='value' value='' style="height:28px;width:100px;">
                            <input type="submit" value='搜索'>
                        </form>
                   </div>
                    <table class="table table-borderless  table-right">

                    </table>

                    <table class="table table-center table-bordered">
                        <thead>
                            <tr>
                                <th>编号</th>
                                <th>软件帐号</th>
                                <th>密码</th>
                                <th>姓名</th>
                                <th>用户手机号</th>
                                <th>身份证号</th>
                                <th>银行卡号</th>
                                <th>开户行</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody id="tr_html">
                        <?php if(is_array($lists) || $lists instanceof \think\Collection || $lists instanceof \think\Paginator): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$user): $mod = ($i % 2 );++$i;?>
                            <tr>
                                <td><?php echo $user['id']; ?></td>
                                <td><?php echo $user['accountid']; ?></td>
                                <td><?php echo $user['password']; ?></td>
                                <td><?php echo $user['realname']; ?></td>
                                <td><?php echo $user['utel']; ?></td>
                                <td><?php echo $user['ppnum']; ?></td>
                                <td><?php echo $user['banknum']; ?></td>
                                <td><?php echo $user['bankname']; ?></td>
                                <td>
                                    <a href="/admin/pay/regist/id/<?php echo $user['id']; ?>"  target="_Blank"><button class="btn"><i class="icon icon-file-text-o"></i> 开户</button></a>
                                    <a href="/admin/pay/opay/id/<?php echo $user['id']; ?>" target="_Blank"><button class="btn btn-danger"><i class="icon icon-file-text-o"></i> 转账</button></a>
                                    <a href="/admin/pay/tixian/id/<?php echo $user['accountid']; ?>"   target="_Blank"><button class="btn"><i class="icon icon-file-text-o"></i> 提现</button></a>
                                </td>
                            </tr>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                            <tr>
                                <td colspan="12">
                                <?php echo $lists->render(); ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <form action="/admin"></form>
    </div>

</div>
<script type="text/javascript" src="/public/static/admin/js/Common.js"></script>


</body>
</html>