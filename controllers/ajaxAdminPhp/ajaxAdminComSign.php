<?php


$_commentManager;
$this->_commentManager = new CommentManager;
if(isset($_POST['action']) && $_POST['action']=='showCommentSignaled'){   
    isset($_POST['pageComSign']) && is_numeric($_POST['pageComSign'])? $pageComSign = $_POST['pageComSign'] : $pageComSign = 1; 
    $ComSignParPage = 5; 
    $commentaires = $this->_commentManager->getSignaledComments('commentaires', 'Comment', $signale=null, $pageComSign, $ComSignParPage);
    $commentOutput='';
    foreach ($commentaires as $commentaire){
        $commentOutput.='<tr class="signaledCommentRow' .$commentaire->id(). '">';
        $commentOutput.='<td>' .$commentaire->id(). '</td>';
        $commentOutput.='<td>' .$commentaire->auteur(). '</td>';
        $commentOutput.='<td>' .$commentaire->contenu(). '</td>';
        $commentOutput.='<td>' .$commentaire->date(). '</td>';
        $commentOutput.='<td class="commentActionTd">';       
        $commentOutput.='<button class="unsignalComBtn" value="' .$commentaire->id(). '" data-toggle="modal" data-target ="#unsignalComModal"><i class="fa fa-comment-o" aria-hidden="true"></i></button>';
        $commentOutput.='<button class="modereComBtn" value="' .$commentaire->id(). '" data-toggle="modal" data-target ="#modereComModal" ><i class="fa fa-commenting" aria-hidden="true"></i></button>';
        $commentOutput.='<button class="deleteComBtn" value="' .$commentaire->id(). '" data-toggle="modal" data-target ="#deleteComModal" ><i class="fa fa-trash" aria-hidden="true"></i></button>';
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
    $idToDel = $_POST['deleteCom'];
    $deleteComment = $this->_commentManager->deleteComment($idToDel);
}
?>