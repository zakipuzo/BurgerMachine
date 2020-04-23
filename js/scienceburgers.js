window.onload = function() {


    function addToStock(target, value) {
        $('a.stockIt').show()
        let newval = parseInt($(target).siblings('.stock').find('input:first-child').val()) + value;
        // update interface
        newval = Math.max(newval, 0);
        $(target).siblings('.stock').find('input:first-child').val(newval);
    }
    // Plus / minus stock
    $('td.plus').click(function(e) {
        addToStock($(this), 1);
        console.log("coucou");
    })

    $('td.minus').click(function(e) {
        addToStock($(this), -1)
    })

    // Make the potential messages appear and fade out
    $('.message').animate({
        right: 0
    }).delay(3000).animate({
        right: -300
    });

    // Mobile events

    $('article.burger').on("touchstart", function(e) {
        $(this).toggleClass('verso');
        e.stopPropagation();
    });

    // $("article.burger a").on("touchstart", function(e) {
    //     e.stopPropagation();
    //     window.location.href = $(this).attr('href');
    // });


}
