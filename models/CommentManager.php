<?php 

class CommentManager extends Model implements crud {

  //gérer la fonction qui va recuperer
  //tous les commentaires dans la bdd
  


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
  
}
