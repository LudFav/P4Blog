<?php
class ControllerAjaxAddComment{
    private $_commentManager;
    public function __construct(){
        
        $this->_commentManager = new CommentManager;
        $commentaires=$this->_commentManager->getSignaledComments('commentaires', 'Comment');
        $data =[];
        $commentairesOutput = '';
     
        foreach ($commentaires as $commentaire){ 
        
        $commentairesOutput.= '<div class="comments-area" style="margin-top:5px; margin-bottom:20px">';

        $commentairesOutput.=    '<div class="comment">';
                  if($commentaire->modere()==1){
                  $commentairesOutput.=  '<div class="comment-info" value=' .$commentaire->id(). '>';
                  $commentairesOutput.=  '<div class="middle-area" value=' .$commentaire->modere(). '>';
                  $commentairesOutput.=  '<h6 class="commentName"><b>La modération</b></h6>';
                  $commentairesOutput.=  '</div>';
                  $commentairesOutput.= '</div><!-- comment-info -->';
                  $commentairesOutput.= '</div><!-- comment -->';
                  $commentairesOutput.= '</div>';
                } else {    
                    $commentairesOutput.= '<div class="comment-info" value=' .$commentaire->id(). '>';
                    $commentairesOutput.= '<div class="middle-area" value=' .$commentaire->modere(). '>';
                    $commentairesOutput.= '<h6 class="commentName"><b>' .$commentaire->auteur(). '</b></h6>';
                    $commentairesOutput.= '<h6 class="commentDate">' .$commentaire->date(). '</h6>';
                    $commentairesOutput.= '</div>';
                    $commentairesOutput.= '</div><!-- comment-info -->';
                    $commentairesOutput.= '<p>' .$commentaire->contenu(). '</p>';
                    $commentairesOutput.= '<div class="right-area">';
                    $commentairesOutput.= '<button id="signal' .$commentaire->id(). '" class="signalbtn" value=' .$commentaire->id().' ><b>Signaler</b></button>';
                    $commentairesOutput.= '</div>';
                    $commentairesOutput.= '</div><!-- comment -->';
                    $commentairesOutput.= '</div>';
                }
       
      }
      $data['commentairesOutput'] = $commentairesOutput;
      var_dump(serialize($data));
    }



}
