<?php 

class CommentManager extends Model implements crud {

public function create($table, $obj){
  $this->getBdd();
  $var = [];
  $req = self::$_bdd->prepare('INSERT INTO commentaires SET billetId = :billetId, auteur = :auteur, contenu = :contenu, date = NOW()');   
  $req->bindValue(':billetId', $comment->billetId());
  $req->bindValue(':auteur', $comment->auteur());
  $req->bindValue(':contenu', $comment->contenu());
  $req->execute();
  $req->closeCursor();
}


public function readAll($table, $obj, $billetId= null){
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


public function readOne($table, $obj, $id){
  $this->getBdd();
  $commentaire = [];
  $req = self::$_bdd->prepare("SELECT id, auteur, titre, contenu, DATE_FORMAT(date, '%d/%m/%Y à %Hh%i') AS date FROM " .$table. " WHERE id = ?");
  $req->execute(array($id));
  while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
    $commentaire[] = new Comment($data);
  }

  return $commentaire;
  $req->closeCursor();
}


public function update(){}


public function delete($id){
  self::$_bdd->exec('DELETE FROM commentaires WHERE id = '.(int) $id);
}


public function signale($id){
  $req = self::$_bdd->prepare("UPDATE commentaires SET signale = 1 WHERE id = ?");

}


public function getComments($billetId){
  return $this->readAll('commentaires', 'Comment', $billetId);
}


public function getComment($billetId){
    return $this->readOne('commentaires', 'Comment', $billetId);
}


public function getSignaledComments(){}


/*
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
*/

}
