<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:53:"/data/www/lfgj/application/admin/view/pay/regist.html";i:1531358923;}*/ ?>
<!DOCTYPE html>
<html lang="cn">
<head>
	<meta charset="UTF-8">
	<title>开户</title>
</head>
<body>
		<form name="MerOrder" id="MerOrder" method="post" action="https://ebp.ips.com.cn/fpms-access/action/user/open">
			<input type="hidden" name="ipsRequest" value="<ipsRequest><argMerCode>209603</argMerCode><arg3DesXmlPara><?php echo $ipsRequest; ?></arg3DesXmlPara></ipsRequest>"/>
			<input type="submit">
		</form>
     <script language="javascript">
     	setTimeout(document.getElementById('MerOrder').submit(),100)
     </script>
</body>
</html>