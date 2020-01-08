<?php 

class CommentManager extends Model implements crud {

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
  self::$_bdd->exec('DELETE FROM commentaires WHERE id = ?');
}


public function signale($id){
  $req = self::$_bdd->prepare('UPDATE commentaires SET signale = 1 WHERE id = ?');

}

public function getSignaledComments($table, $obj, $signale= null){
  $commentairesignal = [];
  $req = self::$_bdd->prepare('SELECT * FROM commentaires WHERE signale = 1');
  $req->execute(array($signale));
  
  while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
    $commentaire = new Comment($data);
    $commentairesignal[] = $commentaire;
  }
  $req->closeCursor();
  return $commentairesignal;
}

public function getComments($billetId){
  return $this->readAll('commentaires', 'Comment', $billetId);
}


public function getComment($billetId){
    return $this->readOne('commentaires', 'Comment', $billetId);
}

public function createComment($data){
  return $this->create('commentaires', array(
    'auteur' => $data['auteur'],
    'contenu'=> $data['contenu'],
    'date'   => date('d-m-Y H:i:s')
  ));
}
}
