cmsScript = function(){
	$('.menubutton').on("click", function(e){
		e.preventDefault();
		if($('.edible-menu').hasClass('open')){
			$('.edible-menu').removeClass('open');
		}else{
			$('.edible-menu').addClass('open');
		}

	});

	$('#metadesc').keyup(function(){
		$('#wordcount').html(150 - $(this).val().length);
	});

	$('.formset.icons input').val($(this).attr('value'));

	$('.grid-icon').on('click', function(){
		var text = escape(this.innerHTML);
		$('.grid-icon.selected').removeClass('selected');
		$(this).addClass('selected');
		$('.formset.icons input').val($(this).html());
		$('.pageform input[name="icontext"').attr('value', text);
	});

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
})


}
