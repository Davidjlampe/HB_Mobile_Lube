(function($) {
  // Inside of this function, $() will work as an alias for jQuery()
  // and other libraries also using $ will not be accessible under this shortcut


 //  //examples
    // $(document).ready(function() {
    //     // any function placed here will be called when the DOM is ready
    // });
    // $(window).load(function() {
    //     // any function placed here will be called when the all elements on the page have loaded
    // });


    //// prevent non-phone browsers from following tel: links
    // if( ! /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
    //  var phoneLink = $('a.phone-link');
    //  // phoneLink.popover(); // option 1 - initialize popover    
    //  phoneLink.on('click', function(e){
    //          e.preventDefault();
    //          // here is where you do the alternate action
    //      // option 1 - do nothing, popover displays data-content
    //      // option 2 - toggle a class to some div or li to un-hide phone as text
    //  });
    // }



$('#billing_phone').change(function() {
    $('#account_password').val($(this).val());

});
$("#locations").change(function () {
            var id = $(this).val(); 
            $("#order-location").val($("#locations option:selected").text());
        });



$(document).ready(function() {
  $('.collapse.in').prev('.panel-heading').addClass('active');
  $('#accordion, #bs-collapse')
    .on('show.bs.collapse', function(a) {
      $(a.target).prev('.panel-heading').addClass('active');
    })
    .on('hide.bs.collapse', function(a) {
      $(a.target).prev('.panel-heading').removeClass('active');
    });
});


})(jQuery);



