(function ($) {
    "use strict";



    /*
    ============================================
    Wow Active  	         
    ============================================
    */
    function wowAnimation() {
        var wow = new WOW({
            boxClass: "wow",
            animateClass: "animated",
            offset: 0,
            mobile: false,
            live: true,
        });
        wow.init();
    }



    /*
    ===========================================
    Preloader			     
    ==========================================
    */
    function preloader() {
        $("#preloader").delay(0).fadeOut();
    }


    /*
    ===========================================
    Swiper Slider			     
    ==========================================
    */
    function thmSwiperInit() {
        const swiperElm = document.querySelectorAll(".thm-swiper__slider");
        swiperElm.forEach(function (swiperelm) {
            const swiperOptions = JSON.parse(swiperelm.dataset.swiperOptions);
            let thmSwiperSlider = new Swiper(swiperelm, swiperOptions);
        });
    }


    /*
    ===========================================
    Accordion Active		     
    ==========================================
    */
    function accordionActive() {
        if ($('.accordion-box-one').length) {
            $(".accordion-box-one").on('click', '.accord-btn', function () {

                if ($(this).hasClass('active') !== true) {
                    $('.accordion .accord-btn').removeClass('active');

                }

                if ($(this).next('.accord-content').is(':visible')) {
                    $(this).removeClass('active');
                    $(this).next('.accord-content').slideUp(500);
                } else {
                    $(this).addClass('active');
                    $('.accordion .accord-content').slideUp(500);
                    $(this).next('.accord-content').slideDown(500);
                }
            });
        }
    }












    /*============================================
	Mobile Menu	// SubMenu Dropdown Toggle
    =============================================*/
    if ($(".menu-area li.menu-item-has-children ul").length) {
        $(".menu-area .navigation li.menu-item-has-children").append(
            '<div class="dropdown-btn"><span class="fas fa-angle-down"></span></div>'
        );
    }



    /*============================================
	Mobile Nav Hide Show
    =============================================*/
    if ($(".mobile-menu").length) {
        var mobileMenuContent = $(".menu-area .main-menu").html();
        $(".mobile-menu .menu-box .menu-outer").append(mobileMenuContent);

        //Dropdown Button
        $(".mobile-menu li.menu-item-has-children .dropdown-btn").on("click", function () {
            $(this).toggleClass("open");
            $(this).prev("ul").slideToggle(300);
        });
        //Menu Toggle Btn
        $(".mobile-nav-toggler").on("click", function () {
            $("body").addClass("mobile-menu-visible");
        });

        //Menu Toggle Btn
        $(".menu-backdrop, .mobile-menu .close-btn").on("click", function () {
            $("body").removeClass("mobile-menu-visible");
        });
    }



    /*============================================
	Menu sticky & Scroll to top
    =============================================*/
    $(window).on("scroll", function () {
        var scroll = $(window).scrollTop();
        if (scroll < 245) {
            $("#sticky-header").removeClass("sticky-menu");
            $(".scroll-to-target").removeClass("open");
        } else {
            $("#sticky-header").addClass("sticky-menu");
            $(".scroll-to-target").addClass("open");
        }
    });



    /*=============================================
	Scroll Up  	         
    =============================================*/
    if ($(".scroll-to-target").length) {
        $(".scroll-to-target").on("click", function () {
            var target = $(this).attr("data-target");
            // animate
            $("html, body").animate({
                    scrollTop: $(target).offset().top,
                },
                1000
            );
        });
    }



    /*=============================================
	Odometer Active  	     
    =============================================*/
    $(".odometer").appear(function (e) {
        var odo = $(".odometer");
        odo.each(function () {
            var countNumber = $(this).attr("data-count");
            $(this).html(countNumber);
        });
    });




    /*============================================
	Magnific Popup		    
    =============================================*/
    $(".popup-image").magnificPopup({
        type: "image",
        gallery: {
            enabled: true,
        },
    });




    /*============================================
	Magnific Popup video	    
    =============================================*/
    $(".popup-video").magnificPopup({
        type: "iframe",
    });



    /*=============================================
	Search Toggler		    
    =============================================*/
    if ($(".search-toggler").length) {
        $(".search-toggler").on("click", function (e) {
            e.preventDefault();
            $(".search-popup").toggleClass("active");
            $(".mobile-nav__wrapper").removeClass("expanded");
            $("body").toggleClass("locked");
        });
    }



    /*=============================================
    Offcanvas Menu 
    =============================================*/
    $(".menu-tigger").on("click", function () {
        $(".extra-info,.offcanvas-overly").addClass("active");
        return false;
    });
    $(".menu-close,.offcanvas-overly").on("click", function () {
        $(".extra-info,.offcanvas-overly").removeClass("active");
    });



    /*=============================================
    Marquee mode
    =============================================*/
    if ($(".marquee_mode").length) {
        $('.marquee_mode').marquee({
            speed: 50,
            gap: 0,
            delayBeforeStart: 0,
            direction: 'left',
            duplicated: true,
            pauseOnHover: true,
            startVisible: true,
        });
    }


    /*=============================================
    Marquee mode Two
    =============================================*/
    if ($(".marquee_mode-two").length) {
        $('.marquee_mode-two').marquee({
            speed: 50,
            gap: 0,
            delayBeforeStart: 0,
            direction: 'right',
            duplicated: true,
            pauseOnHover: true,
            startVisible: true,
        });
    }



    /*=============================================
    Odometer 
    =============================================*/
    if ($(".odometer").length) {
        var odo = $(".odometer");
        odo.each(function () {
            $(this).appear(function () {
                var countNumber = $(this).attr("data-count");
                $(this).html(countNumber);
            });
        });
    }





    /*=============================================
      Img Magnific Popup 
      =============================================*/
    if ($(".img-popup").length) {
        var groups = {};
        $(".img-popup").each(function () {
            var id = parseInt($(this).attr("data-group"), 10);

            if (!groups[id]) {
                groups[id] = [];
            }

            groups[id].push(this);
        });

        $.each(groups, function () {
            $(this).magnificPopup({
                type: "image",
                closeOnContentClick: true,
                closeBtnInside: false,
                gallery: {
                    enabled: true
                }
            });
        });
    }





    //====== Magnific Popup
    if ($(".video-popup").length) {
        $(".video-popup").magnificPopup({
            type: "iframe",
            mainClass: "mfp-fade",
            removalDelay: 160,
            preloader: true,

            fixedContentPos: false
        });
    }
















    $(window).on("load", function () {
        preloader();
        wowAnimation();
        thmSwiperInit();
        accordionActive();

        // Nice Select
        $("select").niceSelect();

        //Jquery Curved Circle
        if ($(".curved-circle").length) {
            $(".curved-circle").circleType({
                position: "absolute",
                dir: 1,
                radius: 85,
                forceHeight: true,
                forceWidth: true,
            });
        }



















    });




})(jQuery);


document.addEventListener("DOMContentLoaded", function() {
    // Get all elements with class "team-v5__click"
    var clickElements = document.querySelectorAll('.team-v5__click');
  
    // Add click event listener to each click element
    clickElements.forEach(function(clickElement) {
      clickElement.addEventListener("click", function() {
        // Get the parent element with class "team-v5__single"
        var singleElement = clickElement.closest('.team-v5__single');
        
        // Toggle the "active" class on the parent element
        singleElement.classList.toggle('active');
        
        // Close previews one if there's any
        var allSingleElements = document.querySelectorAll('.team-v5__single');
        allSingleElements.forEach(function(single) {
          if (single !== singleElement) {
            single.classList.remove('active');
          }
        });
      });
    });
  });

  document.addEventListener("DOMContentLoaded", function() {
    // Get all elements with class 'tr-process-main__single'
    const elements = document.querySelectorAll('.tr-process-main__single');

    // Add event listener to each element
    elements.forEach(element => {
        element.addEventListener('mouseenter', function() {
            // Remove 'active' class from all elements
            elements.forEach(el => {
                el.classList.remove('active');
            });
            // Add 'active' class to the current element
            element.classList.add('active');
        });
    });
});

var slider = document.getElementById("myRange");
var output = document.getElementById("sliderValue");

// Check if slider and output elements exist
if (slider && output) {
    output.innerHTML = slider.value; // Display the default slider value

    // Update the current slider value (each time you drag the slider handle)
    slider.oninput = function() {
        output.innerHTML = this.value;
    }
} else {
    console.log("Slider or output element not found.");
}
