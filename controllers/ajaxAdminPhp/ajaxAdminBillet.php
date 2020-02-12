<?php
require_once 'models/BilletManager.php';
$_billetManager;

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

//EFFACER BILLET
if(isset($_POST['action']) && $_POST['action']=='deleteBillet'){
    $deleteBillet = $this->_billetManager->deleteBillet($_POST['deleteBillet']); 
}

//PAGINATION
if(isset($_POST['action']) && $_POST['action']=='pagination'){
    isset($_POST['page']) && is_numeric($_POST['page'])? $page = $_POST['page'] : $page = 1; 
    $nbreEntitesParPage = $entiteParPage;
    $pages = $this->_billetManager->getPageMax($nbreEntitesParPage);
    $data = ['page'=>$page, 'maxPages'=>$pages];
    echo json_encode($data);
}
?>