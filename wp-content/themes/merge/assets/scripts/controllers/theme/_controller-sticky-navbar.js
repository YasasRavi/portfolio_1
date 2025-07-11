/***********************************************
 * THEME: STICKY NAVBAR
 ***********************************************/
(function ($) {

	'use strict';

	VLTJS.stickyNavbar = {

		init: function () {

			const $navbarMain = $('.vlt-header .vlt-navbar--main');

			$navbarMain.each(function () {

				const $currentNavbar = $(this);

				// sticky navbar
				const navbarHeight = $currentNavbar.length ? $currentNavbar.outerHeight() : 0,
					navbarMainOffset = $currentNavbar.hasClass('vlt-bar--offset') ? VLTJS.window.outerHeight() : navbarHeight * 2;

				// fake navbar
				const $navbarFake = $('<div class="vlt-fake-navbar">').hide();

				function _fixed_navbar() {
					$currentNavbar.addClass('vlt-navbar--fixed');
					$navbarFake.show();
				}

				function _unfixed_navbar() {
					$currentNavbar.removeClass('vlt-navbar--fixed');
					$navbarFake.hide();
				}

				function _on_scroll_navbar() {

					if (VLTJS.window.scrollTop() >= navbarMainOffset) {

						_fixed_navbar();

					} else {

						_unfixed_navbar();

					}

				}

				if ($currentNavbar.hasClass('vlt-navbar--sticky')) {

					VLTJS.window.on('scroll resize', _on_scroll_navbar);

					_on_scroll_navbar();

					// append fake navbar
					$currentNavbar.after($navbarFake);

					// fake navbar height after resize
					$navbarFake.height($currentNavbar.innerHeight());

					VLTJS.debounceResize(function () {
						$navbarFake.height($currentNavbar.innerHeight());
					});

				}

				// hide navbar on scroll
				const navbarHideOnScroll = $currentNavbar.filter('.vlt-navbar--hide-on-scroll');

				VLTJS.throttleScroll(function (type, scroll) {

					const start = 650;

					function _show_navbar() {
						navbarHideOnScroll.removeClass('vlt-on-scroll-hide').addClass('vlt-on-scroll-show');
					}

					function _hide_navbar() {
						navbarHideOnScroll.removeClass('vlt-on-scroll-show').addClass('vlt-on-scroll-hide');
					}

					// hide or show
					if (type === 'down' && scroll > start) {
						_hide_navbar();
					} else if (type === 'up' || type === 'end' || type === 'start') {
						_show_navbar();
					}

					// add solid color
					if ($currentNavbar.hasClass('vlt-navbar--transparent') && $currentNavbar.hasClass('vlt-navbar--sticky')) {
						scroll > navbarHeight * 2 ? $currentNavbar.addClass('vlt-navbar--solid') : $currentNavbar.removeClass('vlt-navbar--solid');
					}

					// sticky column fix
					if (($currentNavbar.hasClass('vlt-navbar--fixed') && $currentNavbar.hasClass('vlt-navbar--sticky')) && !$currentNavbar.hasClass('vlt-on-scroll-hide')) {
						VLTJS.html.addClass('vlt-is--header-fixed');
					} else {
						VLTJS.html.removeClass('vlt-is--header-fixed');
					}

				});

			});

		}

	};

	VLTJS.stickyNavbar.init();

})(jQuery);