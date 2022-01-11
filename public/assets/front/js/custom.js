
$(document).ready(function(){
	$(window).scroll(function () {
	if ($(this).scrollTop() > 50) {
		$('#back-to-top').fadeIn();
	} else {
		$('#back-to-top').fadeOut();
	}
});
// scroll body to 0px on click
$('#back-to-top').click(function () {
	$('body,html').animate({
		scrollTop: 0
	}, 400);
	return false;
});
});

new WOW().init();

$('#homeSlider').owlCarousel({
	loop:true,
	dots:true,
	nav:false,
	autoplay:true,
	autoplayTimeout:4500,
    smartSpeed: 500,
	autoplayHoverPause: false,
	responsive:{
		0:{
			items:1
		},
		600:{
			items:1
		},
		1000:{
			items:1
		}
	}
})

$('#serviceSlider').owlCarousel({
    margin:30,
    loop:true,
    dots:true,
    nav:false,
    smartSpeed:1000,
    autoplay:true,
    autoplayTimeout:2500,
    autoplayHoverPause: true,
    navText: ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
    responsive:{
        0:{
            items:1
        },
        600:{
        	nav:false,
            items:2
        },
        1000:{
            items:3
        }
    }
})

$('#teamSlider').owlCarousel({
    margin:30,
    loop:true,
    dots:true,
    nav:false,
    smartSpeed:1000,
    autoplay:true,
    autoplayTimeout:2500,
    autoplayHoverPause: true,
    navText: ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
    responsive:{
        0:{
            items:1
        },
        600:{
            nav:false,
            items:2
        },
        1000:{
            items:3
        }
    }
})

$('#projectSlider').owlCarousel({
    margin:30,
    loop:true,
    dots:true,
    nav:false,
    smartSpeed:1000,
    autoplay:true,
    autoplayTimeout:2500,
    autoplayHoverPause: true,
    navText: ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
    responsive:{
        0:{
            items:1
        },
        600:{
            nav:false,
            items:2
        },
        1000:{
            items:3
        }
    }
})


$('#brandSlider').owlCarousel({
    margin:25,
    loop:true,
    dots:false,
    nav:true,
    smartSpeed:1000,
    autoplay:true,
    autoplayTimeout:2000,
    autoplayHoverPause: true,
    navText: ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
    responsive:{
        0:{
            items:2
        },
        600:{
        	nav:false,
            items:3
        },
        1000:{
            items:4
        }
    }
})

$('#testimonialSlider').owlCarousel({
    margin:25,
    loop:true,
    dots:true,
    nav:false,
    autoplay:false,
    autoplayTimeout:3000,
    autoplayHoverPause: true,
    navText: ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:3
        }
    }
})