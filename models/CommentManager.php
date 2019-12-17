<?php 

class CommentManager extends Model implements crud {

  //gérer la fonction qui va recuperer
  //tous les commentaires dans la bdd
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


  public function getComments($billetId){
    $commentaires = [];
    $req = self::$_bdd->prepare('SELECT * FROM commentaires WHERE billetId = ?');
    $req->execute(array($billetId));
    
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
      $commentaire = new Comment($data);
      $commentaires[] = $commentaire;
    }
    $req->closeCursor();
    return $commentaires;
  }

  public function getComment($billetId){
      return $this->getOne('commentaires', 'Comment', $billetId);
  }

  public function create(){}

  public function update(){}

  public function delete(){}

  public function getSignaledComments(){}

}
