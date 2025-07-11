/***********************************************
 * WIDGET: BUTTON
 ***********************************************/
(function ($) {

	'use strict';

	// check if plugin defined
	if (typeof gsap == 'undefined') {
		return;
	}

	if (typeof Splitting == 'undefined') {
		return;
	}

	VLTJS.button = {

		init: function ($scope) {

			$scope = typeof $scope === 'undefined' ? VLTJS.body : $scope;

			const $button = $scope.find('.vlt-btn.vlt-btn--effect');

			CustomEase.create('merge', '0.37, 0, 0.63, 1');

			$button.each(function () {

				const $this = $(this);

				if (!$this.find('.vlt-btn__content').length) {
					$this.wrapInner('<span class="vlt-btn__content"></span>');
					$('<span class="vlt-btn__fill"></span>').appendTo($this);
					$this.find('.vlt-btn__content').clone().addClass('copy').appendTo($this);
					$('<span class="vlt-btn__fill copy"></span>').appendTo($this);
				}

				Splitting({
					target: $this.find('.vlt-btn__content.copy')
				});

				$this.on('mouseenter', function () {
					const $chars = $(this).find('.vlt-btn__content.copy .char');
					gsap.killTweensOf($chars);
					gsap.timeline({
						defaults: {
							ease: 'merge'
						}
					})
						.set($chars, {
							yPercent: 50,
							autoAlpha: 0,
						})
						.to($chars, .3, {
							yPercent: 0,
							delay: .3,
							autoAlpha: 1,
							stagger: {
								amount: .2
							}
						});
				});

			});

		}

	}

	VLTJS.window.on('elementor/frontend/init', function () {

		elementorFrontend.hooks.addAction(
			'frontend/element_ready/vlt-button.default',
			VLTJS.button.init
		);

		elementorFrontend.hooks.addAction(
			'frontend/element_ready/vlt-single-post.default',
			VLTJS.button.init
		);

		elementorFrontend.hooks.addAction(
			'frontend/element_ready/vlt-projects-slider.default',
			VLTJS.button.init
		);

		elementorFrontend.hooks.addAction(
			'frontend/element_ready/wp-widget-mc4wp_form_widget.default',
			VLTJS.button.init
		);

	});

	VLTJS.button.init();

	VLTJS.document.on('init.vpf endLoadingNewItems.vpf', function (e) {
		VLTJS.button.init();
	});

	VLTJS.window.on('vlt.locales-ready', function () {
		VLTJS.button.init();
	});

})(jQuery);