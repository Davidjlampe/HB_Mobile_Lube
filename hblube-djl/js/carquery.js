(function($) {


$(document).ready(
function()
{
     //Create a variable for the CarQuery object.  You can call it whatever you like.
     var carquery = new CarQuery();

     //Run the carquery init function to get things started:
     carquery.init();
     
     //Optionally, you can pre-select a vehicle by passing year / make / model / trim to the init function:
     //carquery.init('2000', 'dodge', 'Viper', 11636);

     //Optional: Pass sold_in_us:true to the setFilters method to show only US models. 
     carquery.setFilters( {sold_in_us:true} );

     //Optional: initialize the year, make, model, and trim drop downs by providing their element IDs
     carquery.initYearMakeModelTrim('car-years', 'car-makes', 'car-models', 'car-model-trims');

     //Optional: set the onclick event for a button to show car data.
     $('#cq-show-data').click(  function(){ carquery.populateCarData('car-model-data'); } );

     //Optional: initialize the make, model, trim lists by providing their element IDs.
     //carquery.initMakeModelTrimList('make-list', 'model-list', 'trim-list', 'trim-data-list');

     //Optional: set minimum and/or maximum year options.
     carquery.year_select_min=1990;
     //carquery.year_select_max=1999;
 


     //If creating a search interface, set onclick event for the search button.  Make sure the ID used matches your search button ID.
     $('#cq-search-btn').click( function(){ carquery.search(); } );
});


//var mycaryeartextbox = document.getElementById('car-year');
//var mycarmaketextbox = document.getElementById('car-make');
//var mycarmodeltrimtextbox = document.getElementById('car-model-trim');
//var mycaryeardropdown = document.getElementById('car-years');
//var mycarmakedropdown = document.getElementById('car-makes');
//var mycarmodeldropdown = document.getElementById('car-models');
//var mycarmodeltrimdropdown = document.getElementById('car-model-trims');

//mycaryeardropdown.onchange = function(){
//     mycaryeartextbox.value = mycaryeartextbox.value  + this.value;
//}
//mycarmakedropdown.onchange = function(){
//     mycarmaketextbox.value = mycarmaketextbox.value  + this.value;
//}
//mycarmodeldropdown.onchange = function(){
//     mycarmodeltextbox.value = mycarmodeltextbox.value  + this.value;
//}
//mycarmodeltrimdropdown.onchange = function(){
//   mycarmodeltrimtextbox.value = mycarmodeltrimtextbox.value  + this.value;
//}
$("#car-years").change(function () {
			var id = $(this).val(); 
			$("#car-year").val($("#car-years option:selected").text());
		});

$("#car-makes").change(function () {
			var id = $(this).val(); 
			$("#car-make").val($("#car-makes option:selected").text());
		});

$("#car-models").change(function () {
			var id = $(this).val(); 
			$("#car-model").val($("#car-models option:selected").text());
		});


$("#car-model-trims").change(function () {
			var id = $(this).val(); 
			$("#car-model-trim").val($("#car-model-trims option:selected").text());
		});


////////////////////////////////////////////////////////////////////
//////// Change values on my-account
////////////////////////////////////////////////////////////////////



$("#car-years").change(function () {
               var id = $(this).val(); 
               $("#car-year").val($("#car-years option:selected").text());
          });

$("#car-makes").change(function () {
               var id = $(this).val(); 
               $("#car-make").val($("#car-makes option:selected").text());
          });

$("#car-models").change(function () {
               var id = $(this).val(); 
               $("#car-model").val($("#car-models option:selected").text());
          });


$("#car-model-trims").change(function () {
               var id = $(this).val(); 
               $("#car-model-trim").val($("#car-model-trims option:selected").text());
          });


})(jQuery);



