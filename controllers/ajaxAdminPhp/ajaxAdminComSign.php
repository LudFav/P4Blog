<?php
spl_autoload_register(function($class){
    require_once($_SERVER["DOCUMENT_ROOT"]. '/PROJET4-MVC-OOP-PHP/models/'.$class.'.php');
});
$_commentManager;
$_commentManager = new CommentManager;

$entiteParPage=3;
$nbreEntitesParPage=$entiteParPage;
$pageComSign= isset($_POST['pageComSign'])? $_POST['pageComSign'] : 1; 
$commentaires = $_commentManager->getSignaledComments('commentaires', 'Comment', $signale=null, $pageComSign, $entiteParPage);
$comSignpages = $_commentManager->getPageMax($nbreEntitesParPage);

if(isset($_POST['action']) && $_POST['action']=='showCommentSignaled'){       
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
    $data['pageComSign'] = $pageComSign;
    $data['maxComSignPages'] = $comSignpages;
    $responseComSign = json_encode($data);
    exit($responseComSign);
}

if(isset($_POST['action']) && $_POST['action']=='unsignal'){
    $unSignalComment = $_commentManager->unsignaleComment($_POST['comToUnsignal']); 
}
if(isset($_POST['action']) && $_POST['action']=='moderer'){
    $modereComment = $_commentManager->modereComment($_POST['modere']); 
}
if(isset($_POST['action']) && $_POST['action']=='deleteComment'){
    $idToDel = $_POST['deleteCom'];
    $deleteComment = $_commentManager->deleteComment($idToDel);
}
?>