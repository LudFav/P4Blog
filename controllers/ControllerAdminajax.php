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
                $commentOutput.='<td class="commentActionTd">';       
                $commentOutput.='<button class="unsignalComBtn" value="' .$commentaire->id(). '"><i class="fa fa-comment-o" aria-hidden="true"></i></button>';
                $commentOutput.='<button class="modereComBtn" value="' .$commentaire->id(). '" ><i class="fa fa-commenting" aria-hidden="true"></i></button>';
                $commentOutput.='<button class="deleteComBtn" value="' .$commentaire->id(). '" ><i class="fa fa-trash" aria-hidden="true"></i></button>';
                $commentOutput.='</td>';
                $commentOutput.='</tr>';
            }
            $data['commentOutput'] = $commentOutput;
            exit($data['commentOutput']);
        }

        if(isset($_POST['action']) && $_POST['action']=='unsignal'){
            $unSignalComment = $this->_commentManager->unsignaleComment($_POST['comToUnsignal']); 
        }

        if(isset($_POST['action']) && $_POST['action']=='moderer'){
            $modereComment = $this->_commentManager->modereComment($_POST['modere']); 
        }

        if(isset($_POST['action']) && $_POST['action']=='deleteComment'){
            $deleteComment = $this->_commentManager->deleteComment($_POST['deleteCom']);
        }
    }
}
