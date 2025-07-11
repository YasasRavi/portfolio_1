/***********************************************
 * THEME: FOLLOW INFO
 ***********************************************/
(function ($) {

	'use strict';

	VLTJS.followInfo = {
		init: function ($scope) {

			if (!$('.vlt-follow-info').length) {
				VLTJS.body.append('\
			<div class="vlt-follow-info">\
			<div class="vlt-follow-info__title"></div><br>\
			<div class="vlt-follow-info__subtitle"></div>\
			</div>\
			');
			}

			const $getFollowInfo = $scope.find('[data-follow-info]'),
				$followInfo = $('.vlt-follow-info'),
				$title = $followInfo.find('.vlt-follow-info__title'),
				$subtitle = $followInfo.find('.vlt-follow-info__subtitle');

			$getFollowInfo.each(function () {

				const $currentPortfolioItem = $(this);

				$currentPortfolioItem.on('mousemove', function (e) {

					$followInfo.css({
						top: e.clientY,
						left: e.clientX
					});

				});

				$currentPortfolioItem.on({
					mouseenter: function () {

						const $this = $(this),
							titleText = $this.find('[data-follow-info-title]').html(),
							subtitleText = $this.find('[data-follow-info-content]').html();

						if (!$followInfo.hasClass('is-active')) {
							$followInfo.addClass('is-active');
							$title.html(titleText).wrapInner('<h5>');
							$subtitle.html(subtitleText).wrapInner('<span>');
						}

					},
					mouseleave: function () {

						if ($followInfo.hasClass('is-active')) {
							$followInfo.removeClass('is-active');
							$title.html('');
							$subtitle.html('');
						}

					}
				});

			});
		}
	}

	VLTJS.followInfo.init(VLTJS.body);

	VLTJS.document.on('init.vpf endLoadingNewItems.vpf', function (e) {
		VLTJS.followInfo.init(VLTJS.body);
	});

})(jQuery);