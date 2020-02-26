$(document).ready(function() {
	/*const queryString = document.URL;
	console.log(queryString);

	const urlParams = new URLSearchParams(queryString);

	const blabla = urlParams.has('post&id');
	console.log(blabla);*/
	var url_param       = $(location).attr('href').split("/");
	console.log(url_param)
	var param           = (url_param[4]).split("&")
	var whatIwant = (param[0]);
	console.log(whatIwant)
	if(whatIwant === 'post'){
		let retourSommaire = '<a href="sommaire" class="fas fa-book" id="retourSommaire"></a>';
		$('#accueil').replaceWith($(retourSommaire));
	} else if(whatIwant === 'accueil'){
		let sommaire = '<a href="sommaire" class="fas fa-book" id="retourSommaire"></a>';
		$('#accueil').replaceWith($(sommaire));
	}
});



