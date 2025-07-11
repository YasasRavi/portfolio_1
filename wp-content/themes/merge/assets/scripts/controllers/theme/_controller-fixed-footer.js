/***********************************************
 * THEME: FIXED FOOTER
 ***********************************************/
(function ($) {

	'use strict';

	// check if plugin defined
	if (typeof gsap == 'undefined') {
		return;
	}

	if (VLTJS.isMobileDevice()) {
		return;
	}

	VLTJS.fixedFooterEffect = {
		init: function () {

			const footer = $('.vlt-footer').filter('.vlt-footer--fixed');

			if (footer.length) {
				$('.vlt-main').css('min-height', '100vh');
			}

			VLTJS.window.on('load resize', function () {
				const footerHeight = footer.outerHeight();
				if (footerHeight <= VLTJS.window.height()) {
					gsap.registerPlugin(ScrollTrigger);
					gsap.set(footer, {
						yPercent: -50
					});
					const uncover = gsap.timeline({
						paused: true
					});
					uncover.to(footer, {
						yPercent: 0,
						ease: 'none'
					});
					ScrollTrigger.create({
						trigger: '.vlt-site-wrapper',
						start: 'bottom bottom',
						end: `+=${footerHeight}px`,
						animation: uncover,
						scrub: true,
						markers: false,
					});
				}
			});

		}

	};

	VLTJS.document.imagesLoaded(function () {
		VLTJS.fixedFooterEffect.init();
	});

	VLTJS.document.on('lazyloaded', function () {
		VLTJS.fixedFooterEffect.init();
	});

	VLTJS.debounceResize(function () {
		VLTJS.fixedFooterEffect.init();
	});

})(jQuery);