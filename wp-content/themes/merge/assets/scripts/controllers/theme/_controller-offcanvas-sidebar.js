/***********************************************
 * THEME: OFFCANVAS SIDEBAR
 ***********************************************/
(function ($) {

	'use strict';

	// check if plugin defined
	if (typeof gsap == 'undefined') {
		return;
	}

	let sidebarIsOpen = false;

	VLTJS.offcanvasSidebar = {
		init: function () {

			const $sidebar = $('.vlt-offcanvas-sidebar'),
				$sidebarToggle = $('.js-offcanvas-sidebar-toggle'),
				$sidebarClose = $('.js-offcanvas-sidebar-close'),
				$siteOverlay = $('.vlt-site-overlay');

			CustomEase.create('merge', '0.37, 0, 0.63, 1');

			$sidebarToggle.on('click', function (e) {
				e.preventDefault();
				if (!sidebarIsOpen) {
					VLTJS.offcanvasSidebar.open_sidebar($sidebar, $siteOverlay, $sidebarToggle);
				} else {
					VLTJS.offcanvasSidebar.close_sidebar($sidebar, $siteOverlay, $sidebarToggle);
				}
			});

			$sidebarClose.on('click', function (e) {
				e.preventDefault();
				if (sidebarIsOpen) {
					VLTJS.offcanvasSidebar.close_sidebar($sidebar, $siteOverlay, $sidebarToggle);
				}
			});

			$siteOverlay.on('click', function (e) {
				e.preventDefault();
				if (sidebarIsOpen) {
					VLTJS.offcanvasSidebar.close_sidebar($sidebar, $siteOverlay, $sidebarToggle);
				}
			});

			VLTJS.throttleScroll(function(type, scroll) {
				const start = 300;
				if (scroll > start) {
					if (sidebarIsOpen) {
						VLTJS.offcanvasSidebar.close_sidebar($sidebar, $siteOverlay, $sidebarToggle);
					}
				}
			});

			VLTJS.document.on('vlt.close-offcanvas-sidebar', function () {
				if (sidebarIsOpen) {
					VLTJS.offcanvasSidebar.close_sidebar($sidebar, $siteOverlay, $sidebarToggle);
				}
			});

			VLTJS.document.on('keyup', function (e) {
				if (e.keyCode === 27 && sidebarIsOpen) {
					e.preventDefault();
					VLTJS.offcanvasSidebar.close_sidebar($sidebar, $siteOverlay, $sidebarToggle);
				}
			});

		},
		open_sidebar: function (sidebar, siteOverlay, sidebarToggle) {
			VLTJS.document.trigger('vlt.close-search-popup');
			VLTJS.document.trigger('vlt.close-slide-menu');

			sidebarIsOpen = true;

			gsap.timeline({
				defaults: {
					ease: 'merge'
				}
			})
			// set overflow for html
			.set(VLTJS.html, {
				overflow: 'hidden'
			})
			// sidebar animation
			.fromTo(sidebar, .6, {
				x: '100%'
			}, {
				autoAlpha: 1,
				x: 0,
				onStart: function () {
					sidebarToggle.addClass('is-open');
					siteOverlay.addClass('is-open');
					// play audio
					if (VLT_LOCALIZE_DATAS.open_click_sound && typeof Howl !== 'undefined') {
						new Howl({
							src: [VLT_LOCALIZE_DATAS.open_click_sound],
							autoplay: true,
							loop: false,
							volume: 0.3
						});
					}
				}
			})

		},
		close_sidebar: function (sidebar, siteOverlay, sidebarToggle) {
			sidebarIsOpen = false;

			gsap.timeline({
				defaults: {
					ease: 'merge'
				}
			})
			// set overflow for html
			.set(VLTJS.html, {
				overflow: 'auto'
			})
			// sidebar animation
			.to(sidebar, .6, {
				x: '100%',
				onStart: function () {
					// play audio
					if (typeof VLT_LOCALIZE_DATAS.close_click_sound && typeof Howl !== 'undefined') {
						new Howl({
							src: [VLT_LOCALIZE_DATAS.close_click_sound],
							autoplay: true,
							loop: false,
							volume: 0.3
						});
					}
				},
				onComplete: function () {
					sidebarToggle.removeClass('is-open');
					siteOverlay.removeClass('is-open');
				}
			}, '-=.15')
			// set visibility menu after animation
			.set(sidebar, {
				visibility: 'hidden',
			});

		}
	}

	VLTJS.offcanvasSidebar.init();

})(jQuery);