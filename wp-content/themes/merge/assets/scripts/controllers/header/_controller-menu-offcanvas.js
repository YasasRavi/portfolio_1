/***********************************************
 * HEADER: MENU OFFCANVAS
 ***********************************************/

(function ($) {

	'use strict';

	// check if plugin defined
	if (typeof gsap == 'undefined') {
		return;
	}

	let menuIsOpen = false;

	VLTJS.menuOffcanvas = {
		init: function () {

			const $menu = $('.vlt-offcanvas-menu'),
				$menuToggle = $('.js-offcanvas-menu-toggle'),
				$navItem = $menu.find('ul.sf-menu > li'),
				$subscribe = $menu.find('.vlt-subscribe-form'),
				$locales = $menu.find('.vlt-offcanvas-menu__locales'),
				$siteOverlay = $('.vlt-site-overlay');

			CustomEase.create('merge', '0.37, 0, 0.63, 1');

			$(VLT_LOCALIZE_DATAS.star_fill).prependTo('ul.sf-menu > li > a span.menu-item-text');
			$(VLT_LOCALIZE_DATAS.dot).prependTo('ul.sub-menu span.menu-item-text');

			$menuToggle.on('click', function (e) {
				e.preventDefault();
				if (!menuIsOpen) {
					VLTJS.menuOffcanvas.open_menu($menuToggle, $menu, $navItem, $subscribe, $locales, $siteOverlay);
				} else {
					VLTJS.menuOffcanvas.close_menu($menuToggle, $menu, $siteOverlay);
				}
			});

			VLTJS.document.on('vlt.close-slide-menu', function () {
				if (menuIsOpen) {
					VLTJS.menuOffcanvas.close_menu($menuToggle, $menu, $siteOverlay);
				}
			});

			VLTJS.document.keyup(function (e) {
				if (e.keyCode === 27 && menuIsOpen) {
					e.preventDefault();
					VLTJS.menuOffcanvas.close_menu($menuToggle, $menu, $siteOverlay);
				}
			});

			VLTJS.document.on('vlt.close-slide-menu', function () {
				if (menuIsOpen) {
					VLTJS.menuOffcanvas.close_menu($menuToggle, $menu, $siteOverlay);
				}
			});

			$siteOverlay.on('click', function () {
				if (menuIsOpen) {
					VLTJS.menuOffcanvas.close_menu($menuToggle, $menu, $siteOverlay);
				}
			});

			// Close after click to anchor.
			$navItem.filter('[data-menuanchor]').on('click', 'a', function () {
				if (menuIsOpen) {
					VLTJS.menuOffcanvas.close_menu($menuToggle, $menu, $siteOverlay);
				}
			});

		},
		open_menu: function (menuToggle, menu, navItem, subscribe, locales, siteOverlay) {

			// trigger close event
			VLTJS.document.trigger('vlt.close-subscribe-popup');
			VLTJS.document.trigger('vlt.close-offcanvas-sidebar');

			menuIsOpen = true;

			menu.each(function () {

				const $currentMenu = $(this);

				gsap.timeline({
					defaults: {
						ease: 'merge'
					}
				})
					// set overflow for html
					.set(VLTJS.html, {
						overflow: 'hidden'
					})
					// menu animation
					.to($currentMenu, .6, {
						x: '0',
						autoAlpha: 1,
						onStart: function () {

							menuToggle.addClass('is-open');
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
					// subscribe animation
					.fromTo(subscribe, .3, {
						y: 30,
						autoAlpha: 0
					}, {
						y: 0,
						delay: .3,
						autoAlpha: 1
					}, '-=.3')
					// navigation item animation
					.fromTo(navItem, .3, {
						y: 30,
						autoAlpha: 0
					}, {
						y: 0,
						autoAlpha: 1,
						stagger: {
							amount: .3
						}
					}, '-=.15')
					// locales animation
					.fromTo(locales, .3, {
						y: 30,
						autoAlpha: 0
					}, {
						y: 0,
						autoAlpha: 1,
						stagger: {
							amount: .3
						}
					}, '-=.15');

			});
		},
		close_menu: function (menuToggle, menu, siteOverlay) {

			menuIsOpen = false;

			menu.each(function () {

				const $currentMenu = $(this);

				gsap.timeline({
					defaults: {
						ease: 'merge'
					}
				})
					// set overflow for html
					.set(VLTJS.html, {
						overflow: 'auto'
					})
					// menu animation
					.to($currentMenu, .6, {
						x: $currentMenu.hasClass('vlt-offcanvas-menu--right') ? '100%' : '-100%',
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
							siteOverlay.removeClass('is-open');
							menuToggle.removeClass('is-open');
						}
					});

			});

		}
	};

	VLTJS.menuOffcanvas.init();

})(jQuery);