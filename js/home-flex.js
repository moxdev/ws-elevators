


$(window).load(function() {
	$('.flexslider').prepend('<p id="flex-index"></p>');
    $('.flexslider').flexslider({
        animation: "slide",
        direction: "vertical",
        controlNav: false,
        directionNav: true,
        slideshowSpeed: 10000,
        startAt: 0,
        slideshow: false,
        //controlsContainer: ".flex-container",
        start: function(slider) {
            slider.find('#flex-index').html(slider.currentSlide + 1);
        },
        after: function(slider) {
            slider.find('#flex-index').html(slider.currentSlide + 1);
        }
    });
});

//var index = $('li:has(.flex-active)').index('.flex-control-nav li')+1;
