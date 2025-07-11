/***********************************************
 * THEME: PLYR
 ***********************************************/
(function ($) {

	'use strict';

	// check if plugin defined
	if (typeof Plyr === 'undefined') {
		return;
	}

	VLTJS.plyr = {

		init: function () {

			const $audio = $('.vlt-post-media__audio'),
				$video = $('.vlt-post-media__video');

			if ($audio.length) {

				$audio.each(function () {

					const audioPlayer = new Plyr($(this).find('.player'), {
						tooltips: {
							controls: false,
							seek: true
						}
					});

					audioPlayer.on('ready', function () {
						VLTJS.document.trigger('vlt.plyr-ready');
					});

				});

			}

			if ($video.length) {

				$video.each(function () {

					const videoPlayer = new Plyr($(this).find('.player'), {
						tooltips: {
							controls: false,
							seek: true
						},
						ratio: '16:9',
						youtube: {
							modestbranding: false
						}
					});

					videoPlayer.on('ready', function () {
						VLTJS.document.trigger('vlt.plyr-ready');
					});

				});

			}

		}

	};

	VLTJS.plyr.init();

	VLTJS.document.on('loadedNewItems.vpf', function (event, vpObject) {
		if ('vpf' !== event.namespace) {
			return;
		}
		VLTJS.plyr.init();
	});

})(jQuery);