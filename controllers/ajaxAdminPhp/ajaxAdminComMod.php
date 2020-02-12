<?php
require_once 'controllers/ajaxAdminPhp/ajaxAdminComSign.php';


if(isset($_POST['action']) && $_POST['action']=='showCommentModered'){
    $moderedCommentOutput='';
    $commentaireModeres = $this->_commentManager->getModeredComments('commentaires', 'Comment', $modere=null);
    foreach ($commentaireModeres as $commentaireModere){
        $moderedCommentOutput.='<tr class="moderedCommentRow' .$commentaireModere->id(). '">';
        $moderedCommentOutput.='<td>' .$commentaireModere->id(). '</td>';
        $moderedCommentOutput.='<td>' .$commentaireModere->auteur(). '</td>';
        $moderedCommentOutput.='<td>' .$commentaireModere->contenu(). '</td>';
        $moderedCommentOutput.='<td>' .$commentaireModere->date(). '</td>';
        $moderedCommentOutput.='<td class="commentActionTd">';       
        $moderedCommentOutput.='<button class="unmodereComBtn" value="' .$commentaireModere->id(). '" data-toggle="modal" data-target ="#unmodereComModal" ><i class="fa fa-commenting unmod" aria-hidden="true"></i></button>';
        $moderedCommentOutput.='<button class="deleteModComBtn" value="' .$commentaireModere->id(). '" data-toggle="modal" data-target ="#deleteModComModal" ><i class="fa fa-trash" aria-hidden="true"></i></button>';
        $moderedCommentOutput.='</td>';
        $moderedCommentOutput.='</tr>';
    }
    $data['$moderedCommentOutput'] = $moderedCommentOutput;
    exit($data['$moderedCommentOutput']);
}
if(isset($_POST['action']) && $_POST['action']=='unmodere'){
    $unModereComment = $this->_commentManager->unmodereComment($_POST['unmodere']); 
}
if(isset($_POST['action']) && $_POST['action']=='deleteModCom'){
    $deleteComment = $this->_commentManager->deleteComment($_POST['deleteCom']);
}


//PAGINATION BILLET




//CHANGEMENT DE MOT DE PASSE
if(isset($_POST['action']) && $_POST['action'] == 'changePassword'){
    $formOutput ='';
    $formOutput .= '<form class="changepass">';
}