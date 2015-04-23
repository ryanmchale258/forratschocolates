homeScript = function(){

	// var m400 = window.matchMedia( "(min-width: 400px)" );
	// var m650 = window.matchMedia( "(min-width: 650px)" );
	// var m960 = window.matchMedia( "(min-width: 960px)" );
	// var m1140 = window.matchMedia( "(min-width: 1140px)" );
	// var m1200 = window.matchMedia( "(min-width: 1200px)" );

	this.slideWidth = '';
	var count = 1;
	var timer;
	this.slidePush = 0;

	function sizeSlider(){
		var mOver960 = window.matchMedia( "(min-width: 960px)" );
		var mUnder960 = window.matchMedia( "(max-width: 959px)" );

		if(mOver960.matches){
			console.log('big');
			this.slideWidth = $(window).width() - $('.sideNav').width();
			$('.textinner').css('margin-top', ($(window).height() - $('.textinner').outerHeight())/2);
			slideWidth = this.slideWidth;
			$('.homepg').height($(window).height());
			$('.slider').css('width', (($(window).width() - $('.sideNav').width()) * $('.slide').length));
			$('.slideouter').css('width',  slideWidth);
			$('.slide').css({
				'position' : 'relative',
				'float' : 'left',
				'width' : slideWidth,
				'height' : $(window).height()
			});
		}else if(mUnder960.matches){
			console.log('small');
			this.slideWidth = $(window).width();
			var height = ($(window).height() * .6);
			$('.textinner').css('margin-top', '0');
			slideWidth = this.slideWidth;
			$('.homepg').height('');
				$('.slide').css({
				'position' : 'relative',
				'float' : 'left',
				'width' : '100%',
				'height' : height
			});
			$('.slider').css('width', ($(window).width() * $('.slide').length));
			$('.slideouter').css('width',  slideWidth);
			$('.slide').css({
				'position' : 'relative',
				'float' : 'left',
				'width' : slideWidth,
				'height' : '100%'
			});

				var maxHeight = -1;

			   $('.textinner').each(function() {
			     maxHeight = maxHeight > $(this).height() ? maxHeight : $(this).height();
			   });

			   $('.slideouter').height(maxHeight + 20);

		}
	};

	sizeSlider();

	$(window).resize(function(){
		sizeSlider();
	});

	function moveSlide(){
		console.log(this.slideWidth);
		if(count < $('.slide').length){
			this.slidePush += this.slideWidth;
			$('.slider').css('left', ('-' + this.slidePush + 'px'));
			count++;
			console.log(count);
		}else{
			this.slidePush = 0;
			$('.slider').css('left', '0px');
			count = 1;
			console.log(count);
		}
	}

	$('.slide').on('click', function(){
		moveSlide();
	});

	timer = setInterval(function(){
		moveSlide();
	}, 5000);

	$('.slideouter').mouseenter(function(){
		clearInterval(timer);
		console.log('paused');
	});

	$('.slideouter').mouseleave(function(){
		timer = setInterval(function(){
			moveSlide();
		}, 5000);
		console.log('unpaused');
	});


};
