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
                          <a href="post&id=<?= $billet->id()?>" class="visualize"><i class="fa fa-eye"></i></a>
                          <a href="update&id=<?= $billet->id()?>" class="edit" ><i class="fa fa-pencil" aria-hidden="true"></i></a>
                          <form action="deletebillet&id=<?= $billet->id()?>" id="formDelete<?= $billet->id()?>" onSubmit="return confirm('Etes vous sur de vouloir supprimer ce billet?')" class="deleteForm"><button name="deleteBilletbtn" type="submit" id="deleteButton<?= $billet->id()?>" class="deletebtn"><i class="fa fa-trash" aria-hidden="true"></i></button></form>
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
                          <a href="update&id=<?= $commentaire->id()?>" class="edit" ><i class="fa fa-pencil" aria-hidden="true"></i></a>
                          <form action="deletecomment&id=<?= $commentaire->id()?>" id="commentDelete<?= $commentaire->id()?>" onSubmit="return confirm('Etes vous sur de vouloir supprimer ce commentaire?')" class="deleteForm"><button name="deleteCommentbtn" type="submit" id="deleteButton<?= $commentaire->id()?>" class="deletebtn"><i class="fa fa-trash" aria-hidden="true"></i></button></form>
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
