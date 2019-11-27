<?php

class Billet {

    private $_id;
    private $_auteur;
    private $_titre;
    private $_contenu;
    private $_dateAjoutBillet;
    private $_dateModifBillet;

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
// setters 
    public function setId($id){
        $id= (int) $id;
        if($id >0){
            $this->_id= $id;
        }
    }

    public function setAuteur($auteur){
        if(is_string($auteur)){
            $this->_auteur= $auteur;
        }
    }

    public function setTitre($titre){
        if(is_string($titre)){
            $this->_titre= $titre;
        }
    }

    public function setContenu($contenu){
        if(is_string($contenu)){
            $this->_contenu= $contenu;
        }
    }

    public function setdateAjoutBillet($dateAjoutBillet){
        $this->_dateAjoutBillet= $dateAjoutBillet;   
    }

    public function setdateAjoutBillet($dateModifBillet){
        $this->_dateModifBillet= $dateModifBillet;   
    }

// getters

    public function id(){
        return $this->_id;
    }

    public function auteur(){
        return $this->_auteur;
    }

    public function titre(){
        return $this->_titre;
    }

    public function contenu(){
        return $this->_contenu;
    }

    public function dateAjoutBillet(){
        return $this->_dateAjoutBillet;
    }

    public function dateModifBillet(){
        return $this->_dateModifBillet;
    }
}