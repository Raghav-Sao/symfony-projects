$(document).on("mouseenter", "li", function() {
	var id = $(this).attr('id');
	$('#price'+id).css("background-color", "#E97770");
});
$(document).on("mouseleave", "li", function() {
	var id = $(this).attr('id');
	$('#price'+id).css("background", "none");
});
$(document).on("click", "li", function() {
	var id = $(this).attr('id');
});
$("#locality").css({'visibility':'visible'});
