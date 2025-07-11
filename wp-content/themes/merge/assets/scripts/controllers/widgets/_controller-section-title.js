/***********************************************
 * WIDGET: SECTION TITLE
 ***********************************************/
(function ($) {

	'use strict';

	VLTJS.sectionTitle = {

		init: function ($scope) {

			$scope = typeof $scope === 'undefined' ? VLTJS.body : $scope;

			const $sectionTitle = $scope.find('.vlt-highlight');

			$sectionTitle.each(function () {

				const $this = $(this);

				$(VLT_LOCALIZE_DATAS.circle_highlight).appendTo($this.filter('.vlt-highlight--circle'));
				$(VLT_LOCALIZE_DATAS.wave_highlight).appendTo($this.filter('.vlt-highlight--wave'));

			});

		}

	}

	VLTJS.window.on('elementor/frontend/init', function () {
		elementorFrontend.hooks.addAction(
			'frontend/element_ready/vlt-section-title.default',
			VLTJS.sectionTitle.init
		);
	});

	VLTJS.sectionTitle.init();

})(jQuery);