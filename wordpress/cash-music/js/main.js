$( document ).ready(function() {

/* Menu Toggle */
$( ".menu-toggle" ).click(function() {
  $('body').toggleClass('shownav')
});

/* Search Toggle */
$( ".search-toggle, #search-wrap .close" ).click(function() {
  $('body').toggleClass('find')
});

/* Sticky Sidebar */
$("#sidebar").sticky({topSpacing:0});

/* Homepage Feature Carousel */
$('#featured .inner').slick();

if ($(document).scrollTop() <= "50"){
  $('body').addClass('top');
}

/* Detect Scroll Up */   
 var lastScrollTop = 0;
  $(window).scroll(function(event){
   var st = $(this).scrollTop();
   if (st > lastScrollTop){
       $('body').removeClass('top');
   } 
   else if ( st < 50 ){
      $('body').addClass('top');
   }else {
      //up scroll
   }
   lastScrollTop = st;
});

});
