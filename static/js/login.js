$(document).ready(function() {
	init();
});

function init(){
	$('#signin').on('click',function(){
		var email = $('#email').val();
		var pass = $('#pass').val();
		if(email.length<1){
			alert('Please enter email');
			return false;
		}
		else if(pass.length<1){
			alert('Please enter password');
			return false;
		}
		//do something
	});
}