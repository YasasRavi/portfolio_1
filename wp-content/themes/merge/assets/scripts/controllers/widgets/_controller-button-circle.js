/***********************************************
 * WIDGET: BUTTON CIRCLE
 ***********************************************/
(function ($) {

	'use strict';

	// check if plugin defined
	if (typeof gsap == 'undefined') {
		return;
	}

	VLTJS.buttonCircle = {

		init: function ($scope) {

			$scope = typeof $scope === 'undefined' ? VLTJS.body : $scope;

			const $button = $scope.find('.vlt-btn-circle');
			CustomEase.create('merge', '0.37, 0, 0.63, 1');

			$button.each(function () {

				const $this = $(this),
					$pupil = $this.find('.vlt-btn-circle__content path:first-child'),
					$fill = $this.find('.vlt-btn-circle__fill'),
					duration = 10, // in seconds
					dampingFactor = 0.4;

				// Create a max value for the translation in the x and y directions
				const maxTrans = 30;

				// Create a max distance for the mouse position to the center of the element (the viewport dimensions wouldn't be a bad choice).
				let maxXDist, maxYDist;

				let centerX, centerY;

				function resizeDebounce() {
					maxXDist = innerWidth / 2;
					maxYDist = innerHeight / 2;

					const eyeArea = $pupil[0].getBoundingClientRect();
					const R = eyeArea.width / 2;
					centerX = eyeArea.left + R;
					centerY = eyeArea.top + R;
				};

				function updateTransform(e) {
					// Calculate the distance from the mouse position to the center.
					const x = e.clientX - centerX;
					const y = e.clientY - centerY;

					// Put that number over the max distance from 2)
					const xPercent = x / maxXDist;
					const yPercent = y / maxYDist;

					// Multiply that product by the max value from 1 and apply it to your element.
					const scaledXPercent = xPercent * maxTrans;
					const scaledYPercent = yPercent * maxTrans;

					gsap.to($pupil, {
						xPercent: scaledXPercent,
						yPercent: scaledYPercent,
						duration: 0.2,
						overwrite: 'auto'
					});
				}

				resizeDebounce();
				VLTJS.debounceResize(resizeDebounce);

				VLTJS.window.on('vlt.change-slide', resizeDebounce);

				VLTJS.window.on('mousemove', function (e) {
					updateTransform(e);
				});

				const tween = gsap.to($fill, duration, {
					rotation: '+=360deg',
					ease: 'none',
					repeat: -1
				});

				$this.on({
					mouseenter: function () {
						tween.timeScale(.5);
						gsap.to($fill, {
							scale: 1.05,
							ease: 'merge'
						});
					},
					mouseleave: function () {
						tween.timeScale(1);
						gsap.to($fill, {
							scale: 1,
							ease: 'merge'
						});
					}
				});

				function handleMouseMove(e) {
					const offset = $this.offset(),
						mouseX = e.pageX - offset.left,
						mouseY = e.pageY - offset.top,
						translateX = (mouseX - $this.outerWidth() / 2) * dampingFactor,
						translateY = (mouseY - $this.outerHeight() / 2) * dampingFactor;

					gsap.killTweensOf($this);
					gsap.to($this, .8, {
						x: translateX,
						y: translateY,
						ease: 'power3.out',
					});
				}

				function resetTransform() {
					gsap.killTweensOf($this);
					gsap.to($this, .6, {
						x: 0,
						y: 0,
						ease: 'elastic.out(1.1, .4)',
					});
				}

				$this.on('mousemove', handleMouseMove);
				$this.on('mouseleave', resetTransform);

			});

		}

	}

	VLTJS.window.on('elementor/frontend/init', function () {

		elementorFrontend.hooks.addAction(
			'frontend/element_ready/vlt-button-circle.default',
			VLTJS.buttonCircle.init
		);

	});

	VLTJS.buttonCircle.init();

})(jQuery);