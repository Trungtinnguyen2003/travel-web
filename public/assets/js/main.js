(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner();


    // Initiate the wowjs
    new WOW().init();


    // Sticky Navbar
    $(window).scroll(function () {
        if ($(this).scrollTop() > 45) {
            $('.navbar').addClass('sticky-top shadow-sm');
        } else {
            $('.navbar').removeClass('sticky-top shadow-sm');
        }
    });


    // Dropdown on mouse hover
    const $dropdown = $(".dropdown");
    const $dropdownToggle = $(".dropdown-toggle");
    const $dropdownMenu = $(".dropdown-menu");
    const showClass = "show";

    $(window).on("load resize", function () {
        if (this.matchMedia("(min-width: 992px)").matches) {
            $dropdown.hover(
                function () {
                    const $this = $(this);
                    $this.addClass(showClass);
                    $this.find($dropdownToggle).attr("aria-expanded", "true");
                    $this.find($dropdownMenu).addClass(showClass);
                },
                function () {
                    const $this = $(this);
                    $this.removeClass(showClass);
                    $this.find($dropdownToggle).attr("aria-expanded", "false");
                    $this.find($dropdownMenu).removeClass(showClass);
                }
            );
        } else {
            $dropdown.off("mouseenter mouseleave");
        }
    });


    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({ scrollTop: 0 }, 1500, 'easeInOutExpo');
        return false;
    });


    // Testimonials carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        center: true,
        margin: 24,
        dots: true,
        loop: true,
        nav: false,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            992: {
                items: 3
            }
        }
    });

    function loadCompareList() {
        var compareList = JSON.parse(localStorage.getItem('compareList')) || [];
        $('#compareContainer').empty();
        compareList.forEach(function (hotel) {
            addHotelCard(hotel.id, hotel.name, hotel.rating, hotel.image);
        });
    }

    function saveCompareList() {
        var compareList = [];
        $('#compareContainer .compare-card').each(function () {
            var hotelId = $(this).data('hotel-id');
            var hotelName = $(this).find('h5').text();
            var hotelRating = $(this).find('p').eq(0).text().split(': ')[1];
            var hotelImage = $(this).find('img').attr('src');

            compareList.push({ id: hotelId, name: hotelName, rating: hotelRating, image: hotelImage });
        });
        localStorage.setItem('compareList', JSON.stringify(compareList));
    }



    function addHotelToCompare(hotelId, hotelName, hotelRating, hotelImage) {
        var compareList = JSON.parse(localStorage.getItem('compareList')) || [];
        var hotelExists = compareList.some(function (hotel) {
            return hotel.id === hotelId;
        });

        if (hotelExists) {
            toastr.warning('Khách sạn này đã được thêm vào danh sách so sánh.');
            return;
        }

        addHotelCard(hotelId, hotelName, hotelRating, hotelImage);
        compareList.push({ id: hotelId, name: hotelName, rating: hotelRating, image: hotelImage });
        localStorage.setItem('compareList', JSON.stringify(compareList));
        toastr.success('Đã thêm vào danh sách so sánh.');
    }
    function addHotelCard(hotelId, hotelName, hotelRating, hotelImage) {
        var image = hotelImage.startsWith('images') ? hotelImage : 'images/' + hotelImage;
        var card = '<div class="col-md-4 compare-card" data-hotel-id="' + hotelId + '">' +
            '<span class="remove-from-compare"  >&times;</span>' +
            '<h5>' + hotelName + '</h5>' +
            '<p>Rating: ' + hotelRating + '</p>' +
            '<img class="img-fluid" src="' + image + '" alt="">' +
            '</div>';
        $('#compareContainer').append(card);
     }

    $(document).ready(function () {
        loadCompareList();

        $('.add-to-compare').on('click', function () {
            var hotelId = $(this).data('hotel-id');
            var hotelName = $(this).data('hotel-name');
            var hotelRating = $(this).data('hotel-rating');
            var hotelImage = $(this).data('hotel-image');

            addHotelToCompare(hotelId, hotelName, hotelRating, hotelImage);
        });

        $(document).on('click', '.remove-from-compare', function () {
            $(this).closest('.compare-card').remove();
            saveCompareList();
            toastr.info('Đã xóa khỏi danh sách so sánh.');
        });
    });

})(jQuery);

