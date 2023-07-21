(function($) {
    // Function to handle portfolio popup click
    $('.apps-has-portfolio-popup').on('click', function() {
        var url = $(this).data('url');
        var title = $(this).data('title');
        var titleDom = $('.apps-portfolio-moal-top-left-box .content .title');
        var imageDom = $('.apps-portfolio-modal .modal-content img');
        // titleDom.text(title);
        // imageDom.attr('src', url);
    });

    // Function to handle mobile menu toggle
    $('.navbar-toggler-icons.openMenu').on('click', function() {
        $('body').addClass('overflow-hidden');
    });

    $('.navbar-toggler-icons.closeMenu').on('click', function() {
        $('body').removeClass('overflow-hidden');
    });

    // Function to handle fixed header
    $(window).scroll(function () {
        if ($(window).scrollTop() >= 100) {
            $('header').addClass('fixed-header');
        } else {
            $('header').removeClass('fixed-header');
        }
    });

    // Function to handle click on navbar links for smaller screens
    $(window).on('load resize', function() {
        var windowWidth = $(window).width();
        if (windowWidth < 1200) {
            $('ul#menu-main-menu > li > a').on('click', function(e) {
                e.preventDefault();
            });
        }
    });

    // Swiper slider initialization
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

    // Function to handle tab category filter
    const tabLinks = document.querySelectorAll(".tablinks");
    const items = document.querySelectorAll(".item");

    for (const link of tabLinks) {
        link.addEventListener("click", () => {
            const filterValue = link.getAttribute("data-filter");
            for (const item of items) {
                if (filterValue === "all" || item.classList.contains(filterValue)) {
                    item.style.display = "block";
                } else {
                    item.style.display = "none";
                }
            }
            for (const tabLink of tabLinks) {
                tabLink.classList.remove("active");
            }
            link.classList.add("active");
        });
    }

    // Function to handle mobile menu custom dropdown
    $('.apps-has-mobile-menu-custom .nav-link').on('click', function() {
        $(this).parents(".menu-item").find('.dropdown-menus').slideToggle().toggleClass('d-block');
    });

    // Function to handle scroll content
    window.addEventListener('DOMContentLoaded', () => {
        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                const id = entry.target.getAttribute('id');
                const navLink = document.querySelector(`.apps-scrollable-content-sections-nav-114 nav li a[href="#${id}"]`);
                if (entry.intersectionRatio > 0) {
                    navLink.parentElement.classList.add('active');
                } else {
                    navLink.parentElement.classList.remove('active');
                }
            });
        });

        document.querySelectorAll('section[id]').forEach((section) => {
            observer.observe(section);
        });
    });

    // Function to handle Elementor integration
    let CB_Project = function($scope, $) {
        // Swiper slider activation for element with class .apps-project-active-114
        $scope.find('.apps-project-active-114').each(function() {
            let AppsProjectActive = new Swiper(this, {
                // Swiper options for the project slider
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
        // Swiper slider activation for element with class .dynamic-service-active
        $scope.find('.dynamic-service-active').each(function() {
            let dynamicSliderSlide = new Swiper(this, {
                // Swiper options for the dynamic service slider
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
                        slidesPerView: 3,
                        spaceBetween: 30,
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
        // Swiper slider activation for element with class .client-testimonial-active
        $scope.find('.client-testimonial-active').each(function() {
            let swiper125 = new Swiper(this, {
                // Swiper options for the client testimonial slider
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
                        slidesPerView: 1,
                    },
                    768: {
                        slidesPerView: 1,
                    },
                    992: {
                        slidesPerView: 2,
                    },
                    1200: {
                        slidesPerView: 3,
                    }
                }
            });
        });
    }

    $(window).on('elementor/frontend/init', function() {
        // Elementor integration with specific element hooks
        elementorFrontend.hooks.addAction('frontend/element_ready/cb-project.default', CB_Project);
        elementorFrontend.hooks.addAction('frontend/element_ready/cb-testimonial.default', CB_Testimonial);
        elementorFrontend.hooks.addAction('frontend/element_ready/cb-dynamic-static-service.default', CB_Dynamic_Service);
    });

    // Init select2 for elements with class .select2-init
    $(function () {
        if ($(".select2-init").length) {
            $(".select2-init").select2({
                width: 'resolve'
            });
        }
        $('#application_upload_file').on('change', function() {
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var image = $('<img>').attr('src', e.target.result).css({
                        'max-width': '100px',
                        'max-height': '100px',
                        'margin-top': '10px'
                    });
                    $('.file-uploads').append(image);
                };
                reader.readAsDataURL(this.files[0]);
            }
        });
    });

})(jQuery);