(function($) {
    /**
 * @Script js for (Template/Project Name)
 *
 * @project     - Project Name
 * @author      - 
 * @created_by  - 
 * @created_at  - 
 * @modified_by -
 */


/**
 * ========================================================
 * this function execute when window properly loaded
 * ===========================================================
 */

// $(window).on('load', function () {

//     // code should be execute here

// });

// fixed-header -Js
$(window).scroll(function () {
    if ($(window).scrollTop() >= 100) {
        $('header').addClass('fixed-header');
    }
    else {
        $('header').removeClass('fixed-header');
    }
});
// fixed-header -end


/**
 * ========================================================
 * this function execute when DOM element ready 
 * ===========================================================
 */

        $(document).ready(function () {


            //navbar add class
            $(function () {
                if ($('.mobileMenu').length) {
                    $('.navbar').on('click', '.navbarToggler', function (e) {
                        e.preventDefault();
                        console.log("i am clicked");
                        $(this).closest('.navbar').find('.mobileMenu-wrapper').toggleClass('mobileMenu-action')
                        $('.menuAction').children(".openMenu").toggle(0);
                        $('.menuAction').children(".closeMenu").toggle(0);
                        // $(this).closest('#header').addClass('myheader');

                        // $(this).closest('#header').toggleClass('d-block');

                    });

                }
            });




            $(function () {
                $(document).on('click', function (e) {
                    var clickover = $(e.target);
                    var _opened = $(".navbar-collapse").hasClass("show");
                    if (_opened === true && !clickover.hasClass("navbar-toggler")) {
                        $(".navbar-toggler").click();
                    }
                });
            })






    });

        

        // swiper activations and options initialization
        let swiper = new Swiper('.swiper-container', {
            
            slidesPerView: 3,
            spaceBetween: 0,
            loop: true,
             pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-next',
                prevEl: '.swiper-prev',
            },
            breakpoints: {
                320: {
                slidesPerView: 1,
                },
                575: {
                slidesPerView: 2,
                },
                1200: {
                    slidesPerView: 3,
                }
            }
             //  centeredSlides: true,
            //   mousewheel: true,
            //   direction: 'horizontal',
            //   loop: false,
            //   freeMode: false,
            //   grabCursor: true,
        });



        //tab-category-filter
        const tabLinks = document.querySelectorAll(".tablinks");
        const items = document.querySelectorAll(".item");

        for (const link of tabLinks) {
            link.addEventListener("click", () => {
                // Get the filter value from the data-filter attribute
                const filterValue = link.getAttribute("data-filter");

                // Loop through all items and hide/show them based on the filter value
                for (const item of items) {
                    if (filterValue === "all") {
                        item.style.display = "block";
                    } else if (item.classList.contains(filterValue)) {
                        item.style.display = "block";
                    } else {
                        item.style.display = "none";
                    }
                }

                // Set the active class on the clicked button and remove from others
                for (const tabLink of tabLinks) {
                    tabLink.classList.remove("active");
                }
                link.classList.add("active");
            });
        }
        $('.apps-has-mobile-menu-custom .nav-link').on('click', function() {
            $(this).parents(".menu-item").find('.dropdown-menus').slideToggle();
            $(this).parents(".menu-item").find('.dropdown-menus').toggleClass('d-block');
        })
})(jQuery)