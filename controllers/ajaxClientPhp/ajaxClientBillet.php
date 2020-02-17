<?php

 require_once 'models/BilletManager.php';
  $_billetManager;


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

