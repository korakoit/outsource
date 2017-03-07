// JavaScript Document
/*
==========弹层公用函数==========
**/

popfruit=function(fruitname){
		var fruit=$('#'+fruitname),shell=fruit.find('.fruitshell'),flesh=fruit.find('.fruitflesh'),killer=fruit.find('.fruitkiller'),damnie6=$.browser.msie&&parseInt($.browser.version,10)<7,n,
			relocate=function(){
				flesh.stop(true,true).animate({'top':($(window).height()-flesh.outerHeight())/2+$(document).scrollTop()},500);
			};
		fruit.stop(true,true).fadeIn(200);
		shell.height($(document).height());
		flesh.css({'marginLeft':flesh.outerWidth()/-2,'marginTop':flesh.outerHeight()/-2});
		killer.click(function(){
			fruit.stop(true,true).fadeOut(200);
			if(damnie6){
				$("select").show();
			}
		});
		shell.click(function(){
			fruit.stop(true,true).fadeOut(200);	
		});
		if(damnie6){
			flesh.css('marginTop','0');
			$("select").hide();
			relocate();
			$(window).scroll(function(){
				relocate();
			}).resize(function(){
				relocate();
			});
		}
}