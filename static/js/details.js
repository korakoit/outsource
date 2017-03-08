$(document).ready(function() {
	//img 轮播
	showBox('picBox', 'listBox')();
	init();
	//商品轮播
	initslide();
	//goto cart
	toCart();
});
function init(){
	//back to top
	$('.subtitle .title a').on('click',function(e){
		e.preventDefault();
        $("body,html").animate({
            scrollTop: 0
        }, $(window).scrollTop()/5, "linear");
	});
	//num +-等
	$('#addnum').on('click',function(){
		var dom = $(this).prev('input');
		var value = parseInt(dom.val())+1;
		dom.val(value)
	})
	$('#numj').on('click',function(){
		var dom = $(this).next('input');
		var value = parseInt(dom.val())>1?parseInt(dom.val())-1:parseInt(dom.val());
		dom.val(value);
	})
}
//商品轮播
function initslide(){
	var minwid = $('.Similarpro ul').width();
    var liwid  = $('.Similarpro ul li').width();
    var len = $('.Similarpro ul li').size();
    $('.Similarpro ul').width(len*liwid*2>minwid?len*liwid*2:minwid);
    $('.Similarpro ul').width();
    $(".Similarpro").Xslider({
        unitdisplayed:6,
        loop:"cycle",
        numtoMove:1,//要移动的单位个数    必需项;
        unitlen:156,//移动的单位宽或高度     默认查找li的尺寸;
        speed:500,
        autoscroll:5000  //自动移动间隔时间     默认null不自动移动;
    });
}

//加入购物车
function toCart(){
	$('#tocart').on('click',function(){
		if(!Common.isLogin()){
			Common.goLoginPage();
		}else{//登录
			// dosomething

		}
	});
	
}