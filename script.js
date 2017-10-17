$(document).ready(function(){
  var scrollTop = 0;
  $(window).scroll(function(){
    scrollTop = $(window).scrollTop();
     $('.counter').html(scrollTop);
    
    if (scrollTop >= 100) {
     	$('nav.large').addClass('small');
		$('#bookclublogo').addClass('small');
		$('ul.navlist').addClass('small');
    } else if (scrollTop < 100) {
      	$('nav.large').removeClass('small');
		$('#bookclublogo').removeClass('small');
		$('ul.navlist').removeClass('small');
    } 
    
  }); 
  
});