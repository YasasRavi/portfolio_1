/***********************************************
 * WIDGET: AWARDS
 ***********************************************/
(function ($) {

	'use strict';

	// check if plugin defined
	if (typeof Swiper === 'undefined') {
		return;
	}

	VLTJS.awards = {
		init: function ($scope) {

			$scope = typeof $scope === 'undefined' ? VLTJS.body : $scope;

			const $awards = $scope.find('.vlt-awards'),
				dataSpeed = $awards.data('speed');

			$awards.each(function () {

				new Swiper(this, {
					spaceBetween: 0,
					loop: false,
					slidesPerView: 'auto',
					grabCursor: true,
					speed: dataSpeed,
					freeMode: true
				});

			});

		}
	}

	VLTJS.window.on('elementor/frontend/init', function () {
		elementorFrontend.hooks.addAction(
			'frontend/element_ready/vlt-awards.default',
			VLTJS.awards.init
		);
	});

	VLTJS.awards.init();

})(jQuery);