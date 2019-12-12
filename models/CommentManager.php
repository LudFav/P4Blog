<?php 

class CommentManager extends Model {

  //gérer la fonction qui va recuperer
  //tous les commentaires dans la bdd


  public function getComments(){
    return $this->getAllComments('commentaires', 'Comment', $billetId);
  }

  public function getComment($id){
      return $this->getOne('commentaires', 'Comment', $id);
  }
}
