$(document).ready(function(){
	initjoin();
	//联系我们的nav逻辑
});
// 底部加入邮箱的逻辑
function initjoin(){
	$('#join').on('click',function(event) {
		var dom = $(this);
		var predom = dom.prev('input[type="text"]').val();
		if(predom.length<1){
			alert('Please enter the mailbox');
		}
		else if(!Common.regExp.email.test(predom)){
			alert('Mailbox format error');
		}else{
			//进行join操作
			$.post("/about/addemail",{email:predom},function(result){
				var obj =  eval("("+result+")");
				if(obj.err_code == '0000'){
					alert('success');
					window.location.reload();
				}else{
					alert(obj.err_code);
				}
			});
		}
	});
}