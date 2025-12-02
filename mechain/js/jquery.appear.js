(function ($) {
  function elementInViewport($el, accX, accY) {
    if ($el.is(':hidden')) {
      return false;
    }

    var windowLeft = $(window).scrollLeft();
    var windowTop = $(window).scrollTop();
    var offset = $el.offset();
    var left = offset.left;
    var top = offset.top;

    return (
      top + $el.height() + accY >= windowTop &&
      top <= windowTop + $(window).height() + accY &&
      left + $el.width() + accX >= windowLeft &&
      left <= windowLeft + $(window).width() + accX
    );
  }

  $.fn.appear = function (fn, options) {
    var settings = $.extend(
      {
        data: undefined,
        one: true,
        accX: 0,
        accY: 0,
      },
      options || {}
    );

    return this.each(function () {
      var $element = $(this);
      var appeared = false;

      function triggerAppear() {
        if (!$.isFunction(fn)) {
          return;
        }

        fn.apply($element, settings.data ? [settings.data] : []);
      }

      function check() {
        if (appeared) {
          if (!elementInViewport($element, settings.accX, settings.accY)) {
            appeared = false;
            if (!settings.one) {
              $element.trigger('disappear');
            }
          }
          return;
        }

        if (elementInViewport($element, settings.accX, settings.accY)) {
          appeared = true;
          $element.trigger('appear', settings.data);
          triggerAppear();
          if (settings.one) {
            detach();
          }
        }
      }

      function detach() {
        $(window).off('scroll.appear resize.appear', check);
      }

      $(window).on('scroll.appear resize.appear', check);
      check();
    });
  };

  // Auto bind to data-appear elements if needed
  $(function () {
    $('[data-animate-on-scroll]').each(function () {
      var $el = $(this);
      $el.appear(function () {
        var className = $el.data('animate-on-scroll');
        if (className) {
          $el.addClass(className);
        }
      });
    });
  });
})(jQuery);

