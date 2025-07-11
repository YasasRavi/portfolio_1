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

            const $button = $scope.find('.vlt-btn-circle'), $pupil = $button.find('.vlt-btn-circle__content path:first-child');

            $pupil.css('background', 'red');

            var leftVal = 10;
            var topVal = 10;
            var newLeft = 10;
            var newTop = 10;

            // window.addEventListener("mousemove", (e) => {
            //   newLeft = (e.clientX / width) * 100;
            //   newTop = (e.clientY / height) * 100;
            // });
            // const lerp = (start, end, t) => {
            //   return start * (1 - t) + end * t;
            // };
            // const moveEyes = () => {
            //   leftVal = lerp(leftVal, newLeft, 0.05);
            //   topVal = lerp(topVal, newTop, 0.05);
            //   pupils.forEach((pupil) => {
            //     pupil.style.left = `${leftVal}%`;
            //     pupil.style.top = `${topVal}%`;
            //   });
            //   requestAnimationFrame(moveEyes);
            // }
            // moveEyes();
            CustomEase.create('merge', '0.37, 0, 0.63, 1');

            $button.each(function () {

                const $this = $(this), $fill = $this.find('.vlt-btn-circle__fill'), duration = 10, // in seconds
                    dampingFactor = 0.4;

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
                    const offset = $this.offset(), mouseX = e.pageX - offset.left, mouseY = e.pageY - offset.top, translateX = (mouseX - $this.outerWidth() / 2) * dampingFactor, translateY = (mouseY - $this.outerHeight() / 2) * dampingFactor;

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
    };

    VLTJS.window.on('elementor/frontend/init', function () {

        elementorFrontend.hooks.addAction(
            'frontend/element_ready/vlt-button-circle.default',
            VLTJS.buttonCircle.init
        );

    });

    VLTJS.buttonCircle.init();

})(jQuery);
