<div class="slider">
  <div class="display-table  center-text">
    <h1 class="title display-table-cell"><b>ADMINISTRATION</b></h1>
  </div>
</div><!-- slider -->
<!--BILLET--> 
<div class="container" style="padding-top:20px;">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6" id="billetTableTitre">
						          <h2>Billets</h2>
                    </div>
					          <div class="col-sm-6">
						          <a href="addbillet" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i><span><strong>Nouveau Billet</strong></span></a>
					          </div>
                </div>
            </div>
            <table class="table table-striped table-hover" id='tableBillet'>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Auteur</th>
						            <th>Titre</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="tbodyBillet">
                    
                </tbody>  
            </table>
            </div>     
<!--MODAL--> 
<!--<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="validation">Save changes</button>
      </div>
    </div>
  </div>
</div>
COMMENTAIRE SIGNALÉ-->
            <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6" id="commentTableTitre">
						          <h2>Commentaires Signalés</h2>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover" id='tableComments'>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Auteur</th>
						<th>Contenu</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id='tbodyComment'>
       
                
                </tbody>   
            </table> 
            </div>        
        </div>   
      </div>  
</body>
</html>
