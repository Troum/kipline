$(document).ready(function () {
    $('a.nav-link').on('click', function(e) {
        e.preventDefault();
        var id = $(this).attr('href').replace('#','');
        $('html, body').animate({
            scrollTop: $("div#" + id ).offset().top
        }, 1000)
    });
});