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
		}
	})
}