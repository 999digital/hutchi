jQuery(document).ready(function ($) {

    ///////////////////////////////////////////
    // Sliders

    $('.slider-wrapper:not(.single)').slick({
        dots: true,
        infinite: true,
        speed: 500,
        slidesToScroll: 1,
        slidesToShow: 3,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 720,
                settings: {
                    slidesToShow: 1,
                }
            }
       ]

    });

    $('.slide-partners-wrapper').slick({
        dots: false,
        infinite: true,
        speed: 500,
        slidesToScroll: 1,
        slidesToShow: 5,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 720,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]

    });

    $('.slider-post-wrapper').slick({
        dots: true,
        infinite: true,
        speed: 500,
        slidesToScroll: 1,
        slidesToShow: 1
    });

    ///////////////////////////////////////////
    // Scroll behaviours

    //add class to navbar when scrolled a bit
    // $('#main-content').waypoint({
    //   handler: function(direction) {
    //     if (direction == 'down') {
    //         $('nav.navbar').addClass('scrolled');
    //     }
    //   },
    //   offset: '-15%'
    // });

    //show back to top
    $('#main-content').waypoint({
      handler: function(direction) {
        if (direction == 'down') {
            $('div.btt').addClass('active');
        }
        else if (direction == 'up') {
            $('div.btt').removeClass('active');
        }
      },
      offset: '-50%'
    });

    // $('#main-content').waypoint({
    //   handler: function(direction) {
    //     if (direction == 'up') {
    //         $('nav.navbar').removeClass('scrolled');
    //     }
    //   },
    //   offset: '-5%'
    // });

    //sticky panel nav
    if ($('.block-panel-nav').length) {

        $('.block-panel').last().waypoint({
          handler: function(direction) {
            if (direction == 'down') {
                $('.block-panel-nav').removeClass('sticky-top')
            }
            else if (direction == 'up') {
                $('.block-panel-nav').addClass('sticky-top')
            }
          },
          offset: 'bottom-in-view'
        });

        $('.block-panel').first().waypoint({
          handler: function(direction) {
            if (direction == 'up') {
                $('.block-panel-nav').removeClass('sticky-top')
            }
          },
          offset: '60%'
        });

        $('.block-panel-nav').waypoint({
          handler: function(direction) {
            if (direction == 'down') {
                $('.block-panel-nav').addClass('sticky-top')
            }
          }
        });

    }
    

    ///////////////////////////////////////////
    // Interactive list
    
    if ($('.interactive-list').length) {

        function makeActive(el) {
            var parent = el.closest('.interactive-list');

            parent.find('li.active').removeClass('active');
            el.addClass('active');

            var pos = el.index() + 1;
            parent.find('.detail-wrapper.active').removeClass('active');
            parent.find(`.detail-wrapper:nth-of-type(${pos})`).addClass('active');
        }

        $('.interactive-list li').on('click', function() {
            makeActive($(this))
            
            //stop auto
            clearInterval(id)
        })

        //if nothing active, make first
        if ($('.interactive-list li.active').length == 0) {
            $('.interactive-list li').first().trigger('click')
        }

        //auto rotate
        var activeI = $('.interactive-list li.active').index();
        var n = $('.interactive-list li').length;
        var id = setInterval(function() {
            activeI = (activeI + 1) % n;
            makeActive($('.interactive-list li').eq(activeI))
        }, 3000)
    }


});