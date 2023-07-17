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
    $('.navbar-toggler-icons.openMenu').on('click', function() {
        $('body').addClass('overflow-hidden');
    });
    $('.navbar-toggler-icons.closeMenu').on('click', function() {
        $('body').removeClass('overflow-hidden');
    });
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

            jQuery('.apps-header-bar-btn-114').on('click', function() {
                $('.apps-header-nav-menu-114').slideToggle();
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
        
        /***
         * Scroll content
         */
        window.addEventListener('DOMContentLoaded', () => {
            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    const id = entry.target.getAttribute('id');
                    if (entry.intersectionRatio > 0) {
                        document.querySelector(`.apps-scrollable-content-sections-nav-114 nav li a[href="#${id}"]`).parentElement.classList.add('active');
                    } else {
                        document.querySelector(`nav li a[href="#${id}"]`).parentElement.classList.remove('active');
                    }
                });
            });
            // Track all sections that have an `id` applied
            document.querySelectorAll('section[id]').forEach((section) => {
                observer.observe(section);
            });
            
        });


        let CB_Project = function($scope, $) {
            $scope.find('.apps-project-active-114').each(function() {
            // swiper activations and options initialization
            let AppsProjectActive = new Swiper('.apps-project-active-114', {
                        
                slidesPerView: 3,
                spaceBetween: 30,
                loop: true,
                pagination: {
                    el: ".apps-project-paginate",
                    clickable: true,
                },
                navigation: {
                    nextEl: '.apps-project-next-114',
                    prevEl: '.apps-project-prev-114',
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
            });
            });
        }
        var CB_Dynamic_Service = function($scope, $) {
            $scope.find('.dynamic-service-active').each(function() {
                // dynamic slider Slide
                let dynamicSliderSlide = new Swiper('.dynamic-service-active', {
                    slidesPerView: 4,
                    spaceBetween: 30,
                    loop: false,
                    pagination: {
                        el: ".dynamic-pagination",
                        clickable: true,
                    },
                    navigation: {
                        nextEl: '.dynamic-next',
                        prevEl: '.dynamic-prev',
                    },
                    breakpoints: {
                        320: {
                            slidesPerView: 1,
                        },
                        575: {
                            slidesPerView: 2,
                            spaceBetween: 30,
                        },
                        768: {
                            slidesPerView: 2,
                            spaceBetween: 30,
                        },
                        992: {
                            slidesPerView: 3,
                            spaceBetween: 30,
                        },
                        1200: {
                        spaceBetween: 30,
                        slidesPerView: 3,
                        },
                        1400: {
                            slidesPerView: 4,
                            spaceBetween: 30,
                        }
                    }
                });
            });
        }
        var CB_Testimonial = function($scope, $) {
            $scope.find('.client-testimonial-active').each(function() {
            // Client-Testimonials-Slide
            let swiper125 = new Swiper('.client-testimonial-active', {

                slidesPerView: 2,
                spaceBetween: 32,
                loop: true,
                pagination: {
                    el: ".swiper-pagination11",
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

            });
            });
        }
        $( window ).on( 'elementor/frontend/init', function() {
            elementorFrontend.hooks.addAction( 'frontend/element_ready/cb-project.default', CB_Project );
            elementorFrontend.hooks.addAction( 'frontend/element_ready/cb-testimonial.default', CB_Testimonial );
            elementorFrontend.hooks.addAction( 'frontend/element_ready/cb-dynamic-service.default', CB_Dynamic_Service );
        } );


    // init select2 
    $(function () {
        if ($(".select2-init").length) {
            $(".select2-init").select2({
                width: 'resolve' // need to override the changed default
            });
        }
    });


})(jQuery)