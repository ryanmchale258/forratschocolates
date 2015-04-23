navScript = function(){

	var navWrap = $('.sideNav'),
		logo = $('.logoarea'),
		listscroll = $('#navscroll'),
		navlist = $('.side-nav'),
		social = $('.social');

		function setHeights(){
			winHeight = $(window).height();
			navWrap.height(winHeight);
			centerH = winHeight - (logo.height() + social.height() + 20);
			if(navlist.height() > centerH){
				listscroll.height(centerH);
				listscroll.css('margin-top', '0');
				var navScrollable = $(function(){
				    $('#navscroll').slimScroll({
				        height: centerH
				    });
				});
			}else{
				if($('#navscroll').parent('.slimScrollDiv').size() > 0){
					var scrollDestroy = $(function(){
					    $('#navscroll').slimScroll({
					        destroy: true
					    });
					});
				}
				topM = (centerH - navlist.height()) / 2;
				listscroll.height(navlist.height());
				listscroll.css('margin-top', topM);
			}
		}

		setHeights();

		$(window).resize(function(){
			setHeights();
		});

};