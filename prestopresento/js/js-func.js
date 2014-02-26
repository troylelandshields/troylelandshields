$(function(){ 
	//Gallery Hover Effect
	$('.gallery-content td').hover(function(){
		$(this).find('.image-hover').show();
		$(this).find('.crop').hide();
	},
	function(){
		$(this).find('.image-hover').hide();
		$(this).find('.crop').show();
	});
});




