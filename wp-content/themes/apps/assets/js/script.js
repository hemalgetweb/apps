!(function (e) {
    // Get all sections that have an ID defined
    e(".apps-scrollable-content-sections-nav-114 li a").on(
        "click",
        function () {
            e(".apps-scrollable-content-sections-nav-114 li a").removeClass(
                "active"
            );
            e(this).addClass("active");
        }
    );
    e(".navbar").on("click", ".navbarToggler", function (n) {
        n.preventDefault(),
            console.log("i am clicked"),
            e(this)
                .closest(".navbar")
                .find(".mobileMenu-wrapper")
                .toggleClass("mobileMenu-action"),
            e(".menuAction").children(".openMenu").toggle(0),
            e(".menuAction").children(".closeMenu").toggle(0);
    });
    e(window).on("load", function () {
        e(".apps-has-portfolio-popup").on("click", function () {
            var n = e(this).data("url"),
                i = e(this).data("title"),
                t = e(".apps-portfolio-moal-top-left-box .content .title"),
                a = e(".apps-portfolio-modal .modal-content img");
            t.text(i), a.attr("src", n);
        });
    }),
        e(window).on("load resize", function () {
            1200 > e(window).width() &&
                e(
                    "ul#menu-main-menu > li.has-mega-menu menu-item > a, ul#menu-main-menu > li.has-sub-menu menu-item > a"
                ).on("click", function (e) {
                    e.preventDefault();
                });
        }),
        e(".navbar-toggler-icons.openMenu").on("click", function () {
        }),
        e(".navbar-toggler-icons.closeMenu").on("click", function () {
        }),
        e(window).scroll(function () {
            e(window).scrollTop() >= 100
                ? e("header").addClass("fixed-header")
                : e("header").removeClass("fixed-header");
        }),
        e(document).ready(function () {
            e(function () {
                e(".mobileMenu").length &&
                    e(".navbar").on("click", ".navbarToggler", function (n) {
                        n.preventDefault(),
                            console.log("i am clicked"),
                            e(this)
                                .closest(".navbar")
                                .find(".mobileMenu-wrapper")
                                .toggleClass("mobileMenu-action"),
                            e(".menuAction").children(".openMenu").toggle(0),
                            e(".menuAction").children(".closeMenu").toggle(0);
                    });
            }),
                e(function () {
                    e(document).on("click", function (n) {
                        var i = e(n.target);
                        !0 !== e(".navbar-collapse").hasClass("show") ||
                            i.hasClass("navbar-toggler") ||
                            e(".navbar-toggler").click();
                    });
                }),
                jQuery(".apps-header-bar-btn-114").on("click", function () {
                    e(".apps-header-nav-menu-114").slideToggle();
                });
        });
    let n = document.querySelectorAll(".tablinks"),
        i = document.querySelectorAll(".item");
    for (let t of n)
        t.addEventListener("click", () => {
            let e = t.getAttribute("data-filter");
            for (let a of i)
                "all" === e
                    ? (a.style.display = "block")
                    : a.classList.contains(e)
                    ? (a.style.display = "block")
                    : (a.style.display = "none");
            for (let l of n) l.classList.remove("active");
            t.classList.add("active");
        });
    // e(".apps-has-mobile-menu-custom .nav-link").on("click", function () {
    // 	e(this).parents(".menu-item").find(".dropdown-menus").slideToggle(), e(this).parents(".menu-item").find(".dropdown-menus").toggleClass("d-block")
    // }), window.addEventListener("DOMContentLoaded", () => {
    // 	let e = new IntersectionObserver(e => {
    // 		e.forEach(e => {
    // 			let n = e.target.getAttribute("id");
    // 			e.intersectionRatio > 0 ? document.querySelector(`.apps-scrollable-content-sections-nav-114 nav li a[href="#${n}"]`).parentElement.classList.add("active") : document.querySelector(`nav li a[href="#${n}"]`).parentElement.classList.remove("active")
    // 		})
    // 	});
    // 	document.querySelectorAll("section[id]").forEach(n => {
    // 		e.observe(n)
    // 	})
    // });


    let cbProcess = function (e) {
        AOS.init({
            duration: 1500,
            disable: function () {
                var maxWidth = 800;
                return window.innerWidth < maxWidth;
            },
        });
    };
    // related-post-slider
    new Swiper(".related-post-slider", {
        slidesPerView: 2,
        spaceBetween: 32,
        loop: true,
        pagination: {
            el: ".swiper-pagination113",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-next25555",
            prevEl: ".swiper-prev25555",
        },
        breakpoints: {
            320: {
                slidesPerView: 1,
                spaceBetween: 0,
            },
            575: {
                spaceBetween: 0,
                slidesPerView: 1,
            },
            768: {
                slidesPerView: 2,
            },
            992: {
                slidesPerView: 2,
            },
            1200: {
                slidesPerView: 3,
            },
        },
        on: {
            init: function () {
                if (this.slides.length > 3) {
                    document.querySelector(".swiper-next25555").style.display =
                        "block";
                    document.querySelector(".swiper-prev25555").style.display =
                        "block";
                } else {
                    document.querySelector(".swiper-next25555").style.display =
                        "none";
                    document.querySelector(".swiper-prev25555").style.display =
                        "none";
                }
            },
            resize: function () {
                if (this.slides.length > 3) {
                    document.querySelector(".swiper-next25555").style.display =
                        "block";
                    document.querySelector(".swiper-prev25555").style.display =
                        "block";
                } else {
                    document.querySelector(".swiper-next25555").style.display =
                        "none";
                    document.querySelector(".swiper-prev25555").style.display =
                        "none";
                }
            },
        },
    });
    // related-post-slider -End

    var DynamiceStaticService = function (e, n) {
            e.find(".dynamic-service-active").each(function () {
                new Swiper(".dynamic-service-active", {
                    slidesPerView: 4,
                    loop: true,
                    spaceBetween: 30,
                    pagination: {
                        el: ".dynamic-pagination",
                        clickable: !0,
                    },
                    navigation: {
                        nextEl: ".dynamic-next",
                        prevEl: ".dynamic-prev",
                    },
                    breakpoints: {
                        320: {
                            slidesPerView: 1,
                            spaceBetween: 0,
                             autoplay: {
                            delay: 3000,
                            disableOnInteraction: false
                          }
                        },
                        575: {
                            spaceBetween: 0,
                            slidesPerView: 1,
                             autoplay: {
                                delay: 3000,
                                disableOnInteraction: false
                              }
                        },
                        768: {
                            slidesPerView: 2,
                        },
                        992: {
                            slidesPerView: 3,
                        },
                        1200: {
                            spaceBetween: 30,
                            slidesPerView: 3,
                        },
                        1400: {
                            slidesPerView: 4,
                        },
                    },
                });
            });
        },
        Testionial = function (e, n) {
            e.find(".client-testimonial-active").each(function () {
                new Swiper(".client-testimonial-active", {
                    slidesPerView: 2,
                    spaceBetween: 32,
                    loop: true,
                    pagination: {
                        el: ".swiper-pagination11",
                        clickable: !0,
                    },
                    navigation: {
                        nextEl: ".swiper-next",
                        prevEl: ".swiper-prev",
                    },
                    breakpoints: {
                        320: {
                            slidesPerView: 1,
                            spaceBetween: 0,
                        },
                        575: {
                            slidesPerView: 1,
                            spaceBetween: 0,
                        },
                        768: {
                            slidesPerView: 1,
                            spaceBetween: 0,
                        },
                        992: {
                            slidesPerView: 2,
                        },
                        1200: {
                            slidesPerView: 3,
                        },
                    },
                });
            });
        };

    function s(n) {
        e(".apps-has-application-attached").text(n);
    }

! function (e) {
	// Get all sections that have an ID defined
	e('.apps-scrollable-content-sections-nav-114 li a').on('click', function() {
		e('.apps-scrollable-content-sections-nav-114 li a').removeClass('active');
		e(this).addClass('active');
	})
	e(window).on("load", function () {
		e(".apps-has-portfolio-popup").on("click", function () {
			var n = e(this).data("url"),
				i = e(this).data("title"),
				t = e(".apps-portfolio-moal-top-left-box .content .title"),
				a = e(".apps-portfolio-modal .modal-content img");
			t.text(i), a.attr("src", n)
		})
	}), e(window).on("load resize", function () {
		1200 > e(window).width() && e("ul#menu-main-menu > li.has-mega-menu menu-item > a, ul#menu-main-menu > li.has-sub-menu menu-item > a").on("click", function (e) {
			e.preventDefault()
		})
	}), e(".navbar-toggler-icons.openMenu").on("click", function () {
	}), e(".navbar-toggler-icons.closeMenu").on("click", function () {
	}), e(window).scroll(function () {
		e(window).scrollTop() >= 100 ? e("header").addClass("fixed-header") : e("header").removeClass("fixed-header")
	}), e(document).ready(function () {
		e(function () {
			e(".mobileMenu").length && e(".navbar").on("click", ".navbarToggler", function (n) {
				n.preventDefault(), console.log("i am clicked"), e(this).closest(".navbar").find(".mobileMenu-wrapper").toggleClass("mobileMenu-action"), e(".menuAction").children(".openMenu").toggle(0), e(".menuAction").children(".closeMenu").toggle(0)
			})
		}), e(function () {
			e(document).on("click", function (n) {
				var i = e(n.target);
				!0 !== e(".navbar-collapse").hasClass("show") || i.hasClass("navbar-toggler") || e(".navbar-toggler").click()
			})
		}), jQuery(".apps-header-bar-btn-114").on("click", function () {
			e(".apps-header-nav-menu-114").slideToggle()
		})
	});
	let n = document.querySelectorAll(".tablinks"),
		i = document.querySelectorAll(".item");
	for (let t of n) t.addEventListener("click", () => {
		let e = t.getAttribute("data-filter");
		for (let a of i) "all" === e ? a.style.display = "block" : a.classList.contains(e) ? a.style.display = "block" : a.style.display = "none";
		for (let l of n) l.classList.remove("active");
		t.classList.add("active")
	});
	// e(".apps-has-mobile-menu-custom .nav-link").on("click", function () {
	// 	e(this).parents(".menu-item").find(".dropdown-menus").slideToggle(), e(this).parents(".menu-item").find(".dropdown-menus").toggleClass("d-block")
	// }), window.addEventListener("DOMContentLoaded", () => {
	// 	let e = new IntersectionObserver(e => {
	// 		e.forEach(e => {
	// 			let n = e.target.getAttribute("id");
	// 			e.intersectionRatio > 0 ? document.querySelector(`.apps-scrollable-content-sections-nav-114 nav li a[href="#${n}"]`).parentElement.classList.add("active") : document.querySelector(`nav li a[href="#${n}"]`).parentElement.classList.remove("active")
	// 		})
	// 	});
	// 	document.querySelectorAll("section[id]").forEach(n => {
	// 		e.observe(n)
	// 	})
	// });




	// case-studies-project-slider-active
			new Swiper(".case-studies-project-slider-active", {
				slidesPerView: 4,
				spaceBetween: 30,
				loop: true,
				autoplay: {
					delay: 2500,
					disableOnInteraction: false,
				},
				centeredSlides: true,
				grabCursor: !0,
				pagination: {
					el: ".apps-project-paginate",
					clickable: !0
				},
				navigation: {
					nextEl: ".case-project-next-114",
					prevEl: ".case-project-prev-114"
				},
				breakpoints: {
					320: {
						slidesPerView: 2
					},
					767: {
						slidesPerView: 2
					},
					991: {
						slidesPerView: 3
					},
					1200: {
						slidesPerView: 4
					}
				}
			})


	// related-post-slider
	new Swiper(".related-post-slider", {
		slidesPerView: 2,
		spaceBetween: 32,
		loop: true,
		pagination: {
			el: ".swiper-pagination113",
			clickable: true
		},
		navigation: {
			nextEl: ".swiper-next25555",
			prevEl: ".swiper-prev25555"
		},
		breakpoints: {
			320: {
				slidesPerView: 1,
				spaceBetween: 0
			},
			575: {
				spaceBetween: 0,
				slidesPerView: 1,
			},
			768: {
				slidesPerView: 2,
			},
			992: {
				slidesPerView: 2
			},
			1200: {
				slidesPerView: 3
			}
		},
		on: {
			init: function () {
				if (this.slides.length > 3) {
					document.querySelector('.swiper-next25555').style.display = 'block';
					document.querySelector('.swiper-prev25555').style.display = 'block';
				} else {
					document.querySelector('.swiper-next25555').style.display = 'none';
					document.querySelector('.swiper-prev25555').style.display = 'none';
				}
			},
			resize: function () {
				if (this.slides.length > 3) {
					document.querySelector('.swiper-next25555').style.display = 'block';
					document.querySelector('.swiper-prev25555').style.display = 'block';
				} else {
					document.querySelector('.swiper-next25555').style.display = 'none';
					document.querySelector('.swiper-prev25555').style.display = 'none';
				}
			}
		}
	});
	// related-post-slider -End


	var Testionial = function (e, n) {
			e.find(".client-testimonial-active").each(function () {
				new Swiper(".client-testimonial-active", {
					slidesPerView: 2,
					spaceBetween: 32,
					loop: true,
					pagination: {
						el: ".swiper-pagination11",
						clickable: !0
					},
					navigation: {
						nextEl: ".swiper-next",
						prevEl: ".swiper-prev"
					},
					breakpoints: {
						320: {
							slidesPerView: 1,
							spaceBetween: 0
						},
						575: {
							slidesPerView: 1,
							spaceBetween: 0
						},
						768: {
							slidesPerView: 1,
							spaceBetween: 0
						},
						992: {
							slidesPerView: 2
						},
						1200: {
							slidesPerView: 3
						}
					}
				})
			})
		};

	function s(n) {
		e(".apps-has-application-attached").text(n)
	}
	e(window).on("elementor/frontend/init", function () {
		elementorFrontend.hooks.addAction("frontend/element_ready/cb-testimonial.default", Testionial),
		elementorFrontend.hooks.addAction("frontend/element_ready/cb-dynamic-static-service.default", DynamiceStaticService)
	}), e(function () {
		e(".select2-init").length && e(".select2-init").select2({
			width: "resolve"
		})
	}), e("#application_upload_file").on("change", function n() {
		let i = e("#application_upload_file")[0],
			t = i.files[0];
		t ? s(t.name) : s("No file selected")
	})
	e(window).on('load', function () {
		/**
		 * Preloader
		 */
		e(".preloader").fadeOut();
		e('body').css({
			'overflow': 'visible'
		});
		AOS.init({
			duration: 1500,
			disable: function () {
				var maxWidth = 800;
				return window.innerWidth < maxWidth;
			},
		});
	});
}(jQuery);



    e(window).on("elementor/frontend/init", function () {
        elementorFrontend.hooks.addAction(
            "frontend/element_ready/cb-process.default",
            cbProcess
        ),
        elementorFrontend.hooks.addAction(
            "frontend/element_ready/cb-testimonial.default",
            Testionial
        ),
        elementorFrontend.hooks.addAction(
            "frontend/element_ready/cb-dynamic-static-service.default",
            DynamiceStaticService
        );
    }),
        e(function () {
            e(".select2-init").length &&
                e(".select2-init").select2({
                    width: "resolve",
                });
        }),
        e("#application_upload_file").on("change", function n() {
            let i = e("#application_upload_file")[0],
                t = i.files[0];
            t ? s(t.name) : s("No file selected");
        });
    e(window).on("load", function () {
        /**
         * Preloader
         */
        e(".preloader").fadeOut();
        e("body").css({
            overflow: "visible",
        });
        AOS.init({
            duration: 1500,
            disable: function () {
                var maxWidth = 800;
                return window.innerWidth < maxWidth;
            },
        });
    });
})(jQuery);
