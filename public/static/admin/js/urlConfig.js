URL={		
		trans_address:"http://127.0.0.1:8080/pbank",
		//trans_address:"http://172.16.200.108:8080/pbank",
		//trans_address:"http://106.14.127.136",		
		//存管设置密码url
		return_ptpMerSetPasswordDep:"/ptpMerSetPasswordDep.do",
		//存管修改密码url
		return_merRevisePasswordDep:"/merRevisePasswordDep.do",
		//绑卡url
		return_ptpMerBindCardDep:"/ptpMerBindCardDep.do",
		//换卡url
		return_ptpMerUpdateBindCardDep:"/ptpMerReplaceCardDep.do",
		//标的还款
		repayProject:"/custRepaymentDeposit.do",
		//普通投标
		normalBid: "/merCommonProjectDep.do",
		//免密投标协议签订解除
		secretBidAgreementSign:"/merOnecommonProjectDep.do",
		//用户提现
		userWithdraw: "/custWithdrawalsDeposit.do",
		
		
		//*****后管大法好******\\
		manage_sideMenu : "/manage/common/sideMenu.html",//左边栏
		manage_accountDetail:"/userAcoountQuery.do",//账号详情
		manage_accountFreeze:"/accountFreeze.do",//账号冻结。解冻，等		
		manage_sysUserLogin:"/sysUserLogin.do",//后管的登录
		manage_index:"/manage/index.html",//登录成功跳转首页
		manage_platformRegister:"/platformRegister.do",//后管的登录
		manage_platformList:"/platformList.do",//平台列表
		manage_platformList_page:"/manage/platformList.html",//平台列表分页
		manage_platformList_payRecord_page:"/platformPayRecord.do",//缴费列表分页
		manage_platformList_calculateCost:"/calculateCost.do",//缴费计算 
		manage_platformList_recordPayment:"/recordPayment.do",//缴费记录添加
		manage_platformList_deleteRecord:"/deletePayRecord.do",//缴费记录删除
		manage_platformList_mustPayRecord_page:"/platformMustPayRecord.do",//平台应缴费用查询
		manage_allPlatform:"/allPlatform.do",//平台列表下拉	
		manage_platformUpdatePage:"/manage/platformUpdate.html",//平台编辑页
		manage_platformUpdatePre:"/platformDetail.do",//平台编辑页内容
		manage_platformUpdate:"/platformUpdate.do",//平台编辑
		
		manage_setRule:"/setRule.do",//规则设置
		manage_rule_Detail:"/ruleDetail.do",
		manage_ruleDetail:"/manage/ruleDetail.html",
		manage_ruleList:"/ruleList.do",
		manage_deleteRule:"/deleteRule.do",//规则删除		
		
		manage_sysUpdatePasswd:"/sysUpdatePasswd.do",//用户修改密码
		manage_sysUserAdd:"/sysUserAdd.do",//用户添加
		manageTransFile: "/transFileList.do",//转账文件列表
		managePreTransFileDownload: "/preTransOutFileDownload.do",//转账文件下载预先检查更新
		manageTransFileDownload: "/transOutFileDownload.do",//转账文件下载
		manageTransFileUpload:  "/transOutFileUpload.do",//转账结果文件上传
		manageCheckFileUpload:  "/accountStatementUpload.do",//对账文件上传
		manageCheckFileGenerate:  "/accountStatementGenerate.do",//对账文件生成

		
		manageUserFileUpload:  "/batchUsersImport.do",//批量导入用户
		//标的基本信息查询
		manageprojectInfoQuery: "/projectInfoQuery.do",
		//标的历史交易查询
		manageprojectTransacQuery: "/projectTransHistoryQuery.do",
		//标的历史交易下载
		manageprojectTransReportDownload: "/projectTransReportDownload.do",
		manageTransHistoryQuery: "/accountTransQuery.do", //交易查询
		manageTransHistoryDownload: "/transReportDownload.do",//交易记录下载
		manageProjectAnalyseQuery: "/projectAnalysis.do",//标的分析
		pbankManageLoginhtml: "/manage/login.html",//返回登录页面
		managePlatformTransOp: "/platformTransOperate.do",//平台交易操作
		manage_platformViewPage: "/manage/platformView.html",//平台查看
		manageUserList: "/sysUserList.do",//后管用户列表
		manage_logout: "/sysUserLogout.do",//用户退出
		manageAccountStatementList: "/accountStatementList.do", //对账文件查询
		manageAccountStatementDownload: "/accountStatementDownload.do", //对账文件下载
}