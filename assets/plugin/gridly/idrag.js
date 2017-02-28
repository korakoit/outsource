// JavaScript Document
$(function(){
	$(".m_title").bind('mouseover',function(){
		$(this).css("cursor","move");
	});
	
    //var $show = $("#loader"); //进度条
    //var $orderlist = $("#orderlist");
	var $list = $(".module_list");
	$list.sortable({
		opacity: 0.6,
		revert: true,
		cursor: 'move',
		handle: '.m_title',
		helper:'clone',
		delay: 150,
		tolerance : 'intersect',
		distance : 1, 
		update: function(){
			 var new_order = [];
             $(this).parent().find(".modules").each(function() {
                new_order.push(this.title);
             });
			 var newid = new_order.join(',');
			 //alert(newid)
			 //var oldid = $(this).parent().find('.orderlist').val();
			 $.ajax({
                type: "post",
                url: "/product/sortCategory",
                data: { order: newid },   //排列顺序
                beforeSend: function() {
                    
                },
                success: function(msg) {
                    layer.msg('排序成功');
                }
             });
		}
	});
});