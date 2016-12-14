(function ($, Drupal) {
  Drupal.behaviors.match_height = {
    attach: function (context) {
      
      // Adds match height.
      $('.match-height').matchHeight();
      
    }
  };
})(jQuery, Drupal);
