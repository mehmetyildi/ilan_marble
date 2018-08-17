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
$(document).ready(function(){
    $('.disableOnSubmit').submit(function () {
        $(this).find("button[type='submit'], input[type='submit']").prop('disabled', true);
        $(this).find("button[type='submit'], input[type='submit']").after('<img src="' + globalBaseUrl + '/img/sending.gif" style="margin-left:8px; margin-top:15px; float: right;" />');
    });

    jQuery(function () {
        jQuery('#subForm').submit(function (e) {
            e.preventDefault();
            jQuery(this).find("button[type='submit'], input[type='submit']").prop('disabled', true);
            jQuery(this).find("button[type='submit'], input[type='submit']").html('<img src="'+globalBaseUrl+'/img/sending.gif" width="20" />');
            jQuery('#gif').show();
            jQuery.getJSON(
                this.action + "?callback=?",
                jQuery(this).serialize(),
                function (data) {
                    if (data.Status === 400) {
                        alert("Error: " + data.Message);
                    } else { // 200
                        jQuery('#bulletinRegular').hide();
                        jQuery('#subForm').hide();
                        jQuery('#success').show();
                    }
                });
        });
    });
});