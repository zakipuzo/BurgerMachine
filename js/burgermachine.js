$(document).ready(function() {
    
    $('.stockchanged').hide();
    $('.plus').click(function() {
        $('.stockchanged').show();
        let plusinput=$(this).parent().children("input.stockinput");
        var oldvalue=parseInt(plusinput.val());
        plusinput.val(oldvalue+1);

    });

    $('.minus').click(function(e) {
        $('.stockchanged').show();
        let plusinput=$(this).parent().children("input.stockinput");
        var oldvalue=parseInt(plusinput.val());
        plusinput.val(oldvalue-1);
    });

    
    $('.message').animate({
        right: 0
    }).delay(3000).animate({
        right: -300
    });

    $('article.burger').on("touchstart", function(e) {
        $(this).toggleClass('verso');
        e.stopPropagation();
    });

    // $("article.burger a").on("touchstart", function(e) {
    //     e.stopPropagation();
    //     window.location.href = $(this).attr('href');
    // });


});
