jQuery(function ($) {
    $('#products-list').on('click', '.pagination li:not(.active) a', function (e) {
        e.preventDefault();
        var link = $(this).attr('href');
        $('#products-list').addClass("loading-products");
        $("#products-list-content").fadeOut(300, function () {
            $('#products-list').load(link + ' #products-list-content', function () {
                $(this).removeClass("loading-products");
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