$(document).ready(function(){
	//$('#consola').css('opacity','0');
	$('#czyszczenie').click(function(){
		setTimeout(function(){
			$('#consola').css('opacity','1');
		},100);
		setTimeout(function(){
			$('#consola').css('opacity','0');
		},100);
	});

});
