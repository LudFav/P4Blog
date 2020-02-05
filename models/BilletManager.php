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

  public function readAll($table, $obj){
    $this->getBdd();
    $var = [];
    $req = self::$_bdd->prepare('SELECT * FROM '.$table.' ORDER BY id DESC');
    $req->execute();
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) { 
      $var[] = new $obj($data);
    }
    return $var;
    $req->closeCursor();
  }

  public function pagination($table, $obj, $page, $limit, $offset, $nbreEntites, $nbreEntitesParPage){
    $this->getBdd();
    $var = [];
    //$req = self::$_bdd->prepare("SELECT id FROM $table");
    //$req->execute(); 
    //$nbreEntites = $req->rowCount();
    //$nbreEntitesParPage = 5;
    //$pages = ceil($nbreEntites / $nbreEntitesParPage);
    //$limit = (htmlspecialchars($page) - 1) * $nbreEntitesParPage. ', '. $nbreEntitesParPage;
    $req = self::$_bdd->prepare("SELECT * FROM $table ORDER BY id DESC LIMIT $limit, $offset");
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
  

  //methode qui va recuperer tous les billets dans la bdd
  public function getBillets(){
    return $this->readAll('billets', 'Billet');
  }

  public function getBillet($id){
    return $this->readOne('billets', 'Billet', $id);
  }

  public function getBilletsWithPagination($page=null, $limit=null, $offset=null, $nbreEntites=null, $nbreEntitesParPage=null ){
    return $this->pagination('billets', 'Billet', $page, $limit, $offset, $nbreEntites, $nbreEntitesParPage);
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





