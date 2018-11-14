$('.scroll').click(function() {
    $('body').animate({
        scrollTop: eval($('#' + $(this).attr('target')).offset().top - 70)
    }, 1000);
});
