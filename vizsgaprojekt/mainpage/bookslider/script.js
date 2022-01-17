$(document).ready(function() {
  var getslideHeight = $('.slide.active').height();

  $('.slides').css({
    height: getslideHeight
  });

  function calcslideHeight() {
    getslideHeight = $('.slide.active').height();

    $('.slides').css({
      height: getslideHeight
    });
  }

  function animateContentColor() {
    var getslideColor = $('.slide.active').attr('slide-color');

    $('body').css({
      background: getslideColor
    });

    $('.title').css({
      color: getslideColor
    });

    $('.btn').css({
      color: getslideColor
    });
  }

  var slideItem = $('.slide'),
    slideCurrentItem = slideItem.filter('.active');

  $('#next').on('click', function(e) {
    e.preventDefault();

    var nextItem = slideCurrentItem.next();

    slideCurrentItem.removeClass('active');

    if (nextItem.length) {

      slideCurrentItem = nextItem.addClass('active');
    } else {
      slideCurrentItem = slideItem.first().addClass('active');
    }

    calcslideHeight();
    animateContentColor();
  });

  $('#prev').on('click', function(e) {
    e.preventDefault();

    var prevItem = slideCurrentItem.prev();

    slideCurrentItem.removeClass('active');

    if (prevItem.length) {
      slideCurrentItem = prevItem.addClass('active');
    } else {
      slideCurrentItem = slideItem.last().addClass('active');
    }

    calcslideHeight();
    animateContentColor();
  });
});