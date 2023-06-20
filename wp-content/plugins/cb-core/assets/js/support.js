;(function($) {
  $("[data-background]").each(function () {
    $(this).css("background-image", "url(" + $(this).attr("data-background") + ") ")
  })
  // data background color
  $("[data-bgcolor]").each(function () {
    $(this).css("background-color", $(this).attr("data-bg-color"))
  })
})(jQuery);