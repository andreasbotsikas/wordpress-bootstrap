jQuery(function ($) {
    $('#products-list').on('click', '.pagination li a', function (e) {
        e.preventDefault();
        var link = $(this).attr('href');
        $('#products-list').fadeOut(500, function () {
            $(this).load(link + ' #products-list', function () {
                $(this).fadeIn(500);
            });
        });
    });
});