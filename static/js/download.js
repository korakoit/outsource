$(document).ready(function() {
	init();
});

function init(){
	//checkbox
	$('.checklist').on('click','label',function(){
		//allcheck
		if($(this).hasClass('allcheck')){
			if($(this).hasClass('checked')){
				$('.checklist label').removeClass('checked');
			}else{
				$('.checklist label').addClass('checked');
			}
		}else{//单选
			$(this).toggleClass('checked');
			if($('.checklist table label').length == $('.checklist table label.checked').length&&$('.checklist label').length>0 ){ //全选
				$('.checklist .all label').addClass('checked');
			}else{
				$('.checklist .all label').removeClass('checked');
			}
		}
	});

	//delete
	$('.checklist th.th4 p').on('click',function(){
		var dom = $(this).closest('tr');
		dom.remove(); //页面删除
		//  do something // 接口删除
	});

	//download
	$('#download').on('click',function(){
		if($('.checklist table label.checked').length){
			//do something 
		}
	});
}