<?php


class ControllerAdminajax{
    private $_billetManager;
    private $_commentManager;
 
    public function __construct(){
       
            //BILLET
            $this->_billetManager = new BilletManager;  
            isset($_POST['page']) && is_numeric($_POST['page'])? $page = $_POST['page'] : $page = 1;
            $entiteParPage = 4; 
            $billets = $this->_billetManager->getBillets($page, $entiteParPage);
            if(isset($_POST['action']) && $_POST['action']=='showbillet'){
                $billetsOutput = '';
                foreach ($billets as $billet){ 
                     $billetsOutput.= '<tr class="billetRow' .$billet->id(). '">';
                     $billetsOutput.= '<a href="post&id' .$billet->id(). '"><td>' .$billet->id(). '</td></a>';
                     $billetsOutput.= '<td>' .$billet->auteur(). '</td>';
                     $billetsOutput.= '<td>' .$billet->titre(). '</td>';
                     $billetsOutput.= '<td>' .$billet->date(). '</td>';
                     $billetsOutput.= '<td class="actionTd">';
                     $billetsOutput.= '<button class="visualBilBtn"><a href="post&id=' .$billet->id(). '" ><i class="fa fa-eye"></i></a></button>';
                     $billetsOutput.= '<button class="editBilBtn" ><a href="update&id=' .$billet->id(). '"><i class="fa fa-pencil" aria-hidden="true"></i></a></button>';
                     $billetsOutput.= '<button class="deleteBilBtn" value="' .$billet->id(). '" data-toggle="modal" data-target ="#deleteBillet" ><i class="fa fa-trash" aria-hidden="true"></i></button>';
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
            //PAGINATION COMMENTAIRE SIGNALÉS
            if(isset($_POST['action']) && $_POST['action']=='paginationComSign'){
                isset($_POST['pageComSign']) && is_numeric($_POST['pageComSign'])? $pageComSign = $_POST['pageComSign'] : $pageComSign = 1;
                $ComSignParPage = 5; 
                $nbreEntitesParPage = $ComSignParPage;
                $pages = $this->_commentManager->getComSignPageMax($nbreEntitesParPage);
                $pageNav = 2;
                $prev = $pageComSign - 1;
                $next = $pageComSign + 1;
                
                if(isset($_POST['page']) && is_numeric($_POST['page'])){
                    $urlBillet = $_POST['page'];
                } else {
                    $urlBillet = 1;
                }
                $url= 'page=' .$urlBillet; 
                $ComSignPaginationOutput = '';  
                $ComSignPaginationOutput.='<nav aria-label="Page navigation example">';
                $ComSignPaginationOutput.='<ul class="pagination">';
                if($pageComSign > 1){ 
                $ComSignPaginationOutput.='<li class="page-item"><a class="page-link prev signcom" href="admin?page=' .$urlBillet.'&pageComSign=' .$prev. '">Previous</a></li>';  
                }
                for($j = $pageComSign - $pageNav; $j < $pageComSign; $j++){
                    if($j> 0){
                        $ComSignPaginationOutput.='<li class="page-item"><a class="page-link" href="admin?page=' .$urlBillet.'&pageComSign=' .$j. '">' .$j. '</a></li>';
                    }
                }
                $ComSignPaginationOutput.='<li class="page-item"><p class="page-link active">' .$pageComSign. '</p></li>';
                for($j = $pageComSign+1; $j <= $pages; $j++){
                    $ComSignPaginationOutput.='<li class="page-item"><a class="page-link" href="admin?page=' .$urlBillet.'&pageComSign=' .$j. '">' .$j. '</a></li>';
                    if($j >= $pageComSign + $pageNav){
                    break;
                    }
                }
                if($pageComSign < $pages){
                $ComSignPaginationOutput.='<li class="page-item"><a class="page-link next signcom" href="admin?page=' .$urlBillet.'&pageComSign=' .$next. '">Next</a></li>';
                }
                $ComSignPaginationOutput.='</ul>';
                $ComSignPaginationOutput.='</nav>';
                $data['$ComSignPaginationOutput'] = $ComSignPaginationOutput;
                exit($data['$ComSignPaginationOutput']);
            }


            
            //COMMENTAIRE MODERE
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
            if(isset($_POST['action']) && $_POST['action']=='pagination'){
                isset($_POST['page']) && is_numeric($_POST['page'])? $page = $_POST['page'] : $page = 1; 
                $nbreEntitesParPage = $entiteParPage;
                $pages = $this->_billetManager->getPageMax($nbreEntitesParPage);
                $pageNav = 2;
                $prev = $page - 1;
                $next = $page + 1;
                $billetsPaginationOutput = '';  
                $billetsPaginationOutput.='<nav aria-label="Page navigation example">';
                $billetsPaginationOutput.='<ul class="pagination">';
                if($page > 1){ 
                $billetsPaginationOutput.='<li class="page-item"><a class="page-link prev" href="admin?page=' .$prev. '">Previous</a></li>';  
                }
                for($i = $page - $pageNav; $i < $page; $i++){
                    if($i> 0){
                        $billetsPaginationOutput.='<li class="page-item"><a class="page-link" href="admin?page=' .$i. '">' .$i. '</a></li>';
                    }
                }
                $billetsPaginationOutput.='<li class="page-item"><p class="page-link active">' .$page. '</p></li>';
                for($i = $page+1; $i <= $pages; $i++){
                    $billetsPaginationOutput.='<li class="page-item"><a class="page-link" href="admin?page=' .$i. '">' .$i. '</a></li>';
                    if($i >= $page + $pageNav){
                    break;
                    }
                }
                if($page < $pages){
                $billetsPaginationOutput.='<li class="page-item"><a class="page-link next" href="admin?page=' .$next. '">Next</a></li>';
                }
                $billetsPaginationOutput.='</ul>';
                $billetsPaginationOutput.='</nav>';
                $data['$billetsPaginationOutput'] = $billetsPaginationOutput;
                exit($data['$billetsPaginationOutput']);
            }

            

            //CHANGEMENT DE MOT DE PASSE
            if(isset($_POST['action']) && $_POST['action'] == 'changePassword'){
                $formOutput ='';
                $formOutput .= '<form class="changepass">';
            }

    }
}
