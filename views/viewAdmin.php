<div class="slider">
  <div class="display-table  center-text">
    <h1 class="title display-table-cell"><b>ADMINISTRATION</b></h1>
  </div>
</div><!-- slider -->

<div class="container" style="padding-top:20px;">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						          <h2>Billets</h2>
                    </div>
					          <div class="col-sm-6">
						          <a href="addbillet" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i><span><strong>Nouveau Billet</strong></span></a>
					          </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Auteur</th>
						            <th>Titre</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($billets as $billet): ?>

                      <tr>
                        <a href="post&id=<?= $billet->id()?>"><td><?php echo ($billet->id()); ?></td></a>
                        <td><?php echo ($billet->auteur()); ?></td>
                        <td><?php echo ($billet->titre()); ?></td>
                        <td><?php echo ($billet->date()); ?></td>
                        <td class="actionTd">
                          <button class="visualBilBtn"><a href="post&id=<?= $billet->id()?>" ><i class="fa fa-eye"></i></a></button>
                          <button class="editBilBtn" ><a href="update&id=<?= $billet->id()?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></button>
                          <button class="deleteBilBtn" value="<?= $billet->id()?>" ><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>   
            </table> 
            </div>     
            <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						          <h2>Commentaires Signalés</h2>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Auteur</th>
						            <th>Contenu</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                 <?php  foreach ($commentaires as $commentaire): ?>
                      <tr>
                        <td><?php echo ($commentaire->id()); ?></td>
                        <td><?php echo ($commentaire->auteur()); ?></td>
                        <td><?php echo ($commentaire->contenu()); ?></td>
                        <td><?php echo ($commentaire->date()); ?></td>
                        <td class="actionTd">
                          
                          <button value="<?= $commentaire->id()?>" class="unsignalComBtn" ><i class="fa fa-comment-o" aria-hidden="true"></i></button>
                          <button value="<?= $commentaire->id()?>" class="modereComBtn" ><i class="fa fa-commenting" aria-hidden="true"></i></button>
                          <button value="<?= $commentaire->id()?>" class="deleteComBtn" ><i class="fa fa-trash" aria-hidden="true"></i></button>
                          <!--<form action="deletecomment&id=<?= $commentaire->id()?>" id="commentDelete<?= $commentaire->id()?>" onSubmit="return confirm('Etes vous sur de vouloir supprimer ce commentaire?')" class="deleteForm"><button name="deleteCommentbtn" type="submit" id="deleteButton<?= $commentaire->id()?>" class="deletebtn"><i class="fa fa-trash" aria-hidden="true"></i></button></form>-->
                        </td>
                      </tr>
                    <?php endforeach;  ?>
                
                  </tbody>   
            </table> 
            </div>        
        </div>   
      </div>  
</body>
</html>
