<?php
// contient les methodes d'operation de nos billets

class BilletManager extends Model implements crud
{
  public function readAll($table, $obj){
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

  public function readOne($table, $obj, $id){
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
  //methode qui va recuperer tous les billets dans la bdd
  public function getBillets(){
    return $this->readAll('billets', 'Billet');
  }

  public function getBillet($id){
      return $this->readOne('billets', 'Billet', $id);
  }

  public function create(){}

  public function update(){}

  public function delete(){}
  
}





