//--------------- command slider1(start)  ---------------//

$slick = false;
function withSlider(){    
	if($(window).width() < 1101){
		if(!$slick){
			$(".command__block").slick({
				dots: false,
				infinite: false,
				speed: 500,
				slidesToShow: 2,
				centerPadding: '40px',
				centerMode: true,
				responsive: [
					{
					breakpoint: 540,
					settings: {
						slidesToShow: 1,
						centerPadding: '16px',
					}
					},
				]
			});
			$slick = true;
		}
	} else if($(window).width() > 1101){
		if($slick){
			$('.command__block').slick('unslick');
			$slick = false;
		}
	}
};

$(document).ready(function(){
	withSlider();
});
$(window).on('resize', function(){
	withSlider();
});


//--------------- command slider1(end)  ---------------//