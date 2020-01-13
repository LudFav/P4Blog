<?php
// contient les methodes d'operation de nos billets

class BilletManager extends Model implements crud
{
  public function create($table, $data){
    $this->getBdd();
    ksort($data);
    $keyFields = implode('`, `', array_keys($data));
    $valueFields = ':' . implode(', :', array_keys($data));
    $req = self::$_bdd->prepare("INSERT INTO $table (`$keyFields`) VALUES ($valueFields )"); 

    foreach ($data as $key => $value){
      $req->bindValue(":$key", $value);
    }

    $req->execute();
    $req->closeCursor();
  }


  public function readAll($table, $obj){
    $this->getBdd();
    $var = [];
    $req = self::$_bdd->prepare("SELECT * FROM $table ORDER BY id DESC");
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
    $req = self::$_bdd->prepare("SELECT id, auteur, titre, contenu, date FROM $table WHERE id = ?");
    $req->execute(array($id));
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
      $var[] = new $obj($data);
    }
    return $var;
    $req->closeCursor();
  }

  public function update($table, $data){
    $this->getBdd();
    ksort($data);
    $req = self::$_bdd->prepare("UPDATE $table SET titre=:titre,contenu=:contenu WHERE id=?"); 
    $req->execute(array($id));
    foreach ($data as $key => $value){
      $req->bindValue(":$key", $value);
    }

    $req->execute();
    $req->closeCursor();
  }

  public function delete($table, $id){
    self::$_bdd->exec("DELETE FROM $table WHERE id=:id");
  }
  
  //methode qui va recuperer tous les billets dans la bdd
  public function getBillets(){
    return $this->readAll('billets', 'Billet');
  }

  public function getBillet($id){
    return $this->readOne('billets', 'Billet', $id);
  }

  public function createBillet($data){
    return $this->create('billets',array(
    'auteur' => $data['auteur'],
    'titre'  => $data['titre'],
    'contenu'=> $data['contenu'],
    'date'   => date('d-m-Y H:i')
  ));
  }

  public function updateBillet($data, $id){
    return $this->update('billets',array(
      'titre'  => $data['titre'],
      'contenu'=> $data['contenu']
    ));
  }
}





