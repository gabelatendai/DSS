$(function(){
	var width = 720;
	var animationSpeed = 1000;
	var pause = 1000;
	var currentSlide =1;
	
	var $slider = $('#slider');
	var $slideContainer = $slider.find('.slides');
		var $slides = $slideContainer.find('.slide');
 
 var Interval;
 
 function startSlider(){
  Interval = setInterval(function(){
		$slideContainer.animate({'marginLeft': '-='+width},animationSpeed, function(){
		currentSlide++;
		if (currentSlide=== $slides.length) {
			currentSlide = 1 ;
			$slideContainer.css('margin-left',0);
			
			}
		
	});
		
		},pause);
 }
  function stopSlider(){
	  clearInterval(Interval);
	  
	  }
	  $slider.on('mouseenter',stopSlider).on('mouseleave',startSlider);
	  startSlider();
});