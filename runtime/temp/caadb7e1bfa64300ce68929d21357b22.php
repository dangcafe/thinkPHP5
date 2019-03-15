<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"D:\phpStudy\PHPTutorial\WWW\lfgj-1/application/agent\view\index\index.html";i:1536411051;}*/ ?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="/public/static/hui/lib/html5shiv.js"></script>
<script type="text/javascript" src="/public/static/hui/lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/public/static/hui/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/public/static/hui/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/public/static/hui/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/public/static/hui/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/public/static/hui/static/h-ui.admin/css/style.css" />
<link rel="stylesheet" type="text/css" href="/public/static/uploadify/uploadify.css" />

<!--[if IE 6]>
<script type="text/javascript" src="/public/static/hui/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<!--/meta 作为公共模版分离出去-->

<title>代理商注册</title>
<meta name="keywords" content="代理商注册">
</head>
<body>
<article class="page-container">
	<form action="<?php echo url('/agent/index/add'); ?>" method="post" class="form form-horizontal" id="form-member-add">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>代理账号：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="agentnum" name="agentnum">
			</div>
		</div>	
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>代理类型：</label>
			<div class="formControls col-xs-8 col-sm-9">
				 <input type="radio" class="daili"  value='1' name="type" checked>
				 <label for="radio-1">个人代理</label>
				 <input type="radio" class="daili"  value='2' name="type">
				 <label for="radio-2">公司代理</label>
			</div>	
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>姓名(返佣)：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="username" name="username">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>联系电话(返佣)：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="mobile" name="mobile">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>银行卡号(返佣)：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" placeholder="" name="banknum" id="banknum">
			</div>
		</div>			
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>银行卡归属行(返佣)：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" placeholder="精确到支行:例中国建设银行东方路支行" name="banklocal" id="banklocal">
			</div>
		</div>			
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>银行卡绑定手机号(返佣)：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" placeholder="" name="bindphone" id="bindphone">
			</div>
		</div>		
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>身份证号(返佣)：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" placeholder="" name="ppnum" id="ppnum">
			</div>
		</div>		
		<div class="row cl">
              <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>身份证正面(返佣)：</label>
              <div class="formControls col-xs-8 col-sm-9">
                <input id="file_upload"  type="file" multiple="true" >
                <img style="display: none" id="upload_org_code_img" src="" width="150" height="150">
                <input id="file_upload_image" name="img1" type="hidden" multiple="true" value="">
              </div>
        </div>		
        <div class="row cl">
              <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>身份证反面(返佣)：</label>
              <div class="formControls col-xs-8 col-sm-9">
                <input id="file_upload2"  type="file" multiple="true" >
                <img style="display: none" id="upload_org_code_img2" src="" width="150" height="150">
                <input id="file_upload_image2" name="img2" type="hidden" multiple="true" value="">
              </div>
        </div>  
        <!-- 企业资料填写  -->
        <div style="display: none" id='additional'>
        	<p style='text-align: center;color:red;'>公司相关资料填写</p>
        	<div class="row cl">
				<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>公司名称：</label>
				<div class="formControls col-xs-8 col-sm-9">
					<input type="text" class="input-text" placeholder="" name="company" id="ppnumceo">
				</div>
			</div>	         	
			<div class="row cl">
				<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>企业法人姓名：</label>
				<div class="formControls col-xs-8 col-sm-9">
					<input type="text" class="input-text" placeholder="" name="ceo" id="ppnumceo">
				</div>
			</div>	        	
			<div class="row cl">
				<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>企业法人身份证号：</label>
				<div class="formControls col-xs-8 col-sm-9">
					<input type="text" class="input-text" placeholder="" name="ppnumceo" id="ppnumceo">
				</div>
			</div>
			<div class="row cl">
              <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>法人身份证正面：</label>
              <div class="formControls col-xs-8 col-sm-9">
                <input id="file_upload3"  type="file" multiple="true" >
                <img style="display: none" id="upload_org_code_img3" src="" width="150" height="150">
                <input id="file_upload_image3" name="img3" type="hidden" multiple="true" value="">
              </div>
	        </div>		
	        <div class="row cl">
	              <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>法人身份证反面：</label>
	              <div class="formControls col-xs-8 col-sm-9">
	                <input id="file_upload4"  type="file" multiple="true" >
	                <img style="display: none" id="upload_org_code_img4" src="" width="150" height="150">
	                <input id="file_upload_image4" name="img4" type="hidden" multiple="true" value="">
	              </div>
	        </div> 
	        <div class="row cl">
	              <label class="form-label col-xs-4 col-sm-3">营业执照：</label>
	              <div class="formControls col-xs-8 col-sm-9">
	                <input id="file_upload5"  type="file" multiple="true" >
	                <img style="display: none" id="upload_org_code_img5" src="" width="150" height="150">
	                <input id="file_upload_image5" name="img5" type="hidden" multiple="true" value="">
	              </div>
	        </div>	        
	    </div>     
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
				<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
			</div>
		</div>

	</form>
</article>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/public/static/hui/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/public/static/hui/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/public/static/hui/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="/public/static/hui/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本--> 
<script type="text/javascript" src="/public/static/hui/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/public/static/hui/lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="/public/static/hui/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="/public/static/hui/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript" src="/public/static/uploadify/jquery.uploadify.min.js"></script>
<script>
$(function() {
	//身份证正面
    $("#file_upload").uploadify({
        'swf'        	   : '/public/static/uploadify/uploadify.swf',
        'uploader'   	   : '<?php echo url('api/image/upload'); ?>',
        'fileTypeDesc'	   : 'Image files',
        'fileObjName'	   : 'file',
        'fileTypeExts'	   : '*.gif; *.jpg; *.png',
        'buttonText' 	   : '点击上传身份证正面',
        'onUploadSuccess'  : function(file ,data,response){
        	console.log(file);
        	console.log(data);
        	console.log(response);
        	if (response) {
        		var obj = JSON.parse(data);
        		$('#upload_org_code_img').attr('src',obj.data);
        		$('#file_upload_image').attr('value',obj.data);
        		$('#upload_org_code_img').show();
        	}
        }
    });  
    //身份证反面  
    $("#file_upload2").uploadify({
        'swf'        	   : '/public/static/uploadify/uploadify.swf',
        'uploader'   	   : '<?php echo url('api/image/upload'); ?>',
        'fileTypeDesc'	   : 'Image files',
        'fileObjName'	   : 'file',
        'fileTypeExts'	   : '*.gif; *.jpg; *.png',
        'buttonText' 	   : '点击上传身份证反面',
        'onUploadSuccess'  : function(file ,data,response){
        	console.log(file);
        	console.log(data);
        	console.log(response);
        	if (response) {
        		var obj = JSON.parse(data);
        		$('#upload_org_code_img2').attr('src',obj.data);
        		$('#file_upload_image2').attr('value',obj.data);
        		$('#upload_org_code_img2').show();
        	}
        }
    });  
    //法人身份证正面   
    $("#file_upload3").uploadify({
        'swf'        	   : '/public/static/uploadify/uploadify.swf',
        'uploader'   	   : '<?php echo url('api/image/upload'); ?>',
        'fileTypeDesc'	   : 'Image files',
        'fileObjName'	   : 'file',
        'fileTypeExts'	   : '*.gif; *.jpg; *.png',
        'buttonText' 	   : '上传法人身份证正面',
        'onUploadSuccess'  : function(file ,data,response){
        	console.log(file);
        	console.log(data);
        	console.log(response);
        	if (response) {
        		var obj = JSON.parse(data);
        		$('#upload_org_code_img3').attr('src',obj.data);
        		$('#file_upload_image3').attr('value',obj.data);
        		$('#upload_org_code_img3').show();
        	}
        }
    });    
    //法人身份证反面   
    $("#file_upload4").uploadify({
        'swf'        	   : '/public/static/uploadify/uploadify.swf',
        'uploader'   	   : '<?php echo url('api/image/upload'); ?>',
        'fileTypeDesc'	   : 'Image files',
        'fileObjName'	   : 'file',
        'fileTypeExts'	   : '*.gif; *.jpg; *.png',
        'buttonText' 	   : '上传法人身份证反面',
        'onUploadSuccess'  : function(file ,data,response){
        	console.log(file);
        	console.log(data);
        	console.log(response);
        	if (response) {
        		var obj = JSON.parse(data);
        		$('#upload_org_code_img4').attr('src',obj.data);
        		$('#file_upload_image4').attr('value',obj.data);
        		$('#upload_org_code_img4').show();
        	}
        }
    });    
    //营业执照  
    $("#file_upload5").uploadify({
        'swf'        	   : '/public/static/uploadify/uploadify.swf',
        'uploader'   	   : '<?php echo url('api/image/upload'); ?>',
        'fileTypeDesc'	   : 'Image files',
        'fileObjName'	   : 'file',
        'fileTypeExts'	   : '*.gif; *.jpg; *.png',
        'buttonText' 	   : '上传营业执照',
        'onUploadSuccess'  : function(file ,data,response){
        	console.log(file);
        	console.log(data);
        	console.log(response);
        	if (response) {
        		var obj = JSON.parse(data);
        		$('#upload_org_code_img5').attr('src',obj.data);
        		$('#file_upload_image5').attr('value',obj.data);
        		$('#upload_org_code_img5').show();
        	}
        }
    });
    //代理页面切换
 	$(".daili").change(function(){
 		var val=$(this).attr("value");
 		if (val>1) {
 			$("#additional").attr('style','');
 		}else{
 			$("#additional").attr('style','display:none');
 		}
 	});
});
</script>
<script type="text/javascript">
$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	
	$("#form-member-add").validate({
		rules:{
			username:{
				required:true,
				minlength:2,
				maxlength:16
			},			
			agentnum:{
				required:true,
				minlength:2,
				maxlength:16
			},
			mobile:{
				required:true,
				isMobile:true,
			},
			banknum:{
				required:true,
			},				
			banklocal:{
				minlength:6,
				maxlength:50,
			},			
			bindphone:{
				required:true,
			},
			ppnum:{
				required:true,
			},
			
		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		submitHandler:function(form){
			return true;
		}
	});
});
</script> 
</body>
</html>