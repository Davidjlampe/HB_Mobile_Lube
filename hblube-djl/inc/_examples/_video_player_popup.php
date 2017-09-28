<?php 
/*
* ******************** Easy Youtube Popup ************************
*/
?>
<?php // place the following in your editor-style.css  to let wordpress users give links a class of youtube

// 			a.youtube {
// 				color: red;
// 			}

?>



<?php 
// place everthing below this comment in your footer before the </body> tag  
// or just make this whole file an include with get_template_part('inc/video_player_popup');
?>

<script>

	// BEGIN youtube function
	(function($) {
		$(document).ready(function() {
			
			$('.youtube').on('click', function(e){ // when you click on a link with a class of youtube 
				e.preventDefault();  // don't go to the youtube page
				youtubePopup(this); // instead do the youtube function below
			}); 

		});

		function youtubePopup(link){
			link = $(link).attr('href').replace('//youtu.be/','//www.youtube.com/embed/');
			// changes the link url to an embed url
			$('#videoModal').find('.modal-content').html('<iframe width="600" height="420" src="'+link+'" frameborder="0" allowfullscreen></iframe>');
			// places the iframe in the modal
			$('#videoModal').modal('show');
			// pops the modal up
		}

	})(jQuery);
	// END youtube function

</script>

<div id="videoModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
    </div>
  </div>
</div>