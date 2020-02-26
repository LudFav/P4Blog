
<form action="" method="post" id="FormAddBillet">

  <div class="form-group">
    <label for="titre" class="labelBillet"><b>Titre</b></label>
    <input type="text" name="titre" class="form-control" id="titreB" value="<?=$billet[0]->titre()?>" required>
  </div>

  <div class="form-group">
    <label for="contenu" class="labelBillet"><b>Contenu</b></label>
    <textarea class="form-control" name="contenu" id="textareaC" rows="3"><?=$billet[0]->contenu()?></textarea>
  </div>

  <input name="updateBillet" type="submit" value="valider" class="btn-success addBillet"/>
</form>
