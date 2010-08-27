$(document).ready(function(){
	$('input:submit, .button').button();
	
	
	$('#flashcard-front').click(function(){
	    $(this).toggle();
	    $('#flashcard-back').toggle();
	});
	$('#flashcard-back').click(function(){
	    $(this).toggle();
	    $('#flashcard-front').toggle();
	});
});

