/***********************************************
 * THEME: ISOTOPE
 ***********************************************/
(function ($) {

	'use strict';

	// check if plugin defined
	if (typeof Isotope == 'undefined') {
		return;
	}

	VLTJS.initIsotope = {
		init: function () {

			$('.vlt-isotope-grid').each(function () {

				const $this = $(this),
					setLayout = $this.data('layout'),
					setXGap = $this.data('x-gap'),
					setYGap = $this.data('y-gap');

				$this.css('--vlt-gutter-x', `${setXGap}px`);
				$this.css('--vlt-gutter-y', `${setYGap}px`);

				const $grid = $this.isotope({
					itemSelector: '.grid-item',
					layoutMode: setLayout,
					masonry: {
						columnWidth: '.grid-sizer'
					},
					cellsByRow: {
						columnWidth: '.grid-sizer'
					}
				});

				VLTJS.document.on('lazyloaded vlt.plyr-ready', function(){
					$grid.isotope('layout');
				});

			});

		}
	}

	VLTJS.initIsotope.init();

})(jQuery);