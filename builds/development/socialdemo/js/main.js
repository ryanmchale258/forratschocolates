(function(){
	// var tweetText = $('.tweetText').text();
	// console.log(tweetText);
	// var hash1 = tweetText.substr(tweetText.indexOf('#'), tweetText.indexOf(' '));
	// console.log(hash1);

	ajaxCall1();
	ajaxCall2();
	var counter = 0;
	var counter2 = 0;

	function ajaxCall1(){
		var json = $.ajax({
    	url: 'data/twitter.json',
    	type: 'GET',
    	dataType: 'json',
    	success: function (data){
    	initialize(data);
        }
  		});

  		function initialize(data){
  			console.log(data[counter]);
  			current = data[counter];
  			$('.icon').attr('src', current.icon);
  			$('.username').text(current.username);
  			$('.username').text(current.username);
  			$('.postedTo').text(current.postedTo);
  			$('.postedTime').text(current.postedTime);
  			$('.tweetText').text(current.tweetText);
        if(current.tweetPic != ''){
          if(!$('.tweetPicContainer').length){
            $('.tweetContent').append(
                '<div class="tweetPicContainer"><img class="tweetPic" src alt="tweetPic"></div>'
            );
          }
        }else{
          $('.tweetPicContainer').remove();
        }
        console.log(current.tweetPic);
  			$('.tweetPic').attr('src', current.tweetPic);
  		}
	}

	$('.next').click(function(event) {
		if (counter == 2) {
  			counter = 0;
  			ajaxCall1();
  			console.log(counter);
  		}else{
  			counter++;
  			ajaxCall1();
  			console.log(counter);
  		};
	});

	$('.previous').click(function(event) {
		if (counter === 0) {
  			counter = 2;
  			ajaxCall1();
  		}else{
  			counter--;
  			ajaxCall1();
  		};
	});

	function ajaxCall2(){
		var json = $.ajax({
    	url: 'data/facebook.json',
    	type: 'GET',
    	dataType: 'json',
    	success: function (data){
    	initialize(data);
        }
  		});

  		function initialize(data){
  			console.log(data[counter2]);
  			current = data[counter2];
  			$('.facebook_icon').attr('src', current.facebookIcon);
  			$('.f_username').text(current.f_username);
  			$('.username').text(current.username);
  			$('.f_postedTime').text(current.f_postedTime);
  			$('.postText').text(current.postText);
        if(current.postPic != ''){
          if(!$('.postPicContainer').length){
            $('.postContent').append(
                '<div class="postPicContainer"><img class="postPic" src alt="postPic"></div>'
            );
          }
        }else{
          $('.postPicContainer').remove();
        }
  			$('.postPic').attr('src', current.postPic);
  		}
	}

	$('.facebook_next').click(function(event) {
		if (counter2 == 2) {
  			counter2 = 0;
  			ajaxCall2();
  			console.log(counter2);
  		}else{
  			counter2++;
  			ajaxCall2();
  			console.log(counter2);
  		};
	});

	$('.facebook_previous').click(function(event) {
		if (counter2 === 0) {
  			counter2 = 2;
  			ajaxCall2();
  		}else{
  			counter2--;
  			ajaxCall2();
  		};
	});

})();