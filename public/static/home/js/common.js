//获取Url参数
function getParameter() {
    var obj = {};
    var url = document.URL;
    var para = "";
    if (url.lastIndexOf("?") > 0) {
        para = url.substring(url.lastIndexOf("?") + 1, url.length);
        var arr = para.split("&");
        para = "";
        for (var i = 0; i < arr.length; i++) {
            var key = arr[i].split("=")[0];
            var name = arr[i].split("=")[1];
            obj[key] = name;
        }
    }
    return obj;
}
//滑动预览
function scroll(scrollTop,speed) {
    var speed = speed > 0 ? speed :500;
    $("html,body").stop().animate({scrollTop:scrollTop},speed);
}

$(function(){
    (function () {
        //头部
        // var str_header = '<div class="header" id="header">' +
        //         '<div class="wrap clearfix">' +
        //             '<div class="logo">' +
        //                  '<a href="index.html" title="">P2P网贷专业服务商</a>' +
        //             '</div>' +
        //             '<div class="nav">' +
        //                 '<ul> ' +
        //                     '<li><a href="/index/index">首页</a></li>' +
        //                     '<li><a href="/index/index/news">资讯中心</a></li> ' +
        //                     '<li><a href="/index/index/download">下载中心</a></li> ' +
        //                     '<li><a href="/index/index/crude">原油期货</a></li> ' +
        //                     '<li><a href="/index/index/about">关于我们</a></li> ' +

        //                 '</ul>'+
        //             '</div>' +
        //            '<div class="info">' +
        //                 '<p class="user">' +
        //                     '<a href="/user/index/index" target="_blank" class="lgBtn">登录</a>' +
        //                     '<a href="user/login/regist" target="_blank" class="lgBtn">注册</a>' +
        //                 '</p>' +
        //                  '<p class="user" style="display: none"> Administrator <a href="javascript:;" class="lgBtn">退出</a> </p> ' +
        //             '</div> ' +
        //         '</div>' +
        //     '</div>';

        //尾部
        var str_footer = '<div class="footer clearfix">' +
                '<div class="w1200 clearfix">' +
                    '<div class="contact-nav">' +
                        '<a href="javascript:;">联系我们</a>' +
                        '<a href="javascript:;">关于我们</a>' +
                        '<a href="javascript:;">安全保障</a>' +
                        '<a href="javascript:;">商务合作</a>' +
                    '</div>'+
                    '<p class="f_email">网站地址：www.ranyi1818.com</p>' +
//                  '<p class="f_address">服务热线：400-183-1828</p>' +
                    '<p class="f_company">网站备案号：沪ICP备17052428号-1</p>' +

                '</div>' +
                '<div class="backTop" id="backTop">' +
                    '<div class="backTopBtn">' +
                        '<img src="/public/static/home/images/common/backtop.png" width="17" height="10" alt="回到顶部" title="回到顶部" />' +
                        '<span>Top</span>' +
                    '</div>' +
                '</div>' +
            '</div>';

        var str_p2p = '<div class="entry">\
                            <iframe src="" width="100%" height="0" frameborder="0"></iframe>\
                       </div>';

        // var loadJSON = {
        //     "header":str_header,
        //     "footer":str_footer,
        //     "p2p":str_p2p
        //     // "p2p":''
        // }
        //加载头和尾
        // $("body").prepend(loadJSON.header).append(loadJSON.footer).append(loadJSON.p2p);
    })();

    //回到顶部.
    $("#backTop").on("click",function () {
        scroll(0);
    });

    //头部固定定位
    $(window).scroll(function(){
        var oStp = $(document).scrollTop();
        if (oStp >= 100) {
            if($('.header').hasClass('fixed')==false){
                $('.header').addClass('fixed');
            }
        }else{
            if($('.header').hasClass('fixed')){
                $('.header').removeClass('fixed');
            }
        }
    });

    //标记菜单栏
    (function () {
        var url = location.href; //地址链接
        var aLink = $("#header .nav ul > li");
        aLink.removeClass("active");
        if(getPara("index.html")){
            aLink.eq(0).addClass("current");
        }
        if(getPara("news.html")){
            aLink.eq(1).addClass("current");
        }

        if(getPara("download.html")){
            aLink.eq(3).addClass("current");
        }
        if(getPara("crude.html")){
            aLink.eq(2).addClass("current");
        }
        if(getPara("about.html")){
            aLink.eq(4).addClass("current");
        }
        //判断是否是当前页面。
        function  getPara(arg) {
            return url.indexOf(arg) > 0 ;
        }
    })();
});

