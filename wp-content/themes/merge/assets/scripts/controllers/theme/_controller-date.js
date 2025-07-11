/***********************************************
 * THEME: DATE
 ***********************************************/
(function ($) {

	'use strict';

	// check if plugin defined
	if (typeof moment === 'undefined') {
		return;
	}

	VLTJS.date = {
		init: function () {

			function update_time() {
				let now = moment().utcOffset(VLT_LOCALIZE_DATAS.utc_offset).format(VLT_LOCALIZE_DATAS.time_format);
				$('.js-local-time').html(now);
				requestAnimationFrame(update_time);
			}
			requestAnimationFrame(update_time)
		}
	};

	VLTJS.date.init();

})(jQuery);