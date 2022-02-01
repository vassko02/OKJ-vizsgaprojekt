$(document).ready(function () {

  var slideItem = $('.slide'), slideCurrentItem = slideItem.filter('.active');
  var slideSzovegItem = $('.slideszoveg'), slideCurrentSzoveg = slideSzovegItem.filter('.active');

  $('#next').on('click', function (e) {
    e.preventDefault();

    var nextItem = slideCurrentItem.next();
    var nextSzoveg = slideCurrentSzoveg.next();

    slideCurrentItem.removeClass('active');
    slideCurrentSzoveg.removeClass('active');

    if (nextItem.length) {

      slideCurrentItem = nextItem.addClass('active');
      slideCurrentSzoveg = nextSzoveg.addClass('active');
    } else {
      slideCurrentItem = slideItem.first().addClass('active');
      slideCurrentSzoveg = slideSzovegItem.first().addClass('active');
    }

  });

  $('#prev').on('click', function (e) {
    e.preventDefault();

    var prevItem = slideCurrentItem.prev();
    var prevSzovegItem = slideCurrentSzoveg.prev();

    slideCurrentItem.removeClass('active');
    slideCurrentSzoveg.removeClass('active');

    if (prevItem.length) {
      slideCurrentItem = prevItem.addClass('active');
      slideCurrentSzoveg = prevSzovegItem.addClass('active');
    } else {
      slideCurrentItem = slideItem.last().addClass('active');
      slideCurrentSzoveg = slideSzovegItem.last().addClass('active');
    }

  });
});