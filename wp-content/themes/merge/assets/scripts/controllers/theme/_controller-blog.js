/***********************************************
 * THEME: BLOG
 ***********************************************/
(function ($) {

	'use strict';

	// check if plugin defined
	if (typeof Swiper === 'undefined') {
		return;
	}

	VLTJS.blog = {
		init: function () {

			VLTJS.blog.widgetPostlistSlider();

			VLTJS.document.on('loadedNewItems.vpf', function (event, vpObject) {
				if ('vpf' !== event.namespace) {
					return;
				}
				if (typeof $.fn.fitVids !== 'undefined') {
					VLTJS.body.fitVids();
				}
			});

		},
		widgetPostlistSlider: function () {

			$('.vlt-widget-post-slider').each(function () {

				new Swiper(this, {
					spaceBetween: 16,
					loop: true,
					autoplay: {
						delay: 5000,
					},
					slidesPerView: 1,
					grabCursor: true,
					speed: 600,
					pagination: {
						el: $(this).find('.vlt-swiper-pagination').get(0),
						type: 'bullets',
						bulletClass: 'vlt-swiper-pagination-bullet swiper-pagination-bullet',
						bulletActiveClass: 'vlt-swiper-pagination-bullet-active swiper-pagination-bullet-active',
						clickable: true
					},
				});

			});

		}
	};

	VLTJS.blog.init();

})(jQuery);