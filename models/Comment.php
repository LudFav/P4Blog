<?php


class Comment
{
    private $_billet;
    private $_auteur;
    private $_contenu;
    private $_dateajoutcom;
    private $_datemodifcom;
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

    public function setDateajoutcom($dateajoutcom){
        $this->_dateajoutcom= $dateajoutcom;   
    }

    public function setDatemodifcom($datemodifcom){
        $this->_datemodifcom= $datemodifcom;   
    }

    public function setSignale($signale){
        $this->signale = (int) $signale;
    }
 //getters
    public function billet(){
        return $this->_billet;
    }
    
    public function auteur(){
        return $this->_auteur;
    }
    
    public function contenu(){
        return $this->_contenu;
    }
    
    public function dateajoutcom(){
        return $this->_dateajoutcom;
    }

    public function datemodifcom(){
        return $this->_datemodifcom;
    }

    public function signale(){
        return $this->_signale;
    }
}