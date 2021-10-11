$(document).ready(function() {

  var curPage = 1;
  var numOfPages = $(".skw-page").length;
  var animTime = 1000;
  var scrolling = false;
  var pgPrefix = ".skw-page-";

  function pagination() {
    scrolling = true;

    $(pgPrefix + curPage).removeClass("inactive").addClass("active");
    $(pgPrefix + (curPage - 1)).addClass("inactive");
    $(pgPrefix + (curPage + 1)).removeClass("active");

    setTimeout(function() {
      scrolling = false;
    }, animTime);
  };

  function navigateUp() {
    
    if (curPage === 1) return;
    curPage--;
    pagination();
  };

  function navigateDown() {
    
    if (curPage === numOfPages) return;
    curPage++;
    pagination();
  };

  $(document).on("mousewheel DOMMouseScroll", function(e) {
    console.log($(".skw-pages").position().top);
    console.log($(window).scrollTop());
    if (scrolling) return;
  
      if (e.originalEvent.wheelDelta > 0 || e.originalEvent.detail < 0) {
        if($(window).scrollTop() >= $(".skw-pages").position().top-1){
        if(curPage != 1){
          $('body').css({'overflow' : 'hidden'});
          $(document).bind('scroll' , function(){
          
          });
          
        }
        else{
          $(document).unbind('scroll');
          $('body').css({'overflow' : 'visible'});
        }
        navigateUp();
      }
      } else { 
        if($(window).scrollTop() >= $(".skw-pages").position().top-10){
          var a = document.createElement('a');
          a.setAttribute('href', "#scrolling");
          body.appendChild(a);
          a.click();
          body.removeChild(a);

        
        if(curPage != 5){
          $('body').css({'overflow' : 'hidden'});
          $(document).bind('scroll' , function(){
           
          });
          
        }
        else{
          $(document).unbind('scroll');
          $('body').css({'overflow' : 'visible'});
        }
  
        navigateDown();
      
      }
    }
    
   
  });

  $(document).on("keydown", function(e) {
    if (scrolling) return;
    if (e.which === 38) {
      navigateUp();
    } else if (e.which === 40) {
      navigateDown();
    }
  });

});