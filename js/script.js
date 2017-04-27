/*

SAUERKRAUT V1 script.js

 */

// $(document).ready(function(){

	var index = 0;


	function doAtLoad() {
		var images = $('#indexSlider').children('img');
		images.each(function(i) {
			$(this).css('left', (i * 100) + '%');
			$('#nombrearticle').append("<span class='buttonSlider' onclick='goToImage(" + i + ")'>&middot;</span>");
			$('#nombrearticle').children('span').eq(0).css('color','#000');
		});
	}

	function nextImage() {
		var images = $('#indexSlider').children('img');
		if(index == images.length - 1){
			index = 0;
			$('#indexSlider').css('left', '0%');
		} else {
			index++;
			$('#indexSlider').css('left', '-' + (index * 100) + '%');
		}
		$('#nombrearticle').children('span').eq(index).css('color','#000').siblings().css('color', '#40E3BD');
	}

	function goToImage(i) {
		clearInterval(timer)
		index = i;
		$('#indexSlider').css('left', '-' + (index * 100) + '%');
		$('#nombrearticle').children('span').eq(index).css('color','#000').siblings().css('color', '#40E3BD');
		timer = setInterval(nextImage, 4000);
	}

	window.onload = function() {
		doAtLoad();
	}

	timer = setInterval(nextImage, 4000);

	var index = 0;

	function next() {
		var images = $('#article-image-slide').children('img');
		index++;
		if(index == images.length)
			index = 0;
		images.eq(index).css('visibility','visible').siblings().css('visibility','hidden');
		updateHeight();
	}

	function updateHeight() {
		var heightMax = 0;
		$('#article-image-slide').children('img').each(function() {
			if ($(this).css("visibility") == "visible") {
				if ($(this).height() > heightMax) {
					heightMax = $(this).height();
				} 
			}
		});

		$('#article-image-slide').height(heightMax);
	}

	window.onload = function() {
		$('#article-image-slide').children('img').eq(0).css('visibility', 'visible');
		updateHeight();
	}

	window.onresize = function() {
		updateHeight();
	}


	
// jQuery(document).ready(function($) {
// 	$('#indexSlider').indexSlider({
// 		autoplay: true,
// 		'height' : 320,
// 		'width' : 620,
// 		'responsive' : true
// 	});
// });


// });


