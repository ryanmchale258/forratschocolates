productsScript = function(){

	function setSize(){
		var inHeight = $('.overlayinner').height(),
			overall = $(window).height();
			dif = (overall - inHeight - 100)/2;

		var mOver960 = window.matchMedia( "(min-width: 960px)" );
		var mUnder960 = window.matchMedia( "(max-width: 959px)" );

		if(mOver960.matches){
			$('.overlayinner').css('margin-top', dif);
		}else if(mUnder960.matches){
			$('.overlayinner').css('margin-top', '0');
		}
	}

	setSize();

	$(window).resize(function(){
		setSize();
	});

};