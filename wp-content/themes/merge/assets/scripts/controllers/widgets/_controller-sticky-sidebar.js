/***********************************************
 * WIDGET: STICKY COLUMN
 ***********************************************/
(function ($) {

	'use strict';

	// check if plugin defined
	if (typeof StickySidebar == 'undefined') {
		return;
	}

	VLTJS.elementorColumn = {

		init: function ($scope) {

			var stickyOn = [
					'desktop',
					// 'tablet',
					// 'mobile'
				],
				stickyInstance = null,
				stickyInstanceOptions = {
					topSpacing: 50,
					bottomSpacing: 50,
					containerSelector: '.elementor-row, .elementor-container',
					innerWrapperSelector: '.elementor-column-wrap'
				};

			if ($scope.hasClass('vlt-sticky-elementor-sidebar')) {

				$scope.addClass('vlt-sticky-column');

				if (-1 !== stickyOn.indexOf(elementorFrontend.getCurrentDeviceMode())) {

					$scope.data('stickyColumnInit', true);
					stickyInstance = new StickySidebar($scope[0], stickyInstanceOptions);

					VLTJS.debounceResize(resizeDebounce);

				}

			}

			function resizeDebounce() {
				var currentDeviceMode = elementorFrontend.getCurrentDeviceMode(),
					availableDevices = stickyOn || [],
					isInit = $scope.data('stickyColumnInit');

				if (-1 !== availableDevices.indexOf(currentDeviceMode)) {

					if (!isInit) {
						$scope.data('stickyColumnInit', true);
						stickyInstance = new StickySidebar($scope[0], stickyInstanceOptions);
						stickyInstance.updateSticky();
					}
				} else {
					$scope.data('stickyColumnInit', false);
					stickyInstance.destroy();
				}

			}

		}

	}

	VLTJS.window.on('elementor/frontend/init', function () {
		elementorFrontend.hooks.addAction(
			'frontend/element_ready/column',
			VLTJS.elementorColumn.init
		);
	});

})(jQuery);