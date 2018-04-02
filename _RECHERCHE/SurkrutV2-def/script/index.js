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