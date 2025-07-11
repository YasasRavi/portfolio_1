/***********************************************
 * WIDGET: TABS
 ***********************************************/
(function ($) {

	'use strict';

	// check if plugin defined
	if (typeof gsap == 'undefined') {
		return;
	}

	VLTJS.tabs = {
		init: function ($scope) {

			const $tabs = $scope.find('.vlt-tabs'),
				$item = $tabs.find('.vlt-tab'),
				$content = $('.vlt-tab-content__item');

			CustomEase.create('merge', '0.37, 0, 0.63, 1');

			$content.filter('[data-content-id="' + $item.filter('.is-active').data('tab-id') + '"]').show();

			Splitting({
				target: $item
			});

			$item.on('click', function () {
				const $this = $(this),
					dataTabId = $this.data('tab-id');

				const $chars = $this.find('.char');
				gsap.killTweensOf($chars);
				gsap.timeline({
					defaults: {
						ease: 'merge'
					}
				})
					.to($chars, .3, {
						yPercent: -50,
						autoAlpha: 0,
						stagger: {
							amount: .2
						}
					})
					.set($chars, {
						yPercent: 50,
						autoAlpha: 0,
					})
					.to($chars, .3, {
						yPercent: 0,
						autoAlpha: 1,
						stagger: {
							amount: .2
						}
					});

				$item.removeClass('is-active');
				$this.addClass('is-active');

				$content.hide();
				$content.filter('[data-content-id="' + dataTabId + '"]').fadeIn(300);

			});
		}
	}

	VLTJS.window.on('elementor/frontend/init', function () {
		elementorFrontend.hooks.addAction(
			'frontend/element_ready/vlt-tabs.default',
			VLTJS.tabs.init
		);
	});

	VLTJS.window.on('elementor/frontend/init', function () {
		elementorFrontend.hooks.addAction(
			'frontend/element_ready/vlt-tab-content.default',
			VLTJS.tabs.init
		);
	});

})(jQuery);