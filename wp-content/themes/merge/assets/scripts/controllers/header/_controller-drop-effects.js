/***********************************************
 * HEDAER: DROP EFFECTS
 ***********************************************/
(function ($) {

	'use strict';

	// check if plugin defined
	if (typeof gsap == 'undefined') {
		return;
	}

	if (typeof $.fn.superclick == 'undefined') {
		return;
	}

	VLTJS.submenuEffectStyle1 = {
		config: {
			easing: 'power2.out'
		},
		init: function () {

			const $effect = $('[data-submenu-effect="style-1"]'),
				$navbars = $effect.find('ul.sf-menu');

			// prepend back button
			$navbars.find('ul.sub-menu').prepend('<li class="sub-menu-back"><a href="#"><span class="menu-item-text">' + VLT_LOCALIZE_DATAS.menu_back_text + '</span></a></li>');

			// update submenu height
			function _update_submenu_height($item) {

				const $nav = $item.closest($effect),
					$sfMenu = $nav.find('ul.sf-menu'),
					$submenu = $sfMenu.find('li.menu-item-has-children.open > ul.sub-menu:not(.closed)');

				let submenuHeight = '';

				if ($submenu.length) {
					submenuHeight = $submenu.innerHeight();
				}

				$sfMenu.css({
					height: submenuHeight,
					minHeight: submenuHeight,
				});

			}

			// open / close submenu
			function _toggle_submenu(open, submenu, clickedLink) {

				let $newItems = submenu.find('> ul.sub-menu > li > a'),
					$oldItems = submenu.parent().find('> li > a');

				if (open) {
					submenu.addClass('open').parent().addClass('closed');
				} else {
					submenu.removeClass('open').parent().removeClass('closed');

					let tmp = $newItems;
					$newItems = $oldItems;
					$oldItems = tmp;
				}

				gsap.timeline({
						defaults: {
							ease: VLTJS.submenuEffectStyle1.config.easing
						}
					})
					.to($oldItems, .3, {
						autoAlpha: 0,
						onComplete: function () {
							$oldItems.css('display', 'none');
						}
					})
					.set($newItems, {
						autoAlpha: 0,
						display: 'flex',
						y: 30,
						onComplete: function () {
							_update_submenu_height(clickedLink);
						}
					})
					.to($newItems, .3, {
						y: 0,
						delay: .3,
						autoAlpha: 1,
						stagger: {
							amount: .15
						}
					});

			}

			$navbars.on('click', 'li.menu-item-has-children > a', function (e) {
				_toggle_submenu(true, $(this).parent(), $(this));
				e.preventDefault();
			});

			$navbars.on('click', 'li.sub-menu-back > a', function (e) {
				_toggle_submenu(false, $(this).parent().parent().parent(), $(this));
				e.preventDefault();
			});

		}

	}

	VLTJS.submenuEffectStyle1.init();

	VLTJS.submenuEffectStyle2 = {
		config: {
			easing: 'power2.out'
		},
		init: function () {

			const $effect = $('[data-submenu-effect="style-2"]'),
				$navbars = $effect.find('ul.sf-menu');

			$navbars.superclick({
				delay: 300,
				cssArrows: false,
				animation: {
					opacity: 'show',
					height: 'show'
				},
				animationOut: {
					opacity: 'hide',
					height: 'hide'
				},
			});

		}

	}

	VLTJS.submenuEffectStyle2.init();

})(jQuery);