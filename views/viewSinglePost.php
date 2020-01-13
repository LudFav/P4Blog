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

            <div class="post-info">

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
          <form action="" method="post">
            <div class="row">

              <div class="col-sm-6">
                <input type="text" aria-required="true" name="auteur" class="form-control"
                  placeholder="Nom" aria-invalid="true" required >
              </div>
              <div class="col-sm-12">
                <textarea name="contenu" rows="2" class="text-area-messge form-control"
                  placeholder="Enter your comment" aria-required="true" aria-invalid="false"></textarea >
              </div>
              <div class="col-sm-12">
                <button class="submit-btn" type="submit" id="form-submit" name="addComment"><b>Envoyer Commentaire</b></button>
              </div>

            </div>
          </form>
        </div>
        <?php
        foreach ($commentaires as $commentaire):  
        ?>
        <div class="comments-area">

          <div class="comment">

            <div class="post-info">

              <div class="left-area">
          
              </div>

              <div class="middle-area">
                <a class="name" href="#"><b><?=$commentaire->auteur()?></b></a>
                <h6 class="date"><?=$commentaire->date()?></h6>
              </div>

             

            </div><!-- post-info -->

            <p><?=$commentaire->contenu()?></p>
            <div class="right-area">
                <h5 class="signal-btn" ><a href="#"><b>Signaler</b></a></h5>
            </div>
          </div>

          <?php endforeach ?>   

        
      


      </div><!-- col-lg-8 col-md-12 -->

    </div><!-- row -->

  </div><!-- container -->
</section>
