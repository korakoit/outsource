
function show_error_messsage(element,errorMsg){
	element.attr('data-toggle','popover');
	element.popover({placement:'bottom',content:errorMsg,trigger:'manual'});
	element.popover('show');
	var pop = element.parent().find(".popover");
	pop.addClass('btvdclass');
	
	pop.click(function(){
		$(this).remove();
	});

	element.click(function(){
		pop.remove();
	});

	element.focus(function(){
		pop.remove();
	});
}

function hide_error_message(element){
	element.parent().find(".popover").remove();
}