<!DOCTYPE HTML>
<!--
	Aerial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Billet simple pour l'Alaska</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">
		<div id="wrapper">
			<div id="bg"></div>
			<div id="overlay"></div>
			<div id="main">

				<!-- Header -->
					<header id="header">
						<h1>Billet simple pour l'Alaska</h1>
						<p>de Jean Forteroche</p>
						<nav>
							<ul>
								<li><a href="accueil" class="fas fa-book"></a><span class="label"></span></a></li>
								<li><a href="" class="fas fa-sign-in-alt"><span class="label">Facebook</span></a></li>
							</ul>
						</nav>
					</header>
					<?= $content ?>
				<!-- Footer -->
					<footer id="footer">
						<span class="copyright">&copy; Untitled. Design: <a href="http://html5up.net">HTML5 UP</a>.</span>
					</footer>

			</div>
		</div>
		<script>
			window.onload = function() { document.body.classList.remove('is-preload'); }
			window.ontouchmove = function() { return false; }
			window.onorientationchange = function() { document.body.scrollTop = 0; }
		</script>
		<script src="public/common-js/jquery-3.1.1.min.js"></script>
		<script src="public/common-js/tether.min.js"></script>
		<script src="public/common-js/bootstrap.js"></script>
		<script src="public/common-js/scripts.js"></script>
		<script src="assets/js/Modal.js"></script>
		<script src="assets/js/Pagination.js"></script>
		<script src="assets/js/ajax.js"></script>
	</body>
</html>