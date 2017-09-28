<?php
/*							-------SET THIS---------
*****************************************************************************
*/
		$location = get_field('location_field_name');  //advanced custom field type = google map
/*
*****************************************************************************
* any html inside the div.marker will become a pop-up
* optionally create sveral markers with a foreach loop.
* optionally un-comment line 79 and edit lines 72-
* Create custom marker image, place in theme folder: /img/marker.png
*/

		if( !empty($location) ):
		?>
      <div class="acf-map" style="height: 350px">
				<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
	    </div>
		<?php endif; ?>


<?php
// creates custom map 
?>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<script>
	jQuery(document).ready(function($) {
    // Inside of this function, $() will work as an alias for jQuery()
    // and other libraries also using $ will not be accessible under this shortcut

/*
*  render_map
*
*  This function will render a Google Map onto the selected jQuery element
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	$el (jQuery element)
*  @return	n/a
*/

function render_map( $el ) {

	// var
	var $markers = $el.find('.marker');

	// vars
	var args = {
		zoom		: 16,
		scrollwheel: false,
		center		: new google.maps.LatLng(0, 0),
		mapTypeId	: google.maps.MapTypeId.ROADMAP
	};

	// create map	        	
	var map = new google.maps.Map( $el[0], args);

	// add a markers reference
	map.markers = [];

	// add markers
	$markers.each(function(){

    	add_marker( $(this), map );

	});

var styles = []; // https://snazzymaps.com/  add exported styles (replace empty array [] with copied JSON)

// adds custom styling to map, int this case the map is desaturated to grayscale
map.setOptions({styles: styles});



	// center map
	center_map( map );

}

/*
*  add_marker
*
*  This function will add a marker to the selected Google Map
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	$marker (jQuery element)
*  @param	map (Google Map object)
*  @return	n/a
*/

function add_marker( $marker, map ) {

	// var
	var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );
	var myIcon = new google.maps.MarkerImage("<?php echo get_template_directory_uri(); ?>/img/marker.png", null, null, null, new google.maps.Size(44,44));
	// create marker
	var marker = new google.maps.Marker({
		position	: latlng,
		map			: map,
		icon		: myIcon
	});

	// add to array
	map.markers.push( marker );

	// if marker contains HTML, add it to an infoWindow
	if( $marker.html() )
	{
		// create info window
		var infowindow = new google.maps.InfoWindow({
			content		: $marker.html()
		});

		// show info window when marker is clicked
		google.maps.event.addListener(marker, 'click', function() {

			infowindow.open( map, marker );

		});
	}

}

/*
*  center_map
*
*  This function will center the map, showing all markers attached to this map
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	map (Google Map object)
*  @return	n/a
*/

function center_map( map ) {

	// vars
	var bounds = new google.maps.LatLngBounds();

	// loop through all markers and create bounds
	$.each( map.markers, function( i, marker ){

		var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

		bounds.extend( latlng );

	});

	// only 1 marker?
	if( map.markers.length == 1 )
	{
		// set center of map
	    map.setCenter( bounds.getCenter() );
	    map.setZoom( 14 );
	}
	else
	{
		// fit to bounds
		map.fitBounds( bounds );
	}

}
	// loads the map into the widget's div when the map-hint text is clicked
	// marker lat and lng are set in the widget
    
    	$('.acf-map').each(function(){
			render_map( $(this) );
		});

});
</script>