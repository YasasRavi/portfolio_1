/***********************************************
 * INIT THIRD PARTY SCRIPTS
 ***********************************************/
(function ($) {

	'use strict';

	/**
	 * Remove overflow for sticky
	 */
	if ($('.sticky-column, .has-sticky-column').length) {
		$('.vlt-main').css('overflow', 'inherit');
	}

	/**
	 * LAX
	 */
	if (typeof lax !== 'undefined') {

		window.onload = function () {

			lax.init();

			lax.addDriver('scrollY', function () {
				return window.scrollY
			});

			lax.addElements('.vlt-page-title .lax', {
				scrollY: {
					translateY: [
						[0, 'elOutY'],
						[0, 'elHeight']
					],
					opacity: [
						[0, 'elOutY'],
						[1, 0]
					]
				}
			});
		}

	}

	/**
	 * Add nofollow to child menu link
	 */
	$('.menu-item-has-children > a').attr('rel', 'nofollow');

	/**
	 * Widget RSS
	 */
	$('.vlt-widget.widget_rss .rsswidget').addClass('h6');

	/**
	 * Widget menu
	 */
	if (typeof $.fn.superclick !== 'undefined') {

		$('.widget_pages > ul, .widget_nav_menu ul.menu').superclick({
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

	/**
	 * Jarallax
	 */
	if (typeof $.fn.jarallax !== 'undefined') {
		$('.jarallax, .elementor-section.jarallax, .elementor-column.jarallax>.elementor-column-wrap').jarallax({
			speed: 0.8
		});
	}

	/**
	 * Fitvids
	 */
	if (typeof $.fn.fitVids !== 'undefined') {
		VLTJS.body.fitVids();
	}

	/**
	 * Back button
	 */
	$('.btn-go-back').on('click', function (e) {
		e.preventDefault();
		window.history.back();
	});

	/**
	 * Fancybox
	 */
	if (typeof $.fn.fancybox !== 'undefined') {
		$.fancybox.defaults.btnTpl = {
			close: '<button data-fancybox-close class="fancybox-button fancybox-button--close">' +
				VLT_LOCALIZE_DATAS.close +
				'</button>',
			arrowLeft: '<a data-fancybox-prev class="fancybox-button fancybox-button--arrow_left" href="javascript:;">' +
				VLT_LOCALIZE_DATAS.arrow_left +
				'</a>',
			arrowRight: '<a data-fancybox-next class="fancybox-button fancybox-button--arrow_right" href="javascript:;">' +
				VLT_LOCALIZE_DATAS.arrow_right +
				'</a>',
			smallBtn: '<button type="button" data-fancybox-close class="fancybox-button fancybox-close-small">' +
				VLT_LOCALIZE_DATAS.close +
				'</button>'
		};
		$.fancybox.defaults.buttons = [
			'close'
		];
		$.fancybox.defaults.infobar = false;
		$.fancybox.defaults.transitionEffect = 'slide';
	}

	/**
	 * Focus input
	 */
	if ($('.vlt-form-group').length) {

		$('.vlt-form-group .vlt-form-control').focus(function () {
			$(this).closest('.vlt-form-group').addClass('active');
		}).blur(function () {
			if ($(this).val() == '') {
				$(this).closest('.vlt-form-group').removeClass('active');
			}
		});

		$('.vlt-form-group .vlt-form-control').change(function () {
			if ($(this).val() == '') {
				$(this).closest('.vlt-form-group').removeClass('active');
			} else {
				$(this).closest('.vlt-form-group').addClass('active');
			}
		});

	}

})(jQuery);