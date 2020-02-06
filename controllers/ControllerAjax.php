<?php


class ControllerAjax{
  private $_billetManager;
  private $_commentManager;
  public function __construct(){

//BILLET ACCUEIL
    $this->_billetManager = new BilletManager();

    isset($_POST['page']) && is_numeric($_POST['page'])? $page = $_POST['page'] : $page = 1;
    $entiteParPage = 9; 
    $billets = $this->_billetManager->getBillets($page, $entiteParPage);
    if(isset($_POST['action']) && $_POST['action']=='showAccueilBillet'){
        $billetsAccueilOutput = '';
        foreach ($billets as $billet){ 
             $billetsAccueilOutput.= '<div class="col-lg-4 col-md-6">';
             $billetsAccueilOutput.= '<div class="card h-100">';
             $billetsAccueilOutput.= '<div class="single-post post-style-1">';
             $billetsAccueilOutput.= '<div class="blog-image"><img src="public/images/marion-michele-330691.jpg" alt="Blog Image"></div>';
             $billetsAccueilOutput.= '<div class="blog-info">';
             $billetsAccueilOutput.= '<h4 class="title"><a href="post&id=' .$billet->id(). '"><b>' .$billet->titre(). '</b></a></h4>';
             $billetsAccueilOutput.= '</div><!-- blog-info -->';
             $billetsAccueilOutput.= '</div><!-- single-post -->';
             $billetsAccueilOutput.= '</div><!-- card -->';
             $billetsAccueilOutput.= '</div><!-- col-lg-4 col-md-6 -->';
        }
        $data['billetsAccueilOutput'] = $billetsAccueilOutput;
        exit($data['billetsAccueilOutput']);  
    }  

//PAGINATION ACCUEIL
    if(isset($_POST['action']) && $_POST['action']=='paginationAccueil'){
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
      $billetsPaginationOutput.='<li class="page-item"><a class="page-link prev" href="accueil?page=' .$prev. '">Previous</a></li>';  
      }
      for($i = $page - $pageNav; $i < $page; $i++){
          if($i> 0){
              $billetsPaginationOutput.='<li class="page-item"><a class="page-link" href="accueil?page=' .$i. '">' .$i. '</a></li>';
          }
      }
      $billetsPaginationOutput.='<li class="page-item"><p class="page-link active">' .$page. '</p></li>';
      for($i = $page+1; $i <= $pages; $i++){
          $billetsPaginationOutput.='<li class="page-item"><a class="page-link" href="accueil?page=' .$i. '">' .$i. '</a></li>';
          if($i >= $page + $pageNav){
          break;
          }
      }
      if($page < $pages){
      $billetsPaginationOutput.='<li class="page-item"><a class="page-link next" href="accueil?page=' .$next. '">Next</a></li>';
      }
      $billetsPaginationOutput.='</ul>';
      $billetsPaginationOutput.='</nav>';
      $data['$billetsPaginationOutput'] = $billetsPaginationOutput;
      exit($data['$billetsPaginationOutput']);
    }


//COMMENTAIRE POST
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
                  $commentairesOutput.= '<h6 class="commentName"><b><strong>La modération</strong></b></h6>';
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
