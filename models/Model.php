<?php

abstract class Model
{

  protected static $_bdd;

  //connexion a la bdd

  private static function setBdd(){
    self::$_bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');

    //on utilise les constantes de PDO pour gérer les erreurs
    self::$_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
  }

  //fonction de connexion par defaut a la bdd
  protected function getBdd(){
    if (self::$_bdd == null) {
      self::setBdd();
      return self::$_bdd;
    }
  }

  //creation de la methode de récupération de liste d'elements dans la bdd

  protected function getAll($table, $obj){
    $this->getBdd();
    $var = [];
    $req = self::$_bdd->prepare('SELECT * FROM '.$table.' ORDER BY id desc');
    $req->execute();

    //on crée la variable data qui
    //va contenir les données
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
      // var contiendra les données sous forme d'objets
      $var[] = new $obj($data);
    }

    return $var;
    $req->closeCursor();

  }

  protected function getOne($table, $obj, $id){
    $this->getBdd();
    $var = [];
    $req = self::$_bdd->prepare("SELECT id, auteur, titre, contenu, DATE_FORMAT(date, '%d/%m/%Y à %Hh%i') AS date FROM " .$table. " WHERE id = ?");
    $req->execute(array($id));
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
      $var[] = new $obj($data);
    }

    return $var;
    $req->closeCursor();
  }
}

