/***********************************************
 * WIDGET: FANCY TEXT
 ***********************************************/
(function ($) {

	'use strict';

	// check if plugin defined
	if (typeof Typed == 'undefined') {
		return;
	}

	// check if plugin defined
	if (typeof $.fn.Morphext == 'undefined') {
		return;
	}

	VLTJS.fancyText = {
		init: function ($scope) {

			$scope = typeof $scope === 'undefined' ? VLTJS.body : $scope;

			const $fancyText = $scope.find('.vlt-fancy-text');

			$fancyText.each(function () {

				const $this = $(this),
					$strings = $this.find('.strings'),
					dataAnimationType = $this.data('animation-type') || '',
					dataFancyText = $this.data('fancy-text') || '',
					dataTypingSpeed = $this.data('typing-speed') || '',
					dataDelay = $this.data('delay') || '',
					dataTypeCursor = $this.data('type-cursor') == 'yes' ? true : false,
					dataTypeCursorSymbol = $this.data('type-cursor-symbol') || '|',
					dataTypingLoop = $this.data('typing-loop') == 'yes' ? true : false;

				if (dataAnimationType == 'typing') {
					// fix double cursor
					if ($this.find('.typed-cursor').length) {
						return;
					}
					new Typed($strings.get(0), {
						strings: dataFancyText.split('|'),
						typeSpeed: dataTypingSpeed,
						backSpeed: 0,
						startDelay: 300,
						backDelay: dataDelay,
						showCursor: dataTypeCursor,
						cursorChar: dataTypeCursorSymbol,
						loop: dataTypingLoop
					});
				} else {
					$strings.show().Morphext({
						animation: dataAnimationType,
						separator: ', ',
						speed: dataDelay,
						complete: function () {
							// Overrides default empty function
						}
					});
				}

			});

		}
	}

	VLTJS.window.on('elementor/frontend/init', function () {
		elementorFrontend.hooks.addAction(
			'frontend/element_ready/vlt-fancy-text.default',
			VLTJS.fancyText.init
		);
	});

	VLTJS.fancyText.init();

})(jQuery);