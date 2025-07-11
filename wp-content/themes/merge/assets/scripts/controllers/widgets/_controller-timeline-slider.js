/***********************************************
 * WIDGET: TIMELINE SLIDER
 ***********************************************/
(function ($) {

	'use strict';

	// check if plugin defined
	if (typeof Swiper === 'undefined') {
		return;
	}

	VLTJS.timelineSlider = {
		init: function ($scope) {

			$scope = typeof $scope === 'undefined' ? VLTJS.body : $scope;

			const $timelineSlider = $scope.find('.vlt-timeline-slider');

			$timelineSlider.each(function () {

				const $this = $(this),
					dataAnchor = $this.data('navigation-anchor'),
					dataSpeed = $this.data('speed') || 1000,
					dataAutoplay = $this.data('autoplay'),
					dataMousewheel = $this.data('mousewheel'),
					dataAutoplaySpeed = $this.data('autoplay-speed');

				let conf = {
					init: false,
					loop: false,
					grabCursor: true,
					spaceBetween: 60,
					slidesPerView: 1,
					effect: 'coverflow',
					coverflowEffect: {
						rotate: 0,
						stretch: -5,
						depth: 60,
						modifier: 3,
						slideShadows: false,
					}
				};

				// pagintion
				if ($(dataAnchor).find('.vlt-swiper-pagination').length) {
					conf.pagination = {
						el: $(dataAnchor).find('.vlt-swiper-pagination').get(0),
						type: 'bullets',
						bulletClass: 'vlt-swiper-pagination-bullet',
						bulletActiveClass: 'vlt-swiper-pagination-bullet-active',
						clickable: true,
					};
				}

				if (dataSpeed) {
					conf.speed = dataSpeed;
				}

				if (dataMousewheel) {
					conf.mousewheel = true;
				}

				if (dataAutoplay) {
					conf.autoplay = {
						delay: dataAutoplaySpeed,
						disableOnInteraction: false
					};
				}

				const swiper = new Swiper(this, conf);

				swiper.init();

			});

		}

	};

	VLTJS.window.on('elementor/frontend/init', function () {
		elementorFrontend.hooks.addAction(
			'frontend/element_ready/vlt-timeline-slider.default',
			VLTJS.timelineSlider.init
		);
	});

})(jQuery);