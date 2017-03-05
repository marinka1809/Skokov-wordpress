$=jQuery

$(document).ready(function(){

    artificialLink  (".item");

    $('#masonry').masonry({
        itemSelector: '.item',
        columnWidth: '.grid-sizer',
        percentPosition: true
    });

    $('#news-list-section').masonry({
        itemSelector: '.item',
        percentPosition: true
    });

    $('.sl').slick({
        slidesToShow: 8,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 6,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 800,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1
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

    function artificialLink(element) {

        $(element).on("click", function (e) {
            if (!(e.target.getAttribute('href')== null)) {
                href= e.target.getAttribute('href');
            }
            else {
                href = $(this).attr("data-href");
            }
            window.location.href=href;
            e.preventDefault();
        });
    };
});

$(document).on('click', '[data-toggle="lightbox"]', function(event) {
    event.preventDefault();
    $(this).ekkoLightbox();
});

