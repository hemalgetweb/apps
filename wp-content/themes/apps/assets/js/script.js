// scrollable content sections
    // Get all sections that have an ID defined
    const sections = document.querySelectorAll("section.apps-panel[id]");

    // Add an event listener listening for scroll
    window.addEventListener("scroll", navHighlighter);

    function navHighlighter() {

        // Get current scroll position
        let scrollY = window.pageYOffset;

        // Now we loop through sections to get height, top and ID values for each
        sections.forEach(current => {
            const sectionHeight = current.offsetHeight;
            const sectionTop = current.offsetTop - 50;
            sectionId = current.getAttribute("id");

            /*
            - If our current scroll position enters the space where current section on screen is, add .active class to corresponding navigation link, else remove it
            - To know which link needs an active class, we use sectionId variable we are getting while looping through sections as an selector
            */
            if (
                scrollY > sectionTop &&
                scrollY <= sectionTop + sectionHeight
            ) {
                document.querySelector(".apps-scrollable-content-sections-nav-114 nav ul li a[href*=" + sectionId + "]").classList.add("active");
            } else {
                document.querySelector(".apps-scrollable-content-sections-nav-114 nav ul li a[href*=" + sectionId + "]").classList.remove("active");
            }
        });
    }

    // scrollable content sections = End




! function (e) {
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
		e("body").addClass("overflow-hidden")
	}), e(".navbar-toggler-icons.closeMenu").on("click", function () {
		e("body").removeClass("overflow-hidden")
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

	
	let a = function (e, n) {
		e.find(".apps-project-active-114").each(function () {
			new Swiper(".apps-project-active-114", {
				slidesPerView: 3,
				spaceBetween: 30,
				loop: !0,
				grabCursor: !0,
				pagination: {
					el: ".apps-project-paginate",
					clickable: !0
				},
				navigation: {
					nextEl: ".apps-project-next-114",
					prevEl: ".apps-project-prev-114"
				},
				breakpoints: {
					320: {
						slidesPerView: 1
					},
					767: {
						slidesPerView: 2
					},
					1200: {
						slidesPerView: 3
					}
				}
			})
		})
	};
	var l = function (e, n) {
			e.find(".dynamic-service-active").each(function () {
				new Swiper(".dynamic-service-active", {
					slidesPerView: 4,
					spaceBetween: 30,
					allowTouchMove: !1,
					loop: !1,
					pagination: {
						el: ".dynamic-pagination",
						clickable: !0
					},
					navigation: {
						nextEl: ".dynamic-next",
						prevEl: ".dynamic-prev"
					},
					breakpoints: {
						320: {
							slidesPerView: 1,
							spaceBetween: 0
						},
						575: {
							slidesPerView: 1
						},
						768: {
							slidesPerView: 2
						},
						992: {
							slidesPerView: 3
						},
						1200: {
							spaceBetween: 30,
							slidesPerView: 3,
							slidesPerView: 3
						},
						1400: {
							slidesPerView: 4
						}
					}
				})
			})
		},
		o = function (e, n) {
			e.find(".client-testimonial-active").each(function () {
				new Swiper(".client-testimonial-active", {
					slidesPerView: 2,
					spaceBetween: 32,
					loop: !0,
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
		elementorFrontend.hooks.addAction("frontend/element_ready/cb-project.default", a), elementorFrontend.hooks.addAction("frontend/element_ready/cb-testimonial.default", o), elementorFrontend.hooks.addAction("frontend/element_ready/cb-dynamic-static-service.default", l)
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



