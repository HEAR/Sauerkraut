$(document).ready(function(){

	$('.container').stickem();
	

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