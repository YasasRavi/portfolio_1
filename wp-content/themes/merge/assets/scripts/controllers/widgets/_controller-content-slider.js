/***********************************************
 * WIDGET: CONTENT SLIDER
 ***********************************************/
(function ($) {

	'use strict';

	// check if plugin defined
	if (typeof Swiper === 'undefined') {
		return;
	}

	VLTJS.contentSlider = {
		init: function ($scope) {

			$scope = typeof $scope === 'undefined' ? VLTJS.body : $scope;

			const $slider = $scope.find('.vlt-content-slider');

			$slider.each(function () {

				const $this = $(this),
					dataAnchor = $this.data('navigation-anchor'),
					dataGap = $this.data('gap') || 0,
					dataLoop = $this.data('loop'),
					dataAutoHeight = $this.data('autoheight'),
					dataInitialSlide = $this.data('initial-slide'),
					dataEffect = $this.data('effect'),
					dataParallax = $this.data('parallax'),
					dataSpeed = $this.data('speed') || 1000,
					dataAutoplay = $this.data('autoplay'),
					dataCentered = $this.data('slides-centered'),
					dataFreemode = $this.data('free-mode'),
					dataSliderOffset = $this.data('slider-offset'),
					dataMousewheel = $this.data('mousewheel'),
					dataAutoplaySpeed = $this.data('autoplay-speed'),
					dataSettings = $this.data('slide-settings');

				let conf = {
					init: false,
					grabCursor: true
				};

				// pagintion
				if ($(dataAnchor).find('.vlt-swiper-pagination').length) {
					conf.pagination = {
						el: $(dataAnchor).find('.vlt-swiper-pagination'),
						type: 'bullets',
						bulletClass: 'vlt-swiper-pagination-bullet',
						bulletActiveClass: 'vlt-swiper-pagination-bullet-active',
						clickable: true
					};
				}

				if (dataSliderOffset) {
					conf.slidesOffsetBefore = $('.vlt-fake-container').get(0).getBoundingClientRect().left + parseFloat($('.vlt-fake-container').css('padding-left')) || 0;
					conf.slidesOffsetAfter = $('.vlt-fake-container').get(0).getBoundingClientRect().left + parseFloat($('.vlt-fake-container').css('padding-left')) || 0;
				}

				if (dataEffect) {
					conf.effect = dataEffect;

					if ('coverflow' == dataEffect) {
						conf.coverflowEffect = {
							rotate: 0,
							stretch: -5,
							depth: 60,
							modifier: 3,
							slideShadows: false,
						};
					}

				}

				if (dataInitialSlide) {
					conf.initialSlide = dataInitialSlide;
				}

				if (dataLoop) {
					conf.loop = true;
				}

				if (dataAutoHeight) {
					conf.autoHeight = true;
				}

				if (dataParallax) {
					conf.parallax = true;
				}

				if (dataGap) {
					conf.spaceBetween = dataGap;
				}

				if (dataSpeed) {
					conf.speed = dataSpeed;
				}

				if (dataCentered) {
					conf.centeredSlides = true;
				}

				if (dataFreemode) {
					conf.freeMode = true;
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

				conf.breakpoints = {
					// when window width is >= 576px
					576: {
						slidesPerView: dataSettings.slides_to_show_mobile || dataSettings.slides_to_show_tablet || dataSettings.slides_to_show || 1,
						slidesPerGroup: dataSettings.slides_to_scroll_mobile || dataSettings.slides_to_scroll_tablet || dataSettings.slides_to_scroll || 1,
					},
					// when window width is >= 768px
					768: {
						slidesPerView: dataSettings.slides_to_show_tablet || dataSettings.slides_to_show || 1,
						slidesPerGroup: dataSettings.slides_to_scroll_tablet || dataSettings.slides_to_scroll || 1,
					},
					// when window width is >= 992px
					992: {
						slidesPerView: dataSettings.slides_to_show || 1,
						slidesPerGroup: dataSettings.slides_to_scroll || 1,
					}
				};

				const swiper = new Swiper(this, conf);

				swiper.init();

			});

		}

	}

	VLTJS.window.on('elementor/frontend/init', function () {
		elementorFrontend.hooks.addAction(
			'frontend/element_ready/vlt-content-slider.default',
			VLTJS.contentSlider.init
		);
	});

})(jQuery);