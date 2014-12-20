 $(document).ready(function(){
    $.validator.setDefaults({
        ignore: []
    });  
    $('#toggle-view li').click(function () {
            var text = $(this).children('p');
            if (text.is(':hidden')) {
                    text.slideDown('200');
                    $(this).children('a').children('span').html('-');
                    $(this).children('a').addClass("selected");		
                    $(this).children('a').children('h3').css("color","white");
                    $(this).children('a').children('span').css("color","white");		
            } 
            else {
                    text.slideUp('200');
                    $(this).children('a').children('span').html('+');		
                    $(this).children('a').removeClass("selected");
                    $(this).children('a').children('h3').css("color","#464646");
                    $(this).children('a').children('span').css("color","#0088cc");
            }
    });	
});