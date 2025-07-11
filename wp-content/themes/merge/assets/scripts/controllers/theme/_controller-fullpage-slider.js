/***********************************************
 * THEME: FULLPAGE SLIDER
 ***********************************************/
(function ($) {

	'use strict';

	// check if plugin defined
	if (typeof $.fn.pagepiling == 'undefined') {
		return;
	}

	// check if plugin defined
	if (typeof gsap == 'undefined') {
		return;
	}

	VLTJS.fullpageSlider = {
		init: function ($scope) {

			$scope = typeof $scope === 'undefined' ? VLTJS.body : $scope;

			$scope.find('.vlt-fullpage-slider').each(function () {

				const $this = $(this),
					loopTop = $this.data('loop-top') ? true : false,
					loopBottom = $this.data('loop-bottom') ? true : false,
					scrollingSpeed = $this.data('scrolling-speed') || 900;

				let anchors = [];

				$this.find('[data-anchor]').each(function () {
					anchors.push($(this).data('anchor'));
				});

				$('<div class="vlt-fullpage-slider-progress"><div class="vlt-fullpage-slider-progress__current"></div><div class="vlt-fullpage-slider-progress__bar"><span class="bar"></span></div><div class="vlt-fullpage-slider-progress__total"></div></div>').appendTo('.js-main-slider-bar-area');

				const $progressBar = $('.vlt-fullpage-slider-progress__bar'),
					$current = $('.vlt-fullpage-slider-progress__current'),
					$total = $('.vlt-fullpage-slider-progress__total');

				function vlthemes_navigation(force, direction) {
					const total = $this.find('.vlt-section').length,
						leadingTotal = VLTJS.addLedingZero(total),
						current = $this.find('.vlt-section.active').index() + 1,
						leadingCurrent = VLTJS.addLedingZero(current),
						scale = current / total;

					$total.text(leadingTotal);

					if (!force) {
						gsap.timeline().to($current, .3, {
							force3D: true,
							x: direction == "up" ? -10 : 10,
							opacity: 0,
							onComplete: function () {
								gsap.set($current, {
									x: direction == "up" ? 10 : -10,
								});
								$current.html(leadingCurrent);
							}
						}).to($current, .3, {
							force3D: true,
							x: 0,
							opacity: 1
						});
					} else {
						$current.html(leadingCurrent);
					}

					$progressBar.find('.bar').css({
						'transform': 'scaleY(' + scale + ')'
					});
				}

				$this.pagepiling({
					menu: '.vlt-offcanvas-menu ul.sf-menu-onepage',
					loopTop: loopTop,
					loopBottom: loopBottom,
					css3: true,
					scrollingSpeed: scrollingSpeed,
					anchors: anchors,
					sectionSelector: '.vlt-section',
					navigation: false,
					easing: 'linear',
					afterRender: function (anchorLink, index) {
						vlthemes_navigation(true);
						VLTJS.window.trigger('vlt.change-slide');
					},
					onLeave: function (index, nextIndex, direction) {
						vlthemes_navigation(false, direction);
						VLTJS.window.trigger('vlt.change-slide');
					}
				});

			});

		}

	}

	VLTJS.fullpageSlider.init();

})(jQuery);