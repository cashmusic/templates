$( document ).ready(function() {
    console.log( "ready!" );


/* Detect Scroll Up */   

 var lastScrollTop = 0;
  $(window).scroll(function(event){
   var st = $(this).scrollTop();
   if (st > lastScrollTop){
       $('body').addClass('up');
   } 
   else if ( st < 50 ){
      $('body').removeClass('up');
   }else {
      //up scroll
   }
   lastScrollTop = st;
});

/* Menu Toggle */
$( ".menu-toggle" ).click(function() {
  $('body').toggleClass('show')
});

/* Menu Toggle */
$( ".search-toggle, #search-wrap .close" ).click(function() {
  $('body').toggleClass('find')
});

/* Sticky Sidebar */
$("#sidebar").sticky({topSpacing:0});

/* Homepage Feature Carousel */
$('#featured').slick();

});
