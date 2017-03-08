$(document).ready(function() {
	init();
});

function init(){
	$('#forget').on('click',function(){
		var email = $('#email').val();
		if(email.length<1){
			alert('Please enter email');
			return false;
		}
		else if(!Common.regExp.email.test(email)){
			alert('Mailbox format error');
			return false;
		}
		//do something
	});
}