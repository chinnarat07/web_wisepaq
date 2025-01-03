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

    const glightbox = GLightbox({
        selector: '.glightbox'
      });
     
    // เมื่อโฮเวอร์ที่ลิงก์ .show-content
     $('.container-project').on('mouseenter', function () {       
        $(".project").css("width","100%");
        $(".img-fluid-project").css("height","550px");
        // ซ่อนเนื้อหาทั้งหมดก่อน
        $('.content_project').hide();
    
        // แสดงเฉพาะเนื้อหาที่ตรงกับ ID
        $('.content_project').fadeIn('slow');
    }).on('mouseleave', function () {
        // ซ่อนเนื้อหาทั้งหมดเมื่อเลิกโฮเวอร์
        $('.content_project').slideUp('slow');
        // ตรวจสอบขนาดหน้าจอ
        if ($(window).width() > 768) {
            $(".project").css("width", "50%");
        } else {
            $(".project").css("width", "100%"); // จอเล็กให้แสดงเต็ม
        }
        $(".img-fluid-project").css("height","330px");
    });
    
    // star stiky
    const whiteStar = "img/star.png"; // ดาวสีขาว
    const yellowStar = "img/star (1).png"; // ดาวสีเหลือง
    const whiteStarBorder = "img/star (2).png"; // ดาวสีขาวขอบดำ

    let currentImage = whiteStar; // เริ่มต้นเป็นดาวสีขาว

            $("#myStar")
                .mousedown(function () { // เมื่อกดเมาส์
                    $(this).attr("src", whiteStarBorder); // เปลี่ยนเป็นดาวสีขาวขอบดำ
                })
                .mouseup(function () { // เมื่อปล่อยเมาส์
                    if (currentImage === whiteStar) {
                        $(this).attr("src", yellowStar); // เปลี่ยนเป็นดาวสีเหลือง
                        currentImage = yellowStar;
                    } else {
                        $(this).attr("src", whiteStar); // เปลี่ยนเป็นดาวสีขาว
                        currentImage = whiteStar;
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
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


    // Facts counter
    $('[data-toggle="counter-up"]').counterUp({
        delay: 10,
        time: 2000
    });


    
    // Header carousel
    $(".header-carousel").owlCarousel({
        smartSpeed: 1500,
        loop: true,
        nav: false,
        dots: true,
        items: 1,
        dotsData: true,
    });


    // Testimonials carousel
    $('.testimonial-carousel').owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        loop: true,
        nav: false,
        dots: true,
        items: 1,
        dotsData: true,
    });


    // Portfolio isotope and filter
    var portfolioIsotope = $('.portfolio-container').isotope({
        itemSelector: '.portfolio-item',
        layoutMode: 'fitRows'
    });
    $('#portfolio-flters li').on('click', function () {
        $("#portfolio-flters li").removeClass('active');
        $(this).addClass('active');

        portfolioIsotope.isotope({filter: $(this).data('filter')});
    });
    
   
})(jQuery);

