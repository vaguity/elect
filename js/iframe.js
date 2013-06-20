// Making iframe responsive
$(document).ready(function () {
  var contentDivWidth = $('#main article').width();
  $('#main article iframe').css('width',contentDivWidth);
});

$(window).resize(function() {
  var contentDivWidth = $('#main article').width();
  $('#main article iframe').css('width',contentDivWidth);
});