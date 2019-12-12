<?php 

class CommentManager extends Model {

  //gérer la fonction qui va recuperer
  //tous les commentaires dans la bdd


  public function getComments($id){
    return $this->getAllComments('commentaires', 'Comment', $id);
  }

  public function getComment($id){
      return $this->getOne('commentaires', 'Comment', $id);
  }
}
