<?php

spl_autoload_register(function($class){
    require_once($_SERVER["DOCUMENT_ROOT"].'/PROJET4-MVC-OOP-PHP/models/'.$class.'.php');
});

$_billetManager;
$_billetManager = new BilletManager; 

$entiteParPage = 4;
$nbreEntitesParPage = $entiteParPage;

$page = isset($_POST['page'])? $_POST['page'] :1;

$pageDebillets = $_billetManager->getBillets($page, $entiteParPage);
$pages = $_billetManager->getPageMax($nbreEntitesParPage);

//TABLEAU BILLET ET PAGE
if(isset($_POST['action']) && $_POST['action']=='showbillet'){
    $billetsOutput = '';
    foreach ($pageDebillets as $billet){ 
         $billetsOutput.= '<tr class="billetRow' .$billet->id(). '">';
         $billetsOutput.= '<a href="post&id' .$billet->id(). '"><td class="tdId">' .$billet->id(). '</td></a>';
         $billetsOutput.= '<td class="tdAuteur">' .$billet->auteur(). '</td>';
         $billetsOutput.= '<td class="tdTitre">' .$billet->titre(). '</td>';
         $billetsOutput.= '<td class="tdDate">' .$billet->date(). '</td>';
         $billetsOutput.= '<td class="actionTd" value="' .$pages. '">';
         $billetsOutput.= '<button class="visualBilBtn"><a href="post&id=' .$billet->id(). '" ><i class="fa fa-eye"></i></a></button>';
         $billetsOutput.= '<button class="editBilBtn" ><a href="update&id=' .$billet->id(). '"><i class="fa fa-pencil" aria-hidden="true"></i></a></button>';
         $billetsOutput.= '<button class="deleteBilBtn" value="' .$billet->id(). '" data-toggle="modal" data-target ="#deleteBillet" ><i class="fa fa-trash" aria-hidden="true"></i></button>';
         $billetsOutput.= '</td>';
         $billetsOutput.= '</tr>'; 
    }
    $data['billetsOutput'] = $billetsOutput;
    $data['page'] = $page;
    $data['maxPages'] = $pages;
    $response = json_encode($data);
    exit($response);
}

//EFFACER BILLET
if(isset($_POST['action']) && $_POST['action']=='deleteBillet'){
    $deleteBillet = $_billetManager->deleteBillet($_POST['deleteBillet']); 
}


?>