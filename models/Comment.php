<?php


class Comment
{
    private $_id;
    private $_billet;
    private $_auteur;
    private $_contenu;
    private $_date;
    private $_signale;
 
    public function __construct(array $data){
        $this->hydrate($data);
    }

    public function hydrate(array $data){
        foreach($data as $key => $value){
            $method = 'set'.ucfirst($key) // creation des methodes pour set nos attributs, par ex la premiere methode s'appelera setId
            if ( method_exists($this, $method)){
                $this->method($value);
            }
        }
    }
//setters 
    public function setId($id){
    $this->id= (int) $id;
    }
    
    public function setBillet($billet){
    $this->billet = (int) $billet;
    }
 
    public function setAuteur($auteur){
        if(is_string($auteur)){
            $this->_auteur= $auteur;
        }
    }

    public function setContenu($contenu){
        if(is_string($contenu)){
            $this->_contenu= $contenu;
        }
    }

    public function setDate($date){
        $this->_date= $date;   
    }

    public function setSignale($signale){
        $this->signale = (int) $signale;
    }
 //getters
    public function id(){
        return $this->_id;
    }
    public function billet(){
        return $this->_billet;
    }
    
    public function auteur(){
        return $this->_auteur;
    }
    
    public function contenu(){
        return $this->_contenu;
    }
    
    public function date(){
        return $this->_date;
    }

    public function signale(){
        return $this->_signale;
    }
}