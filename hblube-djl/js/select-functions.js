(function($) {


$('#type').change(function() {
    var opval = $(this).val();
    if(opval){
        $("#select-fade").addClass("select-fade");
        $("#close").addClass("visible");
        $('.home-hero-products').show();
    }
});

$(document).ready(function(){
    $(".button").click(function(){
        $("#select-fade").removeClass("select-fade");
        $("#close").removeClass("visible");
        $('.home-hero-products').hide();
    });
});


})(jQuery);



