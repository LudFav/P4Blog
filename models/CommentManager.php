<?php 

class CommentManager extends Model implements crud {

    public function create($table, $data){
      $this->getBdd();
      ksort($data);
      $keyFields = implode('`, `', array_keys($data));
      $valueFields = ':' . implode(', :', array_keys($data));
      
      $req = self::$_bdd->prepare("INSERT INTO $table (`$keyFields`) VALUES ($valueFields)");
      
      foreach ($data as $key => $value){
        $req->bindValue(":$key", $value);
      }
  
      $req->execute();
      $req->closeCursor();
    }
  
  
    public function readAll($table, $obj, $billetId= null){
      $commentaires = [];
      $req = self::$_bdd->prepare("SELECT * FROM $table WHERE billetId = ?");
      $req->execute(array($billetId));
      
      while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        $commentaire = new Comment($data);
        $commentaires[] = $commentaire;
      }
      $req->closeCursor();
      return $commentaires;
    }
    
    
    public function readOne($table, $obj, $id){
      $this->getBdd();
      $commentaire = [];
      $req = self::$_bdd->prepare("SELECT id, auteur, titre, contenu, DATE_FORMAT(date, '%d/%m/%Y à %Hh%i') AS date FROM $table WHERE id = ?");
      $req->execute(array($id));
      while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        $commentaire[] = new Comment($data);
      }
    
      return $commentaire;
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

    public function moderation($table, $where){
      $req = self::$_bdd->prepare("UPDATE $table SET contenu = 'Ce commentaire a été modéré', signale = 0, modere = 1  WHERE $where");
      $req->execute();
      $req->closeCursor();
    }
    
    public function signale($table, $where){
      $req = self::$_bdd->prepare("UPDATE $table SET signale = 1 WHERE $where");
      $req->execute();
      $req->closeCursor();
    }
    
    public function unsignale($table, $where){
      $req = self::$_bdd->prepare("UPDATE $table SET signale = 0 WHERE $where");
      $req->execute();
      $req->closeCursor();
    }
    
    
    
    public function getSignaledComments($table, $obj, $signale= null){
      $commentairesignal = [];
      $req = self::$_bdd->prepare('SELECT * FROM commentaires WHERE signale = 1');
      $req->execute(array($signale));
      
      while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        $commentaire = new Comment($data);
        $commentairesignal[] = $commentaire;
      }
      $req->closeCursor();
      return $commentairesignal;
    }
    
    public function getComments($billetId){
      return $this->readAll('commentaires', 'Comment', $billetId);
    }
    
    
    public function getComment($billetId){
      return $this->readOne('commentaires', 'Comment', $billetId);
    }
    
    public function createComment($data, $billetId){
      return $this->create('commentaires', array(
        'billetId'=>$data['billetId'],
        'auteur' => $data['auteur'],
        'contenu'=> $data['contenu'],    
        'date'   => date('d-m-Y H:i:s')
      ));
    }

    public function signaleComment($id){
      return $this->signale('commentaires', "`id` = '{$_POST['idSignal']}'");
    }
    
    public function modereComment($id){
      return $this->moderation('commentaires', "`id` = '{$_POST['modere']}'");
    }

    public function deleteComment($id){
      return $this->delete('commentaires', "`id` = '{$_POST['delete']}'");
    }
    
    public function unsignaleComment($id){
      return $this->unsignale('commentaires', "`id` = '{$_POST['unSignal']}'");
    }
}
