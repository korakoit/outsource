$(document).ready(function() {
	//list
	initlist();
	//分页
	initpage();
});
//左边列表
function initlist(){
	$('#leftlist').on('click','.title',function(){
		var dom = $(this).next('ul');
		var self = $(this);
		if(!self.hasClass('show')){
			self.parents('#leftlist').find('.title').removeClass('show');
			self.addClass('show');
			if(dom.hasClass('on')){
				dom.slideUp('fast');
				dom.removeClass('on');
				self.removeClass('show');
				self.find('i').removeClass('active');
				dom.find('li').removeClass('show');
			}else{
				dom.slideDown('fast');
				dom.addClass('on');
				self.find('i').addClass('active');
			}
		}else{
			self.removeClass('show')
			if(dom.hasClass('on')){
				dom.removeClass('on')
				self.removeClass('show');
				dom.slideUp('fast');
				self.find('i').removeClass('active');
				dom.find('li').removeClass('show');
			}else{
				self.find('i').addClass('active');
				dom.addClass('on');
				dom.slideDown('fast');
			}
		}
		
		
	});
	$('#leftlist').on('click','ul li',function(){
		var ddom = $(this).parents('#leftlist');
		ddom.find('.title').removeClass('show');
		ddom.find('li').removeClass('show');
		$(this).addClass('show').parents('ul').prev('.title').addClass('show');
	});
}

function initpage(){
	pages(5)
}
//分页初始
function pages(count){
    laypage({
        cont: document.getElementById('page'),
        pages: count,
        groups: 5,
        curr: function(){ //通过url获取当前页，也可以同上（pages）方式获取
            var page = location.search.match(/page=(\d+)/);
            return page ? page[1] : 1;
        }(),
        jump: function(e, first){
            if(!first){
                var index=window.location.href.indexOf('&page');
                var url=window.location.href.substring(0,index);
                var index1=window.location.href.indexOf('?page');
                var url1=window.location.href.substring(0,index1);
                if(index>-1){
                    location.href =url+'&page='+e.curr;
                }
                else if(index1>-1){
                    location.href =url1+'?page='+e.curr;
                }else{
                	location.href =window.location.href+'?page='+e.curr;
                }
            }
        }
    });
}
//总页数转last_index
function toPageIndex(){
    var page=Common.getQueryString('page');
    if(page==null){
        return 0;
    }
    else{
        return (page-1)*24;
    }
}
//last_index转总页数
function toPageCount(index){
    var page_count=Math.ceil(index/24);
    return page_count;
}