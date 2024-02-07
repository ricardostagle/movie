(function ($) {
  Drupal.behaviors.movie = {
    attach: function(context, settings) {
      $('input[type="submit"]').attr('disabled','disabled');
      $(".form-date").change(function() {
        var string_date = $(this).val();
        var myDate = string_date.split("-");
        var newDate = new Date( myDate[0], myDate[1] - 1, myDate[2]);
        var current_date = Date.now();
      	if(newDate.getTime() > current_date){
          $(this).css("border", "2px solid #F00");
          $('input[type="submit"]').attr('disabled','disabled');
        }else{
          $(this).css("border", "1px solid #333");
          $('input[type="submit"]').removeAttr('disabled');
        }
      });
    }
  };
}(jQuery));
