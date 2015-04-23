contactScript = function(){

	function setSize(){
		var inHeight = $('#loginbox').height(),
			overall = $(window).height();
			dif = (overall - inHeight - 100)/2;

		var mOver960 = window.matchMedia( "(min-width: 960px)" );
		var mUnder960 = window.matchMedia( "(max-width: 959px)" );

		if(mOver960.matches){
			$('#loginbox').css('margin-top', dif);
		}else if(mUnder960.matches){
			$('#loginbox').css('margin-top', '0');
		}
	}

	setSize();

	$(window).resize(function(){
		setSize();
	});

};