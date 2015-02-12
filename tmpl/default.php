<?php
defined('_JEXEC') or die;
$coordinates = $params->get('coordinates','21.033672, 105.849667');
$color       = $params->get('color','#21C2F8');
?>
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<div id="map"></div>
<script type="text/javascript">
    var locations = [
//		['<div class="infobox"></div>', -37.801578, 145.060508, 2]
        ['<div class="infobox"></div>', <?php echo $coordinates;?>, 2]
    ];

    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 10,
        scrollwheel: false,
        navigationControl: true,
        mapTypeControl: false,
        scaleControl: false,
        draggable: true,
        styles: [ { "stylers": [ { "hue": "<?php echo $color;?>" }, { "gamma": 1 } ] } ],
//			center: new google.maps.LatLng(-37.801578, 145.060508),
        center: new google.maps.LatLng(<?php echo $coordinates;?>),
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {

        marker = new google.maps.Marker({
            position: new google.maps.LatLng(locations[i][1], locations[i][2]),
            map: map ,
            icon: '<?php echo $url = JURI::base();?>/modules/mod_tz_google_map/images/marker.png'
        });


        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infowindow.setContent(locations[i][0]);
                infowindow.open(map, marker);
            }
        })(marker, i));
    }
</script>