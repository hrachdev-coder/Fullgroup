document.addEventListener('DOMContentLoaded', function () {
    const categoryItems = document.querySelectorAll('.category-item');

    categoryItems.forEach(function (item) {
        const subcategoryList = item.querySelector('.subcategory-list');
        const categoryRow = item.querySelector('.category-row');

        if (!subcategoryList || !categoryRow) {
            return;
        }

        categoryRow.addEventListener('click', function (e) {
            e.preventDefault();

            item.classList.toggle('active');
        });
    });
});


document.addEventListener('DOMContentLoaded', function () {

    const dropdown = document.querySelector('.secondary-nav__dropdown');

    if (!dropdown) return;

    const toggle = dropdown.querySelector('.secondary-nav__dropdown-toggle');

    toggle.addEventListener('click', function (e) {
        e.stopPropagation();

        dropdown.classList.toggle('active');
    });

    document.addEventListener('click', function () {
        dropdown.classList.remove('active');
    });

});


document.addEventListener('DOMContentLoaded', function () {

    const categories = document.querySelector('.categories');
    const mobileToggle = document.querySelector('.categories-mobile-toggle');

    if (categories && mobileToggle) {
        mobileToggle.addEventListener('click', function () {
            categories.classList.toggle('mobile-open');
        });
    }

});




	document.addEventListener('DOMContentLoaded', function () {

		const menuToggle = document.querySelector('.menu-toggle');
		const mobileMenu = document.querySelector('.mobile-menu');
		const overlay = document.querySelector('.mobile-menu-overlay');
		const closeButton = document.querySelector('.mobile-menu__close');

		if (!menuToggle || !mobileMenu) {
			return;
		}

		function openMobileMenu() {

			mobileMenu.classList.add('active');

			if (overlay) {
				overlay.classList.add('active');
			}

			document.body.classList.add('mobile-menu-open');

			menuToggle.setAttribute('aria-expanded', 'true');
		}


		function closeMobileMenu() {

			mobileMenu.classList.remove('active');

			if (overlay) {
				overlay.classList.remove('active');
			}

			document.body.classList.remove('mobile-menu-open');

			menuToggle.setAttribute('aria-expanded', 'false');
		}


		menuToggle.addEventListener('click', function () {

			if (mobileMenu.classList.contains('active')) {
				closeMobileMenu();
			} else {
				openMobileMenu();
			}

		});


		if (closeButton) {

			closeButton.addEventListener('click', function () {
				closeMobileMenu();
			});

		}


		if (overlay) {

			overlay.addEventListener('click', function () {
				closeMobileMenu();
			});

		}


		document.addEventListener('keydown', function (event) {

			if (event.key === 'Escape') {
				closeMobileMenu();
			}

		});

	});

	
document.addEventListener('DOMContentLoaded', function () {
    const toggle = document.querySelector('.fg-filter-toggle');
    const filter = document.getElementById('fg-product-filter');

    if (!toggle || !filter) {
        return;
    }

    const text = toggle.querySelector('.fg-filter-toggle__text');

    toggle.addEventListener('click', function () {
        const isOpen = filter.classList.toggle('is-open');

        toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');

        if (text) {
            text.textContent = isOpen ? 'Փակել ֆիլտրերը' : 'Ֆիլտրեր';
        }
    });
});











document.addEventListener('DOMContentLoaded', function () {

    const categoryToggles = document.querySelectorAll('.filter-category-toggle');

    categoryToggles.forEach(function (button) {

        button.addEventListener('click', function () {

            const item = this.closest('.filter-category-item');

            item.classList.toggle('active');

            this.textContent = item.classList.contains('active') ? '−' : '+';

        });

    });

});






document.addEventListener('DOMContentLoaded', function () {
    const categoryItems = document.querySelectorAll('.filter-category-item.has-children');

    categoryItems.forEach(function (item) {
        const row = item.querySelector('.filter-category-row');
        const toggle = item.querySelector('.filter-category-toggle');

        if (!row) return;

        row.addEventListener('click', function (e) {
            // Եթե user-ը subcategory link-ի վրա է սեղմել՝ չխանգարենք
            if (e.target.closest('.filter-subcategory-list a')) {
                return;
            }

            item.classList.toggle('active');

            if (toggle) {
                const isOpen = item.classList.contains('active');

                toggle.textContent = isOpen ? '−' : '+';
                toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
            }
        });
    });
});





document.addEventListener('DOMContentLoaded', function () {

    const sliderElement = document.querySelector('.banner-slider.swiper');

    if (!sliderElement) return;

    new Swiper(sliderElement, {
        slidesPerView: 1,
        spaceBetween: 0,
        loop: true,
        speed: 700,

        autoplay: {
            delay: 3000,
            disableOnInteraction: false
        },

        navigation: {
            nextEl: '.banner-slider .swiper-button-next',
            prevEl: '.banner-slider .swiper-button-prev'
        },

        pagination: {
            el: '.banner-slider .swiper-pagination',
            clickable: true
        }
    });

});