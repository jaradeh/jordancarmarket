
//POTENZA var
var POTENZA = {};

(function ($) {
    "use strict";

    /*************************
     Predefined Variables
     *************************/
    var $window = $(window),
            $document = $(document),
            $body = $('body'),
            $countdownTimer = $('.countdown'),
            $counter = $('.counter');

    //Check if function exists
    $.fn.exists = function () {
        return this.length > 0;
    };


    /*************************
     Scroll to Top
     *************************/
    POTENZA.scrolltotop = function () {
        var $scrolltop = $('.car-top');

        $scrolltop.on('click', function () {
            $('html,body').animate({
                scrollTop: 0
            }, 800);
            $(this).addClass("car-run");
            setTimeout(function () {
                $scrolltop.removeClass('car-run');
            }, 1000);
            return false;
        });
        $window.on('scroll', function () {
            if ($window.scrollTop() >= 200) {
                $scrolltop.addClass("show");
                $scrolltop.addClass("car-down");
            } else {
                $scrolltop.removeClass("show");
                setTimeout(function () {
                    $scrolltop.removeClass('car-down');
                }, 300);
            }
        });
    }

    /*************************
     Scroll to Top
     *************************/
    POTENZA.sidebarfixed = function () {
        if ($(".listing-sidebar").exists()) {
            (function () {
                var reset_scroll;

                $(function () {
                    return $("[data-sticky_column]").stick_in_parent({
                        parent: "[data-sticky_parent]"
                    });
                });

                reset_scroll = function () {
                    var scroller;
                    scroller = $("body,html");
                    scroller.stop(true);
                    if ($(window).scrollTop() !== 0) {
                        scroller.animate({
                            scrollTop: 0
                        }, "fast");
                    }
                    return scroller;
                };

                window.scroll_it = function () {
                    var max;
                    max = $(document).height() - $(window).height();
                    return reset_scroll().animate({
                        scrollTop: max
                    }, max * 3).delay(100).animate({
                        scrollTop: 0
                    }, max * 3);
                };
                window.scroll_it_wobble = function () {
                    var max, third;
                    max = $(document).height() - $(window).height();
                    third = Math.floor(max / 3);
                    return reset_scroll().animate({
                        scrollTop: third * 2
                    }, max * 3).delay(100).animate({
                        scrollTop: third
                    }, max * 3).delay(100).animate({
                        scrollTop: max
                    }, max * 3).delay(100).animate({
                        scrollTop: 0
                    }, max * 3);
                };

                $(window).on("resize", (function (_this) {
                    return function (e) {
                        return $(document.body).trigger("sticky_kit:recalc");
                    };
                })(this));

            }).call(this);

            (function () {
                var sticky;
                if (window.matchMedia('(min-width: 768px)').matches) {
                    $(".listing-sidebar").sticky({topSpacing: 0});
                }
            });
        }
    }

    /****************************************************
     POTENZA Window load and functions
     ****************************************************/

    //Document ready functions
    $document.ready(function () {
        POTENZA.scrolltotop(),
                POTENZA.sidebarfixed();
    });

})(jQuery);
