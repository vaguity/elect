// Making iframe responsive
$(document).ready(function () {
  var iframeWidth = $('iframe').width();
  var contentDivWidth = $('#main article').width();
  console.log(contentDivWidth);
  $('iframe').css('width',contentDivWidth);
});

$(window).resize(function() {
  var iframeWidth = $('iframe').width();
  var contentDivWidth = $('#main article').width();
  console.log(contentDivWidth);
  $('iframe').css('width',contentDivWidth);
});