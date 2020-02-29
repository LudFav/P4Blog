<?php

class BilletManager extends Model implements crud
{
  public function create($table, $obj){
    $this->getBdd();
    $var = [];
    $req = self::$_bdd->prepare("INSERT INTO $table SET auteur = :auteur, titre = :titre, contenu = :contenu, date = NOW()"); 
    $req->bindValue(':auteur', $obj->auteur());
    $req->bindValue(':titre', $obj->titre());
    $req->bindValue(':contenu', $obj->contenu());
    $req->execute();
    $req->closeCursor();
  }

    /*ksort($data);
    $keyFields = implode('`, `', array_keys($data));
    $valueFields = ':' . implode(', :', array_keys($data));
    $req = self::$_bdd->prepare("INSERT INTO $table (`$keyFields`) VALUES ($valueFields )");  
    foreach ($data as $key => $value){
      $req->bindValue(":$key", $value);
    }*/

  function pagemax($table, $nbreEntitesParPage){
    $this->getBdd();
    $req = self::$_bdd->prepare("SELECT COUNT(*) from $table");
    $req->execute();
    $nbrEntites = $req->fetchColumn();  
    $max = ceil($nbrEntites/$nbreEntitesParPage);
    return $max;
    $req->closeCursor(); 
  }

  public function readAll($table, $obj, $page, $entiteParPage){
    $this->getBdd();
    $var = [];
    $limit = (htmlspecialchars($page) - 1) * $entiteParPage. ', ' .$entiteParPage;
    $req = self::$_bdd->prepare("SELECT * FROM $table ORDER BY id DESC LIMIT $limit");
    $req->execute();
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) { 
      $var[] = new $obj($data);
    }
    return $var;
    $req->closeCursor();
  }

  public function readOne($table, $obj, $id){
    $this->getBdd();
    $var = [];
    $req = self::$_bdd->prepare("SELECT id, auteur, titre, contenu, date FROM $table WHERE id = ?");
    $req->execute(array($id));
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
      $var[] = new $obj($data);
    }
    return $var;
    $req->closeCursor();
  }


  public function update($table, $data, $where){
    $this->getBdd();
    ksort($data);
    $fields = NULL;
		foreach($data as $key=> $value) {
			$fields .= "`$key`=:$key,";
		}
		$fields = rtrim($fields, ',');
    $req = self::$_bdd->prepare("UPDATE $table SET $fields WHERE $where"); 
    
    foreach ($data as $key => $value){
      $req->bindValue(":$key", $value);
    }
    $req->execute();
    $req->closeCursor();
  }

  public function delete($table, $where){
    $this->getBdd();
    $req = self::$_bdd->prepare("DELETE FROM $table WHERE $where");
    $req->execute();
    $req->closeCursor();
  }
  
  public function getBillets($pageB, $entiteParPage){
    $page = $pageB;
    return $this->readAll('billets', 'Billet', $page, $entiteParPage);
  }

  public function getBillet($id){
    return $this->readOne('billets', 'Billet', $id);
  }

  public function getPageMax($nbreEntitesParPage){
    return $this->pagemax('billets', $nbreEntitesParPage);
  }

  public function createBillet($data){
    return $this->create('billets', 'Billet');
  }

  public function updateBillet($data, $id){
    return $this->update('billets',array(
      'titre'  => $data['titre'],
      'contenu'=> $data['contenu']
    ), "`id` = '{$_GET['id']}'");
  }

  public function deleteBillet($id){
    return $this->delete('billets', "`id` = '{$_POST['deleteBillet']}'");
  }
}





