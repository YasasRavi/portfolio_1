/***********************************************
 * INIT THIRD PARTY SCRIPTS
 ***********************************************/
(function ($) {
  'use strict';

  /**
   * Remove overflow for sticky
   */
  if ($('.sticky-column, .has-sticky-column').length) {
    $('.vlt-main').css('overflow', 'inherit');
  }

  /**
   * LAX
   */
  if (typeof lax !== 'undefined') {
    window.onload = function () {
      lax.init();
      lax.addDriver('scrollY', function () {
        return window.scrollY;
      });
      lax.addElements('.vlt-page-title .lax', {
        scrollY: {
          translateY: [[0, 'elOutY'], [0, 'elHeight']],
          opacity: [[0, 'elOutY'], [1, 0]]
        }
      });
    };
  }

  /**
   * Add nofollow to child menu link
   */
  $('.menu-item-has-children > a').attr('rel', 'nofollow');

  /**
   * Widget RSS
   */
  $('.vlt-widget.widget_rss .rsswidget').addClass('h6');

  /**
   * Widget menu
   */
  if (typeof $.fn.superclick !== 'undefined') {
    $('.widget_pages > ul, .widget_nav_menu ul.menu').superclick({
      delay: 300,
      cssArrows: false,
      animation: {
        opacity: 'show',
        height: 'show'
      },
      animationOut: {
        opacity: 'hide',
        height: 'hide'
      }
    });
  }

  /**
   * Jarallax
   */
  if (typeof $.fn.jarallax !== 'undefined') {
    $('.jarallax, .elementor-section.jarallax, .elementor-column.jarallax>.elementor-column-wrap').jarallax({
      speed: 0.8
    });
  }

  /**
   * Fitvids
   */
  if (typeof $.fn.fitVids !== 'undefined') {
    VLTJS.body.fitVids();
  }

  /**
   * Back button
   */
  $('.btn-go-back').on('click', function (e) {
    e.preventDefault();
    window.history.back();
  });

  /**
   * Fancybox
   */
  if (typeof $.fn.fancybox !== 'undefined') {
    $.fancybox.defaults.btnTpl = {
      close: '<button data-fancybox-close class="fancybox-button fancybox-button--close">' + VLT_LOCALIZE_DATAS.close + '</button>',
      arrowLeft: '<a data-fancybox-prev class="fancybox-button fancybox-button--arrow_left" href="javascript:;">' + VLT_LOCALIZE_DATAS.arrow_left + '</a>',
      arrowRight: '<a data-fancybox-next class="fancybox-button fancybox-button--arrow_right" href="javascript:;">' + VLT_LOCALIZE_DATAS.arrow_right + '</a>',
      smallBtn: '<button type="button" data-fancybox-close class="fancybox-button fancybox-close-small">' + VLT_LOCALIZE_DATAS.close + '</button>'
    };
    $.fancybox.defaults.buttons = ['close'];
    $.fancybox.defaults.infobar = false;
    $.fancybox.defaults.transitionEffect = 'slide';
  }

  /**
   * Focus input
   */
  if ($('.vlt-form-group').length) {
    $('.vlt-form-group .vlt-form-control').focus(function () {
      $(this).closest('.vlt-form-group').addClass('active');
    }).blur(function () {
      if ($(this).val() == '') {
        $(this).closest('.vlt-form-group').removeClass('active');
      }
    });
    $('.vlt-form-group .vlt-form-control').change(function () {
      if ($(this).val() == '') {
        $(this).closest('.vlt-form-group').removeClass('active');
      } else {
        $(this).closest('.vlt-form-group').addClass('active');
      }
    });
  }
})(jQuery);
/***********************************************
 * HEDAER: DROP EFFECTS
 ***********************************************/
(function ($) {
  'use strict';

  // check if plugin defined
  if (typeof gsap == 'undefined') {
    return;
  }
  if (typeof $.fn.superclick == 'undefined') {
    return;
  }
  VLTJS.submenuEffectStyle1 = {
    config: {
      easing: 'power2.out'
    },
    init: function () {
      const $effect = $('[data-submenu-effect="style-1"]'),
        $navbars = $effect.find('ul.sf-menu');

      // prepend back button
      $navbars.find('ul.sub-menu').prepend('<li class="sub-menu-back"><a href="#"><span class="menu-item-text">' + VLT_LOCALIZE_DATAS.menu_back_text + '</span></a></li>');

      // update submenu height
      function _update_submenu_height($item) {
        const $nav = $item.closest($effect),
          $sfMenu = $nav.find('ul.sf-menu'),
          $submenu = $sfMenu.find('li.menu-item-has-children.open > ul.sub-menu:not(.closed)');
        let submenuHeight = '';
        if ($submenu.length) {
          submenuHeight = $submenu.innerHeight();
        }
        $sfMenu.css({
          height: submenuHeight,
          minHeight: submenuHeight
        });
      }

      // open / close submenu
      function _toggle_submenu(open, submenu, clickedLink) {
        let $newItems = submenu.find('> ul.sub-menu > li > a'),
          $oldItems = submenu.parent().find('> li > a');
        if (open) {
          submenu.addClass('open').parent().addClass('closed');
        } else {
          submenu.removeClass('open').parent().removeClass('closed');
          let tmp = $newItems;
          $newItems = $oldItems;
          $oldItems = tmp;
        }
        gsap.timeline({
          defaults: {
            ease: VLTJS.submenuEffectStyle1.config.easing
          }
        }).to($oldItems, .3, {
          autoAlpha: 0,
          onComplete: function () {
            $oldItems.css('display', 'none');
          }
        }).set($newItems, {
          autoAlpha: 0,
          display: 'flex',
          y: 30,
          onComplete: function () {
            _update_submenu_height(clickedLink);
          }
        }).to($newItems, .3, {
          y: 0,
          delay: .3,
          autoAlpha: 1,
          stagger: {
            amount: .15
          }
        });
      }
      $navbars.on('click', 'li.menu-item-has-children > a', function (e) {
        _toggle_submenu(true, $(this).parent(), $(this));
        e.preventDefault();
      });
      $navbars.on('click', 'li.sub-menu-back > a', function (e) {
        _toggle_submenu(false, $(this).parent().parent().parent(), $(this));
        e.preventDefault();
      });
    }
  };
  VLTJS.submenuEffectStyle1.init();
  VLTJS.submenuEffectStyle2 = {
    config: {
      easing: 'power2.out'
    },
    init: function () {
      const $effect = $('[data-submenu-effect="style-2"]'),
        $navbars = $effect.find('ul.sf-menu');
      $navbars.superclick({
        delay: 300,
        cssArrows: false,
        animation: {
          opacity: 'show',
          height: 'show'
        },
        animationOut: {
          opacity: 'hide',
          height: 'hide'
        }
      });
    }
  };
  VLTJS.submenuEffectStyle2.init();
})(jQuery);
/***********************************************
 * HEADER: MENU OFFCANVAS
 ***********************************************/

(function ($) {
  'use strict';

  // check if plugin defined
  if (typeof gsap == 'undefined') {
    return;
  }
  let menuIsOpen = false;
  VLTJS.menuOffcanvas = {
    init: function () {
      const $menu = $('.vlt-offcanvas-menu'),
        $menuToggle = $('.js-offcanvas-menu-toggle'),
        $navItem = $menu.find('ul.sf-menu > li'),
        $subscribe = $menu.find('.vlt-subscribe-form'),
        $locales = $menu.find('.vlt-offcanvas-menu__locales'),
        $siteOverlay = $('.vlt-site-overlay');
      CustomEase.create('merge', '0.37, 0, 0.63, 1');
      $(VLT_LOCALIZE_DATAS.star_fill).prependTo('ul.sf-menu > li > a span.menu-item-text');
      $(VLT_LOCALIZE_DATAS.dot).prependTo('ul.sub-menu span.menu-item-text');
      $menuToggle.on('click', function (e) {
        e.preventDefault();
        if (!menuIsOpen) {
          VLTJS.menuOffcanvas.open_menu($menuToggle, $menu, $navItem, $subscribe, $locales, $siteOverlay);
        } else {
          VLTJS.menuOffcanvas.close_menu($menuToggle, $menu, $siteOverlay);
        }
      });
      VLTJS.document.on('vlt.close-slide-menu', function () {
        if (menuIsOpen) {
          VLTJS.menuOffcanvas.close_menu($menuToggle, $menu, $siteOverlay);
        }
      });
      VLTJS.document.keyup(function (e) {
        if (e.keyCode === 27 && menuIsOpen) {
          e.preventDefault();
          VLTJS.menuOffcanvas.close_menu($menuToggle, $menu, $siteOverlay);
        }
      });
      VLTJS.document.on('vlt.close-slide-menu', function () {
        if (menuIsOpen) {
          VLTJS.menuOffcanvas.close_menu($menuToggle, $menu, $siteOverlay);
        }
      });
      $siteOverlay.on('click', function () {
        if (menuIsOpen) {
          VLTJS.menuOffcanvas.close_menu($menuToggle, $menu, $siteOverlay);
        }
      });

      // Close after click to anchor.
      $navItem.filter('[data-menuanchor]').on('click', 'a', function () {
        if (menuIsOpen) {
          VLTJS.menuOffcanvas.close_menu($menuToggle, $menu, $siteOverlay);
        }
      });
    },
    open_menu: function (menuToggle, menu, navItem, subscribe, locales, siteOverlay) {
      // trigger close event
      VLTJS.document.trigger('vlt.close-subscribe-popup');
      VLTJS.document.trigger('vlt.close-offcanvas-sidebar');
      menuIsOpen = true;
      menu.each(function () {
        const $currentMenu = $(this);
        gsap.timeline({
          defaults: {
            ease: 'merge'
          }
        })
        // set overflow for html
        .set(VLTJS.html, {
          overflow: 'hidden'
        })
        // menu animation
        .to($currentMenu, .6, {
          x: '0',
          autoAlpha: 1,
          onStart: function () {
            menuToggle.addClass('is-open');
            siteOverlay.addClass('is-open');

            // play audio
            if (VLT_LOCALIZE_DATAS.open_click_sound && typeof Howl !== 'undefined') {
              new Howl({
                src: [VLT_LOCALIZE_DATAS.open_click_sound],
                autoplay: true,
                loop: false,
                volume: 0.3
              });
            }
          }
        })
        // subscribe animation
        .fromTo(subscribe, .3, {
          y: 30,
          autoAlpha: 0
        }, {
          y: 0,
          delay: .3,
          autoAlpha: 1
        }, '-=.3')
        // navigation item animation
        .fromTo(navItem, .3, {
          y: 30,
          autoAlpha: 0
        }, {
          y: 0,
          autoAlpha: 1,
          stagger: {
            amount: .3
          }
        }, '-=.15')
        // locales animation
        .fromTo(locales, .3, {
          y: 30,
          autoAlpha: 0
        }, {
          y: 0,
          autoAlpha: 1,
          stagger: {
            amount: .3
          }
        }, '-=.15');
      });
    },
    close_menu: function (menuToggle, menu, siteOverlay) {
      menuIsOpen = false;
      menu.each(function () {
        const $currentMenu = $(this);
        gsap.timeline({
          defaults: {
            ease: 'merge'
          }
        })
        // set overflow for html
        .set(VLTJS.html, {
          overflow: 'auto'
        })
        // menu animation
        .to($currentMenu, .6, {
          x: $currentMenu.hasClass('vlt-offcanvas-menu--right') ? '100%' : '-100%',
          onStart: function () {
            // play audio
            if (typeof VLT_LOCALIZE_DATAS.close_click_sound && typeof Howl !== 'undefined') {
              new Howl({
                src: [VLT_LOCALIZE_DATAS.close_click_sound],
                autoplay: true,
                loop: false,
                volume: 0.3
              });
            }
          },
          onComplete: function () {
            siteOverlay.removeClass('is-open');
            menuToggle.removeClass('is-open');
          }
        });
      });
    }
  };
  VLTJS.menuOffcanvas.init();
})(jQuery);
/***********************************************
 * THEME: ANIMATE BLOCK
 ***********************************************/
(function ($) {
  'use strict';

  VLTJS.animateBlock = {
    init: function () {
      const $animateElement = $('.vlt-animate-element'),
        prefix = 'animate__';
      if (VLTJS.body.hasClass('page-template-template-fullpage-slider')) {
        VLTJS.window.on('vlt.change-slide', function () {
          $animateElement.each(function () {
            const $this = $(this),
              animationName = $this.data('animation-name'),
              animationDelay = $this.data('animation-delay'),
              animationDuration = $this.data('animation-duration');
            animationDelay ? $this.css('--animate-delay', animationDelay + 'ms') : false;
            animationDuration ? $this.css('--animate-duration', animationDuration + 'ms') : false;
            if ($this.parents('.vlt-section').hasClass('active')) {
              $this.addClass(prefix + 'animated').addClass(prefix + animationName);
            }
          });
        });
      } else {
        $animateElement.each(function () {
          const $this = $(this);
          $this.one('inview', function () {
            const animationName = $this.data('animation-name'),
              animationDelay = $this.data('animation-delay'),
              animationDuration = $this.data('animation-duration');
            animationDelay ? $this.css('--animate-delay', animationDelay + 'ms') : false;
            animationDuration ? $this.css('--animate-duration', animationDuration + 'ms') : false;
            $this.addClass(prefix + 'animated').addClass(prefix + animationName);
          });
        });
      }
    }
  };
  VLTJS.animateBlock.init();
})(jQuery);
/***********************************************
 * THEME: BLOG
 ***********************************************/
(function ($) {
  'use strict';

  // check if plugin defined
  if (typeof Swiper === 'undefined') {
    return;
  }
  VLTJS.blog = {
    init: function () {
      VLTJS.blog.widgetPostlistSlider();
      VLTJS.document.on('loadedNewItems.vpf', function (event, vpObject) {
        if ('vpf' !== event.namespace) {
          return;
        }
        if (typeof $.fn.fitVids !== 'undefined') {
          VLTJS.body.fitVids();
        }
      });
    },
    widgetPostlistSlider: function () {
      $('.vlt-widget-post-slider').each(function () {
        new Swiper(this, {
          spaceBetween: 16,
          loop: true,
          autoplay: {
            delay: 5000
          },
          slidesPerView: 1,
          grabCursor: true,
          speed: 600,
          pagination: {
            el: $(this).find('.vlt-swiper-pagination').get(0),
            type: 'bullets',
            bulletClass: 'vlt-swiper-pagination-bullet swiper-pagination-bullet',
            bulletActiveClass: 'vlt-swiper-pagination-bullet-active swiper-pagination-bullet-active',
            clickable: true
          }
        });
      });
    }
  };
  VLTJS.blog.init();
})(jQuery);
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
          }).to($chars, .3, {
            yPercent: -50,
            autoAlpha: 0,
            stagger: {
              amount: .2
            }
          }).set($chars, {
            yPercent: 50,
            autoAlpha: 0
          }).to($chars, .3, {
            yPercent: 0,
            autoAlpha: 1,
            stagger: {
              amount: .2
            }
          });
        });
      });
    }
  };
  VLTJS.category.init();
  VLTJS.document.on('init.vpf endLoadingNewItems.vpf', function (e) {
    VLTJS.category.init();
  });
})(jQuery);
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
          opacity: 0
        }, {
          scale: 1,
          opacity: 1,
          delay: .3
        });
      }).on('mouseleave', '[data-cursor]', function () {
        gsap.to(circle.find('i'), .3, {
          opacity: 0,
          scale: .9
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
      requestAnimationFrame(update_time);
    }
  };
  VLTJS.date.init();
})(jQuery);
/***********************************************
 * THEME: ELEMENTOR CONTAINER
 ***********************************************/
(function ($) {
  'use strict';

  VLTJS.stickyContainer = {
    init: function ($scope) {
      const $parent = $scope.filter('.has-sticky-column');
      if ($parent.length) {
        $parent.parents('.e-parent').addClass('sticky-parent');
        $parent.find('>.elementor-element').wrapAll('<div class="sticky-column">');
      }
    }
  };
  VLTJS.paddingToContainer = {
    init: function ($scope) {
      if (!$scope) {
        return;
      }
      function resizeDebounce() {
        const $paddingBlock = $scope.filter('.has-padding-block-to-left, .has-padding-block-to-right'),
          resetOnDevice = $paddingBlock.data('reset-padding-to-container-on-devices'),
          currentDevice = elementorFrontend.getCurrentDeviceMode(),
          offset = $('.vlt-fake-container').get(0).getBoundingClientRect().left + parseFloat($('.vlt-fake-container').css('padding-left')) || 0;
        if ($paddingBlock.length) {
          if ($paddingBlock.hasClass('has-padding-block-to-left')) {
            $paddingBlock.css('padding-left', offset);
          }
          if ($paddingBlock.hasClass('has-padding-block-to-right')) {
            $paddingBlock.css('padding-right', offset);
          }
          if (-1 != resetOnDevice.indexOf(currentDevice)) {
            $paddingBlock.css({
              'padding-left': '',
              'padding-right': ''
            });
          }
        }
      }
      resizeDebounce();
      VLTJS.debounceResize(resizeDebounce);
    }
  };
  VLTJS.stretchContainer = {
    init: function ($scope) {
      if (!$scope) {
        return;
      }
      function resizeDebounce() {
        const winW = VLTJS.window.outerWidth(),
          $stretchBlock = $scope.filter('.has-stretch-block-to-left, .has-stretch-block-to-right'),
          resetOnDevice = $stretchBlock.data('reset-on-devices'),
          currentDevice = elementorFrontend.getCurrentDeviceMode();
        if ($stretchBlock.length) {
          const rect = $stretchBlock[0].getBoundingClientRect(),
            offsetLeft = rect.left,
            offsetRight = winW - rect.right,
            elWidth = rect.width;
          if ($stretchBlock.hasClass('has-stretch-block-to-left')) {
            $stretchBlock.find('>*').css('margin-left', -offsetLeft);
            $stretchBlock.find('>*').css('width', elWidth + offsetLeft + 'px');
          }
          if ($stretchBlock.hasClass('has-stretch-block-to-right')) {
            $stretchBlock.find('>*').css('margin-right', -offsetRight);
            $stretchBlock.find('>*').css('width', elWidth + offsetRight + 'px');
          }
          if (-1 != resetOnDevice.indexOf(currentDevice)) {
            $stretchBlock.find('>*').css({
              'margin-left': '',
              'margin-right': '',
              'width': '100%'
            });
          }
        }
      }
      resizeDebounce();
      VLTJS.debounceResize(resizeDebounce);
    }
  };
  VLTJS.window.on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/container', VLTJS.stretchContainer.init);
  });
  VLTJS.window.on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/container', VLTJS.paddingToContainer.init);
  });
  VLTJS.window.on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/container', VLTJS.stickyContainer.init);
  });
})(jQuery);
/***********************************************
 * THEME: FIXED FOOTER
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
  VLTJS.fixedFooterEffect = {
    init: function () {
      const footer = $('.vlt-footer').filter('.vlt-footer--fixed');
      if (footer.length) {
        $('.vlt-main').css('min-height', '100vh');
      }
      VLTJS.window.on('load resize', function () {
        const footerHeight = footer.outerHeight();
        if (footerHeight <= VLTJS.window.height()) {
          gsap.registerPlugin(ScrollTrigger);
          gsap.set(footer, {
            yPercent: -50
          });
          const uncover = gsap.timeline({
            paused: true
          });
          uncover.to(footer, {
            yPercent: 0,
            ease: 'none'
          });
          ScrollTrigger.create({
            trigger: '.vlt-site-wrapper',
            start: 'bottom bottom',
            end: `+=${footerHeight}px`,
            animation: uncover,
            scrub: true,
            markers: false
          });
        }
      });
    }
  };
  VLTJS.document.imagesLoaded(function () {
    VLTJS.fixedFooterEffect.init();
  });
  VLTJS.document.on('lazyloaded', function () {
    VLTJS.fixedFooterEffect.init();
  });
  VLTJS.debounceResize(function () {
    VLTJS.fixedFooterEffect.init();
  });
})(jQuery);
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
  };
  VLTJS.followInfo.init(VLTJS.body);
  VLTJS.document.on('init.vpf endLoadingNewItems.vpf', function (e) {
    VLTJS.followInfo.init(VLTJS.body);
  });
})(jQuery);
/***********************************************
 * THEME: FULLPAGE SLIDER
 ***********************************************/
(function ($) {
  'use strict';

  // check if plugin defined
  if (typeof $.fn.pagepiling == 'undefined') {
    return;
  }

  // check if plugin defined
  if (typeof gsap == 'undefined') {
    return;
  }
  VLTJS.fullpageSlider = {
    init: function ($scope) {
      $scope = typeof $scope === 'undefined' ? VLTJS.body : $scope;
      $scope.find('.vlt-fullpage-slider').each(function () {
        const $this = $(this),
          loopTop = $this.data('loop-top') ? true : false,
          loopBottom = $this.data('loop-bottom') ? true : false,
          scrollingSpeed = $this.data('scrolling-speed') || 900;
        let anchors = [];
        $this.find('[data-anchor]').each(function () {
          anchors.push($(this).data('anchor'));
        });
        $('<div class="vlt-fullpage-slider-progress"><div class="vlt-fullpage-slider-progress__current"></div><div class="vlt-fullpage-slider-progress__bar"><span class="bar"></span></div><div class="vlt-fullpage-slider-progress__total"></div></div>').appendTo('.js-main-slider-bar-area');
        const $progressBar = $('.vlt-fullpage-slider-progress__bar'),
          $current = $('.vlt-fullpage-slider-progress__current'),
          $total = $('.vlt-fullpage-slider-progress__total');
        function vlthemes_navigation(force, direction) {
          const total = $this.find('.vlt-section').length,
            leadingTotal = VLTJS.addLedingZero(total),
            current = $this.find('.vlt-section.active').index() + 1,
            leadingCurrent = VLTJS.addLedingZero(current),
            scale = current / total;
          $total.text(leadingTotal);
          if (!force) {
            gsap.timeline().to($current, .3, {
              force3D: true,
              x: direction == "up" ? -10 : 10,
              opacity: 0,
              onComplete: function () {
                gsap.set($current, {
                  x: direction == "up" ? 10 : -10
                });
                $current.html(leadingCurrent);
              }
            }).to($current, .3, {
              force3D: true,
              x: 0,
              opacity: 1
            });
          } else {
            $current.html(leadingCurrent);
          }
          $progressBar.find('.bar').css({
            'transform': 'scaleY(' + scale + ')'
          });
        }
        $this.pagepiling({
          menu: '.vlt-offcanvas-menu ul.sf-menu-onepage',
          loopTop: loopTop,
          loopBottom: loopBottom,
          css3: true,
          scrollingSpeed: scrollingSpeed,
          anchors: anchors,
          sectionSelector: '.vlt-section',
          navigation: false,
          easing: 'linear',
          afterRender: function (anchorLink, index) {
            vlthemes_navigation(true);
            VLTJS.window.trigger('vlt.change-slide');
          },
          onLeave: function (index, nextIndex, direction) {
            vlthemes_navigation(false, direction);
            VLTJS.window.trigger('vlt.change-slide');
          }
        });
      });
    }
  };
  VLTJS.fullpageSlider.init();
})(jQuery);
/***********************************************
 * THEME: IMAGES TOOLTIP
 ***********************************************/
(function ($) {
  'use strict';

  // check if plugin defined
  if (typeof gsap == 'undefined') {
    return;
  }
  VLTJS.imagesTooltip = {
    init: function () {
      $('.vlt-hover-reveal').remove();
      $('[data-tooltip-image]').each(function (index) {
        const $this = $(this),
          size = $this.data('tooltip-size') ? $this.data('tooltip-size').split('x') : false,
          position = $this.data('tooltip-position') ? $this.data('tooltip-position') : 'center';
        VLTJS.body.append('<div class="vlt-hover-reveal" data-id="' + index + '"><div class="vlt-hover-reveal__inner"><div class="vlt-hover-reveal__img" style="background-image: url(' + $this.data('tooltip-image') + ');"></div></div></div>');
        if (size) {
          $('.vlt-hover-reveal').eq(index).css({
            'width': size[0] + 'px',
            'height': size[1] + 'px'
          });
        }
        const $reveal = $('.vlt-hover-reveal[data-id="' + index + '"]'),
          $revealInner = $reveal.find('.vlt-hover-reveal__inner'),
          $revealImg = $reveal.find('.vlt-hover-reveal__img'),
          revealImgWidth = $revealImg.outerWidth(),
          revealImgHeight = $revealImg.outerHeight();
        function position_element(ev) {
          const mousePos = VLTJS.getMousePos(ev),
            docScrolls = {
              left: VLTJS.body.scrollLeft() + VLTJS.document.scrollLeft(),
              top: VLTJS.body.scrollTop() + VLTJS.document.scrollTop()
            };
          switch (position) {
            case 'top':
              gsap.set($reveal, {
                top: mousePos.y - docScrolls.top + 'px',
                left: mousePos.x - docScrolls.left + 'px'
              });
              break;
            case 'center':
              gsap.set($reveal, {
                top: mousePos.y - revealImgHeight * 0.5 - docScrolls.top + 'px',
                left: mousePos.x - revealImgWidth * 0.25 - docScrolls.left + 'px'
              });
              break;
            case 'bottom':
              gsap.set($reveal, {
                top: mousePos.y - revealImgHeight - docScrolls.top + 'px',
                left: mousePos.x - docScrolls.left + 'px'
              });
              break;
          }
        }
        function mouse_enter(ev) {
          position_element(ev);
          show_image();
        }
        function mouse_move(ev) {
          requestAnimationFrame(function () {
            position_element(ev);
          });
        }
        function mouse_leave() {
          hide_image();
        }
        $this.on('mouseenter', mouse_enter);
        $this.on('mousemove', mouse_move);
        $this.on('mouseleave', mouse_leave);
        function show_image() {
          gsap.killTweensOf($revealInner);
          gsap.killTweensOf($revealImg);
          gsap.timeline({
            onStart: function () {
              gsap.set($reveal, {
                opacity: 1
              });
            }
          }).fromTo($revealInner, 1, {
            x: '-100%'
          }, {
            x: '0%',
            ease: Quint.easeOut
          }).fromTo($revealImg, 1, {
            x: '100%'
          }, {
            x: '0%',
            ease: Quint.easeOut
          }, '-=1');
        }
        function hide_image() {
          gsap.killTweensOf($revealInner);
          gsap.killTweensOf($revealImg);
          gsap.timeline({
            onComplete: function () {
              gsap.set($reveal, {
                opacity: 0
              });
            }
          }).to($revealInner, 0.5, {
            x: '100%',
            ease: Quint.easeOut
          }).to($revealImg, 0.5, {
            x: '-100%',
            ease: Quint.easeOut
          }, '-=0.5');
        }
      });
    }
  };
  VLTJS.imagesTooltip.init();
  VLTJS.document.on('init.vpf endLoadingNewItems.vpf', function (e) {
    VLTJS.imagesTooltip.init();
  });
})(jQuery);
/***********************************************
 * THEME: ISOTOPE
 ***********************************************/
(function ($) {
  'use strict';

  // check if plugin defined
  if (typeof Isotope == 'undefined') {
    return;
  }
  VLTJS.initIsotope = {
    init: function () {
      $('.vlt-isotope-grid').each(function () {
        const $this = $(this),
          setLayout = $this.data('layout'),
          setXGap = $this.data('x-gap'),
          setYGap = $this.data('y-gap');
        $this.css('--vlt-gutter-x', `${setXGap}px`);
        $this.css('--vlt-gutter-y', `${setYGap}px`);
        const $grid = $this.isotope({
          itemSelector: '.grid-item',
          layoutMode: setLayout,
          masonry: {
            columnWidth: '.grid-sizer'
          },
          cellsByRow: {
            columnWidth: '.grid-sizer'
          }
        });
        VLTJS.document.on('lazyloaded vlt.plyr-ready', function () {
          $grid.isotope('layout');
        });
      });
    }
  };
  VLTJS.initIsotope.init();
})(jQuery);
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
/***********************************************
 * THEME: OFFCANVAS SIDEBAR
 ***********************************************/
(function ($) {
  'use strict';

  // check if plugin defined
  if (typeof gsap == 'undefined') {
    return;
  }
  let sidebarIsOpen = false;
  VLTJS.offcanvasSidebar = {
    init: function () {
      const $sidebar = $('.vlt-offcanvas-sidebar'),
        $sidebarToggle = $('.js-offcanvas-sidebar-toggle'),
        $sidebarClose = $('.js-offcanvas-sidebar-close'),
        $siteOverlay = $('.vlt-site-overlay');
      CustomEase.create('merge', '0.37, 0, 0.63, 1');
      $sidebarToggle.on('click', function (e) {
        e.preventDefault();
        if (!sidebarIsOpen) {
          VLTJS.offcanvasSidebar.open_sidebar($sidebar, $siteOverlay, $sidebarToggle);
        } else {
          VLTJS.offcanvasSidebar.close_sidebar($sidebar, $siteOverlay, $sidebarToggle);
        }
      });
      $sidebarClose.on('click', function (e) {
        e.preventDefault();
        if (sidebarIsOpen) {
          VLTJS.offcanvasSidebar.close_sidebar($sidebar, $siteOverlay, $sidebarToggle);
        }
      });
      $siteOverlay.on('click', function (e) {
        e.preventDefault();
        if (sidebarIsOpen) {
          VLTJS.offcanvasSidebar.close_sidebar($sidebar, $siteOverlay, $sidebarToggle);
        }
      });
      VLTJS.throttleScroll(function (type, scroll) {
        const start = 300;
        if (scroll > start) {
          if (sidebarIsOpen) {
            VLTJS.offcanvasSidebar.close_sidebar($sidebar, $siteOverlay, $sidebarToggle);
          }
        }
      });
      VLTJS.document.on('vlt.close-offcanvas-sidebar', function () {
        if (sidebarIsOpen) {
          VLTJS.offcanvasSidebar.close_sidebar($sidebar, $siteOverlay, $sidebarToggle);
        }
      });
      VLTJS.document.on('keyup', function (e) {
        if (e.keyCode === 27 && sidebarIsOpen) {
          e.preventDefault();
          VLTJS.offcanvasSidebar.close_sidebar($sidebar, $siteOverlay, $sidebarToggle);
        }
      });
    },
    open_sidebar: function (sidebar, siteOverlay, sidebarToggle) {
      VLTJS.document.trigger('vlt.close-search-popup');
      VLTJS.document.trigger('vlt.close-slide-menu');
      sidebarIsOpen = true;
      gsap.timeline({
        defaults: {
          ease: 'merge'
        }
      })
      // set overflow for html
      .set(VLTJS.html, {
        overflow: 'hidden'
      })
      // sidebar animation
      .fromTo(sidebar, .6, {
        x: '100%'
      }, {
        autoAlpha: 1,
        x: 0,
        onStart: function () {
          sidebarToggle.addClass('is-open');
          siteOverlay.addClass('is-open');
          // play audio
          if (VLT_LOCALIZE_DATAS.open_click_sound && typeof Howl !== 'undefined') {
            new Howl({
              src: [VLT_LOCALIZE_DATAS.open_click_sound],
              autoplay: true,
              loop: false,
              volume: 0.3
            });
          }
        }
      });
    },
    close_sidebar: function (sidebar, siteOverlay, sidebarToggle) {
      sidebarIsOpen = false;
      gsap.timeline({
        defaults: {
          ease: 'merge'
        }
      })
      // set overflow for html
      .set(VLTJS.html, {
        overflow: 'auto'
      })
      // sidebar animation
      .to(sidebar, .6, {
        x: '100%',
        onStart: function () {
          // play audio
          if (typeof VLT_LOCALIZE_DATAS.close_click_sound && typeof Howl !== 'undefined') {
            new Howl({
              src: [VLT_LOCALIZE_DATAS.close_click_sound],
              autoplay: true,
              loop: false,
              volume: 0.3
            });
          }
        },
        onComplete: function () {
          sidebarToggle.removeClass('is-open');
          siteOverlay.removeClass('is-open');
        }
      }, '-=.15')
      // set visibility menu after animation
      .set(sidebar, {
        visibility: 'hidden'
      });
    }
  };
  VLTJS.offcanvasSidebar.init();
})(jQuery);
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
/***********************************************
 * THEME: SEARCH POPUP
 ***********************************************/
(function ($) {
  'use strict';

  // check if plugin defined
  if (typeof gsap == 'undefined') {
    return;
  }
  var searchIsOpen = false;
  VLTJS.searchPopup = {
    init: function () {
      var search = $('.vlt-search-popup'),
        searchOpen = $('.js-search-form-open'),
        siteOverlay = $('.vlt-site-overlay');
      CustomEase.create('merge', '0.37, 0, 0.63, 1');
      searchOpen.on('click', function (e) {
        e.preventDefault();
        if (!searchIsOpen) {
          VLTJS.searchPopup.open_search(search, siteOverlay);
        }
      });
      siteOverlay.on('click', function (e) {
        e.preventDefault();
        if (searchIsOpen) {
          VLTJS.searchPopup.close_search(search, siteOverlay);
        }
      });
      VLTJS.document.on('vlt.close-search-popup', function () {
        if (searchIsOpen) {
          VLTJS.searchPopup.close_search(search, siteOverlay);
        }
      });
      VLTJS.document.on('keyup', function (e) {
        if (e.keyCode === 27 && searchIsOpen) {
          e.preventDefault();
          VLTJS.searchPopup.close_search(search, siteOverlay);
        }
      });
    },
    open_search: function (search, siteOverlay) {
      searchIsOpen = true;
      setTimeout(function () {
        search.find('input[type="text"]').focus();
      }, 50);
      gsap.timeline({
        defaults: {
          ease: 'merge'
        }
      })
      // set overflow for html
      .set(VLTJS.html, {
        overflow: 'hidden'
      })
      // overlay animation
      .to(siteOverlay, .3, {
        autoAlpha: 1
      })
      // search animation
      .fromTo(search, .6, {
        y: '-100%'
      }, {
        y: 0,
        visibility: 'visible'
      }, '-=.3');
      if (VLT_LOCALIZE_DATAS.open_click_sound && typeof Howl !== 'undefined') {
        new Howl({
          src: [VLT_LOCALIZE_DATAS.open_click_sound],
          autoplay: true,
          loop: false,
          volume: 0.3
        });
      }
    },
    close_search: function (search, siteOverlay) {
      searchIsOpen = false;
      gsap.timeline({
        defaults: {
          ease: 'merge'
        }
      })
      // set overflow for html
      .set(VLTJS.html, {
        overflow: 'inherit'
      })
      // search animation
      .to(search, .6, {
        y: '-100%'
      })
      // set search visiblity after hide
      .set(search, {
        visibility: 'hidden'
      })
      // overlay animation
      .to(siteOverlay, .3, {
        autoAlpha: 0
      }, '-=.6');
      if (typeof VLT_LOCALIZE_DATAS.close_click_sound && typeof Howl !== 'undefined') {
        new Howl({
          src: [VLT_LOCALIZE_DATAS.close_click_sound],
          autoplay: true,
          loop: false,
          volume: 0.3
        });
      }
    }
  };
  VLTJS.searchPopup.init();
})(jQuery);
/***********************************************
 * THEME: SITE FULLSCREEN
 ***********************************************/
(function ($) {
  'use strict';

  let isFullscreen = false;
  VLTJS.fullscreenSite = {
    init: function () {
      const $fullscreenToggle = $('.js-site-fullscreen-toggle'),
        $documentElement = document.documentElement;
      $fullscreenToggle.on('click', function (e) {
        e.preventDefault();
        if (!isFullscreen) {
          VLTJS.fullscreenSite.open_fullscreen($fullscreenToggle, $documentElement);
        } else {
          VLTJS.fullscreenSite.close_fullscreen($fullscreenToggle);
        }
      });
    },
    open_fullscreen: function (fullscreenToggle, documentElement) {
      isFullscreen = true;
      localStorage.setItem('fullscreenEnabled', "on");
      fullscreenToggle.addClass('is-open');
      if (documentElement.requestFullscreen) {
        documentElement.requestFullscreen();
      } else if (documentElement.mozRequestFullScreen) {
        /* Firefox */
        documentElement.mozRequestFullScreen();
      } else if (documentElement.webkitRequestFullscreen) {
        /* Chrome, Safari and Opera */
        documentElement.webkitRequestFullscreen();
      } else if (documentElement.msRequestFullscreen) {
        /* IE/Edge */
        documentElement.msRequestFullscreen();
      }
    },
    close_fullscreen: function (fullscreenToggle) {
      isFullscreen = false;
      localStorage.setItem('fullscreenEnabled', "off");
      fullscreenToggle.removeClass('is-open');
      if (document.exitFullscreen) {
        document.exitFullscreen();
      } else if (document.mozCancelFullScreen) {
        /* Firefox */
        document.mozCancelFullScreen();
      } else if (document.webkitExitFullscreen) {
        /* Chrome, Safari and Opera */
        document.webkitExitFullscreen();
      } else if (document.msExitFullscreen) {
        /* IE/Edge */
        document.msExitFullscreen();
      }
    }
  };
  VLTJS.fullscreenSite.init();
})(jQuery);
/***********************************************
 * THEME: PRELOADER
 ***********************************************/
(function ($) {
  'use strict';

  VLTJS.document.ready(function () {
    preloader.init(Boolean(VLTJS.isCustomizer()));
  });
  VLTJS.window.on('load', function () {
    preloader.windowLoaded = true;
  });
  VLTJS.window.on('elementor/frontend/init', function () {
    const editMode = Boolean(elementorFrontend.isEditMode());
    if (editMode) {
      preloader.init(editMode);
    }
  });
  let preloader = {
    holder: $('.vlt-site-preloader'),
    windowLoaded: false,
    preloaderFinished: false,
    percentNumber: 0,
    init: function (editMode) {
      let temp;
      if (this.holder.length) {
        if (editMode) {
          preloader.holder.hide();
          return;
        }
        temp = setInterval(function () {
          if (100 <= preloader.percentNumber) {
            clearInterval(temp);
            preloader.preloaderFinished = true;
            preloader.animateBackground(true);
          } else {
            preloader.animatePercent(preloader.holder.find('.vlt-preloader-cover__number > span'), preloader.holder.find('.vlt-preloader-cover__bar > div'), preloader.percentNumber);
          }
        }, 50);
      } else {
        VLTJS.window.trigger('vlt.site-loaded');
      }
    },
    animateBackground: function (isLoaded) {
      let temp = setInterval(function () {
        if (preloader.windowLoaded && preloader.preloaderFinished && (clearInterval(temp), isLoaded)) {
          preloader.holder.addClass('is-loaded');
          VLTJS.html.addClass('vlt-is-page-loaded');
          preloader.holder.one('transitionend', function () {
            VLTJS.window.trigger('vlt.site-loaded');
          });
        }
      }, 100);
    },
    animatePercent: function (loadingProgress, loadingBackground, percent) {
      if (percent < 100) {
        loadingProgress.html((percent += 1) + '%');
        loadingBackground.css('clip-path', 'inset(' + (100 - percent) + '% 0 0 0)');
        preloader.percentNumber = percent;
      }
    }
  };
})(jQuery);
/***********************************************
 * THEME: SITE PROTECTION
 ***********************************************/
(function ($) {
  'use strict';

  if (!VLTJS.html.hasClass('vlt-is--site-protection')) {
    return;
  }
  let isClicked = false;
  VLTJS.document.bind('contextmenu', function (e) {
    e.preventDefault();
    if (!isClicked) {
      $('.vlt-site-protection').addClass('is-visible');
      VLTJS.body.addClass('is-right-clicked');
      isClicked = true;
    }
    VLTJS.document.on('mousedown', function () {
      $('.vlt-site-protection').removeClass('is-visible');
      VLTJS.body.removeClass('is-right-clicked');
      isClicked = false;
    });
    isClicked = false;
  });
})(jQuery);
/***********************************************
 * THEME: STICKY NAVBAR
 ***********************************************/
(function ($) {
  'use strict';

  VLTJS.stickyNavbar = {
    init: function () {
      const $navbarMain = $('.vlt-header .vlt-navbar--main');
      $navbarMain.each(function () {
        const $currentNavbar = $(this);

        // sticky navbar
        const navbarHeight = $currentNavbar.length ? $currentNavbar.outerHeight() : 0,
          navbarMainOffset = $currentNavbar.hasClass('vlt-bar--offset') ? VLTJS.window.outerHeight() : navbarHeight * 2;

        // fake navbar
        const $navbarFake = $('<div class="vlt-fake-navbar">').hide();
        function _fixed_navbar() {
          $currentNavbar.addClass('vlt-navbar--fixed');
          $navbarFake.show();
        }
        function _unfixed_navbar() {
          $currentNavbar.removeClass('vlt-navbar--fixed');
          $navbarFake.hide();
        }
        function _on_scroll_navbar() {
          if (VLTJS.window.scrollTop() >= navbarMainOffset) {
            _fixed_navbar();
          } else {
            _unfixed_navbar();
          }
        }
        if ($currentNavbar.hasClass('vlt-navbar--sticky')) {
          VLTJS.window.on('scroll resize', _on_scroll_navbar);
          _on_scroll_navbar();

          // append fake navbar
          $currentNavbar.after($navbarFake);

          // fake navbar height after resize
          $navbarFake.height($currentNavbar.innerHeight());
          VLTJS.debounceResize(function () {
            $navbarFake.height($currentNavbar.innerHeight());
          });
        }

        // hide navbar on scroll
        const navbarHideOnScroll = $currentNavbar.filter('.vlt-navbar--hide-on-scroll');
        VLTJS.throttleScroll(function (type, scroll) {
          const start = 650;
          function _show_navbar() {
            navbarHideOnScroll.removeClass('vlt-on-scroll-hide').addClass('vlt-on-scroll-show');
          }
          function _hide_navbar() {
            navbarHideOnScroll.removeClass('vlt-on-scroll-show').addClass('vlt-on-scroll-hide');
          }

          // hide or show
          if (type === 'down' && scroll > start) {
            _hide_navbar();
          } else if (type === 'up' || type === 'end' || type === 'start') {
            _show_navbar();
          }

          // add solid color
          if ($currentNavbar.hasClass('vlt-navbar--transparent') && $currentNavbar.hasClass('vlt-navbar--sticky')) {
            scroll > navbarHeight * 2 ? $currentNavbar.addClass('vlt-navbar--solid') : $currentNavbar.removeClass('vlt-navbar--solid');
          }

          // sticky column fix
          if ($currentNavbar.hasClass('vlt-navbar--fixed') && $currentNavbar.hasClass('vlt-navbar--sticky') && !$currentNavbar.hasClass('vlt-on-scroll-hide')) {
            VLTJS.html.addClass('vlt-is--header-fixed');
          } else {
            VLTJS.html.removeClass('vlt-is--header-fixed');
          }
        });
      });
    }
  };
  VLTJS.stickyNavbar.init();
})(jQuery);
/***********************************************
 * THEME: TIPPY
 ***********************************************/
(function ($) {
  'use strict';

  // check if plugin defined
  if (typeof tippy === 'undefined') {
    return;
  }
  VLTJS.tippy = {
    init: function () {
      tippy('[data-tippy-content]:not(.copy-shortlink):not([data-tippy-template])');
      $('*[data-tippy-template]').each(function () {
        tippy(this, {
          content(reference) {
            const id = reference.getAttribute('data-tippy-template');
            const template = document.getElementById(id);
            return template.innerHTML;
          },
          allowHTML: true,
          theme: 'empty',
          animation: 'fade',
          hideOnClick: true,
          arrow: false,
          followCursor: true,
          offset: [0, 35],
          duration: [300, 150],
          delay: [200, 0],
          // trigger: 'click'
          trigger: 'mouseenter focus'
        });
      });
      function copyInput(el, text) {
        const copiedTippy = tippy(el);
        $(el).on('click', function (e) {
          const copyText = $(this).attr('data-tippy-content');
          copiedTippy.setContent($(this).attr('data-clipboard-label'));
          navigator.clipboard.writeText(text).then(function () {
            copiedTippy.show();
            setTimeout(function () {
              copiedTippy.hide();
              setTimeout(function () {
                copiedTippy.setContent(copyText);
              }, 150);
            }, 2000);
          });
          return false;
        });
      }
      $('.copy-shortlink').each(function () {
        const target = $('input' + $(this).data('clipboard-target')).val();
        copyInput(this, target);
      });
    }
  };
  VLTJS.tippy.init();
  VLTJS.document.on('loadedNewItems.vpf', function (event, vpObject) {
    VLTJS.tippy.init();
  });
})(jQuery);
/***********************************************
 * WIDGET: ALERT MESSAGE
 ***********************************************/
(function ($) {
  'use strict';

  VLTJS.alertMessage = {
    init: function ($scope) {
      $scope = typeof $scope === 'undefined' ? VLTJS.body : $scope;
      const $alertMessage = $scope.find('.vlt-alert-message');
      $alertMessage.each(function () {
        const $this = $(this);
        $this.on('click', '.vlt-alert-message__dismiss', function (e) {
          e.preventDefault();
          $this.fadeOut(500);
        });
      });
    }
  };
  VLTJS.window.on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/vlt-alert-message.default', VLTJS.alertMessage.init);
  });
  VLTJS.alertMessage.init();
})(jQuery);
/***********************************************
 * WIDGET: AWARDS
 ***********************************************/
(function ($) {
  'use strict';

  // check if plugin defined
  if (typeof Swiper === 'undefined') {
    return;
  }
  VLTJS.awards = {
    init: function ($scope) {
      $scope = typeof $scope === 'undefined' ? VLTJS.body : $scope;
      const $awards = $scope.find('.vlt-awards'),
        dataSpeed = $awards.data('speed');
      $awards.each(function () {
        new Swiper(this, {
          spaceBetween: 0,
          loop: false,
          slidesPerView: 'auto',
          grabCursor: true,
          speed: dataSpeed,
          freeMode: true
        });
      });
    }
  };
  VLTJS.window.on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/vlt-awards.default', VLTJS.awards.init);
  });
  VLTJS.awards.init();
})(jQuery);
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
          duration = 10,
          // in seconds
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
        }
        ;
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
            ease: 'power3.out'
          });
        }
        function resetTransform() {
          gsap.killTweensOf($this);
          gsap.to($this, .6, {
            x: 0,
            y: 0,
            ease: 'elastic.out(1.1, .4)'
          });
        }
        $this.on('mousemove', handleMouseMove);
        $this.on('mouseleave', resetTransform);
      });
    }
  };
  VLTJS.window.on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/vlt-button-circle.default', VLTJS.buttonCircle.init);
  });
  VLTJS.buttonCircle.init();
})(jQuery);
/***********************************************
 * WIDGET: BUTTON
 ***********************************************/
(function ($) {
  'use strict';

  // check if plugin defined
  if (typeof gsap == 'undefined') {
    return;
  }
  if (typeof Splitting == 'undefined') {
    return;
  }
  VLTJS.button = {
    init: function ($scope) {
      $scope = typeof $scope === 'undefined' ? VLTJS.body : $scope;
      const $button = $scope.find('.vlt-btn.vlt-btn--effect');
      CustomEase.create('merge', '0.37, 0, 0.63, 1');
      $button.each(function () {
        const $this = $(this);
        if (!$this.find('.vlt-btn__content').length) {
          $this.wrapInner('<span class="vlt-btn__content"></span>');
          $('<span class="vlt-btn__fill"></span>').appendTo($this);
          $this.find('.vlt-btn__content').clone().addClass('copy').appendTo($this);
          $('<span class="vlt-btn__fill copy"></span>').appendTo($this);
        }
        Splitting({
          target: $this.find('.vlt-btn__content.copy')
        });
        $this.on('mouseenter', function () {
          const $chars = $(this).find('.vlt-btn__content.copy .char');
          gsap.killTweensOf($chars);
          gsap.timeline({
            defaults: {
              ease: 'merge'
            }
          }).set($chars, {
            yPercent: 50,
            autoAlpha: 0
          }).to($chars, .3, {
            yPercent: 0,
            delay: .3,
            autoAlpha: 1,
            stagger: {
              amount: .2
            }
          });
        });
      });
    }
  };
  VLTJS.window.on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/vlt-button.default', VLTJS.button.init);
    elementorFrontend.hooks.addAction('frontend/element_ready/vlt-single-post.default', VLTJS.button.init);
    elementorFrontend.hooks.addAction('frontend/element_ready/vlt-projects-slider.default', VLTJS.button.init);
    elementorFrontend.hooks.addAction('frontend/element_ready/wp-widget-mc4wp_form_widget.default', VLTJS.button.init);
  });
  VLTJS.button.init();
  VLTJS.document.on('init.vpf endLoadingNewItems.vpf', function (e) {
    VLTJS.button.init();
  });
  VLTJS.window.on('vlt.locales-ready', function () {
    VLTJS.button.init();
  });
})(jQuery);
/***********************************************
 * WIDGET: CONTENT SLIDER
 ***********************************************/
(function ($) {
  'use strict';

  // check if plugin defined
  if (typeof Swiper === 'undefined') {
    return;
  }
  VLTJS.contentSlider = {
    init: function ($scope) {
      $scope = typeof $scope === 'undefined' ? VLTJS.body : $scope;
      const $slider = $scope.find('.vlt-content-slider');
      $slider.each(function () {
        const $this = $(this),
          dataAnchor = $this.data('navigation-anchor'),
          dataGap = $this.data('gap') || 0,
          dataLoop = $this.data('loop'),
          dataAutoHeight = $this.data('autoheight'),
          dataInitialSlide = $this.data('initial-slide'),
          dataEffect = $this.data('effect'),
          dataParallax = $this.data('parallax'),
          dataSpeed = $this.data('speed') || 1000,
          dataAutoplay = $this.data('autoplay'),
          dataCentered = $this.data('slides-centered'),
          dataFreemode = $this.data('free-mode'),
          dataSliderOffset = $this.data('slider-offset'),
          dataMousewheel = $this.data('mousewheel'),
          dataAutoplaySpeed = $this.data('autoplay-speed'),
          dataSettings = $this.data('slide-settings');
        let conf = {
          init: false,
          grabCursor: true
        };

        // pagintion
        if ($(dataAnchor).find('.vlt-swiper-pagination').length) {
          conf.pagination = {
            el: $(dataAnchor).find('.vlt-swiper-pagination'),
            type: 'bullets',
            bulletClass: 'vlt-swiper-pagination-bullet',
            bulletActiveClass: 'vlt-swiper-pagination-bullet-active',
            clickable: true
          };
        }
        if (dataSliderOffset) {
          conf.slidesOffsetBefore = $('.vlt-fake-container').get(0).getBoundingClientRect().left + parseFloat($('.vlt-fake-container').css('padding-left')) || 0;
          conf.slidesOffsetAfter = $('.vlt-fake-container').get(0).getBoundingClientRect().left + parseFloat($('.vlt-fake-container').css('padding-left')) || 0;
        }
        if (dataEffect) {
          conf.effect = dataEffect;
          if ('coverflow' == dataEffect) {
            conf.coverflowEffect = {
              rotate: 0,
              stretch: -5,
              depth: 60,
              modifier: 3,
              slideShadows: false
            };
          }
        }
        if (dataInitialSlide) {
          conf.initialSlide = dataInitialSlide;
        }
        if (dataLoop) {
          conf.loop = true;
        }
        if (dataAutoHeight) {
          conf.autoHeight = true;
        }
        if (dataParallax) {
          conf.parallax = true;
        }
        if (dataGap) {
          conf.spaceBetween = dataGap;
        }
        if (dataSpeed) {
          conf.speed = dataSpeed;
        }
        if (dataCentered) {
          conf.centeredSlides = true;
        }
        if (dataFreemode) {
          conf.freeMode = true;
        }
        if (dataMousewheel) {
          conf.mousewheel = true;
        }
        if (dataAutoplay) {
          conf.autoplay = {
            delay: dataAutoplaySpeed,
            disableOnInteraction: false
          };
        }
        conf.breakpoints = {
          // when window width is >= 576px
          576: {
            slidesPerView: dataSettings.slides_to_show_mobile || dataSettings.slides_to_show_tablet || dataSettings.slides_to_show || 1,
            slidesPerGroup: dataSettings.slides_to_scroll_mobile || dataSettings.slides_to_scroll_tablet || dataSettings.slides_to_scroll || 1
          },
          // when window width is >= 768px
          768: {
            slidesPerView: dataSettings.slides_to_show_tablet || dataSettings.slides_to_show || 1,
            slidesPerGroup: dataSettings.slides_to_scroll_tablet || dataSettings.slides_to_scroll || 1
          },
          // when window width is >= 992px
          992: {
            slidesPerView: dataSettings.slides_to_show || 1,
            slidesPerGroup: dataSettings.slides_to_scroll || 1
          }
        };
        const swiper = new Swiper(this, conf);
        swiper.init();
      });
    }
  };
  VLTJS.window.on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/vlt-content-slider.default', VLTJS.contentSlider.init);
  });
})(jQuery);
/***********************************************
 * WIDGET: COUNTDOWN
 ***********************************************/
(function ($) {
  'use strict';

  // check if plugin defined
  if (typeof $.fn.countdown === 'undefined') {
    return;
  }
  VLTJS.countdown = {
    init: function ($scope) {
      $scope = typeof $scope === 'undefined' ? VLTJS.body : $scope;
      const $countdown = $scope.find('.vlt-countdown');
      $countdown.each(function () {
        const $this = $(this),
          dataDueDate = $this.data('due-date') || false;
        $this.countdown(dataDueDate, function (event) {
          $this.find('[data-weeks]').html(event.strftime('%W'));
          $this.find('[data-days]').html(event.strftime('%D'));
          $this.find('[data-hours]').html(event.strftime('%H'));
          $this.find('[data-minutes]').html(event.strftime('%M'));
          $this.find('[data-seconds]').html(event.strftime('%S'));
        });
      });
    }
  };
  VLTJS.window.on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/vlt-countdown.default', VLTJS.countdown.init);
  });
  VLTJS.countdown.init();
})(jQuery);
/***********************************************
 * WIDGET: COUNTER UP
 ***********************************************/
(function ($) {
  'use strict';

  // check if plugin defined
  if (typeof $.fn.numerator == 'undefined') {
    return;
  }
  VLTJS.counterUp = {
    init: function ($scope) {
      $scope = typeof $scope === 'undefined' ? VLTJS.body : $scope;
      const $counterUp = $scope.find('.vlt-counter-up, .vlt-counter-up-small, .vlt-award-item');
      function animateNumbers(el) {
        const $this = $(el),
          dataAnimationDuration = $this.data('animation-speed') || 1000,
          $endingNumber = $this.find('.counter'),
          endingNumberValue = $endingNumber.data('value'),
          dataDelimiter = $this.data('delimiter') || ',';
        $endingNumber.text('0');
        $endingNumber.numerator({
          easing: 'linear',
          duration: dataAnimationDuration,
          delimiter: dataDelimiter,
          toValue: endingNumberValue
        });
      }
      if (VLTJS.body.hasClass('page-template-template-fullpage-slider')) {
        if ($counterUp.parents('.vlt-section')) {
          VLTJS.window.one('vlt.change-slide', function () {
            animateNumbers($counterUp);
          });
          animateNumbers($counterUp);
        }
      } else {
        $counterUp.one('inview', function () {
          animateNumbers($counterUp);
        });
      }
    }
  };
  VLTJS.window.on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/vlt-counter-up.default', VLTJS.counterUp.init);
    elementorFrontend.hooks.addAction('frontend/element_ready/vlt-counter-up-small.default', VLTJS.counterUp.init);
    elementorFrontend.hooks.addAction('frontend/element_ready/vlt-award-item.default', VLTJS.counterUp.init);
  });
  VLTJS.counterUp.init();
})(jQuery);
/***********************************************
 * WIDGET: FANCY TEXT
 ***********************************************/
(function ($) {
  'use strict';

  // check if plugin defined
  if (typeof Typed == 'undefined') {
    return;
  }

  // check if plugin defined
  if (typeof $.fn.Morphext == 'undefined') {
    return;
  }
  VLTJS.fancyText = {
    init: function ($scope) {
      $scope = typeof $scope === 'undefined' ? VLTJS.body : $scope;
      const $fancyText = $scope.find('.vlt-fancy-text');
      $fancyText.each(function () {
        const $this = $(this),
          $strings = $this.find('.strings'),
          dataAnimationType = $this.data('animation-type') || '',
          dataFancyText = $this.data('fancy-text') || '',
          dataTypingSpeed = $this.data('typing-speed') || '',
          dataDelay = $this.data('delay') || '',
          dataTypeCursor = $this.data('type-cursor') == 'yes' ? true : false,
          dataTypeCursorSymbol = $this.data('type-cursor-symbol') || '|',
          dataTypingLoop = $this.data('typing-loop') == 'yes' ? true : false;
        if (dataAnimationType == 'typing') {
          // fix double cursor
          if ($this.find('.typed-cursor').length) {
            return;
          }
          new Typed($strings.get(0), {
            strings: dataFancyText.split('|'),
            typeSpeed: dataTypingSpeed,
            backSpeed: 0,
            startDelay: 300,
            backDelay: dataDelay,
            showCursor: dataTypeCursor,
            cursorChar: dataTypeCursorSymbol,
            loop: dataTypingLoop
          });
        } else {
          $strings.show().Morphext({
            animation: dataAnimationType,
            separator: ', ',
            speed: dataDelay,
            complete: function () {
              // Overrides default empty function
            }
          });
        }
      });
    }
  };
  VLTJS.window.on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/vlt-fancy-text.default', VLTJS.fancyText.init);
  });
  VLTJS.fancyText.init();
})(jQuery);
/***********************************************
 * WIDGET: GOOGLE MAP
 ***********************************************/
(function ($) {
  'use strict';

  VLTJS.googleMap = {
    init: function ($scope) {
      $scope = typeof $scope === 'undefined' ? VLTJS.body : $scope;
      const $googleMap = $scope.find('.vlt-google-map');
      $googleMap.each(function () {
        const dataMapLat = $googleMap.data('map-lat'),
          dataMapLng = $googleMap.data('map-lng'),
          dataMapZoom = $googleMap.data('map-zoom'),
          dataMapGestureHandling = $googleMap.data('map-gesture-handling'),
          dataMapZoomControl = $googleMap.data('map-zoom-control') ? true : false,
          dataMapZoomControlPosition = $googleMap.data('map-zoom-control-position'),
          dataMapDefaultUi = $googleMap.data('map-default-ui') ? false : true,
          dataMapType = $googleMap.data('map-type'),
          dataMapTypeControl = $googleMap.data('map-type-control') ? true : false,
          dataMapTypeControlStyle = $googleMap.data('map-type-control-style'),
          dataMapTypeControlPosition = $googleMap.data('map-type-control-position'),
          dataMapStreetviewControl = $googleMap.data('map-streetview-control') ? true : false,
          dataMapStreetviewPosition = $googleMap.data('map-streetview-position'),
          dataMapInfoWindowWidth = $googleMap.data('map-info-window-width'),
          dataMapLocations = $googleMap.data('map-locations'),
          dataMapStyles = $googleMap.data('map-style') || '';
        let infowindow, map;
        function initMap() {
          const myLatLng = {
            lat: parseFloat(dataMapLat),
            lng: parseFloat(dataMapLng)
          };
          if (typeof google === 'undefined') {
            return;
          }
          const map = new google.maps.Map($googleMap[0], {
            center: myLatLng,
            zoom: dataMapZoom,
            disableDefaultUI: dataMapDefaultUi,
            zoomControl: dataMapZoomControl,
            zoomControlOptions: {
              position: google.maps.ControlPosition[dataMapZoomControlPosition]
            },
            mapTypeId: dataMapType,
            mapTypeControl: dataMapTypeControl,
            mapTypeControlOptions: {
              style: google.maps.MapTypeControlStyle[dataMapTypeControlStyle],
              position: google.maps.ControlPosition[dataMapTypeControlPosition]
            },
            streetViewControl: dataMapStreetviewControl,
            streetViewControlOptions: {
              position: google.maps.ControlPosition[dataMapStreetviewPosition]
            },
            styles: dataMapStyles,
            gestureHandling: dataMapGestureHandling
          });
          $.each(dataMapLocations, function (index, $googleMapement, content) {
            var content = '\
						<div class="vlt-google-map__container">\
						<h6>' + $googleMapement.title + '</h6>\
						<div>' + $googleMapement.text + '</div>\
						</div>';
            let icon = '';
            if ($googleMapement.pin_icon !== '') {
              if ($googleMapement.pin_icon_custom) {
                icon = $googleMapement.pin_icon_custom;
              } else {
                icon = '';
              }
            }
            const marker = new google.maps.Marker({
              map: map,
              position: new google.maps.LatLng(parseFloat($googleMapement.lat), parseFloat($googleMapement.lng)),
              animation: google.maps.Animation.DROP,
              icon: icon
            });
            if ($googleMapement.title !== '' && $googleMapement.text !== '') {
              addInfoWindow(marker, content);
            }
          });
        }
        function addInfoWindow(marker, content) {
          google.maps.event.addListener(marker, 'click', function () {
            if (!infowindow) {
              infowindow = new google.maps.InfoWindow({
                maxWidth: dataMapInfoWindowWidth
              });
            }
            infowindow.setContent(content);
            infowindow.open(map, marker);
          });
        }
        initMap();
      });
    }
  };
  VLTJS.window.on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/vlt-google-map.default', VLTJS.googleMap.init);
  });
  VLTJS.googleMap.init();
})(jQuery);
/***********************************************
 * WIDGET: JUSTIFIED GALLERY
 ***********************************************/
(function ($) {
  'use strict';

  // check if plugin defined
  if (typeof $.fn.justifiedGallery == 'undefined') {
    return;
  }
  VLTJS.justifiedGallery = {
    init: function ($scope) {
      $scope = typeof $scope === 'undefined' ? VLTJS.body : $scope;
      const $justifiedGallery = $scope.find('.vlt-justified-gallery');
      $justifiedGallery.each(function () {
        const $this = $(this),
          dataRowHeight = $this.data('row-height') || 360,
          dataMargins = $this.data('margins') || 0,
          dataLastRow = $this.data('last-row') || 'justify';
        $this.imagesLoaded(function () {
          $this.justifiedGallery({
            rowHeight: dataRowHeight,
            margins: dataMargins,
            border: 0,
            captions: false,
            lastRow: dataLastRow
          });
        });
      });
    }
  };
  VLTJS.window.on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/vlt-justified-gallery.default', VLTJS.justifiedGallery.init);
  });
  VLTJS.justifiedGallery.init();
})(jQuery);
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
          tl = gsap.timeline({
            repeat: -1
          }),
          plus,
          minus;
        if (inverted) {
          speed = -speed;
          bottom += Math.abs(items[inverted ? items.length - 2 : 1].getBoundingClientRect().top - topBounds.top);
        }
        plus = speed < 0 ? "-=" : "+=", minus = speed < 0 ? "+=" : "-=";
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
        let tl = gsap.timeline({
            repeat: config.repeat,
            paused: config.paused,
            defaults: {
              ease: "none"
            },
            onReverseComplete: () => tl.totalTime(tl.rawTime() + tl.duration() * 100)
          }),
          length = items.length,
          startX = items[0].offsetLeft,
          times = [],
          widths = [],
          xPercents = [],
          curIndex = 0,
          pixelsPerSecond = config.speed || 100,
          snap = config.snap === false ? v => v : gsap.utils.snap(config.snap || 1),
          // some browsers shift by a pixel to accommodate flex layouts, so for example if width is 20% the first element's width might be 242px, and the next 243px, alternating back and forth. So we snap to 5 percentage points to make things look more natural
          totalWidth,
          curX,
          distanceToStart,
          distanceToLoop,
          item,
          i;
        gsap.set(items, {
          // convert "x" to "xPercent" to make things responsive, and populate the widths/xPercents Arrays to make lookups faster.
          xPercent: (i, el) => {
            let w = widths[i] = parseFloat(gsap.getProperty(el, "width", "px"));
            xPercents[i] = snap(parseFloat(gsap.getProperty(el, "x", "px")) / w * 100 + gsap.getProperty(el, "xPercent"));
            return xPercents[i];
          }
        });
        gsap.set(items, {
          x: 0
        });
        totalWidth = items[length - 1].offsetLeft + xPercents[length - 1] / 100 * widths[length - 1] - startX + items[length - 1].offsetWidth * gsap.getProperty(items[length - 1], "scaleX") + (parseFloat(config.paddingRight) || 0);
        for (i = 0; i < length; i++) {
          item = items[i];
          curX = xPercents[i] / 100 * widths[i];
          distanceToStart = item.offsetLeft + curX - startX;
          distanceToLoop = distanceToStart + widths[i] * gsap.getProperty(item, "scaleX");
          tl.to(item, {
            xPercent: snap((curX - distanceToLoop) / widths[i] * 100),
            duration: distanceToLoop / pixelsPerSecond
          }, 0).fromTo(item, {
            xPercent: snap((curX - distanceToLoop + totalWidth) / widths[i] * 100)
          }, {
            xPercent: xPercents[i],
            duration: (curX - distanceToLoop + totalWidth - curX) / pixelsPerSecond,
            immediateRender: false
          }, distanceToLoop / pixelsPerSecond).add("label" + i, distanceToStart / pixelsPerSecond);
          times[i] = distanceToStart / pixelsPerSecond;
        }
        function toIndex(index, vars) {
          vars = vars || {};
          Math.abs(index - curIndex) > length / 2 && (index += index > curIndex ? -length : length); // always go in the shortest direction
          let newIndex = gsap.utils.wrap(0, length, index),
            time = times[newIndex];
          if (time > tl.time() !== index > curIndex) {
            // if we're wrapping the timeline's playhead, make the proper adjustments
            vars.modifiers = {
              time: gsap.utils.wrap(0, tl.duration())
            };
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
    elementorFrontend.hooks.addAction('frontend/element_ready/vlt-marquee-text.default', VLTJS.marqueeEffect.init);
    elementorFrontend.hooks.addAction('frontend/element_ready/vlt-team-member.default', VLTJS.marqueeEffect.init);
    elementorFrontend.hooks.addAction('frontend/element_ready/vlt-slide-photo.default', VLTJS.marqueeEffect.init);
  });
  VLTJS.marqueeEffect.init();
  VLTJS.document.on('init.vpf endLoadingNewItems.vpf', function (e) {
    VLTJS.marqueeEffect.init();
  });
})(jQuery);
/***********************************************
 * WIDGET: PIE CHART
 ***********************************************/
(function ($) {
  'use strict';

  if (typeof gsap === 'undefined') {
    return;
  }
  VLTJS.pieChart = {
    init: function ($scope) {
      $scope = typeof $scope === 'undefined' ? VLTJS.body : $scope;
      const $chart = $scope.find('.vlt-pie-chart');
      $chart.each(function () {
        const $this = $(this),
          dataChartValue = $this.data('chart-value') || 0,
          dataChartAnimationDuration = $this.data('chart-animation-duration') || 0;
        let delay = 150,
          obj = {
            count: 0
          };
        $this.one('inview', function () {
          gsap.to($this, dataChartAnimationDuration / 1000, {
            '--final-value': dataChartValue
          });
          gsap.to(obj, dataChartAnimationDuration / 1000, {
            count: dataChartValue,
            delay: delay / 1000,
            onUpdate: function () {
              $this.find('.vlt-pie-chart__title > .counter').text(Math.round(obj.count));
            }
          });
        });
      });
    }
  };
  VLTJS.window.on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/vlt-pie-chart.default', VLTJS.pieChart.init);
  });
  VLTJS.pieChart.init();
})(jQuery);
/***********************************************
 * WIDGET: PROGRESS BAR
 ***********************************************/
(function ($) {
  'use strict';

  // check if plugin defined
  if (typeof gsap === 'undefined') {
    return;
  }
  VLTJS.progressBar = {
    init: function ($scope) {
      $scope = typeof $scope === 'undefined' ? VLTJS.body : $scope;
      const $progressBar = $scope.find('.vlt-progress-bar');
      function animateProgressBar(el) {
        const $this = $(el),
          dataFinalValue = $this.data('final-value') || 0,
          dataAnimationDuration = $this.data('animation-speed') || 0;
        let delay = 150,
          width = 0,
          obj = {
            count: 0
          };
        gsap.to(obj, dataAnimationDuration / 1000 / 2, {
          count: dataFinalValue,
          delay: delay / 1000,
          onUpdate: function () {
            $this.find('.vlt-progress-bar__title > .counter').text(Math.round(obj.count));
          }
        });
        gsap.fromTo($this.filter('.vlt-progress-bar--default').find('.vlt-progress-bar__track > .bar'), dataAnimationDuration / 1000, {
          width: width
        }, {
          width: dataFinalValue + '%',
          delay: delay / 1000
        });
        gsap.to(obj, dataAnimationDuration / 1000, {
          count: dataFinalValue,
          delay: delay / 1000,
          onUpdate: function () {
            $this.filter('.vlt-progress-bar--dotted').find('.vlt-progress-bar__track > .bar').css('clip-path', 'inset(0 ' + (100 - Math.round(obj.count)) + '% 0 0)');
          }
        });
      }
      if (VLTJS.body.hasClass('page-template-template-fullpage-slider')) {
        if ($progressBar.parents('.vlt-section').hasClass('active')) {
          VLTJS.window.one('vlt.change-slide', function () {
            animateProgressBar($progressBar);
          });
          animateProgressBar($progressBar);
        }
      } else {
        $progressBar.one('inview', function () {
          animateProgressBar($progressBar);
        });
      }
    }
  };
  VLTJS.window.on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/vlt-progress-bar.default', VLTJS.progressBar.init);
  });
  VLTJS.progressBar.init();
})(jQuery);
/***********************************************
 * WIDGET: PROJECTS SLIDER
 ***********************************************/
(function ($) {
  'use strict';

  // check if plugin defined
  if (typeof Swiper === 'undefined') {
    return;
  }
  VLTJS.projectsSlider = {
    init: function ($scope) {
      $scope = typeof $scope === 'undefined' ? VLTJS.body : $scope;
      const $slider = $scope.find('.vlt-projects-slider');
      $slider.each(function () {
        const $this = $(this),
          dataSlideEffect = $this.data('slide-effect'),
          $contentSlider = $this.find('.vlt-project-content'),
          $imageSlider = $this.find('.vlt-project-images');
        const contentSwiper = new Swiper($contentSlider.get(0), {
          effect: 'fade',
          loop: false,
          autoHeight: true,
          allowTouchMove: false
        });
        const imageSwiper = new Swiper($imageSlider.get(0), {
          init: false,
          modules: [SwiperGL],
          effect: 'gl',
          gl: {
            shader: dataSlideEffect
          },
          speed: 1000,
          loop: false,
          lazy: true,
          pagination: {
            el: $this.find('.vlt-swiper-pagination .total').get(0),
            type: 'custom',
            renderCustom: function (swiper, current, total) {
              return VLTJS.addLedingZero(total);
            }
          }
        });
        if ($this.find('.vlt-swiper-pagination').length) {
          imageSwiper.on('init slideChange', function () {
            const speed = imageSwiper.params.speed / 1000 / 2,
              $current = $this.find('.vlt-swiper-pagination .current');

            // Pagination transform
            gsap.to($current, speed, {
              force3D: true,
              y: -6,
              opacity: 0,
              onComplete: function () {
                gsap.set($current, {
                  y: 6
                });
                $current.html(VLTJS.addLedingZero(imageSwiper.realIndex + 1));
              }
            });
            gsap.to($current, speed, {
              force3D: true,
              y: 0,
              opacity: 1,
              delay: speed
            });
          });
        }
        imageSwiper.init();
        imageSwiper.controller.control = contentSwiper;
      });
    }
  };
  VLTJS.window.on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/vlt-projects-slider.default', VLTJS.projectsSlider.init);
  });
})(jQuery);
/***********************************************
 * WIDGET: SECTION TITLE
 ***********************************************/
(function ($) {
  'use strict';

  VLTJS.sectionTitle = {
    init: function ($scope) {
      $scope = typeof $scope === 'undefined' ? VLTJS.body : $scope;
      const $sectionTitle = $scope.find('.vlt-highlight');
      $sectionTitle.each(function () {
        const $this = $(this);
        $(VLT_LOCALIZE_DATAS.circle_highlight).appendTo($this.filter('.vlt-highlight--circle'));
        $(VLT_LOCALIZE_DATAS.wave_highlight).appendTo($this.filter('.vlt-highlight--wave'));
      });
    }
  };
  VLTJS.window.on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/vlt-section-title.default', VLTJS.sectionTitle.init);
  });
  VLTJS.sectionTitle.init();
})(jQuery);
/***********************************************
 * WIDGET: SIMPLE LINK
 ***********************************************/
(function ($) {
  'use strict';

  // check if plugin defined
  if (typeof gsap == 'undefined') {
    return;
  }
  VLTJS.simpleLink = {
    init: function ($scope) {
      $scope = typeof $scope === 'undefined' ? VLTJS.body : $scope;
      const $link = $scope.find('.vlt-simple-link');
      $link.each(function () {
        const $this = $(this),
          duration = 5; // in seconds

        const tween = gsap.to($this.find('svg'), duration, {
          rotation: '+=360deg',
          ease: 'none',
          repeat: -1
        });
        $this.on({
          mouseenter: function () {
            tween.timeScale(3);
          },
          mouseleave: function () {
            tween.timeScale(1);
          }
        });
      });
    }
  };
  VLTJS.window.on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/vlt-simple-link.default', VLTJS.simpleLink.init);
    elementorFrontend.hooks.addAction('frontend/element_ready/vlt-service-box.default', VLTJS.simpleLink.init);
    elementorFrontend.hooks.addAction('frontend/element_ready/vlt-award-item.default', VLTJS.simpleLink.init);
  });
  VLTJS.simpleLink.init();
})(jQuery);
/***********************************************
 * WIDGET: COUNTER UP
 ***********************************************/
(function ($) {
  'use strict';

  // check if plugin defined
  if (typeof $.fn.numerator == 'undefined') {
    return;
  }
  VLTJS.skill = {
    init: function ($scope) {
      $scope = typeof $scope === 'undefined' ? VLTJS.body : $scope;
      const $skill = $scope.find('.vlt-skill');
      function animateNumbers(el) {
        const $this = $(el),
          dataAnimationDuration = $this.data('animation-speed') || 1000,
          $endingNumber = $this.find('.counter'),
          endingNumberValue = $endingNumber.data('value');
        $endingNumber.css({
          'min-width': $endingNumber.outerWidth() + 'px'
        });
        $endingNumber.text('0');
        $endingNumber.numerator({
          easing: 'linear',
          duration: dataAnimationDuration,
          delimiter: false,
          toValue: endingNumberValue
        });
      }
      if (VLTJS.body.hasClass('page-template-template-fullpage-slider')) {
        if ($skill.parents('.vlt-section')) {
          VLTJS.window.one('vlt.change-slide', function () {
            animateNumbers($skill);
          });
          animateNumbers($skill);
        }
      } else {
        $skill.one('inview', function () {
          animateNumbers($skill);
        });
      }
    }
  };
  VLTJS.window.on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/vlt-skill.default', VLTJS.skill.init);
  });
  VLTJS.skill.init();
})(jQuery);
/***********************************************
 * WIDGET: STICKY COLUMN
 ***********************************************/
(function ($) {
  'use strict';

  // check if plugin defined
  if (typeof StickySidebar == 'undefined') {
    return;
  }
  VLTJS.elementorColumn = {
    init: function ($scope) {
      var stickyOn = ['desktop'
        // 'tablet',
        // 'mobile'
        ],
        stickyInstance = null,
        stickyInstanceOptions = {
          topSpacing: 50,
          bottomSpacing: 50,
          containerSelector: '.elementor-row, .elementor-container',
          innerWrapperSelector: '.elementor-column-wrap'
        };
      if ($scope.hasClass('vlt-sticky-elementor-sidebar')) {
        $scope.addClass('vlt-sticky-column');
        if (-1 !== stickyOn.indexOf(elementorFrontend.getCurrentDeviceMode())) {
          $scope.data('stickyColumnInit', true);
          stickyInstance = new StickySidebar($scope[0], stickyInstanceOptions);
          VLTJS.debounceResize(resizeDebounce);
        }
      }
      function resizeDebounce() {
        var currentDeviceMode = elementorFrontend.getCurrentDeviceMode(),
          availableDevices = stickyOn || [],
          isInit = $scope.data('stickyColumnInit');
        if (-1 !== availableDevices.indexOf(currentDeviceMode)) {
          if (!isInit) {
            $scope.data('stickyColumnInit', true);
            stickyInstance = new StickySidebar($scope[0], stickyInstanceOptions);
            stickyInstance.updateSticky();
          }
        } else {
          $scope.data('stickyColumnInit', false);
          stickyInstance.destroy();
        }
      }
    }
  };
  VLTJS.window.on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/column', VLTJS.elementorColumn.init);
  });
})(jQuery);
/***********************************************
 * WIDGET: TABS
 ***********************************************/
(function ($) {
  'use strict';

  // check if plugin defined
  if (typeof gsap == 'undefined') {
    return;
  }
  VLTJS.tabs = {
    init: function ($scope) {
      const $tabs = $scope.find('.vlt-tabs'),
        $item = $tabs.find('.vlt-tab'),
        $content = $('.vlt-tab-content__item');
      CustomEase.create('merge', '0.37, 0, 0.63, 1');
      $content.filter('[data-content-id="' + $item.filter('.is-active').data('tab-id') + '"]').show();
      Splitting({
        target: $item
      });
      $item.on('click', function () {
        const $this = $(this),
          dataTabId = $this.data('tab-id');
        const $chars = $this.find('.char');
        gsap.killTweensOf($chars);
        gsap.timeline({
          defaults: {
            ease: 'merge'
          }
        }).to($chars, .3, {
          yPercent: -50,
          autoAlpha: 0,
          stagger: {
            amount: .2
          }
        }).set($chars, {
          yPercent: 50,
          autoAlpha: 0
        }).to($chars, .3, {
          yPercent: 0,
          autoAlpha: 1,
          stagger: {
            amount: .2
          }
        });
        $item.removeClass('is-active');
        $this.addClass('is-active');
        $content.hide();
        $content.filter('[data-content-id="' + dataTabId + '"]').fadeIn(300);
      });
    }
  };
  VLTJS.window.on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/vlt-tabs.default', VLTJS.tabs.init);
  });
  VLTJS.window.on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/vlt-tab-content.default', VLTJS.tabs.init);
  });
})(jQuery);
/***********************************************
 * WIDGET: TIMELINE SLIDER
 ***********************************************/
(function ($) {
  'use strict';

  // check if plugin defined
  if (typeof Swiper === 'undefined') {
    return;
  }
  VLTJS.timelineSlider = {
    init: function ($scope) {
      $scope = typeof $scope === 'undefined' ? VLTJS.body : $scope;
      const $timelineSlider = $scope.find('.vlt-timeline-slider');
      $timelineSlider.each(function () {
        const $this = $(this),
          dataAnchor = $this.data('navigation-anchor'),
          dataSpeed = $this.data('speed') || 1000,
          dataAutoplay = $this.data('autoplay'),
          dataMousewheel = $this.data('mousewheel'),
          dataAutoplaySpeed = $this.data('autoplay-speed');
        let conf = {
          init: false,
          loop: false,
          grabCursor: true,
          spaceBetween: 60,
          slidesPerView: 1,
          effect: 'coverflow',
          coverflowEffect: {
            rotate: 0,
            stretch: -5,
            depth: 60,
            modifier: 3,
            slideShadows: false
          }
        };

        // pagintion
        if ($(dataAnchor).find('.vlt-swiper-pagination').length) {
          conf.pagination = {
            el: $(dataAnchor).find('.vlt-swiper-pagination').get(0),
            type: 'bullets',
            bulletClass: 'vlt-swiper-pagination-bullet',
            bulletActiveClass: 'vlt-swiper-pagination-bullet-active',
            clickable: true
          };
        }
        if (dataSpeed) {
          conf.speed = dataSpeed;
        }
        if (dataMousewheel) {
          conf.mousewheel = true;
        }
        if (dataAutoplay) {
          conf.autoplay = {
            delay: dataAutoplaySpeed,
            disableOnInteraction: false
          };
        }
        const swiper = new Swiper(this, conf);
        swiper.init();
      });
    }
  };
  VLTJS.window.on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/vlt-timeline-slider.default', VLTJS.timelineSlider.init);
  });
})(jQuery);