<?php 
abstract class Model{
    private static $_bdd;

    // connexion a la base de donnée
    private static function setBdd(){
        self::$_bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
        //utilisation des const de PDO pour gerer les erreurs 
        self::$_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    //methode de connexion par defaut à la base de donnée
    protected function getBdd(){
        if(self::$_bdd == null){
            self::setBdd();
            return self::$_bdd;
        }
    }

    //methode de recuperation de la liste des elements de la BDD
    protected function getAll($table, $obj){
        $this->getBdd();
        $arrayTable  = [];
        $requete = self::$_bdd->prepare(' SELECT * FROM ' .$table. ' ORDER BY id desc');
        $requete->execute();

        // creation de la variable data contenant les données recuperées de la table cible
        while($data = $requete->fetch(PDO::FETCH_ASSOC)){
            //$arrayTable contiendra les données sous forme d'objets
            $arrayTable[]= new $obj($data);
        }

        return $arrayTable;
        $requete->closeCursor();

    }
}