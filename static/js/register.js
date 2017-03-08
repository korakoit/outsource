$(document).ready(function() {
	init();
});

function init(){
	$('#signup').on('click',function(){
		var fname = $('#fname').val();
		var lname = $('#lname').val();
		var addr = $('#addr').val();
		var pass = $('#pass').val();
		var cpass = $('#cpass').val();
		var Profile = $('#Profile').val();
		var  Locan= $('#Locan').val();
		var  Website= $('#Website').val();
		var  Phone= $('#Phone').val();
		if(fname.length<1){
			alert('Please enter First Name');
		}
		else if(lname.length<1){
			alert('Please enter Last Name');
		}
		else if(addr.length<1){
			alert('Please enter Email Address');
		}
		else if(pass.length<1){
			alert('Please enter Password');
		}
		else if(cpass.length<1 ||pass!==cpass){
			alert('Please enter Password again');
		}else{
			//do something

		}
	});
}