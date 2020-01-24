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
		<button  type="button" id="login">Connexion</button>
			<a href="#" class="logo"><img src="public/images/logo.png" alt="Logo Image"></a>

			<div class="menu-nav-icon" data-nav-menu="#main-menu"><i class="ion-navicon"></i></div>

			<ul class="main-menu visible-on-click" id="main-menu">
				<li><a href="accueil">Accueil</a></li>
				<li><a href="#">Categories</a></li>
			</ul><!-- main-menu -->

			<div class="src-area">
				<form>
					<button class="src-btn" type="submit"><i class="ion-ios-search-strong"></i></button>
					<input class="src-input" type="text" placeholder="Type of search">
				</form>
			</div>

		</div>
	</header><!-- header -->
		<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  			<div class="modal-dialog modal-dialog-centered" role="document">
  			  <div class="modal-content">
  			    <div class="modal-header text-center">
  			      <h5 class="modal-title w-100 font-weight-bold" id="exampleModalLongTitle">Authentification</h5>
  			      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
  			        <span aria-hidden="true">&times;</span>
  			      </button>
  			    </div>
  			    <div class="modal-body mx-3">
					  <div class="md-form mb-1">	
							<i class="fa fa-user" aria-hidden="true"></i>
							<input type="text" name="username" placeholder="pseudonyme" id="username" class="form-control validate" required>
							<label for="username"></label>
					  </div>
					  <div class="md-form mb-1">	
						<i class="fa fa-unlock-alt" aria-hidden="true"></i>
						<input type="password" name="password" placeholder="mot de passe" id="password" class="form-control validate" required>
						<label for="password"></label>
					  </div>		
  			    </div>
				  	  <div class="modal-footer d-flex justify-content-center">
        			    <button  type="button" value="Login" class="btn btn-primary" id="loginSubmit">Se Connecter</button>
					  </div>    
  			    </div>
  			  </div>
  			</div>
		</div><!-- modal -->

  <?= $content ?>

	<footer>

		<div class="container">
			<div class="row">

				<div class="col-lg-4 col-md-6">
					<div class="footer-section">

						<a class="logo" href="#"><img src="public/images/logo.png" alt="Logo Image"></a>
						<p class="copyright">Bona @ 2017. All rights reserved.</p>
						<p class="copyright">Designed by <a href="public/https://colorlib.com" target="_blank">Colorlib</a></p>
						<ul class="icons">
							<li><a href="#"><i class="ion-social-facebook-outline"></i></a></li>
							<li><a href="#"><i class="ion-social-twitter-outline"></i></a></li>
							<li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
							<li><a href="#"><i class="ion-social-vimeo-outline"></i></a></li>
							<li><a href="#"><i class="ion-social-pinterest-outline"></i></a></li>
						</ul>

					</div><!-- footer-section -->
				</div><!-- col-lg-4 col-md-6 -->

				<div class="col-lg-4 col-md-6">
						<div class="footer-section">
						<h4 class="title"><b>CATAGORIES</b></h4>
						<ul>
							<li><a href="#">BEAUTY</a></li>
							<li><a href="#">HEALTH</a></li>
							<li><a href="#">MUSIC</a></li>
						</ul>
						<ul>
							<li><a href="#">SPORT</a></li>
							<li><a href="#">DESIGN</a></li>
							<li><a href="#">TRAVEL</a></li>
						</ul>
					</div><!-- footer-section -->
				</div><!-- col-lg-4 col-md-6 -->

				<div class="col-lg-4 col-md-6">
					<div class="footer-section">

						<h4 class="title"><b>SUBSCRIBE</b></h4>
						<div class="input-area">
							<form>
								<input class="email-input" type="text" placeholder="Enter your email">
								<button class="submit-btn" type="submit"><i class="icon ion-ios-email-outline"></i></button>
							</form>
						</div>

					</div><!-- footer-section -->
				</div><!-- col-lg-4 col-md-6 -->

			</div><!-- row -->
		</div><!-- container -->
	</footer>


	<!-- SCIPTS -->
	
	<script src="public/common-js/jquery-3.1.1.min.js"></script>
	<script src="public/common-js/tether.min.js"></script>
	<script src="public/common-js/bootstrap.js"></script>
	<script src="public/common-js/scripts.js"></script>
	</script>
	<script src="assets/js/ajax.js"></script>
	<script src="assets/js/modal.js"></script>
</body>
</html>
