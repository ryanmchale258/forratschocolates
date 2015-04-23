geoScript = function(){
	$('.calc').on('click', function(e){
		e.preventDefault();
		var address = $("input[name='streetaddress'").val() + ', ' + $("input[name='city'").val() + ', ' + $("input[name='prov'").val() + ', ' + $("input[name='postal'").val();
		var geocoder = new google.maps.Geocoder();//defines geocoder
		geocoder.geocode( { 'address': address}, function(results, status) {//calls the geocode function
			if(status == google.maps.GeocoderStatus.OK){//if the passed address is valid as defined by the GMaps API
				var latitude = results[0].geometry.location.lat();//defines latitude as the resulting latitude
				var longitude = results[0].geometry.location.lng();//defines longitude as the resulting longitude

				$("input[name='lat']").val(latitude);
				$("input[name='long']").val(longitude);
			}
		});
	});
}