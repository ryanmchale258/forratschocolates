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

}
