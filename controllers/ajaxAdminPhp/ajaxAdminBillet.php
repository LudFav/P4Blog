<?php

spl_autoload_register(function($class){
    require_once($_SERVER["DOCUMENT_ROOT"]. '/PROJET4-MVC-OOP-PHP/models/'.$class.'.php');
});

$_billetManager;
$_billetManager = new BilletManager; 

((isset($_POST['action'])) && ($_POST['action']=='pagination'))? $page = $_POST['page'] : $page = 1;
var_dump($_POST['page']);
$entiteParPage=4;
$nbreEntitesParPage = $entiteParPage;
$pageDebillets = $_billetManager->getBillets($page, $entiteParPage);
$pages = $_billetManager->getPageMax($nbreEntitesParPage);

//PAGINATION
if(isset($_POST['action']) && $_POST['action']=='pagination'){
    $data = ['page'=>$page, 'maxPages'=>$pages];
    echo json_encode($data);
}
//TABLEAU BILLET
if(isset($_POST['action']) && $_POST['action']=='showbillet'){
    $billetsOutput = '';
    foreach ($pageDebillets as $billet){ 
         $billetsOutput.= '<tr class="billetRow' .$billet->id(). '">';
         $billetsOutput.= '<a href="post&id' .$billet->id(). '"><td>' .$billet->id(). '</td></a>';
         $billetsOutput.= '<td>' .$billet->auteur(). '</td>';
         $billetsOutput.= '<td>' .$billet->titre(). '</td>';
         $billetsOutput.= '<td>' .$billet->date(). '</td>';
         $billetsOutput.= '<td class="actionTd" value="' .$pages. '">';
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
    $deleteBillet = $_billetManager->deleteBillet($_POST['deleteBillet']); 
}
?>