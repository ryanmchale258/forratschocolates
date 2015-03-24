var base_url = 'http://localhost/forratschocolates/builds/development/';
//var base_url = 'http://www.ryanmchale.ca/staging/forrats5/';

var navScrollable = $(function(){
    $('#navscroll').slimScroll({
        height: '350px'
    });
});

var navsWithKids = function(){

	$('.has-submenu a').each(function(){
		$(this).on("click", function(){
			var thesubmenu = $($(this).attr('href'));
			thesubmenu.css('visibility', 'visible');
			thesubmenu.addClass('subout');
			$('.sideNav').addClass('subvisible');
		});
	});

	$('.back a').on("click", function(){
		$('.subout').removeClass('subout');
		$('.sideNav').removeClass('subvisible');
	});

	$(window).resize(function(){
		if($(window).width() < 960){
			var thewidth = '-' +  $('.sideNav').width();
			$('.sideNav').css({
				'visibility' : 'visible',
				'-webkit-transform' : 'translateX(' + thewidth + 'px)',
				'-moz-transform' : 'translateX(' + thewidth + 'px)',
				'-ms-transform' : 'translateX(' + thewidth + 'px)',
				'transform' : 'translateX(' + thewidth + 'px)',
				'-webkit-transform' : 'translateX(' + thewidth + 'px)'
			});
		}
	})

	if($(window).width() < 960){
		var thewidth = '-' +  $('.sideNav').width();
		$('.sideNav').css({
			'visibility' : 'visible',
			'-webkit-transform' : 'translateX(' + thewidth + 'px)',
			'-moz-transform' : 'translateX(' + thewidth + 'px)',
			'-ms-transform' : 'translateX(' + thewidth + 'px)',
			'transform' : 'translateX(' + thewidth + 'px)',
			'-webkit-transform' : 'translateX(' + thewidth + 'px)'
		});
	}else{
		$('.sideNav').css({
			'visibility' : '',
			'-webkit-transform' : '',
			'-moz-transform' : '',
			'-ms-transform' : '',
			'transform' : '',
			'-webkit-transform' : ''
		});
	}

	$('#navIcon').on('click', function(){
		$('.sideNav').toggleClass('navout');
	});
}();