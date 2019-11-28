

	<div class="slider"></div><!-- slider -->

	<section class="blog-area section">
		<div class="container">

			<div class="row">

        <?php
        foreach ($billets as $billet):
         ?>


				<div class="col-lg-4 col-md-6">
					<div class="card h-100">
						<div class="single-post post-style-1">

							<div class="blog-image"><img src="public/images/marion-michele-330691.jpg" alt="Blog Image"></div>
							
							<div class="blog-info">

								<h4 class="title"><a href="post&id=<?= $billet->id() ?>"><b><?= $billet->titre() ?></b></a></h4>


							</div><!-- blog-info -->
						</div><!-- single-post -->
					</div><!-- card -->
				</div><!-- col-lg-4 col-md-6 -->

        <?php endforeach ?>

			</div><!-- row -->

			<a class="load-more-btn" href="#"><b>LOAD MORE</b></a>

		</div><!-- container -->
	</section><!-- section -->
