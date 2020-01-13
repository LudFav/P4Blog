
<form action="update" method="post" id="FormAddBillet">
  <div class="form-group">
    <label for="auteur" class="labelBillet"><b>Auteur</b></label>
    <input type="text" name="auteur" class="form-control" id="auteurB" size="35" value="<?=$billet[0]->auteur()?>">
  </div>

  <div class="form-group">
    <label for="titre" class="labelBillet"><b>Titre</b></label>
    <input type="text" name="titre" class="form-control" id="titreB" value="<?=$billet->titre()?>">
  </div>

  <div class="form-group">
    <label for="contenu" class="labelBillet"><b>Contenu</b></label>
    <textarea class="form-control" name="contenu" id="textareaB" rows="3" value="<?=$billet->contenu()?>"></textarea>
  </div>

  <input name="updateBillet" type="submit" value="valider" class="updateBillet"/>
</form>