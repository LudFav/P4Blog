
	<!-- About me -->
	<section class="fh5co-about-me">
		<div class="about-me-inner site-container">
			<article class="portfolio-wrapper">
				<div class="portfolio__img">
					<img src=".assets/images/about-me.jpg" class="about-me__profile" alt="about me profile picture">
				</div>
				<div class="portfolio__bottom">
					<div class="portfolio__name">
						<span>J</span>
						<h2 class="universal-h2">hone Smith</h2>
					</div>
					<p>Jhone Smith is a short story author, novelist, and award-winning poet.</p>
				</div>
			</article>
			<div class="about-me__text">
				<div class="about-me-slider">
					<div class="about-me-single-slide">
						<h2 class="universal-h2 universal-h2-bckg">About me</h2>
						<p><span>H</span> e has work appearing or forthcoming in over a dozen venues, including Buzzy Mag, The Spirit of Poe, and the British Fantasy Society journal Dark Horizons. He is also CEO of a company, specializing in custom book publishing and social media marketing services, have created a community for authors to learn and connect.He has work appearing or forthcoming in over a dozen venues, including Buzzy Mag, The Spirit of Poe, and have created a community for authors to learn and connect.</p>
						<h4>Author</h4>
						<p class="p-white">See me</p>
					</div>
					<div class="about-me-single-slide">
						<h2 class="universal-h2 universal-h2-bckg">About me 2</h2>
						<p><span>H</span> e has work appearing or forthcoming in over a dozen venues, including Buzzy Mag, The Spirit of Poe, and the British Fantasy Society journal Dark Horizons. He is also CEO of a company, specializing in custom book publishing and social media marketing services, have created a community for authors to learn and connect.He has work appearing or forthcoming in over a dozen venues, including Buzzy Mag, The Spirit of Poe, and have created a community for authors to learn and connect.</p>
						<h4>Author</h4>
						<p class="p-white">See me</p>
					</div>
				</div>
			</div>
		</div>
		<div class="about-me-bckg"></div>
	</section>
	<!-- About me end -->
	<!-- Blog -->
	<section class="fh5co-blog">
		<div class="site-container">
			<h2 class="universal-h2 universal-h2-bckg">My Blog</h2>
			<div class="blog-slider blog-inner">
				<?php
					foreach ($billets as $billet):
					?>
				<div class="single-blog">
					<div class="single-blog__img">
						<img src="./images/blog1.jpg" alt="blog image">
					</div>
					<div class="single-blog__text">
						<h4><?= $billet->titre() ?></h4>
						<span>On August 28, 2015</span>
						<p>Quisque vel sapi nec lacus adipis cing bibendum nullam porta lites laoreet aliquam.velitest, tempus a ullamcorper et, lacinia mattis mi. Cras arcu nulla, blandit id cursus et, ultricies eu leo.</p>
					</div>
				</div>
				<?php endforeach ?>
			</div>
		</div>
	</section>
	<!-- Blog end -->



	

	