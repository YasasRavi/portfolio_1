/***********************************************
 * THEME: CUSTOM CURSOR
 ***********************************************/
(function ($) {

	'use strict';

	// check if plugin defined
	if (typeof gsap == 'undefined') {
		return;
	}

	if (VLTJS.isMobileDevice()) {
		return;
	}

	if (!VLTJS.html.hasClass('vlt-is--custom-cursor')) {
		return;
	}

	VLTJS.cursor = {
		init: function () {

			VLTJS.body.append('<div class="vlt-cursor"><div class="circle"><i></i></div></div>');

			const icons = {
				eye: '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 39 26"><path fill="currentColor" fill-rule="evenodd" d="M18.048 6.534c-1.515.072-2.941.29-4.276.613l-.675-4.728-1.485.212.703 4.921a24.014 24.014 0 0 0-4.225 1.79L5.84 4.839l-1.342.67 2.292 4.585a26.266 26.266 0 0 0-2.672 1.894l-2.31-2.31-1.061 1.06 2.226 2.226c-.508.458-.942.885-1.301 1.26-.413.429-.727.788-.94 1.043a12.829 12.829 0 0 0-.307.381l-.018.023-.005.007-.002.002.601.449-.602-.448a.75.75 0 0 0 0 .896L1 16.129l-.601.448v.001l.002.002.005.007.018.023c.014.02.036.047.064.083a20.608 20.608 0 0 0 1.183 1.342 26.455 26.455 0 0 0 3.634 3.139c3.18 2.28 7.867 4.576 13.84 4.576 5.974 0 10.66-2.296 13.84-4.576a26.458 26.458 0 0 0 3.635-3.14c.412-.429.727-.788.94-1.043a13.102 13.102 0 0 0 .307-.38l.017-.024.005-.007.002-.002c0-.001.001-.001-.6-.449l.601.448a.75.75 0 0 0 0-.896l-.602.448.602-.448v-.001l-.003-.002-.005-.007-.017-.023a12.67 12.67 0 0 0-.307-.381 20.652 20.652 0 0 0-.94-1.044 26.157 26.157 0 0 0-2.463-2.249l2.327-3.103-1.2-.9-2.322 3.096A25.877 25.877 0 0 0 30.2 9.342l2.252-4.503-1.342-.671-2.25 4.501a23.56 23.56 0 0 0-3.564-1.319L26 2.42l-1.485-.213-.684 4.785a22.74 22.74 0 0 0-4.283-.48V0h-1.5v6.534Zm18.277 9.595c-.19-.223-.453-.519-.787-.866a24.962 24.962 0 0 0-3.427-2.96c-3.006-2.155-7.392-4.295-12.966-4.295-5.573 0-9.96 2.14-12.965 4.295a24.956 24.956 0 0 0-3.428 2.96 19.62 19.62 0 0 0-.786.866c.19.223.452.52.786.866a24.957 24.957 0 0 0 3.428 2.96c3.005 2.155 7.392 4.295 12.965 4.295 5.574 0 9.96-2.14 12.966-4.295a24.962 24.962 0 0 0 3.427-2.96c.334-.347.597-.643.787-.866ZM19.547 12.04a4.089 4.089 0 1 0 0 8.178 4.089 4.089 0 0 0 0-8.178ZM13.96 16.13a5.589 5.589 0 1 1 11.177 0 5.589 5.589 0 0 1-11.177 0Z" clip-rule="evenodd"/></svg>',
				close: '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 31 29"><path fill="currentColor" fill-rule="evenodd" d="M15.5 12.671 27.586.586 29 2 16.914 14.086l13.5 13.5L29 29 15.5 15.5 2 29 .586 27.586l13.5-13.5L2 2 3.414.586 15.5 12.67Z" clip-rule="evenodd"/></svg>',
				drag: '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 46 32"><path fill="currentColor" fill-rule="evenodd" d="M14.33 31.585V32h-2.36v-.415c0-8.178-5.572-14.4-11.97-14.4V14.82h.334C6.59 14.608 11.969 8.452 11.969.415V0h2.362v.415c0 6.037-2.764 11.449-6.98 14.405l-.011 2.36c4.222 2.95 6.99 8.361 6.99 14.405ZM31.67.415V0h2.36v.415c0 8.178 5.572 14.4 11.97 14.4v2.365h-.334c-6.256.212-11.635 6.368-11.635 14.405V32h-2.362v-.415c0-6.037 2.764-11.449 6.98-14.405l.011-2.36C34.44 11.87 31.67 6.46 31.67.415Z" clip-rule="evenodd"/><path fill="currentColor" d="M28 16a5 5 0 1 1-10 0 5 5 0 0 1 10 0Z"/></svg>',
				scroll: '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 32 33"><path fill="currentColor" fill-rule="evenodd" d="M31.585 18.67H32v2.36h-.415c-8.178 0-14.4 5.572-14.4 11.97H14.82v-.334C14.608 26.41 8.452 21.031.415 21.031H0v-2.362h.415c6.037 0 11.449 2.764 14.405 6.98l2.36.011c2.95-4.221 8.361-6.99 14.405-6.99Z" clip-rule="evenodd"/><path fill="currentColor" fill-rule="evenodd" d="M31.585 5.67H32v2.36h-.415c-8.178 0-14.4 5.572-14.4 11.97H14.82v-.334C14.608 13.41 8.452 8.03.415 8.03H0V5.67h.415c6.037 0 11.449 2.763 14.405 6.978l2.36.012c2.95-4.221 8.361-6.99 14.405-6.99Z" clip-rule="evenodd"/></svg>'
			};

			const cursor = $('.vlt-cursor'),
				circle = cursor.find('.circle'),
				icon = circle.find('i'),
				delta = .15;

			let startPosition = {
				x: 0,
				y: 0
			},
				endPosition = {
					x: 0,
					y: 0
				};


			if (!cursor.length) {
				return;
			}

			gsap.set(circle, {
				xPercent: -50,
				yPercent: -50
			});

			VLTJS.document.on('mousemove pointermove', function (e) {
				const offsetTop = window.pageYOffset || document.documentElement.scrollTop;
				startPosition.x = e.pageX;
				startPosition.y = e.pageY - offsetTop;
			});

			gsap.ticker.add(function () {
				endPosition.x += (startPosition.x - endPosition.x) * delta;
				endPosition.y += (startPosition.y - endPosition.y) * delta;
				gsap.set(circle, {
					x: endPosition.x,
					y: endPosition.y
				});
			});

			VLTJS.document.on('mouseenter', '[data-cursor]', function () {
				const iconClass = $(this).data('cursor');

				gsap.killTweensOf(circle);
				gsap.killTweensOf(circle.find('i'));

				gsap.to(circle, .3, {
					scale: 1,
					onStart: function () {
						gsap.set(circle, {
							autoAlpha: 1
						});
						icon.attr('class', 'icon-' + iconClass);
						icon.html(icons[iconClass]);
					}
				});

				gsap.fromTo(circle.find('i'), .3, {
					scale: .9,
					opacity: 0,
				}, {
					scale: 1,
					opacity: 1,
					delay: .3
				});

			}).on('mouseleave', '[data-cursor]', function () {

				gsap.to(circle.find('i'), .3, {
					opacity: 0,
					scale: .9,
				});

				gsap.to(circle, .3, {
					scale: 0,
					onComplete: function () {
						gsap.set(circle, {
							autoAlpha: 0
						});
						icon.attr('class', '');
						icon.html('');
					}
				});

			});

		}
	};

	VLTJS.cursor.init();

})(jQuery);