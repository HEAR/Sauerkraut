/*

SAUERKRAUT V1 script.js

 */


$(document).ready(function(){

	var index = 0;

	updateHeight();

	// https://github.com/francoischalifour/medium-zoom
	mediumZoom(document.querySelectorAll('figure img, .gallery img'));

	window.onresize = function() {
		updateHeight();
	}

	$('.gallery img').hide();
	$('.gallery').children('img').eq(0).show();

	$('.gallery').each(function(){

		$(this).height( $(this).children('img').eq(0).height() );

	})

	$(".gallery").mousemove(function(event){
		// console.log(event);

		if(event.offsetX > $(this).width() / 3 * 2 ){
			// console.log("droite");
			$(this).data("click-action", "next");
			$(this).removeClass("prev large").addClass("next");
		}else if(event.offsetX > $(this).width() / 3  ){
			// console.log("center");
			$(this).data("click-action", "large");
			$(this).removeClass("prev next").addClass("large");

			// zoom.show();

		}else if(event.offsetX < $(this).width() / 3 ){
			// console.log("gauche");
			$(this).data("click-action", "prev");
			$(this).removeClass("next large").addClass("prev");
		}
	});

	$(".gallery").click(function(event){
		console.log(event);

		let action = $(this).data("click-action");

		if( action == "next" || action == "prev"  ){
			let index = $(this).data('index');
			$('.gallery').children('img').eq( index ).hide();

			if(action == "next"){
				index = ($(this).data('index') + 1 ) % $(this).find("img").length;
			}else{
				index = ($(this).data('index') - 1 ) % $(this).find("img").length;
			}

			$(this).data('index', index);

			$('.gallery').children('img').eq( index ).show();
		}

		// event.stopPropagation();

	})

	// $(".gallery img").click(function(event){

	// 	return false;

	// });



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

	
	// window.onload = function() {
	// 	$('#article-image-slide').children('img').eq(0).css('visibility', 'visible');
	// 	updateHeight();
	// }

	

	// POUR GERER LES NOTES DE COTE DE PAGE
	$('.note-bloc').css("visibility","hidden");

	$(".note-ref").click(function(){
		$(".note-bloc").css("visibility","hidden");
		$(this).next('.note-bloc').css("visibility","visible");
	})

	$(".note-bloc").click(function(){
		$(this).css("visibility","hidden");
	})


	
// jQuery(document).ready(function($) {
// 	$('#indexSlider').indexSlider({
// 		autoplay: true,
// 		'height' : 320,
// 		'width' : 620,
// 		'responsive' : true
// 	});
// });


});


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


