$(function() {
	$(".dropdown-menu").hide();
	
	$(".drop").mouseover(function() {
		$('.dropdown-menu').slideDown(500);
	});
	$(".drop").mouseout(function() {
		$('.dropdown-menu').hide(300);
	});
});