(function($) {
	$(".centers-point-item").on("click", function(e) {
		var $holder = $(this).closest(".centers-point-item-holder");
		$holder.toggleClass("active");
	});
	$('.home-header-bg').slick({
		arrows: false,
		dots: false,
		fade: true,
		autoplay: true,
		pauseOnHover: false,
		speed: 1000
	});

	$('.home-header-bg').on('afterChange', function(event, slick, currentSlide, nextSlide){
	  console.log(currentSlide);
	  $('.home-header-bg .slick-slide').removeClass('animated');
	  $('.home-header-bg .slick-slide[data-slick-index="'+ currentSlide +'"]').addClass('animated');
	});


})(jQuery);