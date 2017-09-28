<?php 
/*
* ******************** Example Text Modal ************************
*/

//  *****   Add to plugins/djl-shortcodes/shortcodes.php **********/
//  change the word 'bio' to whatever you want to call it



//***************  BEGIN ******************/
// function bio_shortcode( $atts, $content = null ) {
//      extract( shortcode_atts( array(
//         'id' => '',
//         ), $atts ) );
//      return '<div id="'. $atts['id'] .'" class="modal fade">
//   <div class="modal-dialog">
//     <div class="modal-content">
      
//       <div class="modal-body">
//        '. do_shortcode($content) .'
//       </div>
//       <div class="modal-footer">
//         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
//       </div>
//     </div><!-- /.modal-content -->
//   </div><!-- /.modal-dialog -->
// </div><!-- /.modal -->';
// }
// add_shortcode('bio', 'bio_shortcode');  //popup bio


//***************  END ******************/

?>
 

<?php 
//  add to editor-style.css
//  .popup-toggle {
//	  color: green;
//  }

// place everthing below this comment in your footer before the </body> tag  
// or take out the script tag and put in main.js;
?>

<script>

	// BEGIN popup function
		jQuery(document).ready(function($) {  // when the DOM is ready

		    $('.popup-toggle').on('click', function(e){ 	// when someone clisck a link with a class of popup-toggle
		      e.preventDefault(); 												// don't follow the link
		      var popupId = $(this).attr('href');  				// get the id from the link's href
		      $(popupId).modal('show');  									// toggle the popup with that id
		    });

		});
	// END popup function

</script>
