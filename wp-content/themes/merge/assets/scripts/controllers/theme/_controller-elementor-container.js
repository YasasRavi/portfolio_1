/***********************************************
 * THEME: ELEMENTOR CONTAINER
 ***********************************************/
(function ($) {

	'use strict';

	VLTJS.stickyContainer = {
		init: function ($scope) {

			const $parent = $scope.filter('.has-sticky-column');

			if ($parent.length) {
				$parent.parents('.e-parent').addClass('sticky-parent');
				$parent.find('>.elementor-element').wrapAll('<div class="sticky-column">');
			}

		}
	};

	VLTJS.paddingToContainer = {
		init: function ($scope) {

			if (!$scope) {
				return;
			}

			function resizeDebounce() {

				const $paddingBlock = $scope.filter('.has-padding-block-to-left, .has-padding-block-to-right'),
					resetOnDevice = $paddingBlock.data('reset-padding-to-container-on-devices'),
					currentDevice = elementorFrontend.getCurrentDeviceMode(),
					offset = $('.vlt-fake-container').get(0).getBoundingClientRect().left + parseFloat($('.vlt-fake-container').css('padding-left')) || 0

				if ($paddingBlock.length) {

					if ($paddingBlock.hasClass('has-padding-block-to-left')) {
						$paddingBlock.css('padding-left', offset);
					}

					if ($paddingBlock.hasClass('has-padding-block-to-right')) {
						$paddingBlock.css('padding-right', offset);
					}

					if (-1 != resetOnDevice.indexOf(currentDevice)) {
						$paddingBlock.css({
							'padding-left': '',
							'padding-right': '',
						});
					}

				}

			}

			resizeDebounce();
			VLTJS.debounceResize(resizeDebounce);

		}
	}

	VLTJS.stretchContainer = {
		init: function ($scope) {

			if (!$scope) {
				return;
			}

			function resizeDebounce() {

				const winW = VLTJS.window.outerWidth(),
					$stretchBlock = $scope.filter('.has-stretch-block-to-left, .has-stretch-block-to-right'),
					resetOnDevice = $stretchBlock.data('reset-on-devices'),
					currentDevice = elementorFrontend.getCurrentDeviceMode();

				if ($stretchBlock.length) {

					const rect = $stretchBlock[0].getBoundingClientRect(),
						offsetLeft = rect.left,
						offsetRight = winW - rect.right,
						elWidth = rect.width;

					if ($stretchBlock.hasClass('has-stretch-block-to-left')) {
						$stretchBlock.find('>*').css('margin-left', -offsetLeft);
						$stretchBlock.find('>*').css('width', elWidth + offsetLeft + 'px');
					}

					if ($stretchBlock.hasClass('has-stretch-block-to-right')) {
						$stretchBlock.find('>*').css('margin-right', -offsetRight);
						$stretchBlock.find('>*').css('width', elWidth + offsetRight + 'px');
					}

					if (-1 != resetOnDevice.indexOf(currentDevice)) {
						$stretchBlock.find('>*').css({
							'margin-left': '',
							'margin-right': '',
							'width': '100%'
						});
					}

				}

			}

			resizeDebounce();
			VLTJS.debounceResize(resizeDebounce);

		}

	}

	VLTJS.window.on('elementor/frontend/init', function () {
		elementorFrontend.hooks.addAction(
			'frontend/element_ready/container',
			VLTJS.stretchContainer.init
		);
	});

	VLTJS.window.on('elementor/frontend/init', function () {
		elementorFrontend.hooks.addAction(
			'frontend/element_ready/container',
			VLTJS.paddingToContainer.init
		);
	});

	VLTJS.window.on('elementor/frontend/init', function () {
		elementorFrontend.hooks.addAction(
			'frontend/element_ready/container',
			VLTJS.stickyContainer.init
		);
	});

})(jQuery);