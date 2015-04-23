locationsScript = function(){

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
      panControlOptions: {
          position: google.maps.ControlPosition.RIGHT_TOP
      },
      zoomControlOptions: {
          position: google.maps.ControlPosition.RIGHT_TOP
      },
      streetViewControlOptions: {
          position: google.maps.ControlPosition.RIGHT_TOP
      },
      styles: [{"featureType":"administrative.province","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"landscape","elementType":"all","stylers":[{"saturation":-100},{"lightness":65},{"visibility":"on"}]},{"featureType":"poi","elementType":"all","stylers":[{"saturation":-100},{"lightness":51},{"visibility":"simplified"}]},{"featureType":"poi","elementType":"labels","stylers":[{"saturation":"-100"},{"lightness":"-24"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"on"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"road.highway","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road.arterial","elementType":"all","stylers":[{"saturation":-100},{"lightness":30},{"visibility":"on"}]},{"featureType":"road.local","elementType":"all","stylers":[{"saturation":-100},{"lightness":40},{"visibility":"on"}]},{"featureType":"transit","elementType":"all","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"water","elementType":"geometry","stylers":[{"hue":"#ffff00"},{"lightness":-25},{"saturation":-97}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":-25},{"saturation":-100}]}]
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

};