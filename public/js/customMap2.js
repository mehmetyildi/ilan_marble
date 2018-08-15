var mapId = "googlemaps";

var mapName = "İlan Marble";
var zoomLevel = 10;
var iconUrl = '';
var scrollable = true;
var disableDefaultUI = true;
var draggableMarker = false;
var marker;
var map;
var contentString = '<a target="_blank" class="colorLink" href="https://maps.google.com?saddr=Current+Location&daddr=37.6846086,31.7536924">Yol Tarifi</a>';
var styles = [];




function initialize() {
    var mapOptions = {
        zoom: zoomLevel,
        scrollwheel: scrollable,
        center: new google.maps.LatLng(37.6846086,31.7536924),
        mapTypeControlOptions: {
            mapTypeIds: [mapName]
        },
        disableDefaultUI: disableDefaultUI,
        panControl: false,
        zoomControl: true,
        scaleControl: true
    };
    var div = document.getElementById(mapId);
    var map = new google.maps.Map(div, mapOptions);
    var styledMapType = new google.maps.StyledMapType(styles, { name: mapName });
    map.mapTypes.set(mapName, styledMapType);
    map.setOptions({styles: styles});



    /***************** MARKER *********************************/
    marker = new google.maps.Marker({
        map:map,
        draggable:draggableMarker,
        icon: iconUrl,
        animation: google.maps.Animation.DROP,
        position: new google.maps.LatLng(37.6846086,31.7536924)
    });
    // google.maps.event.addListener(marker, 'click', toggleBounce);

    /***************** INFO WINDOW *********************************/
      var infowindow = new google.maps.InfoWindow({
          content: contentString
      });


      infowindow.open(map,marker); 


    
}



function toggleBounce() {
    if (marker.getAnimation() != null) {
        marker.setAnimation(null);
    } else {
        marker.setAnimation(google.maps.Animation.BOUNCE);
    }
}
google.maps.event.addDomListener(window, 'load', initialize());