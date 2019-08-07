$('.menu-trigger').on('click',function(){
    if($(this).hasClass('active')){
        $(this).removeClass('active');
        $('.nav-burger').removeClass('open');
        $('.overlay-burger').removeClass('open');
    } else {
        $(this).addClass('active');
        $('.nav-burger').addClass('open');
        $('.overlay-burger').addClass('open');
    }
});
$('.overlay-burger').on('click',function(){
    if($(this).hasClass('open')){
        $(this).removeClass('open');
        $('.menu-trigger').removeClass('active');
        $('.nav-burger').removeClass('open');
    }
});

/*Pour fermer le menu lorsqu'on clique ailleurs que sur le menu*/
var div_cliquable = $('.menu-trigger');

    $(document.body).click(function(e) {

        if($('.menu-trigger').hasClass('active')) {

            // Si ce n'est pas #ma_div ni un de ses enfants
            if (!$(e.target).is(div_cliquable) && !$.contains(div_cliquable[0], e.target))
            {
                $('.menu-trigger').removeClass('open');
                $('.menu-trigger').removeClass('active');
                $('.nav-burger').removeClass('open');
                $('.overlay-burger').removeClass('open');
            }

        }

    });