
<!DOCTYPE html>
<html lang="fr">
<head>
	<title>TITLE</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
	

	<!-- Font -->

	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">
	<link href="assets/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">


	<!-- Stylesheets -->

	<link href="public/common-css/bootstrap.css" rel="stylesheet">

	<link href="public/common-css/ionicons.css" rel="stylesheet">


	<link href="public/layout-1/css/styles.css" rel="stylesheet">

	<link href="public/layout-1/css/responsive.css" rel="stylesheet">

</head>
<body >

	<header>
		<div class="container-fluid position-relative no-side-padding">

			<a href="#" class="logo"><img src="public/images/logo.png" alt="Logo Image"></a>

			<div class="menu-nav-icon" data-nav-menu="#main-menu"><i class="ion-navicon"></i></div>

			<ul class="main-menu visible-on-click" id="main-menu">
				<li><a href="accueil">Accueil</a></li>
				<li><a href="#">Categories</a></li>
				<li><a href="#">Deconnexion</a></li>
			</ul><!-- main-menu -->

			<div class="src-area">
				<form>
					<button class="src-btn" type="submit"><i class="ion-ios-search-strong"></i></button>
					<input class="src-input" type="text" placeholder="Type of search">
				</form>
			</div>

		</div><!-- container -->
	</header>


  <?= $contentAdmin ?>




	<!-- SCIPTS -->
	
	<script src="public/common-js/jquery-3.1.1.min.js"></script>
	<script src="public/common-js/tether.min.js"></script>
	<script src="public/common-js/bootstrap.js"></script>
	<script src="public/common-js/scripts.js"></script>

	<script src="assets/js/tinymce/tinymce.min.js"></script>
	<script> tinymce.init({
	  selector: '#textareaB, #textareaC',  // change this value according to your HTML
	  plugin: 'a_tinymce_plugin',
	  a_plugin_option: true,
	  a_configuration_option: 400
	});
	</script>
	<script src="assets/js/modal.js"></script>
	<script src="assets/js/ajaxAdmin.js"></script>
	
</body>
</html>
