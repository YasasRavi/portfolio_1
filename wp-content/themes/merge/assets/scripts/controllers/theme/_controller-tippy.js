/***********************************************
 * THEME: TIPPY
 ***********************************************/
(function ($) {

	'use strict';

	// check if plugin defined
	if (typeof tippy === 'undefined') {
		return;
	}

	VLTJS.tippy = {

		init: function () {

			tippy('[data-tippy-content]:not(.copy-shortlink):not([data-tippy-template])');

			$('*[data-tippy-template]').each(function () {

				tippy(this, {
					content(reference) {
						const id = reference.getAttribute('data-tippy-template');
						const template = document.getElementById(id);
						return template.innerHTML;
					},
					allowHTML: true,
					theme: 'empty',
					animation: 'fade',
					hideOnClick: true,
					arrow: false,
					followCursor: true,
					offset: [0, 35],
					duration: [300, 150],
					delay: [200, 0],
					// trigger: 'click'
					trigger: 'mouseenter focus'
				});

			});

			function copyInput(el, text) {

				const copiedTippy = tippy(el);

				$(el).on('click', function (e) {
					const copyText = $(this).attr('data-tippy-content');
					copiedTippy.setContent($(this).attr('data-clipboard-label'));
					navigator.clipboard.writeText(text).then(function () {
						copiedTippy.show();
						setTimeout(function () {
							copiedTippy.hide();
							setTimeout(function () {
								copiedTippy.setContent(copyText);
							}, 150);
						}, 2000);
					});
					return false;
				});

			}

			$('.copy-shortlink').each(function () {
				const target = $('input' + $(this).data('clipboard-target')).val();
				copyInput(this, target);
			});

		}

	};

	VLTJS.tippy.init();

	VLTJS.document.on('loadedNewItems.vpf', function (event, vpObject) {
		VLTJS.tippy.init();
	});

})(jQuery);