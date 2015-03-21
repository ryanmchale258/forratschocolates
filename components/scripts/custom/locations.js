var locationsScript = function(){

  var map;

  var json = $.ajax({
      url: base_url + 'index.php/locations/mapdata',
      type: 'GET',
      dataType: 'json',
      success: function (data){
      initialize(data);
          }
    });

  function initialize(data) {
    
    // Giving the map some options
    var mapOptions = {
      //zoom 9 is nicer for desktop sizes, zoom 8 works better on mobile
      zoom: 9,
      center: new google.maps.LatLng(43.112736, -80.704723),
      styles: [{"featureType":"administrative","elementType":"labels.text","stylers":[{"color":"#b72025"}]},{"featureType":"administrative","elementType":"labels.text.stroke","stylers":[{"saturation":"-100"},{"lightness":"100"},{"weight":"10.00"},{"visibility":"on"},{"hue":"#ff0000"},{"gamma":"0.00"}]},{"featureType":"landscape.natural","elementType":"geometry","stylers":[{"color":"#cac1c1"},{"lightness":33},{"visibility":"off"}]},{"featureType":"landscape.natural.landcover","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"all","stylers":[{"saturation":"-100"},{"lightness":"-2"},{"hue":"#ff0000"},{"gamma":"5.72"}]},{"featureType":"poi","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#ebe1e1"},{"visibility":"simplified"}]},{"featureType":"poi.sports_complex","elementType":"geometry","stylers":[{"saturation":-100},{"lightness":-100},{"visibility":"off"}]},{"featureType":"poi.sports_complex","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#b72025"}]},{"featureType":"road","elementType":"labels.icon","stylers":[{"visibility":"on"},{"saturation":-100}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"lightness":-100},{"visibility":"on"},{"color":"#f3eaea"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#b72025"},{"visibility":"on"}]},{"featureType":"road.highway","elementType":"labels.text.fill","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"labels.text.stroke","stylers":[{"weight":0.1},{"visibility":"off"}]},{"featureType":"road.highway","elementType":"labels.icon","stylers":[{"invert_lightness":true},{"lightness":-4},{"saturation":-90},{"visibility":"on"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"road.local","elementType":"geometry.fill","stylers":[{"saturation":-100},{"lightness":-14}]},{"featureType":"road.local","elementType":"labels.text","stylers":[{"visibility":"on"},{"saturation":-100},{"lightness":13}]},{"featureType":"road.local","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"labels.icon","stylers":[{"saturation":-100}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#b72025"}]},{"featureType":"water","elementType":"geometry.stroke","stylers":[{"saturation":-100},{"lightness":-100},{"weight":0.2}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"saturation":-100},{"lightness":-100}]}]
      };

      // Creating the map
    map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
    
    // Looping through all the entries from the JSON data
    for(var i = 0; i < data.length; i++) {
      
      // Current object
      var obj = data[i];
      console.log(obj);

      // Adding a new marker for the object
      var marker = new google.maps.Marker({
        position: new google.maps.LatLng(obj.locations_lat,obj.locations_long),
        map: map,
        title: obj.locations_title, // this works, giving the marker a title with the correct title
        icon: base_url + 'images/f_map.png',
      });
      
      // Adding a new info window for the object
      var clicker = addClicker(marker, obj.locations_title);
      
   
    } // end loop
    var infowindow = new google.maps.InfoWindow();
    
    // Adding a new click event listener for the object
    function addClicker(marker, content) {
      google.maps.event.addListener(marker, 'click', function() {
        
        if (infowindow) {infowindow.close();}
        //the content property can be filled using inline html and css, feel free to change this
        infowindow = new google.maps.InfoWindow({content:'<p id="hook">'+ content + '</p> <style></style>'});
        infowindow.open(map, marker);
        //THIS CODE MAKES THE MAP ZOOM AND FOCUS ON THE CLICKED MARKER
        map.setZoom(16);
        map.setCenter(marker.getPosition());
        
      });
    }
  }

}();