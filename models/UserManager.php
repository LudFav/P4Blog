<?php
// contient les methodes d'operation de nos billets

class UserManager extends Model implements crud
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
    //on crée la variable data qui
    //va contenir les données
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
      // var contiendra les données sous forme d'objets
      $var[] = new $obj($data);
    }
    return $var;
    $req->closeCursor();

  }


  public function readOne($table, $obj, $id){
    $this->getBdd();
    $var = [];
    $req = self::$_bdd->prepare("SELECT id, user FROM " .$table. " WHERE id = ?");
    $req->execute(array($id));
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
      $var[] = new $obj($data);
    }
    return $var;
    $req->closeCursor();
  }

  public function update($table, $data, $where){}

  public function delete($table, $where){
    self::$_bdd->exec("DELETE FROM $table WHERE id = .(int) $id");
  }
  
  public function getUsers(){
    return $this->readAll('users', 'User');
  }

  public function getUser($id){
    return $this->readOne('users', 'User', $id);
  }

  public function createUser($data){
    return $this->create('users',array(
    'username' => $data['username'],
    'pass'  => $data['pass']
  ));
  }
}