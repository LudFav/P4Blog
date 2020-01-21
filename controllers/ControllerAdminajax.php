<?php


class ControllerAdminajax{
    private $_billetManager;
    private $_commentManager;
 
    public function __construct(){
       
        //BILLET
        $this->_billetManager = new BilletManager;
        

        if(isset($_POST['action']) && $_POST['action']=='showbillet'){
            $billetsOutput = '';
            $billets = $this->_billetManager->getBillets();
            foreach ($billets as $billet){ 
                 $billetsOutput.= '<tr>';
                 $billetsOutput.= '<a href="post&id' .$billet->id(). '"><td>' .$billet->id(). '</td></a>';
                 $billetsOutput.= '<td>' .$billet->auteur(). '</td>';
                 $billetsOutput.= '<td>' .$billet->titre(). '</td>';
                 $billetsOutput.= '<td>' .$billet->date(). '</td>';
                 $billetsOutput.= '<td class="actionTd">';
                 $billetsOutput.= '<button class="visualBilBtn"><a href="post&id=' .$billet->id(). '" ><i class="fa fa-eye"></i></a></button>';
                 $billetsOutput.= '<button class="editBilBtn" ><a href="update&id=' .$billet->id(). '"><i class="fa fa-pencil" aria-hidden="true"></i></a></button>';
                 $billetsOutput.= '<button class="deleteBilBtn" value="' .$billet->id(). '" ><i class="fa fa-trash" aria-hidden="true"></i></button>';
                 $billetsOutput.= '</td>';
                 $billetsOutput.= '</tr>';
            }
            $data['billetsOutput'] = $billetsOutput;
            exit($data['billetsOutput']);
        }   
              


        if(isset($_POST['action']) && $_POST['action']=='deleteBillet'){
            $deleteBillet = $this->_billetManager->deleteBillet($_POST['deleteBillet']); 
        }


        //COMMENTAIRES SIGNALÉS

        $this->_commentManager = new CommentManager;

        if(isset($_POST['action']) && $_POST['action']=='showCommentSignaled'){
            $commentOutput='';
            $commentaires = $this->_commentManager->getSignaledComments('commentaires', 'Comment', $signale=null);
            var_dump($commentaires);
            foreach ($commentaires as $commentaire){
                $commentOutput.='<tr class="signaledCommentRow">';
                $commentOutput.='<td>' .$commentaire->id(). '</td>';
                $commentOutput.='<td>' .$commentaire->auteur(). '</td>';
                $commentOutput.='<td>' .$commentaire->contenu(). '</td>';
                $commentOutput.='<td>' .$commentaire->date(). '</td>';
                $commentOutput.='<td class="actionTd">';       
                $commentOutput.='<button class="unsignalComBtn" value="' .$commentaire->id(). '"><i class="fa fa-comment-o" aria-hidden="true"></i></button>';
                $commentOutput.='<button class="modereComBtn" value="' .$commentaire->id(). '" ><i class="fa fa-commenting" aria-hidden="true"></i></button>';
                $commentOutput.='<button class="deleteComBtn" value="' .$commentaire->id(). '" ><i class="fa fa-trash" aria-hidden="true"></i></button>';
                $commentOutput.='</td>';
                $commentOutput.='</tr>';
            }
            $data['commentOutput'] = $commentOutput;
            exit($data['commentOutput']);
        }

        if(isset($_POST['action']) && $_POST['unsignal']){
            var_dump($_POST['comToUnsignal']);
            $unSignalComment = $this->_commentManager->unsignaleComment($_POST['comToUnsignal']); 
            var_dump($unSignalComment); 
          }
/*








        $this->_commentManager = new CommentManager;

        if(isset($_POST['action'])&& $_POST['action']=='deleteBillet'){
          $tableOutput = '';
         
          $commentaires = $this->_commentManager->getComments($_POST['billetId']);
          
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
          exit($data['commentairesOutput']);
        }
        
        
        if(isset($_POST['action']) && $_POST['action']=='insertCom'){
           var_dump($_POST['auteur']);
            $data = array(
                'billetId' =>  $_POST['billetId'],
                'auteur' => htmlspecialchars($_POST['auteur']),
                'contenu' => htmlspecialchars($_POST['contenu'])
            );
            var_dump($data);
            $createCommentaires = $this->_commentManager->createComment($data, $_POST['billetId']);
            exit;
        }
        
        if(isset($_POST['action']) && $_POST['action']=='signalCom'){
            var_dump($_POST['action']);
            $signaleCom = $this->_commentManager->signaleComment($_POST['idSignal']);   
        }*/
    }
}
