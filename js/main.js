$(document).ready(function(){
	var nav = $('.navbar-fixed-top');
	var distance = $('.navbar-fixed-top').offset();
	if(distance.top>=300){
		nav.addClass('effect');
		$('#logo-min').css({'display': 'block'});
	}
	$(window).scroll(function(){
		var scroll=$(window).scrollTop();
		if(scroll>=250){
			nav.addClass('effect');
			$('#logo-min').css({'opacity':1});
		}else{
			nav.removeClass('effect');
			$('#logo-min').css({'opacity':0});
		}
	});
	var circle=new jCircle({
		'container': 'circles-container',
		'circle': 'circle',
		'mainContent':'main-circle-content',
		'animateCircles':true,
		'speed':3,
		'mainViewStyle':'normal',
		'minCirclesEffectOver':'pulse',
		'contentType':'images',
		'stopOnOverMain':false,
		'mainContentOverAction':'normal'
	});
	circle.create();
	
	var textCircle=new jCircle({
		'container': 'circles-container-text',
		'circle': 'circle-text',
		'mainContent':'main-circle-content-text',
		'animateCircles':true,
		'speed':3,
		'mainViewStyle':'normal',
		'minCirclesEffectOver':'rotate',
		'contentType':'text',
		'stopOnOverMain':true
	});
	textCircle.create();
	$('#about .blue-circle').waypoint(function(){
		$('#about .blue-circle').addClass('animated fadeInUp');
	},{
		offset:'50%'
	});

});

smoothScroll.init({
	speed:1000,
	easing:'easeInOutQuad',
	updateURL:false,
	offset:0
});