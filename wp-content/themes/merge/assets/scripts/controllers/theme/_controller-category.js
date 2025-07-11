/***********************************************
 * WIDGET: CATEGORY
 ***********************************************/
(function ($) {

	'use strict';

	// check if plugin defined
	if (typeof gsap == 'undefined') {
		return;
	}

	VLTJS.category = {

		init: function ($scope) {

			$scope = typeof $scope === 'undefined' ? VLTJS.body : $scope;

			const $category = $scope.find('.vlt-category-item');

			CustomEase.create('merge', '0.37, 0, 0.63, 1');

			$category.each(function () {

				const $this = $(this);

				Splitting({
					target: $this.find('>span')
				});

				$this.on('mouseenter', function () {
					const $chars = $(this).find('span.char');
					gsap.killTweensOf($chars);
					gsap.timeline({
					defaults: {
						ease: 'merge'
					}
				})
					.to($chars, .3, {
						yPercent: -50,
						autoAlpha: 0,
						stagger: {
							amount: .2
						}
					})
					 .set($chars, {
						yPercent: 50,
						autoAlpha: 0,
					})
					.to($chars, .3, {
						yPercent: 0,
						autoAlpha: 1,
						stagger: {
							amount: .2
						}
					});
				});

			});

		}

	}

	VLTJS.category.init();

	VLTJS.document.on('init.vpf endLoadingNewItems.vpf', function (e) {
		VLTJS.category.init();
	});

})(jQuery);