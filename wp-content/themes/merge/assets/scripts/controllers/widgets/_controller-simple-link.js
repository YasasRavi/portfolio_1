/***********************************************
 * WIDGET: SIMPLE LINK
 ***********************************************/
(function ($) {

	'use strict';

	// check if plugin defined
	if (typeof gsap == 'undefined') {
		return;
	}

	VLTJS.simpleLink = {

		init: function ($scope) {

			$scope = typeof $scope === 'undefined' ? VLTJS.body : $scope;

			const $link = $scope.find('.vlt-simple-link');

			$link.each(function () {

				const $this = $(this),
					duration = 5; // in seconds

				const tween = gsap.to($this.find('svg'), duration, {
					rotation: '+=360deg',
					ease: 'none',
					repeat: -1
				});

				$this.on({
					mouseenter: function () {
						tween.timeScale(3);
					},
					mouseleave: function () {
						tween.timeScale(1);
					}
				});

			});

		}

	}

	VLTJS.window.on('elementor/frontend/init', function () {

		elementorFrontend.hooks.addAction(
			'frontend/element_ready/vlt-simple-link.default',
			VLTJS.simpleLink.init
		);

		elementorFrontend.hooks.addAction(
			'frontend/element_ready/vlt-service-box.default',
			VLTJS.simpleLink.init
		);

		elementorFrontend.hooks.addAction(
			'frontend/element_ready/vlt-award-item.default',
			VLTJS.simpleLink.init
		);

	});

	VLTJS.simpleLink.init();

})(jQuery);