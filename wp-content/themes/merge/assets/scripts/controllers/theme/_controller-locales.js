/***********************************************
 * THEME: LOCALES
 ***********************************************/

jQuery(window).load(function () {

	const $list = jQuery('.vlt-offcanvas-menu__locales'),
		$glink = $list.find('.glink');

	$glink.addClass('vlt-btn vlt-btn--effect vlt-btn--rounded vlt-btn--outline');
	$glink.wrapInner('<span class="vlt-btn__text">');

	VLTJS.document.trigger('vlt.locales-ready');

});