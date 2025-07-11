/***********************************************
 * BACKGROUND AUDIO
 ***********************************************/
(function ($) {

	'use strict';

	// check if plugin defined
	if (typeof Howl == 'undefined') {
		return;
	}

	const $doc = $(document);

	let $html = $('html');


	if (typeof VLT_BACKGROUND_AUDIO.backgroundAudio !== 'undefined') {

		const sound = new Howl({
			src: VLT_BACKGROUND_AUDIO.backgroundAudio,
			autoplay: VLT_BACKGROUND_AUDIO.backgroundAudioAutoplay,
			loop: true,
			preload: true,
			onplayerror: function () {
				sound.once('unlock', function () {
					sound.play();
				});
			}
		});

		function switchMode(toggle = true, sound) {

			if (!$html || !$html.length) {
				return;
			}

			const storedState = localStorage.getItem('background-mute');
			let defaultValue = VLT_BACKGROUND_AUDIO.defaultValue;

			// Get local storage value.
			if (VLT_BACKGROUND_AUDIO.useLocalStorage && storedState) {
				defaultValue = storedState;
			}

			// Toggle mute.
			if (toggle) {
				defaultValue = 'mute' === defaultValue ? 'unmute' : 'mute';
			}

			// Enable mute.
			if ('mute' === defaultValue) {

				$html.addClass('muted').trigger('vlt.muted');

				if (toggle) {
					localStorage.setItem('background-mute', 'mute');
				}

				sound.fade(VLT_BACKGROUND_AUDIO.backgroundAudioVolume, 0, 500);

				// Disable mute.
			} else {

				$html.removeClass('muted').trigger('vlt.muted');

				if (toggle) {
					localStorage.setItem('background-mute', 'unmute');
				}

				sound.play();

				sound.fade(0, VLT_BACKGROUND_AUDIO.backgroundAudioVolume, 500);

			}

		}

		// Call.
		switchMode(false, sound);

		// Click on switch button.
		$doc.on('click', '.js-background-audio-toggle', function (e) {
			e.preventDefault();
			switchMode(true, sound);
		});

	}

})(jQuery);