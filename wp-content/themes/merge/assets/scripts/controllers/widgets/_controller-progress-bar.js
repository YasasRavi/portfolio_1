/***********************************************
 * WIDGET: PROGRESS BAR
 ***********************************************/
(function ($) {

	'use strict';

	// check if plugin defined
	if (typeof gsap === 'undefined') {
		return;
	}

	VLTJS.progressBar = {
		init: function ($scope) {

			$scope = typeof $scope === 'undefined' ? VLTJS.body : $scope;

			const $progressBar = $scope.find('.vlt-progress-bar');

			function animateProgressBar(el) {

				const $this = $(el),
					dataFinalValue = $this.data('final-value') || 0,
					dataAnimationDuration = $this.data('animation-speed') || 0;

				let delay = 150,
					width = 0,
					obj = {
						count: 0
					};

				gsap.to(obj, (dataAnimationDuration / 1000) / 2, {
					count: dataFinalValue,
					delay: delay / 1000,
					onUpdate: function () {
						$this.find('.vlt-progress-bar__title > .counter').text(Math.round(obj.count));
					}
				});

				gsap.fromTo($this.filter('.vlt-progress-bar--default').find('.vlt-progress-bar__track > .bar'), dataAnimationDuration / 1000, {
					width: width
				}, {
					width: dataFinalValue + '%',
					delay: delay / 1000
				});

				gsap.to(obj, dataAnimationDuration / 1000, {
					count: dataFinalValue,
					delay: delay / 1000,
					onUpdate: function () {
						$this.filter('.vlt-progress-bar--dotted').find('.vlt-progress-bar__track > .bar').css('clip-path', 'inset(0 ' + (100 - Math.round(obj.count)) + '% 0 0)');
					}
				});

			}

			if (VLTJS.body.hasClass('page-template-template-fullpage-slider')) {
				if ($progressBar.parents('.vlt-section').hasClass('active')) {
					VLTJS.window.one('vlt.change-slide', function () {
						animateProgressBar($progressBar);
					});
					animateProgressBar($progressBar);
				}
			} else {
				$progressBar.one('inview', function () {
					animateProgressBar($progressBar);
				});
			}

		}
	}

	VLTJS.window.on('elementor/frontend/init', function () {
		elementorFrontend.hooks.addAction(
			'frontend/element_ready/vlt-progress-bar.default',
			VLTJS.progressBar.init
		);
	});

	VLTJS.progressBar.init();

})(jQuery);