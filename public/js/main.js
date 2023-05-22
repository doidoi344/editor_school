$(window).on('load', function() {
    $('#text-container').addClass('fade-in');
  });
$(document).ready(function() {
    $('.hamburger-icon').click(function() {
      $(this).toggleClass('close');
      $('.hamburger-navigation').slideToggle();
    });
    $(document).on('click', function(event) {
      if (!$(event.target).closest('.hamburger-icon, .hamburger-navigation').length) {
        $('.hamburger-navigation').slideUp();
        $('.hamburger-icon').removeClass('close');
      }
    });
});