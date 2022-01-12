$('.slidder').each(function() {
  var $this = $(this);
  var $group = $this.find('.slidde_group');
  var $sliddes = $this.find('.slidde');
  var bulletArray = [];
  var currentIndex = 0;
  var timeout;
  
  function move(newIndex) {
    var animateLeft, sliddeLeft;
    
    advance();
    
    if ($group.is(':animated') || currentIndex === newIndex) {
      return;
    }
    
    bulletArray[currentIndex].removeClass('active');
    bulletArray[newIndex].addClass('active');
    
    if (newIndex > currentIndex) {
      sliddeLeft = '100%';
      animateLeft = '-100%';
    } else {
      sliddeLeft = '-100%';
      animateLeft = '100%';
    }
    
    $sliddes.eq(newIndex).css({
      display: 'block',
      left: sliddeLeft
    });
    $group.animate({
      left: animateLeft
    }, function() {
      $sliddes.eq(currentIndex).css({
        display: 'none'
      });
      $sliddes.eq(newIndex).css({
        left: 0
      });
      $group.css({
        left: 0
      });
      currentIndex = newIndex;
    });
  }
  
  function advance() {
    clearTimeout(timeout);
    timeout = setTimeout(function() {
      if (currentIndex < ($sliddes.length - 1)) {
        move(currentIndex + 1);
      } else {
        move(0);
      }
    }, 8000);
  }
  
  $('.next_btn').on('click', function() {
    if (currentIndex < ($sliddes.length - 1)) {
      move(currentIndex + 1);
    } else {
      move(0);
    }
  });
  
  $('.previous_btn').on('click', function() {
    if (currentIndex !== 0) {
      move(currentIndex - 1);
    } else {
      move(3);
    }
  });
  
  $.each($sliddes, function(index) {
    var $button = $('<a class="slidde_btn">&bull;</a>');
    
    if (index === currentIndex) {
      $button.addClass('active');
    }
    $button.on('click', function() {
      move(index);
    }).appendTo('.slidde_buttons');
    bulletArray.push($button);
  });
  
  advance();
});