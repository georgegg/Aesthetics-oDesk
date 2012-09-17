$(document).ready(function(){
  $("#busy-loader").spin("large");
  $("input.currency").maskMoney({
    thousands: ',',
    decimal: '.',
    precision: 2
  });
  
  $("#subcategory").chained("#category");  
  
  // fix sub nav on scroll
  var $win = $(window)
  , $nav = $('.subnav')
  , navHeight = $('.navbar').first().height()
  , navTop = $('.subnav').length && $('.subnav').offset().top - navHeight
  , isFixed = 0

  processScroll()

  $win.on('scroll', processScroll)

  function processScroll() {
    var i, scrollTop = $win.scrollTop()
    if (scrollTop >= navTop && !isFixed) {
      isFixed = 1
      $nav.addClass('subnav-fixed')
    } else if (scrollTop <= navTop && isFixed) {
      isFixed = 0
      $nav.removeClass('subnav-fixed')
    }
  }
});

$.ajaxSetup({
  beforeSend:function(){
//    alert('starting');
    $("#busy").height($(document).height());
    $("#busy").show();
  },
  complete:function(){
//    alert('stop');
    $("#busy").hide();
  }
});
//$.ajaxSetup({
//  beforeSend:function(){
//    $(".ajaxLoader").show();
//  },
//  complete:function(){
//    $(".ajaxLoader").hide();
//  }
//});
//$(document).ajaxStart(function(){
//  //  console.log('start');
//  $('#busy').activity();
//}).ajaxStop(function(){ 
//  //  console.log('stop');
//  $('#busy').activity(false);
//});
