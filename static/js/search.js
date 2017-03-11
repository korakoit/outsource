$(document).ready(function() {
	initsearch();
});

function initsearch(){
	$('#gosearch').on('click',function(e){
		e.preventDefault();
		var dom = $(this).prev('.input').find('input');
		var val = dom.val();
		if (val.length < 1) {
			alert('Please enter the name of the commodity');
		} else {
			//do something
            $('#search_list').html('');
            $.post("/search/index",{keywords:val},function(result){
                var obj =  eval("("+result+")");
                if(obj.err_msg == 'successful'){
                    var html = '';
                    $.each(obj.product_list,function(index,content){
                        html += '<a href="/product/details/'+content.id+'"><li>';
                        html += '<div class="img" style="background-image:url('+content.image+');"></div>';
                        html += '<p class="tit">'+content.name+'</p>';
                        html += '<p class="subtit">'+content.title+'</p>';
                        html += '</li></a>';
                    })
                    $('#search_list').append(html);
                }else{
                    alert(obj.err_msg);
                }
            });
		}
	})
}