/*

SAUERKRAUT V1 script.js

 */

$(document).ready(function(){

	/*var t = 0;
	var b = $('#sidebar').height()+$('#footer').height()+$('#sidebar ul>li').length*20;

	$('.widget').each(function(){
		b -= $(this).height()+20;

		$.lockfixed(this, {offset: {top: t, bottom: b}})
		t += $(this).height()+20;
	});*/

	//$.lockfixed('#sidebar .rightmenu', {offset: {top: 100, bottom: 100}})

	
	$("#flip").click(function(){
		$("#panel").slideToggle("slow");
	});

	$('#sidebar').on("mouseenter", function(){ /*mouseenter*/
		$(this).addClass('top');
	});

	$('#sidebar').on("mouseleave", function(){ /*mouseleave*/
		$(this).removeClass('top');
	});

});



/*
SCRIPT POUR FANCYBOX
-> à insérer dans le champ prévu pour les scripts personnalisés
//jQuery(thumbnails).addClass("fancybox").attr("rel","fancybox").getTitle();
jQuery(".gallery").each(function(){
	var galleryCat = "fancybox-"+jQuery(this).attr("id");
	jQuery("a",this).addClass("fancybox").attr("rel",galleryCat).getTitle();
});
 */