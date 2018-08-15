$('.popup img').click(function(event){

    event.stopPropagation();
});
$(document).keydown(function(e){
    if (e.keyCode === 27){ 
        $('.popup').fadeOut(300);
       
    }
});

$('.popup').click(function(){
    $('.popup').fadeOut(300);
});

$('.slideMarble').click(function(){
	var target = $(this).data('target');
	$(this).hide();
	$(this).siblings('a').fadeIn();
	$('#'+target).click();
});