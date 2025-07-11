/***********************************************
 * WIDGET: PROJECTS SLIDER
 ***********************************************/
(function ($) {

	'use strict';

	// check if plugin defined
	if (typeof Swiper === 'undefined') {
		return;
	}

	VLTJS.projectsSlider = {

		init: function ($scope) {

			$scope = typeof $scope === 'undefined' ? VLTJS.body : $scope;

			const $slider = $scope.find('.vlt-projects-slider');

			$slider.each(function () {

				const $this = $(this),
					dataSlideEffect = $this.data('slide-effect'),
					$contentSlider = $this.find('.vlt-project-content'),
					$imageSlider = $this.find('.vlt-project-images');

				const contentSwiper = new Swiper($contentSlider.get(0), {
					effect: 'fade',
					loop: false,
					autoHeight: true,
					allowTouchMove: false,
				});

				const imageSwiper = new Swiper($imageSlider.get(0), {
					init: false,
					modules: [SwiperGL],
					effect: 'gl',
					gl: {
						shader: dataSlideEffect,
					},
					speed: 1000,
					loop: false,
					lazy: true,
					pagination: {
						el: $this.find('.vlt-swiper-pagination .total').get(0),
						type: 'custom',
						renderCustom: function (swiper, current, total) {
							return VLTJS.addLedingZero(total);
						}
					}
				});

				if ($this.find('.vlt-swiper-pagination').length) {
					imageSwiper.on('init slideChange', function () {

						const speed = (imageSwiper.params.speed / 1000) / 2,
							$current = $this.find('.vlt-swiper-pagination .current');

						// Pagination transform
						gsap.to($current, speed, {
							force3D: true,
							y: -6,
							opacity: 0,
							onComplete: function () {
								gsap.set($current, {
									y: 6
								});
								$current.html(VLTJS.addLedingZero(imageSwiper.realIndex + 1));
							}
						});

						gsap.to($current, speed, {
							force3D: true,
							y: 0,
							opacity: 1,
							delay: speed
						});

					});

				}

				imageSwiper.init();

				imageSwiper.controller.control = contentSwiper;

			});

		}

	}

	VLTJS.window.on('elementor/frontend/init', function () {
		elementorFrontend.hooks.addAction(
			'frontend/element_ready/vlt-projects-slider.default',
			VLTJS.projectsSlider.init
		);
	});

})(jQuery);