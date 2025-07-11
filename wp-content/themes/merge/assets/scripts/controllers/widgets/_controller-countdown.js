/***********************************************
 * WIDGET: COUNTDOWN
 ***********************************************/
(function ($) {

	'use strict';

	// check if plugin defined
	if (typeof $.fn.countdown === 'undefined') {
		return;
	}

	VLTJS.countdown = {
		init: function ($scope) {

			$scope = typeof $scope === 'undefined' ? VLTJS.body : $scope;

			const $countdown = $scope.find('.vlt-countdown');

			$countdown.each(function () {

				const $this = $(this),
					dataDueDate = $this.data('due-date') || false;

				$this.countdown(dataDueDate, function (event) {
					$this.find('[data-weeks]').html(event.strftime('%W'));
					$this.find('[data-days]').html(event.strftime('%D'));
					$this.find('[data-hours]').html(event.strftime('%H'));
					$this.find('[data-minutes]').html(event.strftime('%M'));
					$this.find('[data-seconds]').html(event.strftime('%S'));
				});

			});
		}
	}

	VLTJS.window.on('elementor/frontend/init', function () {
		elementorFrontend.hooks.addAction(
			'frontend/element_ready/vlt-countdown.default',
			VLTJS.countdown.init
		);
	});

	VLTJS.countdown.init();

})(jQuery);