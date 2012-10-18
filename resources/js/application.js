$(document).ready(function(){
  
  $("a[rel=tooltip]").tooltip();
  $("span[rel=tooltip]").tooltip();
  $("abbr[rel=tooltip]").tooltip();
  $("a[rel=popover]").popover();
  $("span[rel=popover]").popover();
  $("abbr[rel=popover]").popover();

  $("#busy-loader").spin("large");
  
  $('.datepicker').datepicker();
  
  $("input.currency").maskMoney({
    thousands: ',',
    decimal: '.',
    precision: 2
  });
  
  $("#subcategory").chained("#category");  
  
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
  $('#myModal').on('shown', function () {
    $("#busy").hide();
  });
  $('body').on('hidden', '.modal', function () {
    $(this).removeData('modal');
    $('#myModal').find('.modal-body').empty();
  });
});

$.ajaxSetup({
  beforeSend:function(){
    $("#busy").height($(document).height());
    $("#busy").show();
  },
  complete:function(){
    $("#busy").hide();
    $("a[rel=tooltip]").tooltip();
    $("span[rel=tooltip]").tooltip();
    $("abbr[rel=tooltip]").tooltip();
    $("a[rel=popover]").popover();
    $("span[rel=popover]").popover();
    $("abbr[rel=popover]").popover();
  }
});