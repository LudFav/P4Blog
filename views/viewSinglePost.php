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

      <div class="col-lg-4 col-md-12 no-left-padding">

        <div class="single-post info-area">

          <div class="sidebar-area about-area">
            <h4 class="title"><b>ABOUT BONA</b></h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
              ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur
              Ut enim ad minim veniam</p>
          </div>

          <div class="sidebar-area subscribe-area">

            <h4 class="title"><b>SUBSCRIBE</b></h4>
            <div class="input-area">
              <form>
                <input class="email-input" type="text" placeholder="Enter your email">
                <button class="submit-btn" type="submit"><i class="icon ion-ios-email-outline"></i></button>
              </form>
            </div>

          </div><!-- subscribe-area -->

          <div class="tag-area">

            <h4 class="title"><b>TAG CLOUD</b></h4>
        
          </div><!-- subscribe-area -->

        </div><!-- info-area -->

      </div><!-- col-lg-4 col-md-12 -->

    </div><!-- row -->

  </div><!-- container -->
</section><!-- post-area -->



<section class="comment-section">
  <div class="container">
    <h4><b>POST COMMENT</b></h4>
    <div class="row">

      <div class="col-lg-8 col-md-12">
        <div class="comment-form">
          <form method="post">
            <div class="row">

              <div class="col-sm-6">
                <input type="text" aria-required="true" name="contact-form-name" class="form-control"
                  placeholder="Enter your name" aria-invalid="true" required >
              </div><!-- col-sm-6 -->
              <div class="col-sm-6">
                <input type="email" aria-required="true" name="contact-form-email" class="form-control"
                  placeholder="Enter your email" aria-invalid="true" required>
              </div><!-- col-sm-6 -->

              <div class="col-sm-12">
                <textarea name="contact-form-message" rows="2" class="text-area-messge form-control"
                  placeholder="Enter your comment" aria-required="true" aria-invalid="false"></textarea >
              </div><!-- col-sm-12 -->
              <div class="col-sm-12">
                <button class="submit-btn" type="submit" id="form-submit"><b>POST COMMENT</b></button>
              </div><!-- col-sm-12 -->

            </div><!-- row -->
          </form>
        </div><!-- comment-form -->

        <h4><b>COMMENTS(12)</b></h4>

        <div class="commnets-area">

          <div class="comment">

            <div class="post-info">

              <div class="left-area">
          
              </div>

              <div class="middle-area">
                <a class="name" href="#"><b>Katy Liu</b></a>
                <h6 class="date">on Sep 29, 2017 at 9:48 am</h6>
              </div>

              <div class="right-area">
                <h5 class="signal-btn" ><a href="#"><b>Signaler</b></a></h5>
              </div>

            </div><!-- post-info -->

            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
              ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur
              Ut enim ad minim veniam</p>

          </div>

          <div class="comment">
            <h5 class="signal-for">Reply for <a href="#"><b>Katy Lui</b></a></h5>

            <div class="post-info">

              <div class="left-area">
                
              </div>

              <div class="middle-area">
                <a class="name" href="#"><b>Katy Liu</b></a>
                <h6 class="date">on Sep 29, 2017 at 9:48 am</h6>
              </div>

              <div class="right-area">
                <h5 class="signal-btn" ><a href="#"><b>Signaler</b></a></h5>
              </div>

            </div><!-- post-info -->

            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
              ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur
              Ut enim ad minim veniam</p>

          </div>

        </div><!-- commnets-area -->

        <div class="commnets-area ">

          <div class="comment">

            <div class="post-info">

              <div class="left-area">
                
              </div>

              <div class="middle-area">
                <a class="name" href="#"><b>Katy Liu</b></a>
                <h6 class="date">on Sep 29, 2017 at 9:48 am</h6>
              </div>

              <div class="right-area">
                <h5 class="signal-btn" ><a href="#"><b>Signaler</b></a></h5>
              </div>

            </div><!-- post-info -->

            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
              ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur
              Ut enim ad minim veniam</p>

          </div>

        </div><!-- commnets-area -->

        <a class="more-comment-btn" href="#"><b>VIEW MORE COMMENTS</a>

      </div><!-- col-lg-8 col-md-12 -->

    </div><!-- row -->

  </div><!-- container -->
</section>
