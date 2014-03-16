﻿jQuery(function ($) {
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

var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-47897501-1']);
_gaq.push(['_trackPageview']);
(function () {
    var ga = document.createElement('script');
    ga.type = 'text/javascript';
    ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';

    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(ga, s);
})();