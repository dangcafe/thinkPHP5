
$(function () {
	 $('#case').waypoint(function(direction) {
        if(direction == 'down'){
            $(".cscd").addClass("inview");
            $(".cd2").addClass("inview");
        }else if(direction == 'up'){
            $(".cscd").removeClass("inview");
            $(".cd2").removeClass("inview");
        }
    }, { offset: '50%' });

    //产品介绍
    $('.product').waypoint(function(direction) {
        var ele = $('.product');
        if(direction == 'down'){
            ele.addClass("inview");
        }else if(direction == 'up'){
            ele.removeClass("inview");
        }
    }, { offset: '100%' });

    //虚拟账户体系
    $('.account').waypoint(function(direction) {
        var ele = $('.account .asystem');
        if(direction == 'down'){
            ele.addClass("inview");
        }else if(direction == 'up'){
            ele.removeClass("inview");
        }
    }, { offset: '70%' });

    //合作银行
    $('.bank').waypoint(function(direction) {
        var ele = $('.bank');
        if(direction == 'down'){
            ele.addClass("inview");
        }else if(direction == 'up'){
            ele.removeClass("inview");
        }
    }, { offset: '70%' });

    //合作伙伴
    $('.partner').waypoint(function(direction) {
        var ele = $('.partner');
        if(direction == 'down'){
            ele.addClass("inview");
        }else if(direction == 'up'){
            ele.removeClass("inview");
        }
    }, { offset: '70%' });

});
    //demo展示
  $(document).ready(function(){
                        $(window).resize(function(){
                            $('#mobile' ).css({
                                position:'absolute',
                                left: ($(window).width() - $('#mobile').outerWidth())/2,
                                top: ($(window).height() - $('#mobile').outerHeight())/2
                            });
                        });
                        // 最初运行函数
                        $(window).resize();
                    });
 $(document).ready(function(){
                        $(window).resize(function(){
                            $('#pc' ).css({
                                position:'absolute',
                                left: ($(window).width() - $('#pc').outerWidth())/2,
                                top: ($(window).height() - $('#pc').outerHeight())/2
                            });
                        });
                        // 最初运行函数
                        $(window).resize();
                    });
 $(document).ready(function(){
        $(".tab a").click(function(){
        $(".tab a").eq($(this).index()).addClass("cur").siblings().removeClass('cur');
$(".table-list div").hide().eq($(this).index()).show();
       //另一种方法: $("div").eq($(".tab li").index(this)).addClass("on").siblings().removeClass('on'); 

        });
    });
	//显示灰色 jQuery 遮罩层 
function showBg() { 
var bh = $("body").height(); 
var bw = $("body").width(); 
$(".fullbg").css({ 
height:bh, 
width:bw, 
display:"block",
paddingRight:"17px"
 
}); 
$("#mobile").show();
$('body').css("overflow","hidden")
 
} 
function pcBg() { 
var bh = $("body").height(); 
var bw = $("body").width(); 
$(".fullbg").css({ 
height:bh, 
width:bw, 
display:"block",
paddingRight:"40px"
}); 
$("#pc").show();
$('body').css("overflow","hidden")
 
} 
 //专业团队
    $('.teams').waypoint(function(direction) {
        var ele = $('.teams');

        if(direction == 'down'){
            ele.addClass("inview");
        }else if(direction == 'up'){
            ele.removeClass("inview");
        }
    }, { offset: '70%' });
//关闭灰色 jQuery 遮罩 
function closeBg() { 
$(".fullbg,#mobile,#pc").hide(); 
$('body').css("overflow","auto");
} 