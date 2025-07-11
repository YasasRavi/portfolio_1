/***********************************************
 * THEME: ANIMATE BLOCK
 ***********************************************/
(function ($) {

	'use strict';

	VLTJS.animateBlock = {
		init: function () {
			const $animateElement = $('.vlt-animate-element'),
				prefix = 'animate__';
			if (VLTJS.body.hasClass('page-template-template-fullpage-slider')) {
				VLTJS.window.on('vlt.change-slide', function () {
					$animateElement.each(function () {
						const $this = $(this),
							animationName = $this.data('animation-name'),
							animationDelay = $this.data('animation-delay'),
							animationDuration = $this.data('animation-duration');

						animationDelay ? $this.css('--animate-delay', animationDelay + 'ms') : false;
						animationDuration ? $this.css('--animate-duration', animationDuration + 'ms') : false;

						if ($this.parents('.vlt-section').hasClass('active')) {
							$this.addClass(prefix + 'animated').addClass(prefix + animationName);
						}
					});
				});
			} else {
				$animateElement.each(function () {
					const $this = $(this);
					$this.one('inview', function () {
						const animationName = $this.data('animation-name'),
							animationDelay = $this.data('animation-delay'),
							animationDuration = $this.data('animation-duration');

						animationDelay ? $this.css('--animate-delay', animationDelay + 'ms') : false;
						animationDuration ? $this.css('--animate-duration', animationDuration + 'ms') : false;

						$this.addClass(prefix + 'animated').addClass(prefix + animationName);
					});
				});
			}
		}
	};

	VLTJS.animateBlock.init();

})(jQuery);