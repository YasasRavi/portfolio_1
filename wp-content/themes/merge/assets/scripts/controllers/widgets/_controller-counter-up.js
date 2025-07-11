/***********************************************
 * WIDGET: COUNTER UP
 ***********************************************/
(function ($) {

	'use strict';

	// check if plugin defined
	if (typeof $.fn.numerator == 'undefined') {
		return;
	}

	VLTJS.counterUp = {
		init: function ($scope) {

			$scope = typeof $scope === 'undefined' ? VLTJS.body : $scope;

			const $counterUp = $scope.find('.vlt-counter-up, .vlt-counter-up-small, .vlt-award-item');

			function animateNumbers(el) {

				const $this = $(el),
					dataAnimationDuration = $this.data('animation-speed') || 1000,
					$endingNumber = $this.find('.counter'),
					endingNumberValue = $endingNumber.data('value'),
					dataDelimiter = $this.data('delimiter') || ',';

				$endingNumber.text('0');

				$endingNumber.numerator({
					easing: 'linear',
					duration: dataAnimationDuration,
					delimiter: dataDelimiter,
					toValue: endingNumberValue
				});

			}

			if (VLTJS.body.hasClass('page-template-template-fullpage-slider')) {
				if ($counterUp.parents('.vlt-section')) {
					VLTJS.window.one('vlt.change-slide', function () {
						animateNumbers($counterUp);
					});
					animateNumbers($counterUp);
				}
			} else {
				$counterUp.one('inview', function () {
					animateNumbers($counterUp);
				});
			}

		}
	}

	VLTJS.window.on('elementor/frontend/init', function () {
		elementorFrontend.hooks.addAction(
			'frontend/element_ready/vlt-counter-up.default',
			VLTJS.counterUp.init
		);

		elementorFrontend.hooks.addAction(
			'frontend/element_ready/vlt-counter-up-small.default',
			VLTJS.counterUp.init
		);

		elementorFrontend.hooks.addAction(
			'frontend/element_ready/vlt-award-item.default',
			VLTJS.counterUp.init
		);

	});

	VLTJS.counterUp.init();

})(jQuery);