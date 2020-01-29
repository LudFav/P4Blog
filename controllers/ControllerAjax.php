<?php


class ControllerAjax{
  private $_commentManager;
  public function __construct(){

        $this->_commentManager = new CommentManager;

        if(isset($_POST['action'])&& $_POST['action']=='showComment'){
          $commentairesOutput = '';
         
          $commentaires = $this->_commentManager->getComments($_POST['billetId']);
          
          foreach ($commentaires as $commentaire){ 
        
              $commentairesOutput.= '<div class="comments-area" style="margin-top:5px; margin-bottom:20px">';
        
              $commentairesOutput.=    '<div class="comment">';
                  if($commentaire->modere()==1){
                  $commentairesOutput.= '<div class="comment-info" value=' .$commentaire->id(). '>';
                  $commentairesOutput.= '<div class="middle-area" value=' .$commentaire->modere(). '>';
                  $commentairesOutput.= '<h6 class="commentName"><b>' .$commentaire->auteur(). '</b></h6>';
                  $commentairesOutput.= '<h6 class="commentDate">' .$commentaire->date(). '</h6>';
                  $commentairesOutput.= '</div>';
                  $commentairesOutput.= '</div><!-- comment-info -->';
                  $commentairesOutput.= '<p><i>Commentaire censuré par la modération</i></p>';
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
                    $commentairesOutput.= '<button  class="signalbtn" value=' .$commentaire->id().' ><b>Signaler</b></button>';
                    $commentairesOutput.= '</div>';
                    $commentairesOutput.= '</div><!-- comment -->';
                    $commentairesOutput.= '</div>';
                }   
            }
            $data['commentairesOutput'] = $commentairesOutput;
            exit($data['commentairesOutput']);
        }
        
        
        if(isset($_POST['action']) && $_POST['action']=='insertCom'){
            $data = array(
                'billetId' =>  $_POST['billetId'],
                'auteur' => htmlspecialchars($_POST['auteur']),
                'contenu' => htmlspecialchars($_POST['contenu'])
            );           
            $createCommentaires = $this->_commentManager->createComment($data, $_POST['billetId']);
            exit;
        }
        
        if(isset($_POST['action']) && $_POST['action']=='signalCom'){
            $signaleCom = $this->_commentManager->signaleComment($_POST['idSignal']);   
          }
    }
}
