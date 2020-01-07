<?php
// contient les methodes d'operation de nos billets

class BilletManager extends Model implements crud
{
  public function create($billets, $billet){
    $this->getBdd();
    $var = [];
    $req = self::$_bdd->prepare('INSERT INTO billets SET auteur = :auteur, titre = :titre, contenu = :contenu, date = NOW()');   
    $req->bindValue(':auteur', $billet->auteur());
    $req->bindValue(':titre', $billet->titre());
    $req->bindValue(':contenu', $billet->contenu());
    $req->execute();
    $req->closeCursor();
  }


  public function readAll($billets, $billet){
    $this->getBdd();
    $var = [];
    $req = self::$_bdd->prepare('SELECT * FROM '.$billets.' ORDER BY id DESC');
    $req->execute();
    //on crée la variable data qui
    //va contenir les données
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
      // var contiendra les données sous forme d'objets
      $var[] = new $billet($data);
    }
    return $var;
    $req->closeCursor();

  }


  public function readOne($billets, $billet, $id){
    $this->getBdd();
    $var = [];
    $req = self::$_bdd->prepare("SELECT id, auteur, titre, contenu, DATE_FORMAT(date, '%d/%m/%Y à %Hh%i') AS date FROM " .$billets. " WHERE id = ?");
    $req->execute(array($id));
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
      $var[] = new $billet($data);
    }
    return $var;
    $req->closeCursor();
  }

  public function update(){}

  public function delete($id){
    self::$_bdd->exec('DELETE FROM billets WHERE id = '.(int) $id);
  }
  
  //methode qui va recuperer tous les billets dans la bdd
  public function getBillets(){
    return $this->readAll('billets', 'Billet');
  }

  public function getBillet($id){
    return $this->readOne('billets', 'Billet', $id);
  }

  public function createBillet(){
    return $this->create('billets', 'Billet');
  } 
}





