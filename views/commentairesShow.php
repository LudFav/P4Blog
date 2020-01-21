<?php
  foreach ($commentaires as $commentaire):  
    ?>
    <div class="comments-area" style="margin-top:5px; margin-bottom:20px">

      <div class="comment">
  <?php if($commentaire->modere()==1){
              echo  '<div class="comment-info" value=' .$commentaire->id(). '>
              <div class="middle-area" value=' .$commentaire->modere(). '>
                  <h6 class="commentName"><b>La modération</b></h6>
              </div>
          </div><!-- comment-info -->
          <p><i>' .$commentaire->contenu(). '</i></p>
        </div><!-- comment -->
      </div>';
  } else {    echo '<div class="comment-info" value=' .$commentaire->id(). '>
            <div class="middle-area" value=' .$commentaire->modere(). '>
                <h6 class="commentName"><b>' .$commentaire->auteur(). '</b></h6>
                <h6 class="commentDate">' .$commentaire->date(). '</h6>
            </div>
        </div><!-- comment-info -->
        <p>' .$commentaire->contenu(). '</p>
            <div class="right-area">
                <button id="signal' .$commentaire->id(). '" class="signalbtn" value=' .$commentaire->id().' ><b>Signaler</b></button>
            </div>
      </div><!-- comment -->
    </div>';}?><!-- comment-area -->
    <?php endforeach 
    
    ?>
           
?>