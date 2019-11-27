<?php

class BilletManager extends Model {
    //methode recuperant tout les billets dans la bdd
    public function getBillet(){
        return $this->getAll('billets', 'Billet');
    }
}