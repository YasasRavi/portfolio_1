/***********************************************
 * WIDGET: PIE CHART
 ***********************************************/
(function ($) {

	'use strict';

	if (typeof gsap === 'undefined') {
		return;
	}

	VLTJS.pieChart = {
		init: function ($scope) {

			$scope = typeof $scope === 'undefined' ? VLTJS.body : $scope;

			const $chart = $scope.find('.vlt-pie-chart');

			$chart.each(function () {

				const $this = $(this),
					dataChartValue = $this.data('chart-value') || 0,
					dataChartAnimationDuration = $this.data('chart-animation-duration') || 0;

				let delay = 150,
					obj = {
						count: 0
					};

				$this.one('inview', function () {

					gsap.to($this, dataChartAnimationDuration / 1000, {
						'--final-value': dataChartValue
					});

					gsap.to(obj, dataChartAnimationDuration / 1000, {
						count: dataChartValue,
						delay: delay / 1000,
						onUpdate: function () {
							$this.find('.vlt-pie-chart__title > .counter').text(Math.round(obj.count));
						}
					});

				});

			});

		}
	}

	VLTJS.window.on('elementor/frontend/init', function () {
		elementorFrontend.hooks.addAction(
			'frontend/element_ready/vlt-pie-chart.default',
			VLTJS.pieChart.init
		);
	});

	VLTJS.pieChart.init();

})(jQuery);