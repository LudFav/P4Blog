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
						          <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Ajouter 1 billet</span></a>
						          <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Effacer</span></a>						
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
                        <td><?php echo ($billet->id()); ?></td>
                        <td><?php echo ($billet->auteur()); ?></td>
                        <td><?php echo ($billet->titre()); ?></td>
                        <td><?php echo ($billet->date()); ?></td>
                        <td>
                          <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                          <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
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
					          <div class="col-sm-6">
						          <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Effacer</span></a>						
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
                        <td>
                          <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                          <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
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
