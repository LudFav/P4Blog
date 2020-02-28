$(document).ready(function() {
	var url_param = $(location).attr('href').split("/");
	var param = (url_param[4]).split("&")
	var shortUrl = (param[0]);
	if(shortUrl === 'sommaire'){
		let accueil = '<a href="accueil" class="fas fa-angle-left" id="accueil"></a><span class="label"></span></a>';  
		$('#retoutSommaire').replaceWith($(accueil));
	}
});
