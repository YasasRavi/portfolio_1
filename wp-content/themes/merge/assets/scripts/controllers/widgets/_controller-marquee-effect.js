/***********************************************
 * WIDGET: MARQUEE TEXT
 ***********************************************/
(function ($) {

	'use strict';

	// check if plugin defined
	if (typeof gsap == 'undefined') {
		return;
	}

	VLTJS.marqueeEffect = {
		init: function ($scope) {

			$scope = typeof $scope === 'undefined' ? VLTJS.body : $scope;

			const $marqueeElement = $scope.find('[data-marquee]');

			/*
			This helper function makes a group of items animate along the x-axis in a seamless, responsive loop.

			Features:
			 - Uses xPercent so that even if the widths change (like if the window gets resized), it should still work in most cases.
			 - When each item animates to the left or right enough, it will loop back to the other side
			 - Optionally pass in a config object with values like "speed" (default: 1, which travels at roughly 100 pixels per second), paused (boolean),  repeat, reversed, and paddingRight.
			 - The returned timeline will have the following methods added to it:
			   - next() - animates to the next element using a timeline.tweenTo() which it returns. You can pass in a vars object to control duration, easing, etc.
			   - previous() - animates to the previous element using a timeline.tweenTo() which it returns. You can pass in a vars object to control duration, easing, etc.
			   - toIndex() - pass in a zero-based index value of the element that it should animate to, and optionally pass in a vars object to control duration, easing, etc. Always goes in the shortest direction
			   - current() - returns the current index (if an animation is in-progress, it reflects the final index)
			   - times - an Array of the times on the timeline where each element hits the "starting" spot. There's also a label added accordingly, so "label1" is when the 2nd element reaches the start.
			 */
			function verticalLoop(items, speed) {
				items = gsap.utils.toArray(items);
				let firstBounds = items[0].getBoundingClientRect(),
					lastBounds = items[items.length - 1].getBoundingClientRect(),
					inverted = firstBounds.top > lastBounds.top,
					topBounds = inverted ? lastBounds : firstBounds,
					bottomBounds = inverted ? firstBounds : lastBounds,
					top = topBounds.top - topBounds.height - Math.abs(items[inverted ? items.length - 2 : 1].getBoundingClientRect().top - topBounds.bottom),
					bottom = bottomBounds.top,
					distance = bottom - top,
					duration = Math.abs(distance / speed),
					tl = gsap.timeline({ repeat: -1 }),
					plus, minus;
				if (inverted) {
					speed = -speed;
					bottom += Math.abs(items[inverted ? items.length - 2 : 1].getBoundingClientRect().top - topBounds.top);
				}
				plus = speed < 0 ? "-=" : "+=",
					minus = speed < 0 ? "+=" : "-=";
				items.forEach((el, i) => {
					let bounds = el.getBoundingClientRect(),
						ratio = Math.abs((bottom - bounds.top) / distance);
					if (speed < 0 !== inverted) {
						ratio = 1 - ratio;
					}
					tl.to(el, {
						x: plus + distance * ratio,
						duration: duration * ratio,
						ease: "none"
					}, 0);
					tl.fromTo(el, {
						x: minus + distance
					}, {
						x: plus + (1 - ratio) * distance,
						ease: "none",
						duration: (1 - ratio) * duration,
						immediateRender: false
					}, duration * ratio);
				});
				return tl;
			}

			function horizontalLoop(items, config) {
				items = gsap.utils.toArray(items);
				config = config || {};
				let tl = gsap.timeline({ repeat: config.repeat, paused: config.paused, defaults: { ease: "none" }, onReverseComplete: () => tl.totalTime(tl.rawTime() + tl.duration() * 100) }),
					length = items.length,
					startX = items[0].offsetLeft,
					times = [],
					widths = [],
					xPercents = [],
					curIndex = 0,
					pixelsPerSecond = config.speed || 100,
					snap = config.snap === false ? v => v : gsap.utils.snap(config.snap || 1), // some browsers shift by a pixel to accommodate flex layouts, so for example if width is 20% the first element's width might be 242px, and the next 243px, alternating back and forth. So we snap to 5 percentage points to make things look more natural
					totalWidth, curX, distanceToStart, distanceToLoop, item, i;
				gsap.set(items, { // convert "x" to "xPercent" to make things responsive, and populate the widths/xPercents Arrays to make lookups faster.
					xPercent: (i, el) => {
						let w = widths[i] = parseFloat(gsap.getProperty(el, "width", "px"));
						xPercents[i] = snap(parseFloat(gsap.getProperty(el, "x", "px")) / w * 100 + gsap.getProperty(el, "xPercent"));
						return xPercents[i];
					}
				});
				gsap.set(items, { x: 0 });
				totalWidth = items[length - 1].offsetLeft + xPercents[length - 1] / 100 * widths[length - 1] - startX + items[length - 1].offsetWidth * gsap.getProperty(items[length - 1], "scaleX") + (parseFloat(config.paddingRight) || 0);
				for (i = 0; i < length; i++) {
					item = items[i];
					curX = xPercents[i] / 100 * widths[i];
					distanceToStart = item.offsetLeft + curX - startX;
					distanceToLoop = distanceToStart + widths[i] * gsap.getProperty(item, "scaleX");
					tl.to(item, { xPercent: snap((curX - distanceToLoop) / widths[i] * 100), duration: distanceToLoop / pixelsPerSecond }, 0)
						.fromTo(item, { xPercent: snap((curX - distanceToLoop + totalWidth) / widths[i] * 100) }, { xPercent: xPercents[i], duration: (curX - distanceToLoop + totalWidth - curX) / pixelsPerSecond, immediateRender: false }, distanceToLoop / pixelsPerSecond)
						.add("label" + i, distanceToStart / pixelsPerSecond);
					times[i] = distanceToStart / pixelsPerSecond;
				}
				function toIndex(index, vars) {
					vars = vars || {};
					(Math.abs(index - curIndex) > length / 2) && (index += index > curIndex ? -length : length); // always go in the shortest direction
					let newIndex = gsap.utils.wrap(0, length, index),
						time = times[newIndex];
					if (time > tl.time() !== index > curIndex) { // if we're wrapping the timeline's playhead, make the proper adjustments
						vars.modifiers = { time: gsap.utils.wrap(0, tl.duration()) };
						time += tl.duration() * (index > curIndex ? 1 : -1);
					}
					curIndex = newIndex;
					vars.overwrite = true;
					return tl.tweenTo(time, vars);
				}
				tl.next = vars => toIndex(curIndex + 1, vars);
				tl.previous = vars => toIndex(curIndex - 1, vars);
				tl.current = () => curIndex;
				tl.toIndex = (index, vars) => toIndex(index, vars);
				tl.times = times;
				tl.progress(1, true).progress(0, true); // pre-render for performance
				if (config.reversed) {
					tl.vars.onReverseComplete();
					tl.reverse();
				}
				return tl;
			}

			$marqueeElement.each(function () {

				const $this = $(this),
					speed = $this.attr('data-marquee-speed') || 100,
					type = $this.attr('data-marquee') || 'horizontal',
					$scrollingText = $this.find('[data-marquee-text]');

				switch (type) {
					case 'vertical':
						verticalLoop($scrollingText, speed);
						break;

					case 'horizontal':
						horizontalLoop($scrollingText, {
							repeat: -1,
							speed: speed
						});
						break;

				}

			});

		}

	};

	VLTJS.window.on('elementor/frontend/init', function () {
		elementorFrontend.hooks.addAction(
			'frontend/element_ready/vlt-marquee-text.default',
			VLTJS.marqueeEffect.init
		);

		elementorFrontend.hooks.addAction(
			'frontend/element_ready/vlt-team-member.default',
			VLTJS.marqueeEffect.init
		);

		elementorFrontend.hooks.addAction(
			'frontend/element_ready/vlt-slide-photo.default',
			VLTJS.marqueeEffect.init
		);

	});

	VLTJS.marqueeEffect.init();

	VLTJS.document.on('init.vpf endLoadingNewItems.vpf', function (e) {
		VLTJS.marqueeEffect.init();
	});

})(jQuery);