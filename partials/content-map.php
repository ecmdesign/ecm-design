<?php
/**
 * The template used for displaying Google Maps
 *
 * @package ecm-bootstrap
 */
?>

<?php /* Location Setup */
$google_map = get_field( 'google_map' );
$address = $google_map['address'];
$latitude = $google_map['lat'];
$longitude = $google_map['lng'];
// variables for info window
$business = get_bloginfo( 'name' );
$s_address = get_theme_mod( 'street_address' );
$city_state = get_theme_mod( 'city_state_zip' );
$link_slug = _s_map_link_slug( $s_address, $city_state ); ?>

<!-- Google Map -->
<div class="col-sm-6">
	<div id="map" class="google-map" style="width: 100%; height: 358px;"></div>

	<form class="map-search" method="get" action="//maps.google.com/maps" target="_blank">
		<input type="text" name="saddr" placeholder="Where are you?" />
		<input type="submit" name="submit" value="" />
		<input type="hidden" name="daddr" value="<?php echo $link_slug; ?>" />
	</form>
</div>

<script src="//maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script>
<script type="text/javascript">
//<![CDATA[
function _s_google_map() {
	var lat = <?php echo $latitude; ?>;
	var lng = <?php echo $longitude; ?>;
	// coordinates to latLng
	var latlng = new google.maps.LatLng(lat, lng);
	// map options
	var myOptions = {
		zoom: 15,
		center: latlng,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		scrollwheel: false
	};
	//draw a map
	var map = new google.maps.Map(document.getElementById("map"), myOptions);
	var marker = new google.maps.Marker({
		position: map.getCenter(),
		map: map
	});
	var contentString = '<div id="content">'+
		'<h3>'+'<a href="https://www.google.com/maps/place/<?php echo urlencode( $address ); ?>" target="_blank">'+
		'<?php echo $business; ?>'+
		'</a>'+'</h3>'+
		'<span>'+'<?php echo $s_address; ?>'+'</span>'+
		'<span>'+'<?php echo $city_state; ?>'+'</span>'+
		'</div>';
	var infowindow = new google.maps.InfoWindow({
		content: contentString
	});
	google.maps.event.addListener(marker, 'click', function() {
		infowindow.open(map,marker);
	});
	infowindow.open(map,marker);
}
// load the map
_s_google_map();
//]]>
</script>
