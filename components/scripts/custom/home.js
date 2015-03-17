var homeScript = function(){

	$('.side-nav a').mouseenter(function(){
		$('.logopanel').addClass('hideme');
		$('.logopanel').removeClass('showme');

		$('.menuitem').addClass('hideme');
		$('.menuitem').removeClass('showme');
		$('.menuitem.' + this.id).removeClass('hideme');
		$('.menuitem.' + this.id).addClass('showme');
		if(this.id == 'home') {
			$('.menuitem').addClass('hideme');
			$('.menuitem').removeClass('showme');

			$('.logopanel').removeClass('hideme');
			$('.logopanel').addClass('showme');
		}
	});

	$('.sideNav').mouseleave(function(){
		$('.menuitem').addClass('hideme');
		$('.menuitem').removeClass('showme');

		$('.logopanel').removeClass('hideme');
		$('.logopanel').addClass('showme');
	});

}();
