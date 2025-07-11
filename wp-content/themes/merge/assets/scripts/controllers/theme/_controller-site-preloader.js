/***********************************************
 * THEME: PRELOADER
 ***********************************************/
(function ($) {

	'use strict';

	VLTJS.document.ready(function () {
		preloader.init(Boolean(VLTJS.isCustomizer()));
	});

	VLTJS.window.on('load', function () {
		preloader.windowLoaded = true;
	});

	VLTJS.window.on('elementor/frontend/init', function () {
		const editMode = Boolean(elementorFrontend.isEditMode());
		if (editMode) {
			preloader.init(editMode);
		}
	});

	let preloader = {
		holder: $('.vlt-site-preloader'),
		windowLoaded: false,
		preloaderFinished: false,
		percentNumber: 0,
		init: function (editMode) {
			let temp;
			if (this.holder.length) {
				if (editMode) {
					preloader.holder.hide();
					return;
				}
				temp = setInterval(function () {
					if (100 <= preloader.percentNumber) {
						clearInterval(temp);
						preloader.preloaderFinished = true;
						preloader.animateBackground(true);
					} else {
						preloader.animatePercent(preloader.holder.find('.vlt-preloader-cover__number > span'), preloader.holder.find('.vlt-preloader-cover__bar > div'), preloader.percentNumber);
					}
				}, 50);

			} else {
				VLTJS.window.trigger('vlt.site-loaded');
			}
		},
		animateBackground: function (isLoaded) {
			let temp = setInterval(function () {
				if (preloader.windowLoaded && preloader.preloaderFinished && (clearInterval(temp), isLoaded)) {
					preloader.holder.addClass('is-loaded');
					VLTJS.html.addClass('vlt-is-page-loaded');
					preloader.holder.one('transitionend', function () {
						VLTJS.window.trigger('vlt.site-loaded');
					});
				}
			}, 100);
		},
		animatePercent: function (loadingProgress, loadingBackground, percent) {
			if (percent < 100) {
				loadingProgress.html((percent += 1) + '%');
				loadingBackground.css('clip-path', 'inset(' + (100 - percent) + '% 0 0 0)');
				preloader.percentNumber = percent;
			}
		}
	};

})(jQuery);
