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
  
    function pagemax($table, $nbreEntitesParPage){
      $this->getBdd();
      $req = self::$_bdd->prepare("SELECT COUNT(*) from $table");
      $req->execute();
      $nbrEntites = $req->fetchColumn();  
      $max = ceil($nbrEntites/$nbreEntitesParPage);
      return $max;
      $req->closeCursor(); 
    }

    function ComSignPageMax($table, $nbreEntitesParPage){
      $this->getBdd();
      $req = self::$_bdd->prepare("SELECT COUNT(*) from $table  WHERE signale = 1 ");
      $req->execute();
      $nbrEntites = $req->fetchColumn();  
      $max = ceil($nbrEntites/$nbreEntitesParPage);
      return $max;
      $req->closeCursor(); 
    }

    public function readAll($table, $obj, $billetId=null, $pageCom=null, $comParPage=null){
      $this->getBdd();
      $commentaires = [];
      $limit = (htmlspecialchars($pageCom) - 1) * $comParPage. ', ' .$comParPage;
      $req = self::$_bdd->prepare("SELECT * FROM $table ORDER BY id DESC WHERE billetId = ? LIMIT $limit");
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

    public function moderation($table, $modere, $where){
      $this->getBdd();
      $req = self::$_bdd->prepare("UPDATE $table SET signale = 0, $modere  WHERE $where");
      $req->execute();
      $req->closeCursor();
    }
 
    public function signale($table, $where){
      $this->getBdd();
      $req = self::$_bdd->prepare("UPDATE $table SET signale = 1 WHERE $where");
      $req->execute();
      $req->closeCursor();
    }
    
    public function unsignale($table, $where){
      $this->getBdd();
      $req = self::$_bdd->prepare("UPDATE $table SET signale = 0 WHERE $where");
      $req->execute();
      $req->closeCursor();
    }
    
    public function createComment($data, $billetId){
      return $this->create('commentaires', array(
        'billetId'=> $_POST['billetId'],
        'auteur' => htmlspecialchars($_POST['auteur']),
        'contenu'=> htmlspecialchars($_POST['contenu']),    
        'date'   => date('d-m-Y H:i:s')
      ));
    }
    
    public function getSignaledComments($table, $obj, $signale= null, $pageComSign, $signComParPage){
      $commentairesignal = [];
      $bdd = $this->getBdd();
      $limit = (htmlspecialchars($pageComSign) - 1) * $signComParPage. ', ' .$signComParPage;
      $req = self::$_bdd->prepare("SELECT * FROM commentaires WHERE signale = 1 LIMIT $limit");
      $req->execute(array($signale));
      while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        $commentaire = new Comment($data);
        $commentairesignal[] = $commentaire;
      }
      $req->closeCursor();
      return $commentairesignal;
    }

    public function getModeredComments($table, $obj, $modere= null, $pageComMod, $entiteParPage){
      $commentairemodere = [];
      $bdd = $this->getBdd();
      $limit = (htmlspecialchars($pageComMod) - 1) * $entiteParPage. ', ' .$entiteParPage;
      $req = self::$_bdd->prepare("SELECT * FROM commentaires WHERE modere = 1 LIMIT $limit");
      $req->execute(array($modere));  
      while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        $commentaire = new Comment($data);
        $commentairemodere[] = $commentaire;
      }
      $req->closeCursor();
      return $commentairemodere;
    }

    public function getComments($billetId, $pageCom, $comParPage){
      return $this->readAll('commentaires', 'Comment', $billetId, $pageCom, $comParPage);
    }
    
    public function getComment($billetId){
      return $this->readOne('commentaires', 'Comment', $billetId);
    }

    public function getPageMax($nbreEntitesParPage){
      return $this->pagemax('commentaires', $nbreEntitesParPage);
    }
    public function getComSignPageMax($nbreEntitesParPage){
      return $this->ComSignPageMax('commentaires', $nbreEntitesParPage);
    }

    public function signaleComment($id){
      return $this->signale('commentaires', "`id` = '{$_POST['idSignal']}'");
    }
    
    public function modereComment($id){
      return $this->moderation('commentaires', "`modere`= 1", "`id` = '{$_POST['modere']}'");
    }

    public function unmodereComment($id){
      return $this->moderation('commentaires', "`modere`= 0", "`id` = '{$_POST['unmodere']}'");
    }

    public function deleteComment($id){
      return $this->delete('commentaires', "`id` = '{$_POST['deleteCom']}'");
    }
    
    public function unsignaleComment($id){
      return $this->unsignale('commentaires', "`id` = '{$_POST['comToUnsignal']}'");
    }
}
