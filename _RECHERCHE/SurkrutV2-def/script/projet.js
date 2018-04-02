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