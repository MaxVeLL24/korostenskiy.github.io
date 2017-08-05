$(document).ready(function () {
    if ($(window).width() < 670) {
        $(".slider-toggle").css('display', 'block');
        $(".slide-element").css('display', 'none');
    } else {
        $(".slider-toggle").css('display', 'none');
        $(".slide-element").css('display', 'flex');
    }
    $(window).resize(function () {
        if ($(window).width() < 670) {
            $(".slider-toggle").css('display', 'block');
            $(".slide-element").css('display', 'none');
        } else {
            $(".slider-toggle").css('display', 'none');
            $(".slide-element").css('display', 'flex');
        }
    });
    $(".slider-toggle li a").click(function () {
        $(".slide-element").slideToggle('slow');
    });
    $("a.Detailstart").click(function () {
        $("div.balance-menu ul li a").removeClass('active');
        $("div.pmmBalance").css('display', 'none');
        $("div.railwayAccounting").css('display', 'none');
        $("div.local_trade").css('display', 'none');
        $("div.DetailBalance").slideToggle('slow');
        $(this).addClass('active');

    });
    $("a.ppmstart").click(function () {
        $("div.balance-menu ul li a").removeClass('active');
        $("div.DetailBalance").css('display', 'none');
        $("div.railwayAccounting").css('display', 'none');
        $("div.local_trade").css('display', 'none');
        $("div.pmmBalance").slideToggle('slow');
        $(this).addClass('active');
    });

    $("a.railway_start").click(function () {
        $("div.balance-menu ul li a").removeClass('active');
        $("div.DetailBalance").css('display', 'none');
        $("div.pmmBalance").css('display', 'none');
        $("div.local_trade").css('display', 'none');
        $("div.railwayAccounting").slideToggle('slow');
        $(this).addClass('active');
    });

    $("a.local_trade_start").click(function () {
        $("div.balance-menu ul li a").removeClass('active');
        $("div.DetailBalance").css('display', 'none');
        $("div.pmmBalance").css('display', 'none');
        $("div.railwayAccounting").css('display', 'none');
        $("div.local_trade").slideToggle('slow');
        $(this).addClass('active');
    });

});