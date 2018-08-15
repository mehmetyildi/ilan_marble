var mapId = "googlemaps";

var mapName = "İlan Marble";
var zoomLevel = 9;
var iconUrl = '';
var scrollable = false;
var disableDefaultUI = false;
var draggableMarker = false;
var marker;
var map;

var styles = [];




function initialize(lati,longi) {
    var contentString = '<a target="_blank" class="colorLink" href="https://maps.google.com?saddr=Current+Location&daddr='+lati+','+longi+'">'+getDirections+'</a>';
    var latitude = lati;
    var longitude = longi;
    var mapOptions = {
        zoom: zoomLevel,
        scrollwheel: scrollable,
        center: new google.maps.LatLng(latitude,longitude),
      
        disableDefaultUI: disableDefaultUI,
        panControl: false,
        zoomControl: true,
        scaleControl: true,
        mapTypeControl: true
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
        position: new google.maps.LatLng(latitude,longitude)
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
var latitude = $('#googlemaps').data('lat');
var longitude = $('#googlemaps').data('long');
google.maps.event.addDomListener(window, 'load', initialize(latitude,longitude));

$('.mapLink').click(function(){
    $('.singleLocation.active').removeClass('active');
    $(this).parents('.singleLocation').addClass('active');
    var lati = $(this).data('lat');
    var longi = $(this).data('long');
    initialize(lati,longi);
    $('body,html').scrollTo(0, 300, {offset: {top:0,} });
});