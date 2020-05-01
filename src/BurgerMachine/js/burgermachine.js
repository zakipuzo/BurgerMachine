

$(document).ready(function() {
    
   
    $('.plus').click(function() {
        $('.stockchanged').show();
        $('.editdelete').css("visibility","hidden")
        var plusinput=$(this).parent().children("input.stockinput");
        var  oldvalue=parseInt(plusinput.val());
        plusinput.attr('value', oldvalue+1);
    });

    $('.moins').click(function(e) {
        $('.stockchanged').show();
        $('.editdelete').css("visibility","hidden")
        var plusinput=$(this).parent().children("input.stockinput");
        var  oldvalue=parseInt(plusinput.val());
        plusinput.attr('value', oldvalue-1);
    });

    

    $('.fabriquer-error').animate({
        left: 0
    }).delay(2000).animate({
        left: -900
    });

    $('.fabriquer-success').animate({
        left: 0
    }).delay(2000).animate({
        left: -900
    });
});
