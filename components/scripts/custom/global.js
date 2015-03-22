var base_url = 'http://localhost/forratschocolates/builds/development/';
//var base_url = 'http://www.ryanmchale.ca/staging/forrats/';

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
}();