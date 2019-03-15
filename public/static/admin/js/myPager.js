var myPager = {
		pagerid 			: 'myPager', //divID
		mode				: 'link', //模式(link 或者 click)
		pno					: 1, //当前页码
		total				: 1, //总页码
		totalRecords		: 0, //总数据条数
		isShowFirstPageBtn	: true, //是否显示首页按钮
		isShowLastPageBtn	: true, //是否显示尾页按钮
		isShowPrePageBtn	: true, //是否显示上一页按钮
		isShowNextPageBtn	: true, //是否显示下一页按钮
		isShowTotalPage 	: true, //是否显示总页数
		isShowCurrPage		: true,//是否显示当前页
		isShowTotalRecords 	: false, //是否显示总记录数
		isGoPage 			: false,	//是否显示页码跳转输入框
		isWrapedPageBtns	: false,	//是否用span包裹住页码按钮
		isWrapedInfoTextAndGoPageBtn : true, //是否用span包裹住分页信息和跳转按钮
		hrefFormer			: '', //链接前部
		hrefLatter			: '', //链接尾部
		gopageWrapId		: 'myPager_gopage_wrap',
		gopageButtonId		: 'myPager_btn_go',
		gopageTextboxId		: 'myPager_btn_go_input',
		lang				: {
			firstPageText			: '首页',
			firstPageTipText		: '首页',
			lastPageText			: '尾页',
			lastPageTipText			: '尾页',
			prePageText				: '上一页',
			prePageTipText			: '上一页',
			nextPageText			: '下一页',
			nextPageTipText			: '下一页',
			totalPageBeforeText		: '共',
			totalPageAfterText		: '页',
			currPageBeforeText		: '当前第',
			currPageAfterText		: '页',
			totalInfoSplitStr		: ' / ',
			totalRecordsBeforeText	: '共',
			totalRecordsAfterText	: '条数据',
			gopageBeforeText		: '&nbsp;转到',
			gopageButtonOkText		: '确定',
			gopageAfterText			: '页',
			buttonTipBeforeText		: '第',
			buttonTipAfterText		: '页'
		},
		//链接算法（当处于link模式）,参数n为页码
		getLink	: function(n){
			//这里的算法适用于比如：
			//hrefFormer=http://www.xx.com/news/20131212
			//hrefLatter=.html
			//那么首页（第1页）就是http://www.xx.com/news/20131212.html
			//第2页就是http://www.xx.com/news/20131212_2.html
			//第n页就是http://www.xx.com/news/20131212_n.html
			if(n == 1){
				return this.hrefFormer + this.hrefLatter;
			}
			return this.hrefFormer + n + this.hrefLatter;
		},
		//页码单击事件处理函数（当处于mode模式）,参数n为页码
		click	: function(n){
			//这里自己实现
			//这里可以用this或者myPager访问myPager对象
			return false;
		},
		//获取href的值（当处于mode模式）,参数n为页码
		getHref	: function(n){
			//默认返回'#'
			return '#';
		},
		//跳转框得到输入焦点时
		focus_gopage : function (){
			var btnGo = $('#'+this.gopageButtonId);
			$('#'+this.gopageTextboxId).attr('hideFocus',true);
			btnGo.show();
			btnGo.css('left','10px');
			$('#'+this.gopageTextboxId).addClass('focus');
			btnGo.animate({left: '+=30'}, 50);
		},
		//跳转框失去输入焦点时
		blur_gopage : function(){
			var _this = this;
			setTimeout(function(){
				var btnGo = $('#'+_this.gopageButtonId);
				btnGo.animate({
				    left: '-=25'
				  }, 100, function(){
					  btnGo.hide();
					  $('#'+_this.gopageTextboxId).removeClass('focus');
				  });
			},400);
		},
		//跳转输入框按键操作
		keypress_gopage : function(){
			var event = arguments[0] || window.event;
			var code = event.keyCode || event.charCode;
			//delete key
			if(code == 8) return true;
			//enter key
			if(code == 13){
				myPager.gopage();
				return false;
			}
			//copy and paste
			if(event.ctrlKey && (code == 99 || code == 118)) return true;
			//only number key
			if(code<48 || code>57)return false;
			return true;
		},
		//跳转框页面跳转
		gopage : function(){
			var str_page = $('#'+this.gopageTextboxId).val();
			if(isNaN(str_page)){
				$('#'+this.gopageTextboxId).val(this.next);
				return;
			}
			var n = parseInt(str_page);
			if(n < 1) n = 1;
			if(n > this.total) n = this.total;
			if(this.mode == 'click'){
				this._clickHandler(n);
			}else{
				window.location = this.getLink(n);
			}
		},
		//不刷新页面直接手动调用选中某一页码
		selectPage : function(n){
			this._config['pno'] = n;
			this.generPageHtml(this._config,true);
		},
		//生成控件代码
		generPageHtml : function(config,enforceInit){
			if(enforceInit || !this.inited){
				this.init(config);
			}
			
			var str_first='',str_prv='',str_next='',str_last='';
			if(this.isShowFirstPageBtn){
				if(this.hasPrv){
					str_first = '<li><a '+this._getHandlerStr(1)+' title="'
						+(this.lang.firstPageTipText || this.lang.firstPageText)+'">'+this.lang.firstPageText+'</a></li>';
				}else{
					str_first = '<li class="previous disabled"><a>'+this.lang.firstPageText+'</a></li>';
				}
			}
			if(this.isShowPrePageBtn){
				if(this.hasPrv){
					str_prv = '<li class="previous"><a '+this._getHandlerStr(this.prv)+' title="'
						+(this.lang.prePageTipText || this.lang.prePageText)+'">'+this.lang.prePageText+'</li></a>';
				}else{
					str_prv = '<li class="previous disabled"><a>'+this.lang.prePageText+'</a></li>';
				}
			}
			if(this.isShowNextPageBtn){
				if(this.hasNext){
					str_next = '<li class="next"><a '+this._getHandlerStr(this.next)+' title="'
						+(this.lang.nextPageTipText || this.lang.nextPageText)+'">'+this.lang.nextPageText+'</a></li>';
				}else{
					str_next = '<li class="next disabled"><a>'+this.lang.nextPageText+'</a></li>';
				}
			}
			if(this.isShowLastPageBtn){
				if(this.hasNext){
					str_last = '<li><a '+this._getHandlerStr(this.total)+' title="'
						+(this.lang.lastPageTipText || this.lang.lastPageText)+'">'+this.lang.lastPageText+'</a></li>';
				}else{
					str_last = '<li class="disabled"><a>'+this.lang.lastPageText+'</a></li>';
				}
			}
			var str = '';
			var dot = '<li class="spanDot"><a href="javascript:void(0)">...</a></li>';
			var total_info='<li><span>';
			var total_info_splitstr = ''+this.lang.totalInfoSplitStr+'';
			if(this.isShowCurrPage){
				total_info += this.lang.currPageBeforeText + '<aa style="color:#EA644A"> ' + this.pno + ' </aa>' + this.lang.currPageAfterText;
				if(this.isShowTotalPage){
					total_info += total_info_splitstr;
					total_info += this.lang.totalPageBeforeText + '<aa style="color:#EA644A"> '+this.total + ' </aa>' + this.lang.totalPageAfterText;
				}else if(this.isShowTotalRecords){
					total_info += total_info_splitstr;
					total_info += this.lang.totalRecordsBeforeText + '<aa style="color:#EA644A"> '+this.totalRecords + '</aa>' + this.lang.totalRecordsAfterText;
				}
			}else if(this.isShowTotalPage){
				total_info += this.lang.totalPageBeforeText + '<aa style="color:#EA644A"> '+this.total + ' </aa>' + this.lang.totalPageAfterText;;
				if(this.isShowTotalRecords){
					total_info += total_info_splitstr;
					total_info += this.lang.totalRecordsBeforeText + '<aa style="color:#EA644A"> '+this.totalRecords + ' </aa>' + this.lang.totalRecordsAfterText;
				}
			}else if(this.isShowTotalRecords){
				total_info += this.lang.totalRecordsBeforeText + '<aa style="color:#EA644A"> '+this.totalRecords + ' </aa>' + this.lang.totalRecordsAfterText;
			}
			total_info += '</span></li>';
			
			var gopage_info = '';
			if(this.isGoPage){
				gopage_info = '<li class="goPageBox">'+this.lang.gopageBeforeText+'<li id="'+this.gopageWrapId+'">'+
					'<input type="button" id="'+this.gopageButtonId+'" onclick="myPager.gopage()" value="'
						+this.lang.gopageButtonOkText+'" />'+
					'<input type="text" id="'+this.gopageTextboxId+'" onfocus="myPager.focus_gopage()"  onkeypress="return myPager.keypress_gopage(event);"   onblur="myPager.blur_gopage()" value="'+this.next+'" /></li>'+this.lang.gopageAfterText+'</li>';
			}
			
			//分页处理
			if(this.total <= 8){
				for(var i=1;i<=this.total;i++){
					if(this.pno == i){
						str += '<li class="active"><a href="javascript:void(0)">'+i+'</a></li>';
					}else{
						str += '<li><a '+this._getHandlerStr(i)+' title="'
							+this.lang.buttonTipBeforeText + i + this.lang.buttonTipAfterText+'">'+i+'</a></li>';
					}
				}
			}else{
				if(this.pno <= 5){
					for(var i=1;i<=7;i++){
						if(this.pno == i){
							str += '<li class="active"><a href="javascript:void(0)">'+i+'</a></li>';
						}else{
							str += '<li><a '+this._getHandlerStr(i)+' title="'+
								this.lang.buttonTipBeforeText + i + this.lang.buttonTipAfterText+'">'+i+'</a></li>';
						}
					}
					str += dot;
				}else{
					str += '<li><a '+this._getHandlerStr(1)+' title="'
						+this.lang.buttonTipBeforeText + '1' + this.lang.buttonTipAfterText+'">1</a></li>';
					str += '<li><a '+this._getHandlerStr(2)+' title="'
						+this.lang.buttonTipBeforeText + '2' + this.lang.buttonTipAfterText +'">2</a></li>';
					str += dot;
					
					var begin = this.pno - 2;
					var end = this.pno + 2;
					if(end > this.total){
						end = this.total;
						begin = end - 4;
						if(this.pno - begin < 2){
							begin = begin-1;
						}
					}else if(end + 1 == this.total){
						end = this.total;
					}
					for(var i=begin;i<=end;i++){
						if(this.pno == i){
							str += '<li class="active"><a href="javascript:void(0)">'+i+'</a></li>';
						}else{
							str += '<li><a '+this._getHandlerStr(i)+' title="'
								+this.lang.buttonTipBeforeText + i + this.lang.buttonTipAfterText+'">'+i+'</a></li>';
						}
					}
					if(end != this.total){
						str += dot;
					}
				}
			}
			var pagerHtml = '<ul class="pager">';
			if(this.isWrapedPageBtns){
				pagerHtml += '<li class="pageBtnWrap">' + str_first + str_prv + str + str_next + str_last + '</li>'
			}else{
				pagerHtml += str_first + str_prv + str + str_next + str_last;
			}
			/*
			if(this.isWrapedInfoTextAndGoPageBtn){
				pagerHtml += '<li class="infoTextAndGoPageBtnWrap">' + total_info + gopage_info + '</li>';
			}else{
				pagerHtml += total_info + gopage_info;
			}*/
			pagerHtml += total_info + gopage_info;
			pagerHtml += '</ul>';
			//pagerHtml +=total_info;
			//var _html = "";
			$("#"+this.pagerid).html(pagerHtml);
		},
		//分页按钮控件初始化
		init : function(config){
			this.pno = isNaN(config.pno) ? 1 : parseInt(config.pno);
			this.total = isNaN(config.total) ? 1 : parseInt(config.total);
			this.totalRecords = isNaN(config.totalRecords) ? 0 : parseInt(config.totalRecords);
			if(config.pagerid){this.pagerid = config.pagerid;}
			if(config.mode){this.mode = config.mode;}
			if(config.gopageWrapId){this.gopageWrapId = config.gopageWrapId;}
			if(config.gopageButtonId){this.gopageButtonId = config.gopageButtonId;}
			if(config.gopageTextboxId){this.gopageTextboxId = config.gopageTextboxId;}
			if(config.isShowFirstPageBtn != undefined){this.isShowFirstPageBtn=config.isShowFirstPageBtn;}
			if(config.isShowLastPageBtn != undefined){this.isShowLastPageBtn=config.isShowLastPageBtn;}
			if(config.isShowPrePageBtn != undefined){this.isShowPrePageBtn=config.isShowPrePageBtn;}
			if(config.isShowNextPageBtn != undefined){this.isShowNextPageBtn=config.isShowNextPageBtn;}
			if(config.isShowTotalPage != undefined){this.isShowTotalPage=config.isShowTotalPage;}
			if(config.isShowCurrPage != undefined){this.isShowCurrPage=config.isShowCurrPage;}
			if(config.isShowTotalRecords != undefined){this.isShowTotalRecords=config.isShowTotalRecords;}
			if(config.isWrapedPageBtns){this.isWrapedPageBtns=config.isWrapedPageBtns;}
			if(config.isWrapedInfoTextAndGoPageBtn){this.isWrapedInfoTextAndGoPageBtn=config.isWrapedInfoTextAndGoPageBtn;}
			if(config.isGoPage != undefined){this.isGoPage=config.isGoPage;}
			if(config.lang){
				for(var key in config.lang){
					this.lang[key] = config.lang[key];
				}
			}
			this.hrefFormer = config.hrefFormer || '';
			this.hrefLatter = config.hrefLatter || '';
			if(config.getLink && typeof(config.getLink) == 'function'){this.getLink = config.getLink;}
			if(config.click && typeof(config.click) == 'function'){this.click = config.click;}
			if(config.getHref && typeof(config.getHref) == 'function'){this.getHref = config.getHref;}
			if(!this._config){
				this._config = config;
			}
			//validate
			if(this.pno < 1) this.pno = 1;
			this.total = (this.total <= 1) ? 1: this.total;
			if(this.pno > this.total) this.pno = this.total;
			this.prv = (this.pno<=2) ? 1 : (this.pno-1);
			this.next = (this.pno >= this.total-1) ? this.total : (this.pno + 1);
			this.hasPrv = (this.pno > 1);
			this.hasNext = (this.pno < this.total);
			
			this.inited = true;
		},
		_getHandlerStr : function(n){
			if(this.mode == 'click'){
				return 'href="'+this.getHref(n)+'" onclick="return myPager._clickHandler('+n+')"';
			}
			//link模式，也是默认的
			return 'href="'+this.getLink(n)+'"';
		},
		_clickHandler	: function(n){
			var res = false;
			if(this.click && typeof this.click == 'function'){
				res = this.click.call(this,n) || false;
			}
			return res;
		}
};