<?php
// contient les methodes d'operation de nos billets

class BilletManager extends Model implements crud
{
  public function create($table, $data){
    $this->getBdd();
    ksort($data);
    $keyFields = implode('`, `', array_keys($data));
    $valueFields = ':' . implode(', :', array_keys($data));
    $req = self::$_bdd->prepare("INSERT INTO $table (`$keyFields`) VALUES ($valueFields )"); 

    foreach ($data as $key => $value){
      $req->bindValue(":$key", $value);
    }

    $req->execute();
    $req->closeCursor();
  }

  function pagemax($table, $nbreEntitesParPage){
    $this->getBdd();
    $req = self::$_bdd->prepare("SELECT COUNT(*) from $table");
    $req->execute();
    $nbrEntites = $req->fetchColumn();  
    $max = ceil($nbrEntites/$nbreEntitesParPage);
    return $max;
    $req->closeCursor(); 
  }

  public function readAll($table, $obj, $pageB=null, $entiteParPage=null){
    $this->getBdd();
    $var = [];
    $limit = (htmlspecialchars($pageB) - 1) * $entiteParPage. ', ' .$entiteParPage;
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
    return $this->readAll('billets', 'Billet', $pageB, $entiteParPage);
  }

  public function getBillet($id){
    return $this->readOne('billets', 'Billet', $id);
  }

  public function getPageMax($nbreEntitesParPage){
    return $this->pagemax('billets', $nbreEntitesParPage);
  }

  public function createBillet($data){
    return $this->create('billets',array(
    'auteur' => $data['auteur'],
    'titre'  => $data['titre'],
    'contenu'=> $data['contenu'],
    'date'   => date('d-m-Y H:i')
  ));
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





