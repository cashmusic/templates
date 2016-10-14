/* Menu Toggle */

document.addEventListener("DOMContentLoaded", function(e) {

  var mainNav = document.getElementById('nav');
  var docBody = document.body;
  var navToggle = document.getElementById('menutoggle');

  // Establish a function to toggle the class "collapse"
  function mainNavToggle() {
      mainNav.classList.toggle('collapsed');
      docBody.classList.toggle('fullwidth');
  }

  // Add a click event to run the mainNavToggle function
  navToggle.addEventListener('click', mainNavToggle);
});
