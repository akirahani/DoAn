$(document).ready(function() {
    $('.text-danger').each(function() {
        var element = $(this).parent().parent();
        if (element.hasClass('form-group')) {
            element.addClass('has-error');
        }
    });
    $("#menu >ul >li").has("li").addClass("withsubs");
    $("#menu > ul > li > div > .wrapper > ul > li").has("li").addClass("hasthird");
    $('#menu .menu_drop_down').each(function() {
        var menu = $('#menu').offset();
        var dropdown = $(this).parent().offset();
        var dropdown_wrapper = $(this).offset();
        var i = (dropdown.left + $(this).outerWidth()) - (menu.left + $('#menu').outerWidth());
        if (i > 0) {
            $(this).css('margin-left', '-' + i + 'px');
        }
        var r = (menu.left - dropdown_wrapper.left);
        if (r > 0) {
            $(this).css('margin-right', '-' + r + 'px');
        }
    });
    $('.mobile_menu_trigger').click(function() {
        $(this).find(".nav-icon").toggleClass("active");
        $('.mobile_menu_wrapper').toggleClass("active");
    });
    $(".mobile_menu_wrapper").click(function() {
        $('.mobile_menu_trigger').find(".nav-icon").toggleClass("active");
        $(this).toggleClass("active");
    }).children().click(function(e) {
        return false;
    });
    // 
    // 
    $('.mobile_menu li').bind().click(function(e) {
        $(this).toggleClass("open").find('>ul').stop(true, true).slideToggle(500).end().siblings()
            .find('>ul').slideUp().parent().removeClass("open");
        e.stopPropagation();
    });
    $('.mobile_menu li a').click(function(e) {
        e.stopPropagation();
    });
    $('a.external').on('click', function(e) {
        e.preventDefault();
        window.open($(this).attr('href'));
    });

    // xu ly khi scroll top
    $(window).scroll(function() {
        var scrollTop = $(this).scrollTop();
        //make fixed top menu
        if (scrollTop > 50) {
            $(".header").addClass("fix-header");
            $('#back-to-top').fadeIn();
        } else {
            $(".header").removeClass("fix-header");
            $('#back-to-top').fadeOut();
        }
    });
    $('#back-to-top').click(function() {
        $('body,html').animate({
            scrollTop: 0
        }, 800);
        return false;
    });
});