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
	// 	var phoneLink = $('a.phone-link');
	//  // phoneLink.popover(); // option 1 - initialize popover	
	// 	phoneLink.on('click', function(e){
	// 			e.preventDefault();
	// 			// here is where you do the alternate action
	//      // option 1 - do nothing, popover displays data-content
	//      // option 2 - toggle a class to some div or li to un-hide phone as text
	// 	});
	// }

$(function() {
    $('#choose').hide();	
    $('#1123').hide();
    $('#1196').hide();  
    $('#type').change(function(){
        if($('#type').val() == 'choose') {
            $('#choose').show(); 
        } else {
            $('#choose').hide(); 
        }     	
        if($('#type').val() == '1123') {
            $('#1123').show(); 
        } else {
            $('#1123').hide(); 
        } 
        if($('#type').val() == '1196') {
            $('#1196').show(); 
        } else {
            $('#1196').hide(); 
        }         
    });
});

$('#billing_phone').change(function() {
    $('#account_password').val($(this).val());

});
$("#locations").change(function () {
            var id = $(this).val(); 
            $("#order-location").val($("#locations option:selected").text());
        });

})(jQuery);



