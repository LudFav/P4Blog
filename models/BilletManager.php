<?php


class BilletManager extends Model
{

  //gérer la fonction qui va recuperer
  //tous les billets dans la bdd
  public function getBillets(){
    return $this->getAll('billets', 'billet');
  }

  public function getBillet($id){
      return $this->getOne('billets', 'billet', $id);
  }
}





