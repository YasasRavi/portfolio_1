/***********************************************
 * WIDGET: JUSTIFIED GALLERY
 ***********************************************/
(function ($) {

	'use strict';

	// check if plugin defined
	if (typeof $.fn.justifiedGallery == 'undefined') {
		return;
	}

	VLTJS.justifiedGallery = {
		init: function ($scope) {

			$scope = typeof $scope === 'undefined' ? VLTJS.body : $scope;

			const $justifiedGallery = $scope.find('.vlt-justified-gallery');

			$justifiedGallery.each(function () {

				const $this = $(this),
					dataRowHeight = $this.data('row-height') || 360,
					dataMargins = $this.data('margins') || 0,
					dataLastRow = $this.data('last-row') || 'justify';

				$this.imagesLoaded(function () {
					$this.justifiedGallery({
						rowHeight: dataRowHeight,
						margins: dataMargins,
						border: 0,
						captions: false,
						lastRow: dataLastRow
					});
				});

			});

		}
	}

	VLTJS.window.on('elementor/frontend/init', function () {
		elementorFrontend.hooks.addAction(
			'frontend/element_ready/vlt-justified-gallery.default',
			VLTJS.justifiedGallery.init
		);
	});

	VLTJS.justifiedGallery.init();

})(jQuery);