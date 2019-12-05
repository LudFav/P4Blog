<?php 

class CommentManager extends Model {

  //gérer la fonction qui va recuperer
  //tous les commentaire dans la bdd
  public function getComments(){
    return $this->getAll('commentaire', 'Comment');
  }

  public function getComment($id){
      return $this->getOne('commentaire', 'Comment', $id);
  }
}
