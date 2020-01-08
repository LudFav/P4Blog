
<form action="addbillet" method="post" id="FormAddBillet">
  <div class="form-group">
    <label for="auteur" class="labelBillet"><b>Auteur</b></label>
    <input type="text" name="auteur" class="form-control" id="auteurB" placeholder="Stephane Rois" size="35">
  </div>

  <div class="form-group">
    <label for="titre" class="labelBillet"><b>Titre</b></label>
    <input type="text" name="titre" class="form-control" id="titreB" placeholder="titre">
  </div>

  <div class="form-group">
    <label for="contenu" class="labelBillet"><b>Contenu</b></label>
    <textarea class="form-control" name="contenu" id="textareaB" rows="3"></textarea>
  </div>

  <input type="submit" value="valider" class="addBillet"/>
</form>
