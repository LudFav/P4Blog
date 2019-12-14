<?php
// contient les methodes d'operation de nos billets

class BilletManager extends Model implements crud
{

  //methode qui va recuperer tous les billets dans la bdd
  public function getBillets(){
    return $this->getAll('billets', 'Billet');
  }

  public function getBillet($id){
      return $this->getOne('billets', 'Billet', $id);
  }

  public function create(){}

  public function update(){}

  public function delete(){}
  
}





