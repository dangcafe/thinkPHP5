var loginUserName = '';
Date.prototype.format = function(format){ 
    var o =  { 
    "M+" : this.getMonth()+1, //month 
    "d+" : this.getDate(), //day 
    "h+" : this.getHours(), //hour 
    "m+" : this.getMinutes(), //minute 
    "s+" : this.getSeconds(), //second 
    "q+" : Math.floor((this.getMonth()+3)/3), //quarter 
    "S" : this.getMilliseconds() //millisecond 
    };
    if(/(y+)/.test(format)){ 
    	format = format.replace(RegExp.$1, (this.getFullYear()+"").substr(4 - RegExp.$1.length)); 
    }
    for(var k in o)  { 
	    if(new RegExp("("+ k +")").test(format)){ 
	    	format = format.replace(RegExp.$1, RegExp.$1.length==1 ? o[k] : ("00"+ o[k]).substr((""+ o[k]).length)); 
	    } 
    } 
    return format; 
};



function initPlatformSelectList(needAllOption, callback){
	 var requestUrl = URL.trans_address + URL.manage_platformList;
	$.ajax({
		type : 'post',
		url : requestUrl,
		dataType : "json",
		data: {'pageIndex': 1, "pageSize": 1000},
		success : function(data) {
			checkUserLogin(data,URL.trans_address+URL.pbankManageLoginhtml);		
			if (data.ret_code == "000000") {
				$("#platformId").html("");
				var html="";
				if(needAllOption){
					html += '<option value="-1">全部</option>';
				}
				$.each( data.data.recordList, function(index, info) { 
					html=html+'<option value="'+info.platformId+'">'+info.paltformName+'</option>';		  
				});
				$("#platformId").html(html);
				if (typeof callback === "function"){
		            callback(); 
		        }
			} else {
				layer.alert(data.ret_msg);
			}
		}
	});
}

$('body').on('click','.sidebar .item.vertical > a',function(){
	 var ver = jQuery(this).next();
    if (ver.is(":visible")) {
        jQuery(this).parent().removeClass("open");
        ver.slideUp(200);
    } else {
        jQuery(this).parent().addClass("open");
        ver.slideDown(200);
    } 
    //alert('确认要删除吗？');
});

$('body').on('click','.sidebar-toggle',function(){
    if ($('.sidebar .sidebar-menu').is(":visible") === true) {
        $('.main-content').css({
            'margin-left': '0px'
        });
        $('.sidebar').css({
            'margin-left': '-180px'
        });
        $('.sidebar .sidebar-menu').hide();
        $(".main").addClass("sidebar-closed");
    } else {
        $('.main-content').css({
            'margin-left': '180px'
        });
        $('.sidebar .sidebar-menu').show();
        $('.sidebar').css({
            'margin-left': '0'
        });
        $(".main").removeClass("sidebar-closed");
    }
});

function responsiveView() {
    var wSize = $(window).width();
    if (wSize <= 768) {
        $('.main').addClass('sidebar-close');
        $('.sidebar .sidebar-menu').hide();
    }

    if (wSize > 768) {
        $('.main').removeClass('sidebar-close');
        $('.sidebar .sidebar-menu').show();
    }
}

function checkUserLogin(data,url){
	if(data.ret_code=="000006"){
		if(localStorage){
			localStorage.removeItem("loginUserName");
		}
    	window.location = url;
    }
}

function logout(){
	var requestUrl = URL.trans_address + URL.manage_logout;
	$.ajax({
		type : 'post',
		url : requestUrl,
		dataType : "json",
		success: function(data){
			if(data.ret_code == "000000" 
				|| data.ret_code == "000006"
				|| data.logout == "true"){
				if(localStorage){
					localStorage.removeItem("loginUserName");
				}
				window.location = "login.html";
			}
		},
		error: function(data){
			console.log(data);
		}
	});
}
/**
 * 获取账户类型名
 * @param type
 * @returns {String}
 */
function getAccountTypeName(type){
	if(!type){
		return "";
	}
	var typeName = "";
	switch(type){
	case "0": typeName="个人账户"; break;
	case "1": typeName="企业账户"; break;
	case "2": typeName="标的账户"; break;
	case "3": typeName="平台账户"; break;
	}
	return typeName;
}
/**
 * 获取交易状态名
 * @param transStatus
 * @returns {String}
 */
function getTransStatusName(transStatus){
	if(!transStatus){
		return "";
	}
	var transName = "";
	switch(transStatus){
	case "0": transName="处理中"; break;
	case "1": transName="处理成功"; break;
	case "2": transName="退款"; break;
	case "3": transName="延期"; break;
	case "4": transName="废弃"; break;
	}
	return transName;
}
/**
 * 获取交易类型名
 * @param transType
 * @returns {String}
 */
function getTransTypeName(transType){
	if(!transType){
		return "";
	}
	var transName = "";
	switch(transType){
	case "1": transName="个人充值"; break;
	case "2": transName="个人提现"; break;
	case "3": transName="平台提现"; break;
	case "4": transName="投资"; break;
	case "5": transName="满标划拨"; break;
	case "6": transName="标的取消退款"; break;
	case "7": transName="标的还款收益"; break;
	case "8": transName="标的还款"; break;
	case "9": transName="个人提现失败退款"; break;
	case "10": transName="平台提现失败退款"; break;
	}
	return transName;
}
