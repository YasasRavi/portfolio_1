/***********************************************
 * WIDGET: COUNTER UP
 ***********************************************/
(function ($) {

	'use strict';

	// check if plugin defined
	if (typeof $.fn.numerator == 'undefined') {
		return;
	}

	VLTJS.skill = {
		init: function ($scope) {

			$scope = typeof $scope === 'undefined' ? VLTJS.body : $scope;

			const $skill = $scope.find('.vlt-skill');

			function animateNumbers(el) {

				const $this = $(el),
					dataAnimationDuration = $this.data('animation-speed') || 1000,
					$endingNumber = $this.find('.counter'),
					endingNumberValue = $endingNumber.data('value');

				$endingNumber.css({
					'min-width': $endingNumber.outerWidth() + 'px'
				});

				$endingNumber.text('0');

				$endingNumber.numerator({
					easing: 'linear',
					duration: dataAnimationDuration,
					delimiter: false,
					toValue: endingNumberValue,
				});

			}

			if (VLTJS.body.hasClass('page-template-template-fullpage-slider')) {
				if ($skill.parents('.vlt-section')) {
					VLTJS.window.one('vlt.change-slide', function () {
						animateNumbers($skill);
					});
					animateNumbers($skill);
				}
			} else {
				$skill.one('inview', function () {
					animateNumbers($skill);
				});
			}
		}
	}

	VLTJS.window.on('elementor/frontend/init', function () {
		elementorFrontend.hooks.addAction(
			'frontend/element_ready/vlt-skill.default',
			VLTJS.skill.init
		);
	});

	VLTJS.skill.init();

})(jQuery);