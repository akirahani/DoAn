$(document).ready(function() {
    $('.slick_carousels').slick({
        slidesToShow: 2,
        variableWidth: true,
        centerMode: true,
        loop: false,
        nextArrow: '<svg class="arrow arrow-next" width="31" height="62" viewBox="0 0 41 79" fill="none" ><path d="M1.18359 1L39.3674 39.1838L1.18359 77.3675" stroke="black" stroke-width="2" stroke-linecap="round"/></svg>',
        prevArrow: '<svg class="arrow arrow-prev" width="31" height="62" viewBox="0 0 42 79" fill="none" ><path d="M40.1838 1L2.00007 39.1838L40.1838 77.3675" stroke="black" stroke-width="2" stroke-linecap="round"/></svg>',
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });
});