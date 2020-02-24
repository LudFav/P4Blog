<div class="slider">
  <div class="display-table  center-text">
    <h1 class="title display-table-cell"><b>DESIGN</b></h1>
  </div>
</div><!-- slider -->

<section class="post-area section">
  <div class="container">

    <div class="row">

      <div class="col-lg-8 col-md-12 no-right-padding">

        <div class="main-post">

          <div class="blog-post-inner">

            <div class="post-info" value="<?=$billet[0]->id()?>">

              <div class="left-area">
    
              </div>

              <div class="middle-area">
                <a class="name" href="#"><b><?=$billet[0]->auteur()?></b></a>
                <h6 class="date"><?=$billet[0]->date()?></h6>
              </div>

            </div><!-- post-info -->

            <h3 class="title"><a href="#"><b><?=$billet[0]->titre()?></b></a></h3>

            <p class="para"><?=$billet[0]->contenu()?></p>
          </div><!-- blog-post-inner -->

          <div class="post-footer post-info">

            <div class="left-area">
            
            </div>

           

          </div><!-- post-info -->


        </div><!-- main-post -->
      </div><!-- col-lg-8 col-md-12 -->

        
          </div><!-- subscribe-area -->

        </div><!-- info-area -->

      </div><!-- col-lg-4 col-md-12 -->

    </div><!-- row -->

  </div><!-- container -->
</section><!-- post-area -->



<section class="comment-section">
  <div class="container">
  <?php
  
  ?>
    <h4><b>Commentaires</b></h4>
    <div class="row">

      <div class="col-lg-8 col-md-12">
        <div class="comment-form">
          <form action="" method="post" id="formCommentaire">
            <div class="row">

              <div class="col-sm-6">
                <input type="text" aria-required="true" name="auteur" class="form-control"
                  placeholder="Nom" aria-invalid="true" id="auteur" required >
              </div>
              <div class="col-sm-12">
                <textarea name="contenu" rows="2" class="text-area-messge form-control"
                  placeholder="votre commentaire" id="contenu" aria-invalid="true" required></textarea >
              </div>
              <div class="col-sm-12">
                <button class="submit-btn" type="submit" id="form-submit" name="addCommentaire"><b>Envoyer Commentaire</b></button>
              </div>

            </div>
          </form>
        </div>
        <div id="showComments"></div>
        <div id='paginationFrontCom'></div>
        
</section>
